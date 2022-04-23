<?php

namespace App\Http\Controllers;

use App\Models\clase;
use App\Models\empleado;
use App\Models\oferta_actividades;
use App\Rules\validarDisponibilidadEspacio;
use App\Rules\validarDisponibilidadMaestro;
use App\Rules\validarHora_fin;
use App\Rules\validarIntervaloTiempo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use OfertaActividades;

class OfertaActividadesController extends Controller
{
    public function index()
    {
        $empleado = session('empleado');
        $ofertaActividades = oferta_actividades::all();
        $content = 'ofertaActividades.index';
        return view('dashboard', compact('ofertaActividades', 'empleado', 'content'));
    }
    public function create()
    {
        $maestros = empleado::all()->where('id_tipoUsuario',3);
        $clases = clase::all();
        return view('ofertaActividades.formOferta',compact('maestros','clases'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'cupos' => ['required', 'numeric', 'min:5', 'max:25'],
            'dia' => [new validarDisponibilidadEspacio($request->horaInicio)],
            'horaFin' => [new validarHora_fin($request->horaInicio), new validarIntervaloTiempo($request->horaInicio)],
            'id_maestro' => [new validarDisponibilidadMaestro($request->horaInicio,$request->dia)]
        ]);
        $oferta = new oferta_actividades();
        $oferta->id_clase = $request->id_clase;
        $oferta->horaInicio = $request->horaInicio;
        $oferta->horaFin = $request->horaFin;
        $oferta->dia = $request->dia;
        $oferta->cupos = $request->cupos;
        $oferta->id_empleado = $request->id_maestro;
        $oferta->save();
        $empleado = session('empleado');
        $ofertaActividades = oferta_actividades::all();
        $content = 'ofertaActividades.index';
        return view('dashboard', compact('ofertaActividades', 'empleado', 'content'));
    }

    public function orderByClase(){
        $empleado = session('empleado');
        $ofertaActividades = oferta_actividades::all();
        $ofertaActividades = OfertaActividadesController::burbujaClase($ofertaActividades);
        $content = 'ofertaActividades.index';
        return view('dashboard', compact('ofertaActividades', 'empleado', 'content'));
    }

    public function orderByDia(){
        $empleado = session('empleado');
        $ofertaActividades = oferta_actividades::all();
        $ofertaActividades = OfertaActividadesController::burbujaDia($ofertaActividades);
        $content = 'ofertaActividades.index';
        return view('dashboard', compact('ofertaActividades', 'empleado', 'content'));
    }

    public function burbujaClase($ofertas){
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

    public function burbujaDia($ofertas){
        $semana = [
            0 => 'lunes',
            1 => 'martes',
            2 => 'miercoles',
            3 => 'jueves',
            4 => 'viernes',
            4 => 'sabado'
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
}
