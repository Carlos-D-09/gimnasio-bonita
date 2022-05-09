<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class validarDisponibilidadMaestroEdit implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $horaInicio,$dia, $idOferta;
    public function __construct($horaInicio, $dia, $idOferta)
    {
        $this->horaInicio = $horaInicio;
        $this->dia = $dia;
        $this->idOferta = $idOferta;
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
        $actvsMaestro = DB::select('SELECT horaInicio, horaFin, id FROM oferta_actividades WHERE id_empleado = :id_empleado AND dia = :dia AND status = :status',['id_empleado'=>$value, 'dia'=>$this->dia, 'status' => 'activo']);
        foreach($actvsMaestro as $actvMaestro){
            if(strtotime($actvMaestro->horaInicio) == strtotime($this->horaInicio) || strtotime($this->horaInicio) > strtotime($actvMaestro->horaInicio) && strtotime($this->horaInicio) < strtotime($actvMaestro->horaFin)){
                if($actvMaestro->id != $this->idOferta){
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
        return 'The validation error message.';
    }
}
