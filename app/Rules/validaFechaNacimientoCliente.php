<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class validaFechaNacimientoCliente implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $fechaActual = date('d/m/Y');
        $fechaIntroucidaMas15 = date("d/m/Y",strtotime($value."+ 15 years"));
        if($fechaActual == $value || $value > $fechaActual || $fechaIntroucidaMas15 > $fechaActual){
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
        return 'Fecha invalida (El cliente tiene que tener 15 años para ser registrado)';
    }
}
