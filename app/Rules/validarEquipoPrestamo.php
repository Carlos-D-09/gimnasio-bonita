<?php

namespace App\Rules;

use App\Models\equipos;
use Illuminate\Contracts\Validation\Rule;

class validarEquipoPrestamo implements Rule
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
        $equipo = new equipos();
        $equipo = equipos::where('id',$value[count($value)-1]['id_equipo'])->first();
        if($equipo != null){
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
        return 'El equipo no existe en la base de datos';
    }
}
