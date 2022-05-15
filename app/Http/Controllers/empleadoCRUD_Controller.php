<?php

namespace App\Http\Controllers;

use App\Models\empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
            'RFC' => 'required|alpha|size:14|unique:empleados,RFC',
            'fecha_nacimiento' => 'required',
            'domicilio' => 'required',
            'telefono' => 'required|digits:10',
            'correo' => 'required|email|unique:empleados,correo',
            'sueldo' => 'required|digits_between:4,6',
            'NSS' => 'required|alpha|size:11|unique:empleados,NSS',
            'password' => 'required|min:5',
            'id_tipoUsuario' => 'required'
        ]);

        $EmpleadoCRUD = new empleado();

        $EmpleadoCRUD->id = $request->id;
        $EmpleadoCRUD->nombre = $request->nombre;
        $EmpleadoCRUD->RFC = $request->RFC;
        $EmpleadoCRUD->fecha_nacimiento = $request->fecha_nacimiento;
        $EmpleadoCRUD->domicilio = $request->domicilio;
        $EmpleadoCRUD->telefono = $request->telefono;
        $EmpleadoCRUD->correo = $request->correo;
        $EmpleadoCRUD->sueldo = $request->sueldo;
        $EmpleadoCRUD->fecha_ingreso = now();
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
        $content = 'empleadosCRUD.showEmpleado';
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
        return view('empleadosCRUD.formEmpleado')->with('empleado', $empleado);
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
        $request->validate([
            'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
            'RFC' => 'required|alpha|size:14|unique:empleados,RFC',
            'fecha_nacimiento' => 'required',
            'domicilio' => 'required',
            'telefono' => 'required|digits:10',
            'correo' => 'required|email|unique:empleados,correo',
            'sueldo' => 'required|digits_between:4,6',
            'NSS' => 'required|alpha|size:11|unique:empleados,NSS',
            'password' => 'required|min:5',
            'id_tipoUsuario' => 'required'
        ]);

        $empleado = empleado::find($id);
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
        $EmpleadoCRUD->password = $request->password;
        $EmpleadoCRUD->id_tipoUsuario = $request->id_tipoUsuario;

        DB::table('empleados')
        ->where('id', $empleado->id)
        ->update([
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
}
