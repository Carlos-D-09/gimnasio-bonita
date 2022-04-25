<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class clase extends Model
{
    public $timestamps = false;
    use HasFactory;

    public function empleados(){
        return $this->belongsToMany(empleado::class,'oferta_actividades','id_clase','id_empleado');
    }
}
