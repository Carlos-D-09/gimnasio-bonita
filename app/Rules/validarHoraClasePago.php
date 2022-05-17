<?php

namespace App\Rules;

use App\Models\oferta_actividades;
use Illuminate\Contracts\Validation\Rule;

class validarHoraClasePago implements Rule
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
        $pagos = $value;
        $numPagos = count($pagos);
        if($numPagos == 1){
            return true;
        }
        else{
            $idNuevaOferta = $pagos[$numPagos-1]['id_oferta'];
            $ofertaNueva = new oferta_actividades();
            $ofertaNueva = oferta_actividades::where('id',$idNuevaOferta)->first();
            $horaInicioOfertaNueva = $ofertaNueva->horaInicio;
            $cont = 1;
            foreach($pagos as $pago){
                if($cont != $numPagos){
                    $ofertaAux = new oferta_actividades();
                    $ofertaAux = oferta_actividades::where('id',$pago['id_oferta'])->first();
                    $horaInicioOfertaAux = $ofertaAux->horaInicio;
                    if(strtotime($horaInicioOfertaAux) ==  strtotime($horaInicioOfertaNueva)){
                        return false;
                    }
                    $cont++;
                }
            }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Se interponen horarios';
    }
}
