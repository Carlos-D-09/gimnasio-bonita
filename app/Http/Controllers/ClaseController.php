<?php

namespace App\Http\Controllers;

use App\Models\clase;
use App\Rules\validarNombreClase;
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
        $empleado = session('empleado');
        $clases = clase::all();
        $content = 'clases.index';
        return view('dashboard', compact('clases', 'empleado', 'content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/clases/formClase');
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
            'nombre' => ['required', 'min:3', new validarNombreClase],
            'descripcion' => 'required',
        ]);
        //Verificar que la imagen de la clase venga en el form
        if($request->hasFile('imagen')){
            //Buscar que no se quiera repetir el nombre de una clase
            $clase = new clase();
            //Inicio guardado imagen
            $file = $request->file('imagen');
            $destino = "images/Clases/ImagenesClases/";
            $filename = time() . '_' . $file->getClientOriginalName();
            $request->file('imagen')->move($destino, $filename);
            //Fin guardado imagen
            $clase->imagen = $destino . $filename;
            $clase->nombre = ucfirst($request->nombre);
            $clase->descripcion = $request->descripcion;
            $clase->save();
            //Regresar a la vista empleado
            $empleado = session('empleado');
            $clases = clase::all();
            $content = 'clases.index';
            return view('dashboard', compact('clases', 'empleado', 'content'));
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
        // $clases = clase::with('empleados')->get();foreach($clases as $clase){
        //     foreach($clase->empleados as $empleado){
        //         dd($empleado->nombre);
        //     }
        // }
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
        return view('clases.formEditClase', compact('clase'));
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
        $request->validate([
            'nombre' => ['required', 'min:3', new validarNombreClase],
            'descripcion' => 'required',
        ]);
        if($request->hasFile('imagen')){
            //Inicio guardado imagen
            $file = $request->file('imagen');
            $destino = "images/Clases/ImagenesClases/";
            $filename = time() . '_' . $file->getClientOriginalName();
            $filenameAux = $clase->imagen;
            unlink($filenameAux);
            $clase->imagen = $destino . $filename;
            $request->file('imagen')->move($destino, $filename);
            //Fin guardado imagen
        }
        $clase->nombre = $request->nombre;
        $clase->descripcion = $request->descripcion;
        $clase->save();
        //Regresar a la vista de clases
        return redirect('/clase');

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
        $empleado = session('empleado');
        $clases = clase::all();
        $content = 'clases.index';
        return view('dashboard', compact('clases', 'empleado', 'content'));
    }
}
