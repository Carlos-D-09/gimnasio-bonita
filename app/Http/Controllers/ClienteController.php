<?php

namespace App\Http\Controllers;

use App\Models\clase;
use App\Models\cliente;
use App\Rules\validaFechaNacimientoCliente;
use App\Rules\validarPasswordCliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = cliente::all()->except('password');
        $content = 'cliente.index';
        return view('dashboard',compact('clientes', 'content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ultimoId = cliente::all('id')->last();
        $siguienteId = (int)$ultimoId->id + 1;
        return view('cliente.formCliente',compact('siguienteId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules =[
            'nombre' => ['required','string'],
            'fecha_nacimiento' => ['required','date',new validaFechaNacimientoCliente],
            'telefono' => ['numeric','min:1000000000','max:9999999999'],
            'correo' => 'email:rfc',
            'passwordNuevo' => [new validarPasswordCliente($request->re_password)]
        ];
        $message = [
            'telefono.min' => 'El número teléfonico debe tener 10 digitos',
            'telefono.max' => 'El número teléfonico debe tener 10 digitos',
        ];
        $this->validate($request,$rules,$message);

        $cliente = new cliente();
        if($request->imagen == null){
            $cliente->imagen = '/images/user.png';
        }
        else{
            $cliente->imagen = $request->imagen;
        }
        $cliente->nombre = $request->nombre;
        $timestamp = strtotime($request->fecha_nacimiento);
        $cliente->fecha_nacimiento = date("Y-m-d",$timestamp);
        $cliente->domicilio = $request->domicilio;
        $cliente->telefono = $request->telefono;
        $cliente->correo = $request->correo;
        $cliente->fecha_registro = date('Y-m-d');
        $cliente->password = $request->passwordNuevo;
        $cliente->status = 1;
        $cliente->id_empleado = Auth::user()->id;
        $cliente->save();
        $clientes = cliente::all();
        $content = 'cliente.index';
        return view('dashboard', compact('clientes', 'content'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(cliente $cliente)
    {
        unset($cliente['password']);
        $content = 'cliente.profile';
        return view('dashboard', compact('cliente','content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(cliente $cliente)
    {
        //
    }
}
