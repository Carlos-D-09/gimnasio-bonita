<?php

namespace App\Rules;

use App\Models\equipos;
use App\Models\historial_prestamos;
use Illuminate\Contracts\Validation\Rule;

use function GuzzleHttp\Promise\all;

class validarCantidadPrestamo implements Rule
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
        $equipo = equipos::all()->where('id',$value[0]['id_equipo'])->first();
        $unidadesTotales = $equipo->unidades;
        $equiposUsando = new historial_prestamos();
        $equiposUsando = historial_prestamos::all()->where('id_equipo',$value[0]['id_equipo'])->where('devuelto',0);
        $unidades_usadas = 0;
        if($equiposUsando == null){
            return true;
        }
        else{
            foreach($equiposUsando as $equipoUsado){
                $unidades_usadas = $unidades_usadas + $equipoUsado->cantidad;
            }
            if($unidadesTotales-$unidades_usadas-$value[0]['cantidad'] < 0){
                return false;
            }
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'No se dispone con el numero de unidades necesarias para realizar el prestamos del equipo.';
    }
}
