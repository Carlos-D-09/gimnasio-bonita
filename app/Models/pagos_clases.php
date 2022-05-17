<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pagos_clases extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function cliente(){
        return $this->belongsTo(cliente::class, 'id_cliente');
    }
    public function empleado(){
        return $this->belongsTo(empleado::class, 'id_empleado');
    }
}
