<?php

namespace App\Rules;

use App\Models\clase;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class validarNombreClase implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {

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
        $nombre = DB::select('SELECT nombre FROM clases WHERE nombre = :nombre AND status = :status',['nombre'=>ucfirst($value),'status'=>'activo']);
        if(count($nombre) == 0){
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
        return 'Ya existe una clase con este nombre';
    }
}
