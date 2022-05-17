<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pagos_prestamos_equipos extends Model
{
    public $timestamps = false;
    use HasFactory;

    public function cliente(){
        return $this->belongsTo(cliente::class, 'id_cliente');
    }
    public function empleado(){
        return $this->belongsTo(empleado::class, 'id_empleado');
    }
}
