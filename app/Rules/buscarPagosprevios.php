<?php

namespace App\Rules;

use App\Models\detalle_pagos_clases;
use App\Models\pagos_clases;
use Illuminate\Contracts\Validation\Rule;

class buscarPagosprevios implements Rule
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
        $datosValidar = last($value);
        $pago = new pagos_clases();
        $pago = pagos_clases::all()->where('fecha',date('Y-m-d'))->where('id_cliente',$datosValidar['id_cliente'])->first();
        if($pago != null){
            $detallePago = new detalle_pagos_clases();
            $detallePago = detalle_pagos_clases::all()->where('id_pago_clase', $pago->id)->where('id_oferta',$datosValidar['id_oferta'])->first();
            if($detallePago != null){
                return false;
            }
            return true;
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
        return 'Uste cliente ya pago por esta clase el dia de hoy';
    }
}
