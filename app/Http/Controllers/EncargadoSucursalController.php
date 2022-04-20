<?php

namespace App\Http\Controllers;

use App\Models\encargado_sucursal;
use Illuminate\Http\Request;

class EncargadoSucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleado = session('EncargadoSucursal');
        $clases = clase::all();
        $content = 'clases.index';
        return view('dashboard', compact('clases', 'EncargadoSucursal', 'content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\encargado_sucursal  $encargado_sucursal
     * @return \Illuminate\Http\Response
     */
    public function show(encargado_sucursal $encargado_sucursal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\encargado_sucursal  $encargado_sucursal
     * @return \Illuminate\Http\Response
     */
    public function edit(encargado_sucursal $encargado_sucursal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\encargado_sucursal  $encargado_sucursal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, encargado_sucursal $encargado_sucursal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\encargado_sucursal  $encargado_sucursal
     * @return \Illuminate\Http\Response
     */
    public function destroy(encargado_sucursal $encargado_sucursal)
    {
        //
    }
}
