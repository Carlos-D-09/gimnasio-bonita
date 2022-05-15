<?php

namespace App\Rules;

use App\Models\cliente;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class validarDisponibilidadCorreoEdit implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $idCliente;
    public function __construct($idCliente)
    {
        $this->idCliente = $idCliente;
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
        $correo = DB::select('SELECT correo FROM clientes WHERE id != :idCliente AND correo = :correo',['idCliente'=>$this->idCliente,'correo'=>$value]);
        if($correo == null){
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
        return 'Este correo esta registrado en otro cliente';
    }
}
