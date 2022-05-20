<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use App\Models\detalle_pagos_clases;
use App\Models\oferta_actividades;
use App\Models\pago;
use App\Models\pagos_clases;
use App\Rules\buscarPagosprevios;
use App\Rules\validarClasePago;
use App\Rules\validarDiaOferta;
use App\Rules\validarHoraClasePago;
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
        $content = 'pagoClases.formPagosClases';
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
        $pagoNuevo->id_cliente = $request->id_cliente;
        $pagoNuevo->save();
        $idPago = DB::table('pagos_clases')->select('id')->orderByDesc('id')->first();
        foreach($pagos as $pago){
            $detallePago = new detalle_pagos_clases();
            $detallePago->id_pago_clase = $idPago->id;
            $detallePago->id_oferta = $pago['id_oferta'];
            $oferta = new oferta_actividades();
            $oferta = oferta_actividades::all()->where('id',$pago['id_oferta'])->first();
            $detallePago->costo = $oferta->costo;
            $detallePago->save();
        }
        return redirect('/empleado/PagosClases')->with('success','Se ha registrado el pago de la clase correactamente');
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
            'pagos' => ['bail',new validarClasePago, new validarDiaOferta, new validarUnicidadClasePagos, new validarHoraClasePago, new buscarPagosprevios($request->id_cliente)]
        ]);

        $cliente = $request->id_cliente; //id del cliente
        $clienteNombre = cliente::all()->where('id', $cliente)->first();
        $clienteNombre = $clienteNombre->nombre;
        $total = 0;
        $informacion = $request->pagos;
        $numeroPagos = count($informacion);
        $ultimoId = pagos_clases::all('id')->last();
        $content = 'pagoClases.formPagosClases';
        $fecha = date('d/m/Y');

        //Proceso a realizar cuando se encuentra alguna falla en las validaciones
        if($validator->fails()){
            $errors = $validator->errors()->messages();
            $errors = $errors['pagos'];
            $cont = 0;
            $idOfertaErroneo = null;
            if($numeroPagos < 2){
                $idOfertaErroneo = $informacion[0]['id_oferta'];
                $informacion = null;
            }
            else{
                $idOfertaErroneo = $informacion[$numeroPagos-1]['id_oferta'];
                array_splice($informacion, $numeroPagos - 1, 1);
                $cliente = $request->id_cliente;
                foreach($informacion as $pago){
                    if($cont < $numeroPagos-1){
                        $oferta = new oferta_actividades();
                        $oferta = oferta_actividades::all()->where('id', $pago['id_oferta'])->first();
                        $informacion[$cont]['clase'] = $oferta->clase->nombre;
                        $informacion[$cont]['dia'] = $oferta->dia;
                        $informacion[$cont]['horaInicio'] =  $oferta->horaInicio;
                        $informacion[$cont]['horaFin'] = $oferta->horaFin;
                        $informacion[$cont]['costo'] = $oferta->costo;
                        $total = $total + $oferta->costo;
                        $cont++;
                    }
                }
            }
            $ultimoId = pagos_clases::all('id')->last();
            $content = 'pagoClases.formPagosClases';
            if($ultimoId == null){
                $siguienteId = 1;
                return view('dashboard',compact('siguienteId','content','informacion','cliente','clienteNombre', 'total','errors','idOfertaErroneo','fecha'));
            }
            $siguienteId = (int)$ultimoId->id + 1;

            return view('dashboard',compact('siguienteId','content','informacion','cliente', 'clienteNombre', 'total','errors','idOfertaErroneo','fecha'));
        }
        //Proceso a realizar cuando falla ninguna validacion y se va a agregar una oferta al grid
        $cont = 0;
        foreach($informacion as $pago){
            if($cont < $numeroPagos){
                $oferta = new oferta_actividades();
                $oferta = oferta_actividades::all()->where('id', $pago['id_oferta'])->first();
                $informacion[$cont]['clase'] = $oferta->clase->nombre;
                $informacion[$cont]['dia'] = $oferta->dia;
                $informacion[$cont]['horaInicio'] =  $oferta->horaInicio;
                $informacion[$cont]['horaFin'] = $oferta->horaFin;
                $informacion[$cont]['costo'] = $oferta->costo;
                $total = $total + $oferta->costo;
                $cont++;
            }
        }
        if($ultimoId == null){
            $siguienteId = 1;
            return view('dashboard',compact('siguienteId','content','informacion','cliente','clienteNombre', 'total','fecha'));
        }
        $siguienteId = (int)$ultimoId->id + 1;

        return view('dashboard',compact('siguienteId','content','informacion','cliente', 'clienteNombre', 'total', 'fecha'));
    }

    public function quitarPagoLista(Request $request, int $id){
        $informacion = $request->pagos;
        $numeroPagos = count($informacion);
        array_splice($informacion, $numeroPagos - 1, 1);
        array_splice($informacion, $id, 1);
        $ultimoId = pagos_clases::all('id')->last();
        $content = 'pagoClases.formPagosClases';
        $cont = 0;
        $total = 0;
        $cliente = $request->id_cliente;
        $clienteNombre = cliente::all()->where('id', $cliente)->first();
        $clienteNombre = $clienteNombre->nombre;
        $fecha = date('d/m/Y');
        foreach($informacion as $pago){
            if($cont < count($request->pagos)){
                $oferta = new oferta_actividades();
                $oferta = oferta_actividades::all()->where('id', $pago['id_oferta'])->first();
                $informacion[$cont]['clase'] = $oferta->clase->nombre;
                $informacion[$cont]['dia'] = $oferta->dia;
                $informacion[$cont]['horaInicio'] =  $oferta->horaInicio;
                $informacion[$cont]['horaFin'] = $oferta->horaFin;
                $informacion[$cont]['costo'] = $oferta->costo;
                $total = $total + $oferta->costo;
                $cont++;
            }
        }
        if(count($informacion) == 0){
            $informacion = null;
        }
        if($ultimoId == null){
            $siguienteId = 1;
            return view('dashboard',compact('siguienteId','content','informacion','cliente','clienteNombre', 'total','fecha'));
        }
        $siguienteId = (int)$ultimoId->id + 1;

        return view('dashboard',compact('siguienteId','content','informacion','cliente', 'clienteNombre', 'total','fecha'));
    }

    public function searchCliente(Request $request){
        $cliente = new cliente();
        $cliente  = cliente::all()->where('id',$request->id_clienteBuscar)->first();
        if($cliente == null){
            $resultadoBusqueda = 'no';
        }
        else{
            $resultadoBusqueda = $cliente->nombre;
            $idCliente = $cliente->id;
        }
        $ultimoId = pagos_clases::all('id')->last();
        $content = 'pagoClases.formPagosClases';
        if($ultimoId == null){
            $siguienteId = 1;
            return view('dashboard',compact('siguienteId','content','resultadoBusqueda','idCliente'));
        }
        $siguienteId = (int)$ultimoId->id + 1;
        return view('dashboard',compact('siguienteId','content','resultadoBusqueda','idCliente'));
    }

    public function searchPago(Request $request){
        $pago = new pagos_clases();
        $pago = pagos_clases::all()->where('id',$request->idPagoBuscar)->first();
        $content = 'pagos.seePagosClases';
        if($pago != null){
            $id_pago = $pago->id;
            $id_cliente = $pago->id_cliente;
            $clienteNombre = $pago->cliente->nombre;
            $id_empleado = $pago->id_empleado;
            $empleadoNombre = $pago->empleado->nombre;
            $fecha = $pago->fecha;
            $fecha = strtotime($fecha);
            $fecha = date('d/m/Y',$fecha);
            $total = $pago->total;
            $detalles = new detalle_pagos_clases();
            $detalles = detalle_pagos_clases::all()->where('id_pago_clase',$id_pago);
            return view('dashboard',compact('id_pago', 'content', 'id_cliente','clienteNombre','id_empleado','empleadoNombre','detalles','fecha','total'));
        }
        else{
            $errorIdPago = $request->idPagoBuscar;
            return view('dashboard',compact('errorIdPago', 'content'));
        }
    }

    public function mostrarForm(Request $request){
        $cliente = $request->cliente;
        $clienteNombre = $request->clienteNombre;
        $ultimoId = pagos_clases::all('id')->last();
        $content = 'pagoClases.formPagosClases';
        $total = 0;
        $fecha = date('d/m/Y');
        if($ultimoId == null){
            $siguienteId = 1;
            return view('dashboard',compact('siguienteId','content', 'total','cliente','clienteNombre','fecha'));
        }
        $siguienteId = (int)$ultimoId->id + 1;
        return view('dashboard',compact('siguienteId','content', 'total','cliente','clienteNombre','fecha'));
    }
}
