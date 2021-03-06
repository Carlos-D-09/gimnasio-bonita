<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pago extends Model
{
    public $timestamps = true;
    use HasFactory;

    public function membresia(){
        return $this->belongsTo(membresia::class,'id_membresia');
    }

    public function empleado(){
        return $this->belongsTo(empleado::class,'id_empleado');
    }

    public function cliente(){
        return $this->belongsTo(cliente::class,'id_cliente');
    }

    //Accessors
    public function getNombreAttribute($value){
        return strtoupper($value);
    }
    public function getMontoAttribute($value){
        return $value.' mxn';
    }
}
