<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use App\Models\detalle_pagos_clases;
use App\Models\oferta_actividades;
use App\Models\pagos_clases;
use App\Rules\requiredUltimoPago;
use App\Rules\validarClasePago;
use App\Rules\validarDiaOferta;
use App\Rules\validarExistenciaClase;
use App\Rules\validarHoraClasePago;
use App\Rules\validarIdCliente;
use App\Rules\validarUnicidadClasePagos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PagosClasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pagos'] = pagos_clases::paginate();
        $content = 'pagos.seePagosClases';
        return view('dashboard', $data, compact('content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ultimoId = pagos_clases::all('id')->last();
        $content = 'pagos.formPagosClases';
        $total = 0;
        if($ultimoId == null){
            $siguienteId = 1;
            return view('dashboard',compact('siguienteId','content', 'total'));
        }
        $siguienteId = (int)$ultimoId->id + 1;
        return view('dashboard',compact('siguienteId','content', 'total'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pagos = $request->pagos;
        $numeroPagos = count($pagos);
        array_splice($pagos, $numeroPagos - 1, 1);
        $pagoNuevo = new pagos_clases();
        $pagoNuevo->fecha = date('Y-m-d');
        $pagoNuevo->id_empleado = Auth::user()->id;
        $pagoNuevo->total = $request->total;
        $pagoNuevo->id_cliente = $pagos[0]['id_cliente'];
        $pagoNuevo->save();
        $idPago = DB::table('pagos_clases')->select('id')->orderByDesc('id')->first();
        foreach($pagos as $pago){
            $detallePago = new detalle_pagos_clases();
            $detallePago->id_pago_clase = $idPago->id;
            $detallePago->id_oferta = $pago['id_oferta'];
            $detallePago->save();
        }
        return redirect('/empleado/PagosClases');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pagos_clases  $pagos_clases
     * @return \Illuminate\Http\Response
     */
    public function show(pagos_clases $pagos_clases)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pagos_clases  $pagos_clases
     * @return \Illuminate\Http\Response
     */
    public function edit(pagos_clases $pagos_clases)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pagos_clases  $pagos_clases
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pagos_clases $pagos_clases)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pagos_clases  $pagos_clases
     * @return \Illuminate\Http\Response
     */
    public function destroy(pagos_clases $pagos_clases)
    {
        //
    }

    public function validarDatos(Request $request){
        $validator = Validator::make($request->all(), [
            'pagos' => ['bail',new validarClasePago, new validarUnicidadClasePagos, new validarIdCliente, new validarExistenciaClase, new validarDiaOferta, new validarHoraClasePago]
        ]);

        if($validator->fails()){
            $errors = $validator->errors()->messages();
            $errors = $errors['pagos'];
            $informacion = $request->pagos;
            $numeroPagos = count($informacion);
            $cont = 0;
            $idCliente = null;
            $total = 0;
            $nombreCliente = null;
            $idOfertaErroneo = null;
            $idClienteErroneo = null;
            if($numeroPagos < 2){
                $idOfertaErroneo = $informacion[0]['id_oferta'];
                $idClienteErroneo = $informacion[0]['id_cliente'];
                $informacion = null;
            }
            else{

                $idOfertaErroneo = $informacion[$numeroPagos-1]['id_oferta'];
                array_splice($informacion, $numeroPagos - 1, 1);
                foreach($informacion as $pago){
                    if($cont < $numeroPagos-1){
                        $oferta = new oferta_actividades();
                        $oferta = oferta_actividades::all()->where('id', $pago['id_oferta'])->first();
                        $nombreCliente = cliente::all()->where('id', $pago['id_cliente'])->first();
                        $informacion[$cont]['clase'] = $oferta->clase->nombre;
                        $informacion[$cont]['dia'] = $oferta->dia;
                        $informacion[$cont]['horaInicio'] =  $oferta->horaInicio;
                        $informacion[$cont]['horaFin'] = $oferta->horaFin;
                        $informacion[$cont]['costo'] = $oferta->costo;
                        $total = $total + $oferta->costo;
                        $informacion[$cont]['cliente'] = $nombreCliente->nombre;
                        $idCliente = $pago['id_cliente'];
                        $nombreCliente = $nombreCliente->nombre;
                        $cont++;
                    }
                }
            }
            $ultimoId = pagos_clases::all('id')->last();
            $content = 'pagos.formPagosClases';
            if($ultimoId == null){
                $siguienteId = 1;
                return view('dashboard',compact('siguienteId','content','informacion','idCliente','nombreCliente', 'total','errors','idOfertaErroneo', 'idClienteErroneo'));
            }
            $siguienteId = (int)$ultimoId->id + 1;

            return view('dashboard',compact('siguienteId','content','informacion','idCliente', 'nombreCliente', 'total','errors','idOfertaErroneo', 'idClienteErroneo'));
        }

        $cont = 0;
        $informacion = $request->pagos;
        $idCliente = null;
        $total = 0;
        $nombreCliente = null;
        foreach($informacion as $pago){
            if($cont < count($request->pagos)){
                $oferta = new oferta_actividades();
                $oferta = oferta_actividades::all()->where('id', $pago['id_oferta'])->first();
                $nombreCliente = cliente::all()->where('id', $pago['id_cliente'])->first();
                $informacion[$cont]['clase'] = $oferta->clase->nombre;
                $informacion[$cont]['dia'] = $oferta->dia;
                $informacion[$cont]['horaInicio'] =  $oferta->horaInicio;
                $informacion[$cont]['horaFin'] = $oferta->horaFin;
                $informacion[$cont]['costo'] = $oferta->costo;
                $total = $total + $oferta->costo;
                $informacion[$cont]['cliente'] = $nombreCliente->nombre;
                $idCliente = $pago['id_cliente'];
                $nombreCliente = $nombreCliente->nombre;
                $cont++;
            }
        }
        $ultimoId = pagos_clases::all('id')->last();
        $content = 'pagos.formPagosClases';
        if($ultimoId == null){
            $siguienteId = 1;
            return view('dashboard',compact('siguienteId','content','informacion','idCliente','nombreCliente', 'total'));
        }
        $siguienteId = (int)$ultimoId->id + 1;

        return view('dashboard',compact('siguienteId','content','informacion','idCliente', 'nombreCliente', 'total'));
    }

    public function quitarPagoLista(Request $request, int $id){
        $informacion = $request->pagos;
        $numeroPagos = count($informacion);
        array_splice($informacion, $numeroPagos - 1, 1);
        array_splice($informacion, $id, 1);
        $ultimoId = pagos_clases::all('id')->last();
        $content = 'pagos.formPagosClases';
        $cont = 0;
        $total = 0;
        $idCliente = null;
        $nombreCliente = null;
        foreach($informacion as $pago){
            if($cont < count($request->pagos)){
                $oferta = new oferta_actividades();
                $oferta = oferta_actividades::all()->where('id', $pago['id_oferta'])->first();
                $nombreCliente = cliente::all()->where('id', $pago['id_cliente'])->first();
                $informacion[$cont]['clase'] = $oferta->clase->nombre;
                $informacion[$cont]['dia'] = $oferta->dia;
                $informacion[$cont]['horaInicio'] =  $oferta->horaInicio;
                $informacion[$cont]['horaFin'] = $oferta->horaFin;
                $informacion[$cont]['costo'] = $oferta->costo;
                $total = $total + $oferta->costo;
                $informacion[$cont]['cliente'] = $nombreCliente->nombre;
                $idCliente = $pago['id_cliente'];
                $nombreCliente = $nombreCliente->nombre;
                $cont++;
            }
        }
        if(count($informacion) == 0){
            $informacion = null;
        }
        if($ultimoId == null){
            $siguienteId = 1;
            return view('dashboard',compact('siguienteId','content','informacion','idCliente','nombreCliente', 'total'));
        }
        $siguienteId = (int)$ultimoId->id + 1;

        return view('dashboard',compact('siguienteId','content','informacion','idCliente', 'nombreCliente', 'total'));
    }
}
