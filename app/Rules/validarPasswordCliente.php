<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use phpDocumentor\Reflection\PseudoTypes\True_;

class validarPasswordCliente implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $passwordCheck;
    public function __construct($passwordCheck)
    {
        $this->passwordCheck = $passwordCheck;
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
        if($this->passwordCheck == $value){
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
        return 'Las contraseñas no coinciden';
    }
}
