<?php

namespace App\Rules;

use App\Models\equipos;
use App\Models\historial_prestamos;
use Illuminate\Contracts\Validation\Rule;

class validarNuevaCantidadEquipos implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public $idEquipo;
    public function __construct($idEquipo)
    {
        $this->idEquipo = $idEquipo;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $equiposUsando = new historial_prestamos();
        $equiposUsando = historial_prestamos::all()->where('id_equipo',$this->idEquipo)->where('devuelto',0);
        $unidadesUsadas = 0;
        foreach($equiposUsando as $equipoUsando){
            $unidadesUsadas = $unidadesUsadas + $equipoUsando->cantidad;
        }
        if($value < $unidadesUsadas){
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'No se puede modificar ya que hay una cantidad igual o mayor de equipos en prestamo en este momento';
    }
}
