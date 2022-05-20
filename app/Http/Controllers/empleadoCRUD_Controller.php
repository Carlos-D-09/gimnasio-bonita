<?php

namespace App\Http\Controllers;

use App\Models\empleado;
use App\Rules\validarPasswordCliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class empleadoCRUD_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = 'empleadosCRUD.seeEmpleado';
        $data['empleados'] = empleado::paginate();
        return view('dashboard', $data, compact('content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleadosCRUD.formEmpleado');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*dd($request->all());*/
        $request->validate([
            'nombre' => 'required|regex:/^[a-zA-Z ]*$/',
            'RFC' => 'required|alpha_num|size:14|unique:empleados,RFC',
            'fecha_nacimiento' => 'required',
            'domicilio' => 'required',
            'telefono' => 'required|digits:10',
            'correo' => 'required|email|unique:empleados,correo',
            'sueldo' => 'required|digits_between:4,6',
            'NSS' => 'required|alpha_num|size:11|unique:empleados,NSS',
            'password' => 'min:5|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:5',
            'id_tipoUsuario' => 'required'
        ]);

        $EmpleadoCRUD = new empleado();

        //$EmpleadoCRUD->getRawOriginal('sueldo');
        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $destino = "images/EmpleadosCRUD/empleadosImagenes/";
            $filename = time() . '_' . $file->getClientOriginalName();
            $request->file('imagen')->move($destino,$filename);
            $EmpleadoCRUD->imagen = $destino . $filename;
        }
        else{
            $EmpleadoCRUD->imagen = '/images/user.png';
        }

        $EmpleadoCRUD->id = $request->id;
        $EmpleadoCRUD->nombre = $request->nombre;
        $EmpleadoCRUD->RFC = $request->RFC;
        $EmpleadoCRUD->fecha_nacimiento = $request->fecha_nacimiento;
        $EmpleadoCRUD->domicilio = $request->domicilio;
        $EmpleadoCRUD->telefono = $request->telefono;
        $EmpleadoCRUD->correo = $request->correo;
        $EmpleadoCRUD->sueldo = $request->sueldo;
        $EmpleadoCRUD->fecha_ingreso = date('Y-m-d');
        $EmpleadoCRUD->NSS = $request->NSS;
        $EmpleadoCRUD->password = $request->password;
        $EmpleadoCRUD->id_tipoUsuario = $request->id_tipoUsuario;

        $EmpleadoCRUD->save();

        /*$content = 'empleadosCRUD.seeEmpleado';

        $data['empleados'] = empleado::paginate();*/
        return redirect('/empleadoCRUD')->with('success', 'Se ha registrado el empleado de forma exitosa');

        //return view('dashboard', $data, compact('content'))->with('message', 'El empleado ha sido registrado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empleado = empleado::find($id);
        $content = 'empleadosCRUD.profile';
        return view('dashboard', compact('empleado','content'));
        /*$empleado = empleado::find($id);
        return view('empleadosCRUD.showEmpleado')->with('empleado',$empleado);*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empleado = empleado::find($id);
        $content = 'empleadosCRUD.formEditEmpleado';
        //dd($empleado->nombre);
        return view('dashboard',compact('empleado','content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, empleado $EmpleadoCRUD, $id)
    {
        //dd($request->all());
        $empleado = empleado::find($id);
        $request->validate([
            'nombre' => 'required|regex:/^[a-zA-Z ]*$/',
            'RFC' => 'required|alpha_num|size:14|unique:empleados,RFC,' . $empleado->id,
            'fecha_nacimiento' => 'required',
            'domicilio' => 'required',
            'telefono' => 'required|digits:10',
            'correo' => 'required|email|unique:empleados,correo,' . $empleado->id,
            'sueldo' => 'required|digits_between:4,6',
            'NSS' => 'required|alpha_num|size:11|unique:empleados,NSS,' . $empleado->id
        ]);

        if($request->hasFile('imagen')){
            $file = $request->file('imagen');
            $destino = "images/EmpleadosCRUD/empleadosImagenes/";
            $filename = time() . '_' . $file->getClientOriginalName();
            $request->file('imagen')->move($destino,$filename);
            $EmpleadoCRUD->imagen = $destino . $filename;
            if($empleado->imagen != '/images/user.png'){
                unlink($empleado->imagen);
            }
        }
        else{
            $EmpleadoCRUD->imagen = $empleado->imagen;
        }
        $EmpleadoCRUD->id = $empleado->id;
        $EmpleadoCRUD->nombre = $request->nombre;
        $EmpleadoCRUD->RFC = $request->RFC;
        $EmpleadoCRUD->fecha_nacimiento = $request->fecha_nacimiento;
        $EmpleadoCRUD->domicilio = $request->domicilio;
        $EmpleadoCRUD->telefono = $request->telefono;
        $EmpleadoCRUD->correo = $request->correo;
        $EmpleadoCRUD->sueldo = $request->sueldo;
        $EmpleadoCRUD->fecha_ingreso = $request->fecha_ingreso;
        $EmpleadoCRUD->NSS = $request->NSS;
        $EmpleadoCRUD->password = Hash::make($empleado->password);

        if($empleado->id_tipoUsuario == 1){
            $EmpleadoCRUD->id_tipoUsuario = $request->id_tipoUsuario;
        } else {
            $EmpleadoCRUD->id_tipoUsuario = $empleado->id_tipoUsuario;
        }
        
        $EmpleadoCRUD->updated_at = now();

        DB::table('empleados')
        ->where('id', $empleado->id)
        ->update([
            'imagen' => $EmpleadoCRUD->imagen,
            'nombre' => $EmpleadoCRUD->nombre,
            'RFC' => $EmpleadoCRUD->RFC,
            'fecha_nacimiento' => $EmpleadoCRUD->fecha_nacimiento,
            'domicilio' => $EmpleadoCRUD->domicilio,
            'telefono' => $EmpleadoCRUD->telefono,
            'correo' => $EmpleadoCRUD->correo,
            'sueldo' => $EmpleadoCRUD->sueldo,
            'fecha_ingreso' => $EmpleadoCRUD->fecha_ingreso,
            'NSS' => $EmpleadoCRUD->NSS,
            'password' => $EmpleadoCRUD->password,
            'id_tipoUsuario' => $EmpleadoCRUD->id_tipoUsuario,
            'updated_at' => $EmpleadoCRUD->updated_at
        ]);

        return redirect('/empleadoCRUD/' . $EmpleadoCRUD->id)->with('edited', 'Se ha modificado la informacion del empleado');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $content = 'empleadosCRUD.seeEmpleado';
        $empleado = DB::table('empleados')->where('id', 'like', '%'.$search.'%')->paginate();

        if(!empty($search)){
            return view('dashboard', ['empleados' => $empleado], compact('content'));

        } else {
            return redirect('/empleadoCRUD');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = empleado::find($id);
        $empleado->delete();

        return redirect('/empleadoCRUD')->with('deleted', 'Se ha desactivado la cuenta del empleado con el id de: ' . $empleado->id);
    }

    public function editPassword(int $id){
        $empleados = empleado::all()->except('password')->where('id',$id);
        foreach ($empleados as $empleado){
            unset($empleado['password']);
            $content = 'EmpleadosCRUD.formEditEmpleadoPassword';
            return view('dashboard', compact('empleado','content'));
        }
    }
    public function updatePassword(Request $request, int $id){
        if(isset($request->oldPassword)){
        }
        else{
            $request->validate([
                'passwordNew' => [new validarPasswordCliente($request->re_passwordNew), 'min:5']
            ]);
        }
        $empleados = empleado::all()->where('id',$id);
        $empleado = null;
        foreach ($empleados as $empleadoAux){
            $empleado = $empleadoAux;
        }
        $empleado->password = Hash::make($request->passwordNew);
        $empleado->updated_at = now();
        $empleado->save();
        return redirect('/empleadoCRUD/'.$empleado->id)->with('edited', 'Se ha modificado la informacion del empleado');
    }
}
