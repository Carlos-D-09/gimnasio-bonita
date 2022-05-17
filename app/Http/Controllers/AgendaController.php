<?php

namespace App\Http\Controllers;

use App\Models\clase;
use App\Models\empleado;
use App\Models\oferta_actividades;
use App\Models\agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        /*$ofertaActividades = oferta_actividades::all();
        $content = 'cliente.inscribirClaseCliente';
        return view('dashboard', compact('ofertaActividades', 'content'));
        // $empleado = session('empleado');*/
        // $ofertaActividades = oferta_actividades::all();
        // $content = 'agenda.index';
        // return view('dashboard', compact('ofertaActividades', 'empleado', 'content'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }
    public function show(agenda $agenda)
    {

    }
    public function edit(agenda $agenda)
    {

    }
    public function update(Request $request, agenda $agenda)
    {


    }
    public function destroy(agenda $agenda)
    {

    }
   
}
