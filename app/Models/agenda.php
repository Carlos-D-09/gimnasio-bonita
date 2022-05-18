<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agenda extends Model
{
    use HasFactory;
    public $timestamps = true;

    public function cliente(){
        return $this->belongsTo(cliente::class,'id_cliente');
    }

    public function oferta_actividades(){
        return $this->belongsTo(oferta_actividades::class,'id_oferta');
    }
}
