<?php

namespace App\Http\Controllers;

use App\Models\historial_prestamos;
use Illuminate\Http\Request;

class HistorialPrestamosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prestamos = historial_prestamos::all();
        $content = 'prestamosEquipos.index';
        return view('dashboard',compact('prestamos','content'));
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
     * @param  \App\Models\historial_prestamos  $historial_prestamos
     * @return \Illuminate\Http\Response
     */
    public function show(historial_prestamos $historial_prestamos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\historial_prestamos  $historial_prestamos
     * @return \Illuminate\Http\Response
     */
    public function edit(historial_prestamos $historial_prestamos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\historial_prestamos  $historial_prestamos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, historial_prestamos $historial_prestamos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\historial_prestamos  $historial_prestamos
     * @return \Illuminate\Http\Response
     */
    public function destroy(historial_prestamos $historial_prestamos)
    {
        //
    }
}
