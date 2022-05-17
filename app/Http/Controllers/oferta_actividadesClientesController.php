<?php

namespace App\Http\Controllers;

use App\Models\clase;
use App\Models\cliente;
use App\Models\oferta_actividades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class oferta_actividadesClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente = cliente::all()->find(Auth::user()->id);
        $ofertaActividades = oferta_actividades::all()->where('status','activo');
        $content = 'clienteUser.indexOfertaActividades';
        return view('dashboard', compact('ofertaActividades', 'content', 'cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //aqui va la tabla de agendas, insertar id de oferta y del cliente
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showResult($ofertaActividades, $cliente, $content, $dia){
        $cliente = cliente::all()->find(Auth::user()->id);
        return view('dashboard', compact('ofertaActividades', 'content', 'cliente'));
    }

    public function orderByClase(){
        $cliente = cliente::all()->find(Auth::user()->id);
        $ofertaActividades = oferta_actividades::all()->where('status','activo');
        $ofertaActividades = oferta_actividadesClientesController::burbujaClase($ofertaActividades);
        $content = 'clienteUser.indexOfertaActividades';
        $clase = true;
        return view('dashboard', compact('ofertaActividades', 'content', 'clase', 'cliente'));
    }

    public function orderByDia(){
        $cliente = cliente::all()->find(Auth::user()->id);
        $ofertaActividades = oferta_actividades::all()->where('status','activo');
        $ofertaActividades = oferta_actividadesClientesController::burbujaDia($ofertaActividades);
        $content = 'clienteUser.indexOfertaActividades';
        $dia = true;
        return view('dashboard', compact('ofertaActividades','content', 'dia', 'cliente'));
    }

    public function orderByMaestro(){
        $cliente = cliente::all()->find(Auth::user()->id);
        $ofertaActividades = oferta_actividades::all()->where('status','activo');
        $ofertaActividades = oferta_actividadesClientesController::burbujaMaestro($ofertaActividades);
        $content = 'clienteUser.indexOfertaActividades';
        $maestro = true;
        return view('dashboard', compact('ofertaActividades','content', 'maestro', 'cliente'));
    }

    public function busquedaPatronMaestro(Request $request){
        $cliente = cliente::all()->find(Auth::user()->id);
        $ofertaActividades = oferta_actividades::all()->where('status','activo');
        $ofertaActividades = oferta_actividadesClientesController::burbujaMaestro($ofertaActividades);
        $ofertaActividades = oferta_actividadesClientesController::buscarPatronMaestro($ofertaActividades, $request->patron);
        $content = 'clienteUser.indexOfertaActividades';
        $maestro = true;
        $patronBuscado = $request->patron;
        return view('dashboard', compact('ofertaActividades','content', 'maestro', 'patronBuscado', 'cliente'));
    }

    public function busquedaPatronDia(Request $request){
        $cliente = cliente::all()->find(Auth::user()->id);
        $ofertaActividades = oferta_actividades::all()->where('status','activo');
        $ofertaActividades = oferta_actividadesClientesController::burbujaDia($ofertaActividades);
        $ofertaActividades = oferta_actividadesClientesController::buscarPatronDia($ofertaActividades, $request->patron);
        $content = 'clienteUser.indexOfertaActividades';
        $dia = true;
        $patronBuscado = $request->patron;
        return view('dashboard', compact('ofertaActividades', 'content', 'dia', 'patronBuscado', 'cliente'));
    }

    public function busquedaPatronClase(Request $request){
        $cliente = cliente::all()->find(Auth::user()->id);
        $ofertaActividades = oferta_actividades::all()->where('status','activo');
        $ofertaActividades = oferta_actividadesClientesController::burbujaClase($ofertaActividades);
        $ofertaActividades = oferta_actividadesClientesController::buscarPatron($ofertaActividades, $request->patron);
        $content = 'clienteUser.indexOfertaActividades';
        $clase = true;
        $patronBuscado = $request->patron;
        return view('dashboard', compact('ofertaActividades', 'content', 'clase', 'patronBuscado', 'cliente'));
    }

    public function busquedaPatron(Request $request){
        $cliente = cliente::all()->find(Auth::user()->id);
        $ofertaActividades = oferta_actividades::all()->where('status','activo');
        $ofertaActividades = oferta_actividadesClientesController::buscarPatron($ofertaActividades, $request->patron);
        $content = 'clienteUser.indexOfertaActividades';
        $patronBuscado = $request->patron;
        return view('dashboard', compact('ofertaActividades','content', 'patronBuscado', 'cliente'));
    }

    public function burbujaClase($ofertas){
        $ofertas = $ofertas->values();
        $longitud = count($ofertas);
        for ($i = 0; $i < $longitud; $i++) {
            for ($j = 0; $j < $longitud - 1; $j++) {
                if ($ofertas[$j]->clase->nombre[0] > $ofertas[$j + 1]->clase->nombre[0]) {
                    $temporal = $ofertas[$j];
                    $ofertas[$j] = $ofertas[$j + 1];
                    $ofertas[$j + 1] = $temporal;
                }
            }
        }
        return $ofertas;
    }

    public function burbujaMaestro($ofertas){
        $ofertas = $ofertas->values();
        $longitud = count($ofertas);
        for ($i = 0; $i < $longitud; $i++) {
            for ($j = 0; $j < $longitud - 1; $j++) {
                if ($ofertas[$j]->empleado->nombre[0] > $ofertas[$j + 1]->empleado->nombre[0]) {
                    $temporal = $ofertas[$j];
                    $ofertas[$j] = $ofertas[$j + 1];
                    $ofertas[$j + 1] = $temporal;
                }
            }
        }
        return $ofertas;
    }

    public function burbujaDia($ofertas){
        $ofertas = $ofertas->values();
        $semana = [
            0 => 'lunes',
            1 => 'martes',
            2 => 'miercoles',
            3 => 'jueves',
            4 => 'viernes',
            5 => 'sabado'
        ];
        $longitud = count($ofertas);
        for ($i = 0; $i < $longitud; $i++) {
            for ($j = 0; $j < $longitud - 1; $j++) {
                $diaJ = array_search($ofertas[$j]->dia, $semana);
                $diaJ1 = array_search($ofertas[$j+1]->dia, $semana);
                if ($diaJ > $diaJ1) {
                    $temporal = $ofertas[$j];
                    $ofertas[$j] = $ofertas[$j + 1];
                    $ofertas[$j + 1] = $temporal;
                }
            }
        }
        return $ofertas;
    }

    public function buscarPatron($ofertas, $patron){
        $nombres = [];
        foreach($ofertas as $oferta){
            if(strpos(strtolower($oferta->clase->nombre),strtolower($patron)) === false){
            }
            else{
                $nombres[] = $oferta;
            }
        }
        return $nombres;
    }
    public function buscarPatronMaestro($ofertas, $patron){
        $nombres = [];
        foreach($ofertas as $oferta){
            if(strpos(strtolower($oferta->empleado->nombre),strtolower($patron)) === false){
            }
            else{
                $nombres[] = $oferta;
            }
        }
        return $nombres;
    }
    public function buscarPatronDia($ofertas, $patron){
        $nombres = [];
        foreach($ofertas as $oferta){
            if(strpos(strtolower($oferta->dia),strtolower($patron)) === false){
            }
            else{
                $nombres[] = $oferta;
            }
        }
        return $nombres;
    }
}
