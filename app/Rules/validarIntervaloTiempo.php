<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class validarIntervaloTiempo implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $horaInicio;
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
        $this->horaInicio = strtotime($this->horaInicio);
        $value = strtotime($value);
        $horaFinalSupuesta = strtotime('+2 hours', $this->horaInicio);
        if($value != $horaFinalSupuesta){
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
        return 'El intervalo minimo y máximo de tiempo es de dos horas por clase';
    }
}
