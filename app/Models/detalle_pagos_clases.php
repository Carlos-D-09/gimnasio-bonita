<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalle_pagos_clases extends Model
{
    public $timestamps = false;
    use HasFactory;
    
    public function oferta_actividades(){
        return $this->belongsTo(oferta_actividades::class,'id_oferta');
    }
}
