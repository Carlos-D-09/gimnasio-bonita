<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class validarDisponibilidadMaestro implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $horaInicio,$dia;

    public function __construct($horaInicio,$dia)
    {
        $this->horaInicio = $horaInicio;
        $this->dia = $dia;
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
        $actvsMaestro = DB::select('SELECT horaInicio, horaFin FROM oferta_actividades WHERE id_empleado = :id_empleado AND dia = :dia',['id_empleado'=>$value, 'dia'=>$this->dia]);
        foreach($actvsMaestro as $actvMaestro){
            if(strtotime($actvMaestro->horaInicio) == strtotime($this->horaInicio) || strtotime($this->horaInicio) > strtotime($actvMaestro->horaInicio) && strtotime($this->horaInicio) < strtotime($actvMaestro->horaFin)){
                return false;
            }
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
        return 'El maestro ya imparte alguna clase ese día en el mismo lapso horario';
    }
}
