<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class oferta_actividades extends Model
{
    use HasFactory;
    public $timestamps = true;

    public function clase(){
        return $this->belongsTo(clase::class,'id_clase');
    }

    public function empleado(){
        return $this->belongsTo(empleado::class,'id_empleado');
    }
}