<?php

namespace App\Http\Controllers;

use App\Models\membresia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MembresiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $costoXdia = 30;

    public function index()
    {
        $content = 'membresia.seeMembresia';
        $data['membresias'] = membresia::paginate();
        return view('dashboard', $data, compact('content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('membresia.formMembresia');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $membresiaData = new membresia();
        $membresiaData->id = $request->id;
        $membresiaData->Nombre = $request->Nombre;
        $membresiaData->Duracion = $request->Duracion;
        if(empty($request->costo)) {
            $membresiaData->costo = $this->costoXdia * $request->Duracion;
        } else {
            $membresiaData->costo = $request->costo * $request->Duracion;
        }
        
        $membresiaData->save();

        $content = 'membresia.seeMembresia';

        $data['membresias'] = membresia::paginate();
        
        return view('dashboard', $data, compact('content'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\membresia  $membresia
     * @return \Illuminate\Http\Response
     */
    public function show(membresia $membresia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\membresia  $membresia
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $membresia = membresia::find($id);
        $content = 'membresia.formEditMembresia';
        //return view('empleadosCRUD.formEmpleado')->with('empleado', $empleado);
        return view('dashboard', compact('content'))->with('membresia', $membresia);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\membresia  $membresia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, membresia $membresiaData, $id)
    {
        $membresia = membresia::find($id);
        $membresiaData->id = $membresia->id;
        $membresiaData->Nombre = $membresia->Nombre;
        $membresiaData->costo = $request->costo * $membresia->Duracion;

        DB::table('membresias')
        ->where('id', $membresia->id)
        ->update([
            'costo' => $membresiaData->costo
        ]);

        return redirect('/membresia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\membresia  $membresia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $membresia = membresia::find($id);
        $membresia->delete();

        return redirect('/membresia');
    }
}
