<?php

namespace App\Rules;

use App\Models\oferta_actividades;
use Illuminate\Contracts\Validation\Rule;

class validarDiaOferta implements Rule
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
        $diasIngles = [
            "lunes" => "Monday",
            "martes" => "Tuesday",
            "miercoles" => "Wednesday",
            "jueves" => "Thursday",
            "viernes" => "Friday",
            "sabado" => "Saturday"
        ];
        $oferta = new oferta_actividades();
        $oferta = oferta_actividades::where('id',$value[count($value)-1]['id_oferta'])->first();
        $diaOferta = $diasIngles[$oferta->dia];
        $hoy = getdate();
        $hoy = $hoy['weekday'];
        if($hoy == $diaOferta){
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
        return 'La clase no se lleva acabo hoy';
    }
}
