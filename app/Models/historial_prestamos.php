<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historial_prestamos extends Model
{
    public $timestamps = false;
    use HasFactory;

    public function equipo(){
        return $this->belongsTo(equipos::class, 'id_equipo');
    }
}
