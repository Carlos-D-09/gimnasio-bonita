<?php

namespace App\Http\Controllers;

use App\Models\detalle_pagos_clases;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetallePagosClasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(int $id)
    {
        $idPago = $id;
        $detalles =  detalle_pagos_clases::all()->where('id_pago_clase',$idPago);
        $content = 'detallePagoClases.index';
        return view('dashboard',compact('content', 'detalles','idPago'));
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
     * @param  \App\Models\detalle_pagos_clases  $detalle_pagos_clases
     * @return \Illuminate\Http\Response
     */
    public function show(detalle_pagos_clases $detalle_pagos_clases)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\detalle_pagos_clases  $detalle_pagos_clases
     * @return \Illuminate\Http\Response
     */
    public function edit(detalle_pagos_clases $detalle_pagos_clases)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\detalle_pagos_clases  $detalle_pagos_clases
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, detalle_pagos_clases $detalle_pagos_clases)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\detalle_pagos_clases  $detalle_pagos_clases
     * @return \Illuminate\Http\Response
     */
    public function destroy(detalle_pagos_clases $detalle_pagos_clases)
    {
        //
    }
}
