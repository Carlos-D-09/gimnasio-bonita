<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class validarHora_fin implements Rule
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
        $value = strtotime($value);
        $this->horaInicio = strtotime($this->horaInicio);
        if($value <= $this->horaInicio){
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
        return 'La hora de fin no puede ser igual o menor a la hora de inicio';
    }
}
