<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use App\Models\membresia;
use App\Models\pago;
use App\Models\pagos_clases;
use App\Rules\validarExistenciaMembresia;
use App\Rules\validarStatusMembresiaCliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $content = 'pagos.seePagosMembresias';
        return view('dashboard', compact('content'));
    }

    public function toJson()
    {
        $data['pagos'] = pago::paginate();
        //dd(json_encode($data));
        return redirect('/seePagos')->with('data', json_encode($data));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $total = 0;
        $ultimoId = pago::all('id')->last();
        $content = 'pagosMembresias.formPagosMembresias';
        if($ultimoId == null){
            $siguienteId = 1;
            return view('dashboard',compact('siguienteId','content','total'));
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
        $membresia = new membresia();
        $membresia = membresia::all()->where('id',$request->id_membresia)->first();
        $pago = new pago();
        $pago->fecha = date('Y-m-d');
        $pago->dias = $membresia->Duracion;
        $pago->total = $request->total;
        $pago->id_membresia = $request->id_membresia;
        $pago->id_empleado = Auth::user()->id;
        $pago->id_cliente = $request->id_cliente;
        $pago->created_at = now();
        $pago->updated_at = now();
        $pago->save();

        return redirect('/empleado/pagosMembresias');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function show(Pago $pago)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function edit(Pago $pago)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pago $pago)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pago $pago)
    {

    }

    public function validarDatos(Request $request){
        $validator = Validator::make($request->all(),[
            'id_membresia'=> ['bail', new validarExistenciaMembresia]
        ]);
        $cliente = $request->id_cliente;
        $total = 0;
        $clienteNombre = cliente::all()->where('id',$cliente)->first();
        $clienteNombre = $clienteNombre->nombre;
        $ultimoId = pago::all('id')->last();
        $content = 'pagosMembresias.formPagosMembresias';
        $fecha = date('d/m/Y');
        $total = 0;
        if($ultimoId == null){
            $siguienteId = 1;
        }
        else{
            $siguienteId = (int)$ultimoId->id + 1;
        }
        if($validator->fails()){
            $errors = $validator->errors()->messages();
            $errors = $errors['id_membresia'];
            return view('dashboard',compact('siguienteId','content','cliente','clienteNombre','fecha', 'total', 'errors'));
        }
        else{
            $pago = [];
            $pago['id_membresia'] = $request->id_membresia;
            $membresia = membresia::all()->where('id',$request->id_membresia)->first();
            $pago['nombre'] = $membresia->Nombre;
            $pago['duracion'] = $membresia->Duracion;
            $total = $membresia->costo;
            return view('dashboard',compact('siguienteId','content','cliente','clienteNombre','fecha', 'total','pago'));
        }

    }

    public function searchCliente(Request $request)
    {
        $cliente = new cliente();
        $cliente  = cliente::all()->where('id',$request->id_clienteBuscar)->first();
        if($cliente == null){
            $resultadoBusqueda = 'no';
        }
        else{
            $ultimoPagoCliente =  pago::all()->last();
            $fechaUltimoPago = $ultimoPagoCliente->fecha;
            $duracionUltimoPago = $ultimoPagoCliente->dias;
            $fechaVencimiento = date('d-m-Y', strtotime($fechaUltimoPago . "+ " . $duracionUltimoPago . " days"));
            if(strtotime(date('d-m-Y')) < strtotime($fechaVencimiento)){
                $resultadoBusqueda = 'activo';
                $idCliente = $cliente->id;
                $nombreCliente = $cliente->nombre;
            }
            else{
                $resultadoBusqueda = $cliente->nombre;
                $idCliente = $cliente->id;
                $nombreCliente = null;
            }
        }
        $ultimoId = pago::all('id')->last();
        $content = 'pagosMembresias.formPagosMembresias';
        if($ultimoId == null){
            $siguienteId = 1;
        }
        else{
            $siguienteId = (int)$ultimoId->id + 1;
        }
        return view('dashboard',compact('siguienteId','content','resultadoBusqueda','idCliente', 'nombreCliente'));
    }

    public function mostrarForm(Request $request){
        $cliente = $request->cliente;
        $clienteNombre = $request->clienteNombre;
        $ultimoId = pago::all('id')->last();
        $content = 'pagosMembresias.formPagosMembresias';
        $total = 0;
        $fecha = date('d/m/Y');
        if($ultimoId == null){
            $siguienteId = 1;
            return view('dashboard',compact('siguienteId','content', 'total','cliente','clienteNombre','fecha'));
        }
        $siguienteId = (int)$ultimoId->id + 1;
        return view('dashboard',compact('siguienteId','content', 'total','cliente','clienteNombre','fecha'));
    }

    public function quitarPagoMembresia(Request $request){
        $cliente = $request->cliente;
        $clienteNombre = $request->clienteNombre;
        $ultimoId = pago::all('id')->last();
        $content = 'pagosMembresias.formPagosMembresias';
        $total = 0;
        $fecha = date('d/m/Y');
        if($ultimoId == null){
            $siguienteId = 1;
            return view('dashboard',compact('siguienteId','content', 'total','cliente','clienteNombre','fecha'));
        }
        $siguienteId = (int)$ultimoId->id + 1;
        return view('dashboard',compact('siguienteId','content', 'total','cliente','clienteNombre','fecha'));
    }

    public function searchPago(Request $request){
        $pago = new pago();
        $pago = pago::all()->where('id',$request->idPagoBuscar)->first();
        $content = 'pagos.seePagosMembresias';
        if($pago != null){
            $id_pago = $pago->id;
            $id_cliente = $pago->id_cliente;
            $clienteNombre = $pago->cliente->nombre;
            $id_empleado = $pago->id_empleado;
            $empleadoNombre = $pago->empleado->nombre;
            $fecha = $pago->fecha;
            $fecha = strtotime($fecha);
            $fecha = date('d/m/Y',$fecha);
            $id_membresia = $pago->id_membresia;
            $nombreMembresia = $pago->membresia->Nombre;
            $duracion = $pago->membresia->Duracion;
            $total = $pago->total;
            return view('dashboard',compact('id_pago', 'content', 'id_cliente','clienteNombre','id_empleado','empleadoNombre','fecha','id_membresia','nombreMembresia', 'duracion', 'total'));
        }
        else{
            $errorIdPago = $request->idPagoBuscar;
            return view('dashboard',compact('errorIdPago','content'));

        }
    }
}
