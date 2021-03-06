<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\clase;
use App\Models\cliente;
use App\Models\detalle_pagos_clases;
use App\Models\empleado;
use App\Models\oferta_actividades;
use App\Models\pagos_clases;
use App\Rules\validaDisponibilidadEspacioEdit;
use App\Rules\validarCuposMinimos;
use App\Rules\validarDisponibilidadEspacio;
use App\Rules\validarDisponibilidadMaestro;
use App\Rules\validarDisponibilidadMaestroEdit;
use App\Rules\validarHora_fin;
use App\Rules\validarIntervaloTiempo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class oferta_actividadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleado = Auth::user();

        $idTipoUsuario = $empleado->id_tipoUsuario;
        if($idTipoUsuario == 3){
            $ofertaActividades = oferta_actividades::all()->where('id_empleado', $empleado->id)->where('status', 'activo');
            foreach($ofertaActividades as $oferta){
                $cuposUsados = 0;
                $pagos = pagos_clases::all()->where('fecha',date('Y-m-d'));
                foreach($pagos as $pago){
                    $detallePago = detalle_pagos_clases::all()->where('id_oferta',$oferta->id)->first();
                    if($detallePago != null){
                        $cuposUsados++;
                    }
                }
                $oferta->cuposDisponibles = $oferta->cupos - $cuposUsados;
            }
            $content = 'ofertaActividades.index';
            return view('dashboard', compact('ofertaActividades', 'content'));
        }
        $ofertaActividades = oferta_actividades::all()->where('status','activo'); 
        foreach($ofertaActividades as $oferta){
            $cuposUsados = 0;
            $pagos = pagos_clases::all()->where('fecha',date('Y-m-d'));
            foreach($pagos as $pago){
                $detallePago = detalle_pagos_clases::all()->where('id_oferta',$oferta->id)->first();
                if($detallePago != null){
                    $cuposUsados++;
                }
            }
            $oferta->cuposDisponibles = $oferta->cupos - $cuposUsados;
        }
        $content = 'ofertaActividades.index';
        return view('dashboard', compact('ofertaActividades', 'content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maestros = empleado::all()->where('id_tipoUsuario',3);
        $clases = DB::table('clases')->select()->where('status','activo')->get();
        $id = DB::table('oferta_actividades')->select('id')->orderByDesc('id')->first();
        if($id == null){
            $id = 1;
            return view('ofertaActividades.formOferta', compact('maestros','clases','id'));
        }
        $id = (int) $id->id + 1;
        return view('ofertaActividades.formOferta',compact('maestros','clases','id'));
    }

    public function toJson()
    {
        $data['oferta_actividades'] = oferta_actividades::paginate();
        //dd(json_encode($data));
        return redirect('/empleado/oferta_actividades')->with('data', json_encode($data));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cupos' => ['required', 'numeric', 'min:5', 'max:25'],
            'dia' => [new validarDisponibilidadEspacio($request->horaInicio)],
            'horaFin' => [new validarHora_fin($request->horaInicio), new validarIntervaloTiempo($request->horaInicio)],
            'id_maestro' => [new validarDisponibilidadMaestro($request->horaInicio,$request->dia)],
            'costo' => ['numeric']
        ]);
        $oferta = new oferta_actividades();
        $oferta->id_clase = $request->id_clase;
        $oferta->horaInicio = $request->horaInicio;
        $oferta->horaFin = $request->horaFin;
        $oferta->dia = $request->dia;
        $oferta->cupos = $request->cupos;
        $oferta->costo = $request->costo;
        $oferta->id_empleado = $request->id_maestro;
        $oferta->status = 'activo';
        $oferta->updated_at = now();
        $oferta->save();

        return redirect('/empleado/oferta_actividades')->with('success', 'Se ha asignado el horario y maestro de forma exitosa');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\oferta_actividades  $oferta_actividades
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $alumnos = null;
        $cont = 0;
        $pagos = pagos_clases::all()->where('fecha',date('Y-m-d'));
        foreach($pagos as $pago){
            $detallePago = detalle_pagos_clases::all()->where('id_oferta',$id)->where('id_pago_clase',$pago->id)->first();
            if($detallePago != null){
                $cliente = cliente::all()->where('id',$pago->id_cliente)->first();
                $alumnos[$cont]['id_cliente'] = $cliente->id;
                $alumnos[$cont]['nombreAlumno'] = $cliente->nombre;
                $cont++;
            }
        }
        $content = 'ofertaActividades.detalleOferta';
        return view('dashboard', compact('content','alumnos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\oferta_actividades  $oferta_actividades
     * @return \Illuminate\Http\Response
     */
    public function edit($idOferta)
    {
        $ofertas = oferta_actividades::where('id',$idOferta)->get();
        $oferta = $ofertas[0];
        $clases = clase::all();
        $maestros = empleado::all()->where('id_tipoUsuario',3);
        return view('ofertaActividades.formEditOferta', compact('oferta','maestros', 'clases'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\oferta_actividades  $oferta_actividades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idOferta)
    {
        $ofertas = oferta_actividades::where('id',$idOferta)->get();
        $oferta = $ofertas[0];
        $request->validate([
            'cupos' => ['required', 'numeric', 'min:0', 'max:25',new validarCuposMinimos($oferta->id)],
            'dia' => [new validaDisponibilidadEspacioEdit($request->horaInicio,$oferta->id)],
            'horaFin' => [new validarHora_fin($request->horaInicio), new validarIntervaloTiempo($request->horaInicio)],
            'id_maestro' => [new validarDisponibilidadMaestroEdit($request->horaInicio,$request->dia,$oferta->id)],
            'costo' => ['numeric']
        ]);

        $oferta->id_clase = $request->id_clase;
        $oferta->horaInicio = $request->horaInicio;
        $oferta->horaFin = $request->horaFin;
        $oferta->dia = $request->dia;
        $oferta->cupos = $request->cupos;
        $oferta->costo = $request->costo;
        $oferta->id_empleado = $request->id_maestro;
        $oferta->updated_at = now();

        DB::table('oferta_actividades')
        ->where('id', $oferta->id)
        ->update([
            'id_clase' => $oferta->id_clase,
            'horaInicio' => $oferta->horaInicio,
            'horaFin' => $oferta->horaFin,
            'dia' => $oferta->dia,
            'costo' => $oferta->costo,
            'cupos' => $oferta->cupos,
            'updated_at' => $oferta->updated_at
        ]);

        return redirect('/empleado/oferta_actividades')->with('edited', 'Se ha modificado la informacion de la clase con el id: ' . $oferta->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\oferta_actividades  $oferta_actividades
     * @return \Illuminate\Http\Response
     */
    public function destroy($idOferta)
    {
        $ofertas = oferta_actividades::where('id',$idOferta)->get();
        $oferta = $ofertas[0];
        $oferta->status = 'inactivo';
        $oferta->save();
        return redirect('/empleado/oferta_actividades')->with('deleted', 'Se ha desactivado la clase con el id de: ' . $oferta->id);

    }

    public function orderByClase(){
        $empleado = Auth::user();
        $idTipoUsuario = $empleado->id_tipoUsuario;

        if($idTipoUsuario == 3){
            $ofertaActividades = oferta_actividades::all()->where('id_empleado', $empleado->id)->where('status', 'activo');
            $ofertaActividades = oferta_actividadesController::burbujaClase($ofertaActividades);
            foreach($ofertaActividades as $oferta){
                $cuposUsados = 0;
                $pagos = pagos_clases::all()->where('fecha',date('Y-m-d'));
                foreach($pagos as $pago){
                    $detallePago = detalle_pagos_clases::all()->where('id_oferta',$oferta->id)->first();
                    if($detallePago != null){
                        $cuposUsados++;
                    }
                }
                $oferta->cuposDisponibles = $oferta->cupos - $cuposUsados;
            }
            $content = 'ofertaActividades.index';
            $clase = true;
            return view('dashboard', compact('ofertaActividades', 'content', 'clase'));
        }

        $empleado = session('empleado');
        $ofertaActividades = oferta_actividades::all()->where('status','activo');
        $ofertaActividades = oferta_actividadesController::burbujaClase($ofertaActividades);
        foreach($ofertaActividades as $oferta){
            $cuposUsados = 0;
            $pagos = pagos_clases::all()->where('fecha',date('Y-m-d'));
            foreach($pagos as $pago){
                $detallePago = detalle_pagos_clases::all()->where('id_oferta',$oferta->id)->first();
                if($detallePago != null){
                    $cuposUsados++;
                }
            }
            $oferta->cuposDisponibles = $oferta->cupos - $cuposUsados;
        }
        $content = 'ofertaActividades.index';
        $clase = true;
        return view('dashboard', compact('ofertaActividades', 'content', 'clase'));
    }

    public function orderByDia(){
        $empleado = Auth::user();
        $idTipoUsuario = $empleado->id_tipoUsuario;

        if($idTipoUsuario == 3){
            $ofertaActividades = oferta_actividades::all()->where('id_empleado', $empleado->id)->where('status', 'activo');
            $ofertaActividades = oferta_actividadesController::burbujaDia($ofertaActividades);
            foreach($ofertaActividades as $oferta){
                $cuposUsados = 0;
                $pagos = pagos_clases::all()->where('fecha',date('Y-m-d'));
                foreach($pagos as $pago){
                    $detallePago = detalle_pagos_clases::all()->where('id_oferta',$oferta->id)->first();
                    if($detallePago != null){
                        $cuposUsados++;
                    }
                }
                $oferta->cuposDisponibles = $oferta->cupos - $cuposUsados;
            }
            $content = 'ofertaActividades.index';
            $dia = true;
            return view('dashboard', compact('ofertaActividades', 'content', 'dia'));
        }

        $empleado = session('empleado');
        $ofertaActividades = oferta_actividades::all()->where('status','activo');
        $ofertaActividades = oferta_actividadesController::burbujaDia($ofertaActividades);
        foreach($ofertaActividades as $oferta){
            $cuposUsados = 0;
            $pagos = pagos_clases::all()->where('fecha',date('Y-m-d'));
            foreach($pagos as $pago){
                $detallePago = detalle_pagos_clases::all()->where('id_oferta',$oferta->id)->first();
                if($detallePago != null){
                    $cuposUsados++;
                }
            }
            $oferta->cuposDisponibles = $oferta->cupos - $cuposUsados;
        }
        $content = 'ofertaActividades.index';
        $dia = true;
        return view('dashboard', compact('ofertaActividades','content', 'dia'));
    }

    public function orderByMaestro(){
        $empleado = session('empleado');
        $ofertaActividades = oferta_actividades::all()->where('status','activo');
        $ofertaActividades = oferta_actividadesController::burbujaMaestro($ofertaActividades);
        foreach($ofertaActividades as $oferta){
            $cuposUsados = 0;
            $pagos = pagos_clases::all()->where('fecha',date('Y-m-d'));
            foreach($pagos as $pago){
                $detallePago = detalle_pagos_clases::all()->where('id_oferta',$oferta->id)->first();
                if($detallePago != null){
                    $cuposUsados++;
                }
            }
            $oferta->cuposDisponibles = $oferta->cupos - $cuposUsados;
        }
        $content = 'ofertaActividades.index';
        $maestro = true;
        return view('dashboard', compact('ofertaActividades','content', 'maestro'));
    }

    public function busquedaPatronMaestro(Request $request){
        $empleado = session('empleado');
        $ofertaActividades = oferta_actividades::all()->where('status','activo');
        $ofertaActividades = oferta_actividadesController::burbujaMaestro($ofertaActividades);
        $ofertaActividades = oferta_actividadesController::buscarPatronMaestro($ofertaActividades, $request->patron);
        $content = 'ofertaActividades.index';
        $maestro = true;
        $patronBuscado = $request->patron;
        return view('dashboard', compact('ofertaActividades','content', 'maestro', 'patronBuscado'));
    }

    public function busquedaPatronDia(Request $request){
        $empleado = Auth::user();
        $idTipoUsuario = $empleado->id_tipoUsuario;

        if($idTipoUsuario == 3){
            $ofertaActividades = oferta_actividades::all()->where('id_empleado', $empleado->id)->where('status', 'activo');
            $ofertaActividades = oferta_actividadesController::burbujaDia($ofertaActividades);
            $ofertaActividades = oferta_actividadesController::buscarPatronDia($ofertaActividades, $request->patron);
            $content = 'ofertaActividades.index';
            $dia = true;
            $patronBuscado = $request->patron;
            return view('dashboard', compact('ofertaActividades', 'content', 'dia', 'patronBuscado'));
        }

        $empleado = session('empleado');
        $ofertaActividades = oferta_actividades::all()->where('status','activo');
        $ofertaActividades = oferta_actividadesController::burbujaDia($ofertaActividades);
        $ofertaActividades = oferta_actividadesController::buscarPatronDia($ofertaActividades, $request->patron);
        $content = 'ofertaActividades.index';
        $dia = true;
        $patronBuscado = $request->patron;
        return view('dashboard', compact('ofertaActividades', 'content', 'dia', 'patronBuscado'));
    }

    public function busquedaPatronClase(Request $request){
        $empleado = Auth::user();
        $idTipoUsuario = $empleado->id_tipoUsuario;

        if($idTipoUsuario == 3){
            $ofertaActividades = oferta_actividades::all()->where('id_empleado', $empleado->id)->where('status', 'activo');
            $ofertaActividades = oferta_actividadesController::burbujaClase($ofertaActividades);
            $ofertaActividades = oferta_actividadesController::buscarPatron($ofertaActividades, $request->patron);
            $content = 'ofertaActividades.index';
            $clase = true;
            $patronBuscado = $request->patron;
            return view('dashboard', compact('ofertaActividades', 'content', 'clase', 'patronBuscado'));
        }

        $empleado = session('empleado');
        $ofertaActividades = oferta_actividades::all()->where('status','activo');
        $ofertaActividades = oferta_actividadesController::burbujaClase($ofertaActividades);
        $ofertaActividades = oferta_actividadesController::buscarPatron($ofertaActividades, $request->patron);
        $content = 'ofertaActividades.index';
        $clase = true;
        $patronBuscado = $request->patron;
        return view('dashboard', compact('ofertaActividades', 'content', 'clase', 'patronBuscado'));
    }

    public function busquedaPatron(Request $request){
        $empleado = Auth::user();
        $idTipoUsuario = $empleado->id_tipoUsuario;

        if($idTipoUsuario == 3){
            $ofertaActividades = oferta_actividades::all()->where('id_empleado', $empleado->id)->where('status', 'activo');
            $ofertaActividades = oferta_actividadesController::buscarPatron($ofertaActividades, $request->patron);
            $content = 'ofertaActividades.index';
            $patronBuscado = $request->patron;
            return view('dashboard', compact('ofertaActividades', 'content', 'patronBuscado'));
        }

        $empleado = session('empleado');
        $ofertaActividades = oferta_actividades::all()->where('status','activo');
        $ofertaActividades = oferta_actividadesController::buscarPatron($ofertaActividades, $request->patron);
        $content = 'ofertaActividades.index';
        $patronBuscado = $request->patron;
        return view('dashboard', compact('ofertaActividades', 'content', 'patronBuscado'));
    }

    public function burbujaClase($ofertas){
        $ofertas = $ofertas->values();
        $longitud = count($ofertas);
        for ($i = 0; $i < $longitud; $i++) {
            for ($j = 0; $j < $longitud - 1; $j++) {
                if ($ofertas[$j]->clase->nombre[0] > $ofertas[$j + 1]->clase->nombre[0]) {
                    $temporal = $ofertas[$j];
                    $ofertas[$j] = $ofertas[$j + 1];
                    $ofertas[$j + 1] = $temporal;
                }
            }
        }
        return $ofertas;
    }

    public function burbujaMaestro($ofertas){
        $ofertas = $ofertas->values();
        $longitud = count($ofertas);
        for ($i = 0; $i < $longitud; $i++) {
            for ($j = 0; $j < $longitud - 1; $j++) {
                if ($ofertas[$j]->empleado->nombre[0] > $ofertas[$j + 1]->empleado->nombre[0]) {
                    $temporal = $ofertas[$j];
                    $ofertas[$j] = $ofertas[$j + 1];
                    $ofertas[$j + 1] = $temporal;
                }
            }
        }
        return $ofertas;
    }

    public function burbujaDia($ofertas){
        $ofertas = $ofertas->values();
        $semana = [
            0 => 'lunes',
            1 => 'martes',
            2 => 'miercoles',
            3 => 'jueves',
            4 => 'viernes',
            5 => 'sabado'
        ];
        $longitud = count($ofertas);
        for ($i = 0; $i < $longitud; $i++) {
            for ($j = 0; $j < $longitud - 1; $j++) {
                $diaJ = array_search($ofertas[$j]->dia, $semana);
                $diaJ1 = array_search($ofertas[$j+1]->dia, $semana);
                if ($diaJ > $diaJ1) {
                    $temporal = $ofertas[$j];
                    $ofertas[$j] = $ofertas[$j + 1];
                    $ofertas[$j + 1] = $temporal;
                }
            }
        }
        return $ofertas;
    }

    public function buscarPatron($ofertas, $patron){
        $nombres = [];
        foreach($ofertas as $oferta){
            if(strpos(strtolower($oferta->clase->nombre),strtolower($patron)) === false){
            }
            else{
                $nombres[] = $oferta;
            }
        }
        return $nombres;
    }
    public function buscarPatronMaestro($ofertas, $patron){
        $nombres = [];
        foreach($ofertas as $oferta){
            if(strpos(strtolower($oferta->empleado->nombre),strtolower($patron)) === false){
            }
            else{
                $nombres[] = $oferta;
            }
        }
        return $nombres;
    }
    public function buscarPatronDia($ofertas, $patron){
        $nombres = [];
        foreach($ofertas as $oferta){
            if(strpos(strtolower($oferta->dia),strtolower($patron)) === false){
            }
            else{
                $nombres[] = $oferta;
            }
        }
        return $nombres;
    }
}
