<?php

namespace App\Http\Controllers;

use App\Models\clase;
use App\Models\cliente;
use App\Rules\validaFechaNacimientoCliente;
use App\Rules\validarDisponibilidadCorreo;
use App\Rules\validarDisponibilidadCorreoEdit;
use App\Rules\validarPasswordCliente;
use DateTime;
use Facade\FlareClient\Http\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function index()
    {
        dd("hola desde index");
        $clientes = cliente::all()->except('password')->where('status',1);
        $content = 'cliente.index';
        return view('dashboard',compact('clientes', 'content'));
    }
    public function indexClient(){
        $cliente = cliente::all()->find(Auth::user()->id);
        $content = 'clienteUser.profile';
        return view('dashboard',compact('cliente','content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ultimoId = cliente::all('id')->last();
        if($ultimoId == null){
            $siguienteId = 1;
            return view('cliente.formCliente',compact('siguienteId'));
        }
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
            'nombre' => ['required','min:3', 'max:150'],
            'fecha_nacimiento' => ['required','date_format:d/m/Y',new validaFechaNacimientoCliente],
            'telefono' => ['numeric','min:1000000000','max:9999999999'],
            'correo' => ['email:rfc', new validarDisponibilidadCorreo],
            'passwordNuevo' => [new validarPasswordCliente($request->re_password)]
        ];
        $message = [
            'telefono.min' => 'El número teléfonico debe tener 10 digitos',
            'telefono.max' => 'El número teléfonico debe tener 10 digitos',
        ];
        $this->validate($request,$rules,$message);
        $cliente = new cliente();
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $destino = "images/Cliente/imagenCliente/";
            $filename = time() . '_' . $file->getClientOriginalName();
            $request->file('imagen')->move($destino,$filename);
            $cliente->imagen = $destino . $filename;
        }
        else{
            $cliente->imagen = '/images/user.png';
        }
        $cliente->nombre = $request->nombre;
        $fechaNuevoFormato = DateTime::createFromFormat('d/m/Y', $request->fecha_nacimiento);
        $cliente->fecha_nacimiento =  $fechaNuevoFormato->format('Y-m-d');;
        $cliente->domicilio = $request->domicilio;
        $cliente->telefono = $request->telefono;
        $cliente->correo = $request->correo;
        $cliente->fecha_registro = date('Y-m-d');
        $cliente->password = Hash::make($request->passwordNuevo);
        $cliente->status = 1;
        $cliente->id_empleado = Auth::user()->id;
        $cliente->save();
        $clientes = cliente::all()->where('status',1);
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
        unset($cliente['password']);
        $content = 'cliente.formEditClient';
        return view('dashboard', compact('cliente','content'));
    }

    public function editPassword(int $id)
    {
        $clientes = cliente::all()->except('password')->where('id',$id);
        foreach ($clientes as $cliente){
            unset($cliente['password']);
            $content = 'cliente.formEditClientePassword';
            return view('dashboard', compact('cliente','content'));
        }
    }

    public function updatePassword(Request $request, int $id)
    {
        if(isset($request->oldPassword)){
        }
        else{
            $request->validate([
                'passwordNew' => [new validarPasswordCliente($request->re_passwordNew)]
            ]);
        }
        $clientes = cliente::all()->where('id',$id);
        $cliente = null;
        foreach ($clientes as $clienteAux){
            $cliente = $clienteAux;
        }
        $cliente->password = Hash::make($request->passwordNew);
        $cliente->save();
        return redirect('/empleado/cliente/'.$cliente->id);
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
        $rules =[
            'nombre' => ['required','min:3','max:150'],
            'telefono' => ['numeric','min:1000000000','max:9999999999'],
            'correo' => ['email:rfc', new validarDisponibilidadCorreoEdit($cliente->id)],
        ];
        $message = [
            'telefono.min' => 'El número teléfonico debe tener 10 digitos',
            'telefono.max' => 'El número teléfonico debe tener 10 digitos',
        ];
        $this->validate($request,$rules,$message);
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $destino = "images/Cliente/imagenCliente/";
            $filename = time() . '_' . $file->getClientOriginalName();
            $request->file('imagen')->move($destino,$filename);
            if($cliente->imagen != '/images/user.png'){
                unlink($cliente->imagen);
            }
            $cliente->imagen = $destino . $filename;
        }
        $cliente->nombre = $request->nombre;
        $cliente->domicilio = $request->domicilio;
        $cliente->telefono = $request->telefono;
        $cliente->correo = $request->correo;

        $cliente->save();

        return redirect('/empleado/cliente/'.$cliente->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(cliente $cliente)
    {
        $cliente->status = 0;
        $cliente->save();
        return redirect('/empleado/cliente');
    }

    public function search(Request $request){
        $clientes = cliente::all()->except(['password','imagen','fecha_nacimiento','telefono'])->where('id',$request->idBuscar);
        $content = 'cliente.index';
        $idBuscado = $request->idBuscar;
        return view('dashboard',compact('clientes','content','idBuscado'));
    }
}

