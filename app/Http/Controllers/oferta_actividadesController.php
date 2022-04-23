<?php

namespace App\Http\Controllers;

use App\Models\clase;
use App\Models\empleado;
use App\Models\oferta_actividades;
use App\Rules\validarCuposMinimos;
use App\Rules\validarDisponibilidadEspacio;
use App\Rules\validarDisponibilidadMaestro;
use App\Rules\validarHora_fin;
use App\Rules\validarIntervaloTiempo;
use Illuminate\Http\Request;

class oferta_actividadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleado = session('empleado');
        $ofertaActividades = oferta_actividades::all();
        $content = 'ofertaActividades.index';
        return view('dashboard', compact('ofertaActividades', 'empleado', 'content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maestros = empleado::all()->where('id_tipoUsuario',3);
        $clases = clase::all();
        return view('ofertaActividades.formOferta',compact('maestros','clases'));
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
            'id_maestro' => [new validarDisponibilidadMaestro($request->horaInicio,$request->dia)]
        ]);
        $oferta = new oferta_actividades();
        $oferta->id_clase = $request->id_clase;
        $oferta->horaInicio = $request->horaInicio;
        $oferta->horaFin = $request->horaFin;
        $oferta->dia = $request->dia;
        $oferta->cupos = $request->cupos;
        $oferta->id_empleado = $request->id_maestro;
        $oferta->save();
        $empleado = session('empleado');
        $ofertaActividades = oferta_actividades::all();
        $content = 'ofertaActividades.index';
        return view('dashboard', compact('ofertaActividades', 'empleado', 'content'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\oferta_actividades  $oferta_actividades
     * @return \Illuminate\Http\Response
     */
    public function show(oferta_actividades $oferta_actividades)
    {
        //
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
            'dia' => [new validarDisponibilidadEspacio($request->horaInicio)],
            'horaFin' => [new validarHora_fin($request->horaInicio), new validarIntervaloTiempo($request->horaInicio)],
            'id_maestro' => [new validarDisponibilidadMaestro($request->horaInicio,$request->dia)]
        ]);
        $oferta->horaInicio = $request->horaInicio;
        $oferta->horaFin = $request->horaFin;
        $oferta->dia = $request->dia;
        $oferta->cupos = $request->cupos;
        $oferta->id_empleado = $request->id_maestro;
        $oferta->save();

        return redirect('/oferta_actividades');
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
        $oferta->delete();
        $empleado = session('empleado');
        $ofertaActividades = oferta_actividades::all();
        $content = 'ofertaActividades.index';
        return view('dashboard', compact('ofertaActividades', 'empleado', 'content'));

    }

    public function orderByClase(){
        $empleado = session('empleado');
        $ofertaActividades = oferta_actividades::all();
        $ofertaActividades = oferta_actividadesController::burbujaClase($ofertaActividades);
        $content = 'ofertaActividades.index';
        $clase = true;
        return view('dashboard', compact('ofertaActividades', 'empleado', 'content', 'clase'));
    }

    public function orderByDia(){
        $empleado = session('empleado');
        $ofertaActividades = oferta_actividades::all();
        $ofertaActividades = oferta_actividadesController::burbujaDia($ofertaActividades);
        $content = 'ofertaActividades.index';
        $dia = true;
        return view('dashboard', compact('ofertaActividades', 'empleado', 'content', 'dia'));
    }

    public function busquedaPatron(Request $request){
        $empleado = session('empleado');
        $ofertaActividades = oferta_actividades::all();
        $ofertaActividades = oferta_actividadesController::buscarPatron($ofertaActividades, $request->patron);
        $content = 'ofertaActividades.index';
        return view('dashboard', compact('ofertaActividades', 'empleado', 'content'));
    }


    public function burbujaClase($ofertas){
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

    public function burbujaDia($ofertas){
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
}
