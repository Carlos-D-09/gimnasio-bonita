<?php

namespace App\Http\Controllers;

use App\Models\equipos;
use App\Models\historial_prestamos;
use App\Rules\validarNombreEquipo;
use App\Rules\validarNombreEquipoEdit;
use App\Rules\validarNuevaCantidadEquipos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EquiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos = equipos::all()->where('status',1);
        foreach($equipos as $equipo){
            $equiposUsando = new historial_prestamos();
            $equiposUsando = historial_prestamos::all()->where('id_equipo',$equipo->id)->where('devuelto',0);
            $unidadesUsadas = 0;
            foreach($equiposUsando as $equipoUsando){
               $unidadesUsadas = $unidadesUsadas + $equipoUsando->cantidad;
            }
            $unidadesDisponibles = $equipo->unidades - $unidadesUsadas;
            $equipo->unidadesDisponibles = $unidadesDisponibles;
        }
        $content = 'equipos.index';
        return view('dashboard',compact('equipos','content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = DB::table('equipos')->select('id')->orderByDesc('id')->first();
        if($id == null){
            $id = 1;
            return view('equipos.formEquipo', compact('id'));
        }
        $id = (int) $id->id + 1;
        return view('equipos.formEquipo',compact('id'));
    }

    public function toJson()
    {
        $data['equipos'] = equipos::paginate();
        //dd(json_encode($data));
        return redirect('/empleado/equipos')->with('data', json_encode($data));
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
            'nombre' => ['required', 'min:3', 'max:150', new validarNombreEquipo],
            'unidades' => ['required','integer'],
            'costo' => ['required','numeric'],
            'descripcion'=> ['required','min:5','max:150']
        ]);
        $equipo = new equipos();
        $equipo->nombre = ucfirst($request->nombre);
        $equipo->unidades = $request->unidades;
        $equipo->cost_x_renta = $request->costo;
        $equipo->descripcion = $request->descripcion;
        $equipo->status = 1;
        $equipo->save();
        $equipos = equipos::all()->where('status',1);
        $content = 'equipos.index';
        return view('dashboard',compact('equipos','content'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\equipos  $equipos
     * @return \Illuminate\Http\Response
     */
    public function show(equipos $equipos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\equipos  $equipos
     * @return \Illuminate\Http\Response
     */
    public function edit(equipos $equipo)
    {
        return view('equipos.formEditEquipo',compact('equipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\equipos  $equipos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, equipos $equipo)
    {
        $request->validate([
            'nombre' => ['required', 'min:3', 'max:150', new validarNombreEquipoEdit($equipo->id)],
            'unidades' => ['required','integer',new validarNuevaCantidadEquipos($equipo->id)],
            'costo' => ['required','numeric'],
            'descripcion'=> ['required','min:5','max:150']
        ]);
        $equipo->nombre = $request->nombre;
        $equipo->unidades = $request->unidades;
        $equipo->cost_x_renta = $request->costo;
        $equipo->descripcion = $request->descripcion;
        $equipo->updated_at = now();
        $equipo->save();
        return redirect('/empleado/equipos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\equipos  $equipos
     * @return \Illuminate\Http\Response
     */
    public function destroy(equipos $equipo)
    {
        $equipo->status = 0;
        $equipo->save();
        return redirect('/empleado/equipos');
    }
}
