<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class validarNombreEquipoEdit implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public $idEquipoEdit;
    public function __construct(int $idEquipoEdit)
    {
        $this->idEquipoEdit = $idEquipoEdit;
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
        $equipo = DB::select('SELECT nombre FROM equipos WHERE id != :idEquipo AND nombre = :nombre',['idEquipo'=>$this->idEquipoEdit,'nombre'=>$value]);
        if($equipo == null){
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
        return 'Este nombre ya esta registrado en otro equipo';
    }
}
