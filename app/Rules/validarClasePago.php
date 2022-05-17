<?php

namespace App\Rules;

use App\Models\oferta_actividades;
use Illuminate\Contracts\Validation\Rule;

class validarClasePago implements Rule
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
        $numPagos = count($value);
        $claseValidar = $value[$numPagos-1]['id_oferta'];
        $oferta = new oferta_actividades();
        $oferta = oferta_actividades::where('id',$claseValidar)->first();
        if($oferta != null){
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'No existe la oferta de clase';
    }
}
