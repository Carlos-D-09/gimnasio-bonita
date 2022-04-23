<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class validarCuposMinimos implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    private $id_oferta;
    private $cuposMinimos;
    public function __construct($id_oferta)
    {
        $this->id_oferta = $id_oferta;
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
        $agendas = DB::select('SELECT id FROM agendas WHERE id_oferta = :id_oferta', ['id_oferta'=>$this->id_oferta]);
        $this->cuposMinimos = count($agendas);
        if($value >= $this->cuposMinimos){
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
        return 'No se puede cambiar al nuevo número de cupos ya que se tienen registrado(s) ' . $this->cuposMinimos . ' para tomar la clase';
    }
}
