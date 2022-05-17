<?php

namespace App\Rules;

use App\Models\cliente;
use Illuminate\Contracts\Validation\Rule;

class validarClientePrestamoEquipo implements Rule
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
        $cliente = new cliente();
        $cliente = cliente::where('id',$value[0]['id_cliente'])->first();
        if($cliente != null){
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
        return 'No existe el cliente la base de datos';
    }
}
