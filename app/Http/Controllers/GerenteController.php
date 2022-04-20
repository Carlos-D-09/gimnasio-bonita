<?php

namespace App\Http\Controllers;

use App\Models\gerente;
use Illuminate\Http\Request;

class GerenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empleado = session('gerente');
        $clases = clase::all();
        $content = 'clases.index';
        return view('dashboard', compact('clases', 'gerente', 'content'));
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
     * @param  \App\Models\gerente  $gerente
     * @return \Illuminate\Http\Response
     */
    public function show(gerente $gerente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\gerente  $gerente
     * @return \Illuminate\Http\Response
     */
    public function edit(gerente $gerente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\gerente  $gerente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, gerente $gerente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\gerente  $gerente
     * @return \Illuminate\Http\Response
     */
    public function destroy(gerente $gerente)
    {
        //
    }
}
