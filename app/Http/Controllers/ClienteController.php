<?php

namespace App\Http\Controllers;

use App\Models\cliente;
use App\Rules\validarDisponibilidadCorreoEdit;
use App\Rules\validarPasswordCliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = cliente::all()->except('password')->where('status',1);
        $content = 'cliente.index';
        return view('dashboard',compact('clientes', 'content'));
    }

    //sesion de cliente
    public function indexClient(){
        $cliente = cliente::all()->find(Auth::user()->id);
        $content = 'clienteUser.profile';
        return view('dashboard',compact('cliente','content'));
    }

    public function editClient(){
        $cliente = cliente::all()->find(Auth::user()->id);
        $content = 'clienteUser.formEditClient';
        return view('dashboard', compact('cliente','content'));
    }

    public function updateClient(Request $request, cliente $cliente)
    {
        $cliente = cliente::all()->find(Auth::user()->id);
        $rules =[
            'nombre' => ['required','min:3','max:150','regex:/^[áéíóúÁÉÍÓÚñÑa-zA-Z ]*$/'],
            'telefono' => ['numeric','min:1000000000','max:9999999999'],
            'correo' => ['email:rfc', new validarDisponibilidadCorreoEdit($cliente->id)],
            'fecha_nacimiento' => ['required','date']
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
        $cliente->fecha_nacimiento = $request->fecha_nacimiento;
        $cliente->telefono = $request->telefono;
        $cliente->correo = $request->correo;
        $cliente->updated_at = now();

        $cliente->save();

        return redirect('/cliente')->with('edited', 'Se ha modificado tu informacion personal');
    }

    public function editPasswordClient(int $id)
    {
        $cliente = cliente::all()->find(Auth::user()->id);
        $clientes = cliente::all()->except('password')->where('id',$id);
        foreach ($clientes as $cliente){
            unset($cliente['password']);
            $content = 'clienteUser.formEditClientePassword';
            return view('dashboard', compact('cliente','content'));
        }
    }

    public function updatePasswordClient(Request $request, int $id)
    {
        $cliente = cliente::all()->find(Auth::user()->id);

        $request->validate([
            'passwordNew' => [new validarPasswordCliente($request->re_passwordNew), 'min:5']
        ]);

        $clientes = cliente::all()->where('id',$id);
        $cliente = null;
        foreach ($clientes as $clienteAux){
            $cliente = $clienteAux;
        }
        $cliente->password = Hash::make($request->passwordNew);
        $cliente->updated_at = now();
        $cliente->save();
        return redirect('/cliente')->with('edited', 'Se ha modificado tu informacion personal');
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
            'nombre' => ['required','min:3', 'max:150', 'regex:/^[áéíóúÁÉÍÓÚñÑa-zA-Z ]*$/'],
            'fecha_nacimiento' => ['required','date'],
            'telefono' => ['numeric','min:1000000000','max:9999999999'],
            'correo' => 'email:rfc|unique:clientes,correo',
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
        $cliente->fecha_nacimiento =  $request->fecha_nacimiento;
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
        return view('dashboard', compact('clientes', 'content'))->with('success', 'Se ha registrado el cliente de forma exitosa');
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
        $request->validate([
            'passwordNew' => [new validarPasswordCliente($request->re_passwordNew), 'min:5']
        ]);

        $clientes = cliente::all()->where('id',$id);
        $cliente = null;
        foreach ($clientes as $clienteAux){
            $cliente = $clienteAux;
        }
        $cliente->password = Hash::make($request->passwordNew);
        $cliente->updated_at = now();
        $cliente->save();
        return redirect('/empleado/cliente/'.$cliente->id)->with('edited', 'Se ha modificado la informacion del cliente');
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
            'nombre' => ['required','min:3','max:150','regex:/^[áéíóúÁÉÍÓÚñÑa-zA-Z ]*$/'],
            'telefono' => ['numeric','min:1000000000','max:9999999999'],
            'correo' => ['email:rfc', new validarDisponibilidadCorreoEdit($cliente->id)],
            'fecha_nacimiento' => ['required','date']
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
        $cliente->fecha_nacimiento = $request->fecha_nacimiento;
        $cliente->telefono = $request->telefono;
        $cliente->correo = $request->correo;
        $cliente->updated_at = now();

        $cliente->save();

        return redirect('/empleado/cliente/'.$cliente->id)->with('edited', 'Se ha modificado la informacion del cliente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(cliente $cliente, $id)
    {
        $cliente = cliente::find($id);
        $cliente->status = 0;
        DB::table('clientes')
        ->where('id', $cliente->id)
        ->update([
            'status' => $cliente->status,
            'updated_at' => $cliente->updated_at
        ]);
        return redirect('/empleado/cliente')->with('deleted', 'Se ha desactivado la cuenta del cliente con el id de: ' . $cliente->id);
    }

    public function search(Request $request){
        $clientes = cliente::all()->except(['password','imagen','fecha_nacimiento','telefono'])->where('id',$request->idBuscar);
        $content = 'cliente.index';
        $idBuscado = $request->idBuscar;
        return view('dashboard',compact('clientes','content','idBuscado'));
    }
}

