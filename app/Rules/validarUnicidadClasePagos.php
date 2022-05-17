<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class validarUnicidadClasePagos implements Rule
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
        $elementosPagos = count($value);
        if($elementosPagos == 1){
            return true;
        }
        if($elementosPagos > 1){
            $datosValidar = last($value);
            $count = 1;
            foreach($value as $pago){
                if($count != $elementosPagos){
                    if($datosValidar['id_oferta'] == $pago['id_oferta']){
                        return false;
                    }
                    $count++;
                }
            }
            return True;
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
        return 'Ya se agrego esta clase';
    }
}
