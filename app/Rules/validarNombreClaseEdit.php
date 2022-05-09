<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\PseudoTypes\True_;

class validarNombreClaseEdit implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $id_clase;
    public function __construct($id_clase)
    {
        $this->id_clase = $id_clase;
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
        $registroOrignal = DB::table('clases')->where('id', '=', $this->id_clase)->where('status','=','activo')->take(1)->get();
        $nombre = DB::table('clases')->where('nombre', '=', $value)->where('status','=','activo')->take(1)->get();
        if (count($nombre) == 0){
            return true;
        }
        else{
            $registroOrignal = $registroOrignal[0];
            $nombre = $nombre[0];
            if ($registroOrignal->nombre == $nombre->nombre){
                return true;
            }
            else{
                return false;
            }
        }

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Ya existe una clase con este nombre.';
    }
}
