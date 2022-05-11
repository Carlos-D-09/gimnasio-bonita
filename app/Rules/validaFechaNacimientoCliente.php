<?php

namespace App\Rules;

use DateTime;
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
        $fechaActual = date('d-m-Y');
        $fechaNuevoFormato = DateTime::createFromFormat('d/m/Y', $value);
        $fechaNuevoFormato = $fechaNuevoFormato->format('d-m-Y');
        $fechaNuevoFormatoMas15 = date("d-m-Y",strtotime($fechaNuevoFormato."+ 15 year"));
        $fechaActual = strtotime($fechaActual);
        $fechaNuevoFormato = strtotime($fechaNuevoFormato);
        $fechaNuevoFormatoMas15 = strtotime($fechaNuevoFormatoMas15);
        if($fechaActual == $fechaNuevoFormato || $fechaNuevoFormato > $fechaActual || $fechaNuevoFormatoMas15 > $fechaActual){
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
