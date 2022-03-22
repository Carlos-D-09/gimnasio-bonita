<?php

namespace App\Http\Controllers;

use App\Models\clase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clases.formClase');
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
            'nombre' => ['required', 'min:3'],
            'descripcion' => 'required',
        ]);
        $nombre = DB::select('SELECT nombre FROM clases WHERE nombre = :nombre',['nombre'=>$request->nombre]);
        if($nombre == null){
            $clase = new clase();
            $clase->nombre = $request->nombre;
            $clase->descripcion = $request->descripcion;
            $clase->save();
            return redirect('/empleado');
        }
        else{
            return redirect('/clase/create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function show(Clase $clase)
    {
        return view('clases.showClase', compact('clase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function edit(Clase $clase)
    {
        return view('clases.formClase', compact('clase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clase $clase)
    {
        //dd('ejecuta update');
        $clase->nombre = $request->nombre;
        $clase->descripcion = $request->descripcion;
        $clase->save();

        return redirect('/clase/' . $clase->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clase $clase)
    {
        $clase->delete();
        return redirect('/empleado');
    }
}
