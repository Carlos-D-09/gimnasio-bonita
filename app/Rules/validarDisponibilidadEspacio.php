<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class validarDisponibilidadEspacio implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($horaInicio)
    {
        $this->horaInicio = $horaInicio;
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
        $clases = DB::select('SELECT horaInicio,horaFin FROM oferta_actividades WHERE dia = :dia',['dia'=>$value]);
        $numAulasOcupadas = 0;
        foreach($clases as $clase){
            if(strtotime($clase->horaInicio) == strtotime($this->horaInicio) || strtotime($this->horaInicio) > strtotime($clase->horaInicio) && strtotime($this->horaInicio) < strtotime($clase->horaFin)){
                $numAulasOcupadas++;
                if($numAulasOcupadas == 3){
                    return false;
                }
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
        return 'No se pueden impartir más clases este día en el mismo lapso horario por falta de espacio';
    }
}
