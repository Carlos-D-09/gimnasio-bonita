<?php

namespace App\Http\Controllers;

use App\Models\clase;
use App\Models\detalle_pagos_clases;
use App\Models\oferta_actividades;
use App\Models\pagos_clases;
use App\Rules\validarNombreClase;
use App\Rules\validarNombreClaseEdit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $clases = DB::table('clases')->select()->where('status','activo')->get();
        $content = 'clases.index';
        return view('dashboard', compact('clases', 'content'));
    }

    public function toJson()
    {
        $data['clases'] = clase::paginate();
        //dd(json_encode($data));
        return redirect('/empleado/clase')->with('data', json_encode($data));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = DB::table('clases')->select('id')->orderByDesc('id')->first();
        if($id == null){
            $id = 1;
            return view('/clases/formClase', compact('id'));
        }
        $id = (int) $id->id + 1;
        return view('/clases/formClase', compact('id'));
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
            'imagen' => 'required'
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
            $clase->status = "activo";
            $clase->save();
            return redirect('/empleado')->with('success', 'Se ha registrado la clase de forma exitosa');
        }
        return redirect('/empleado');
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

    public function showClasesClientes()
    {
        $cliente = Auth::user()->id;
        $misClases = null;
        $cont = 0;
        $pagos = pagos_clases::all()->where('fecha',date('Y-m-d'))->where('id_cliente',$cliente);
        foreach($pagos as $pago){
            $detallesPago = detalle_pagos_clases::all()->where('id_pago_clase',$pago->id);
            foreach($detallesPago as $detallePago){
                $misClases[$cont] = oferta_actividades::all()->where('id',$detallePago->id_oferta)->first();
                $cont++;
            }
        }
        $content = 'clienteUser.indexClases';
        return view('dashboard', compact('misClases', 'content'));
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
            'nombre' => ['required', 'min:3', new validarNombreClaseEdit($clase->id)],
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
        $clase->updated_at = now();
        $clase->save();
        //Regresar a la vista de clases
        return redirect('/empleado/clase')->with('edited', 'Se ha modificado la informacion de la clase con el id: ' . $clase->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clase $clase)
    {
        unlink($clase->imagen);
        $clase->status = 'inactivo';
        $clase->save();
        DB::update('UPDATE oferta_actividades SET status = "inactivo" where id_clase = ?',[$clase->id]);
        return redirect('/empleado/clase')->with('deleted', 'Se ha desactivado la clase con el id: ' . $clase->id);
    }

    public function pagosMembresias(){
        $content = 'clienteUser.seePagosMembresias';
        return view('dashboard', compact('content'));
    }
    public function pagosPrestamosEquipos(){

    }
    public function pagosClases(){

    }
}
