<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use App\Models\equipos;
use App\Models\historial_prestamos;
use App\Models\pagos_prestamos_equipos;
use App\Rules\validarCantidadMinimaPrestamo;
use App\Rules\validarCantidadPrestamo;
use App\Rules\validarClientePrestamoEquipo;
use App\Rules\validarEquipoPrestamo;
use App\Rules\validarFilledCantidad;
use App\Rules\validarFilledIdEquipo;
use App\Rules\validarUnicidadEquipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PagosPrestamosEquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pagos'] = pagos_prestamos_equipos::paginate();
        $content = 'pagos.seePagosEquipos';
        return view('dashboard', $data, compact('content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ultimoId = pagos_prestamos_equipos::all('id')->last();
        $content = 'prestamosEquipos.formPrestamosPagosEquipo';
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
        $pagoNuevo = new pagos_prestamos_equipos();
        $pagoNuevo->fecha = date('Y-m-d');
        $pagoNuevo->id_empleado = Auth::user()->id;
        $pagoNuevo->total = $request->total;
        $pagoNuevo->id_cliente = $pagos[0]['id_cliente'];
        $pagoNuevo->save();
        $idPago = DB::table('pagos_prestamos_equipos')->select('id')->orderByDesc('id')->first();
        foreach($pagos as $pago){
            $detallePago = new historial_prestamos();
            $detallePago->id_pagos_prestamos_equipo = $idPago->id;
            $detallePago->id_equipo = $pago['id_equipo'];
            $detallePago->cantidad = $pago['cantidad'];
            $detallePago->devuelto = 0;
            $detallePago->save();
        }
        return redirect('/empleado/PrestamosPagosEquipos')->with('success','Se registro el pago del prestamo correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pagos_prestamos_equipos  $pagos_prestamos_equipos
     * @return \Illuminate\Http\Response
     */
    public function show(pagos_prestamos_equipos $pagos_prestamos_equipos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pagos_prestamos_equipos  $pagos_prestamos_equipos
     * @return \Illuminate\Http\Response
     */
    public function edit(pagos_prestamos_equipos $pagos_prestamos_equipos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pagos_prestamos_equipos  $pagos_prestamos_equipos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pagos_prestamos_equipos $pagos_prestamos_equipos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pagos_prestamos_equipos  $pagos_prestamos_equipos
     * @return \Illuminate\Http\Response
     */
    public function destroy(pagos_prestamos_equipos $pagos_prestamos_equipos)
    {
        //
    }

    public function validarDatos(Request $request){
        $validator = Validator::make($request->all(), [
            'pagos' => ['bail', new validarUnicidadEquipo, new validarClientePrestamoEquipo, new validarEquipoPrestamo, new validarFilledCantidad, new validarCantidadPrestamo, new validarCantidadMinimaPrestamo]
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
            $idEquipoErroneo = null;
            $idClienteErroneo = null;
            $cantidadErronea = null;
            if($numeroPagos < 2){
                $idEquipoErroneo = $informacion[0]['id_equipo'];
                $idClienteErroneo = $informacion[0]['id_cliente'];
                $cantidadErronea = $informacion[0]['cantidad'];
                // $informacion = null;
            }
            else{

                $idEquipoErroneo = $informacion[$numeroPagos-1]['id_equipo'];
                array_splice($informacion, $numeroPagos - 1, 1);
                foreach($informacion as $pago){
                    if($cont < $numeroPagos-1){
                        $equipo = new equipos();
                        $equipo = equipos::all()->where('id', $pago['id_equipo'])->first();
                        $nombreCliente = cliente::all()->where('id', $pago['id_cliente'])->first();
                        $informacion[$cont]['id_equipo'] = $equipo->id;
                        $informacion[$cont]['equipo'] = $equipo->nombre;
                        $informacion[$cont]['precio_x_unidad'] = $equipo->cost_x_renta;
                        $informacion[$cont]['precio_x_prestamo'] = $informacion[$cont]['precio_x_unidad'] * $pago['cantidad'];
                        $tota = $total + $informacion[$cont]['precio_x_prestamo'];
                        $informacion[$cont]['cliente'] = $nombreCliente->nombre;
                        $idCliente = $pago['id_cliente'];
                        $nombreCliente = $nombreCliente->nombre;
                        $cont++;
                    }
                }
            }
            $ultimoId = pagos_prestamos_equipos::all('id')->last();
            $content = 'prestamosEquipos.formPrestamosPagosEquipo';
            if($ultimoId == null){
                $siguienteId = 1;
                return view('dashboard',compact('siguienteId','content','informacion','idCliente','nombreCliente', 'total','errors','idEquipoErroneo', 'idClienteErroneo','cantidadErronea'));
            }
            $siguienteId = (int)$ultimoId->id + 1;

            return view('dashboard',compact('siguienteId','content','informacion','idCliente', 'nombreCliente', 'total','errors','idEquipoErroneo', 'idClienteErroneo', 'cantidadErronea'));
        }
        $cont = 0;
        $informacion = $request->pagos;
        $idCliente = null;
        $total = 0;
        $nombreCliente = null;
        $idEquipoErroneo = null;
        $idClienteErroneo = null;
        $cantidadErronea = null;
        foreach($informacion as $pago){
            if($cont < count($request->pagos)){
                $equipo = new equipos();
                $equipo = equipos::all()->where('id', $pago['id_equipo'])->first();
                $nombreCliente = cliente::all()->where('id', $pago['id_cliente'])->first();
                $informacion[$cont]['id_equipo'] = $equipo->id;
                $informacion[$cont]['equipo'] = $equipo->nombre;
                $informacion[$cont]['precio_x_unidad'] = $equipo->cost_x_renta;
                $informacion[$cont]['precio_x_prestamo'] = $informacion[$cont]['precio_x_unidad'] * $pago['cantidad'];
                $total = $total + $informacion[$cont]['precio_x_prestamo'];
                $informacion[$cont]['cliente'] = $nombreCliente->nombre;
                $idCliente = $pago['id_cliente'];
                $nombreCliente = $nombreCliente->nombre;
                $cont++;
            }
        }
        $ultimoId = pagos_prestamos_equipos::all('id')->last();
        $content = 'prestamosEquipos.formPrestamosPagosEquipo';
        if($ultimoId == null){
            $siguienteId = 1;
            return view('dashboard',compact('siguienteId','content','informacion','idCliente','nombreCliente', 'total'));
        }
        $siguienteId = (int)$ultimoId->id + 1;

        return view('dashboard',compact('siguienteId','content','informacion','idCliente','nombreCliente', 'total'));
    }
    public function quitarPagoLista(Request $request, int $id){
        $informacion = $request->pagos;
        $numeroPagos = count($informacion);
        array_splice($informacion, $numeroPagos - 1, 1);
        array_splice($informacion, $id, 1);
        $ultimoId = pagos_prestamos_equipos::all('id')->last();
        $content = 'prestamosEquipos.formPrestamosPagosEquipo';
        $cont = 0;
        $total = 0;
        $idCliente = null;
        $nombreCliente = null;
        foreach($informacion as $pago){
            if($cont < count($request->pagos)){
                $equipo = new equipos();
                $equipo = equipos::all()->where('id', $pago['id_equipo'])->first();
                $nombreCliente = cliente::all()->where('id', $pago['id_cliente'])->first();
                $informacion[$cont]['id_equipo'] = $equipo->id;
                $informacion[$cont]['equipo'] = $equipo->nombre;
                $informacion[$cont]['precio_x_unidad'] = $equipo->cost_x_renta;
                $informacion[$cont]['precio_x_prestamo'] = $informacion[$cont]['precio_x_unidad'] * $pago['cantidad'];
                $total = $total + $informacion[$cont]['precio_x_prestamo'];
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
