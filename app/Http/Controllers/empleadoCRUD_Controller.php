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
        $empleado = session('empleado');
        $content = 'empleadosCRUD.seeEmpleado';

        $data['empleados'] = empleado::paginate();
        return view('dashboard', $data, compact('empleado', 'content'));
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
        $EmpleadoCRUD = new empleado();

        $EmpleadoCRUD->id = $request->id;
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
        $EmpleadoCRUD->save();

        $empleado = session('empleado');

        $content = 'empleadosCRUD.seeEmpleado';
        return view('dashboard', compact('empleado', 'content'));
        /*return 'store';*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(empleado $EmpleadoCRUD)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
