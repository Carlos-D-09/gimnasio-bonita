<?php

namespace App\Http\Controllers;

use App\Models\equipos;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(equipos $equipos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\equipos  $equipos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, equipos $equipos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\equipos  $equipos
     * @return \Illuminate\Http\Response
     */
    public function destroy(equipos $equipos)
    {
        //
    }
}
