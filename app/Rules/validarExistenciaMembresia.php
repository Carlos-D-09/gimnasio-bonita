<?php

namespace App\Rules;

use App\Models\membresia;
use Illuminate\Contracts\Validation\Rule;

class validarExistenciaMembresia implements Rule
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
        $membresia = new membresia();
        $membresia = membresia::all()->where('id',$value)->first();
        if($membresia != null){
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
        return 'No existe la membresia que se introdujo';
    }
}
