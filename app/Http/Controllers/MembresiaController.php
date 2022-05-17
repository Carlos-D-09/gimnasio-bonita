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
        //dd(json_encode($data));
        return view('dashboard', $data, compact('content'));
    }

    public function toJson()
    {
        $data['membresias'] = membresia::paginate();
        //dd(json_encode($data));
        return redirect('/membresia')->with('data', json_encode($data));
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
        $request->validate([
            'Nombre' => 'required|regex:/^[\pL\s\-]+$/u|unique:membresias,Nombre',
            'Duracion' => 'required|digits_between:1,5',
            'costo' => 'required|digits_between:2,5',
        ]);

        $membresiaData = new membresia();
        $membresiaData->id = $request->id;
        $membresiaData->Nombre = $request->Nombre;
        $membresiaData->Duracion = $request->Duracion;
        $membresiaData->costo = $request->costo;

        $membresiaData->save();

        $content = 'membresia.seeMembresia';

        $data['membresias'] = membresia::paginate();

        return redirect('/membresia')->with('success', 'Se ha registrado la membresia de forma exitosa');
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
        $request->validate([
            'costo' => 'required|digits_between:2,5',
        ]);

        $membresia = membresia::find($id);
        $membresiaData->id = $membresia->id;
        $membresiaData->Nombre = $membresia->Nombre;
        $membresiaData->updated_at = now();
        $membresiaData->costo = $request->costo;

        DB::table('membresias')
        ->where('id', $membresia->id)
        ->update([
            'costo' => $membresiaData->costo,
            'updated_at' => $membresiaData->updated_at
        ]);

        return redirect('/membresia')->with('edited', 'Se ha modificado el costo por dia de la membresia con el id de ' . $membresia->id);
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

        return redirect('/membresia')->with('deleted', 'Se ha eliminado la membresia con el id de: ' . $membresia->id);
    }
}
