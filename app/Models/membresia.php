<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class membresia extends Model
{
    public $timestamps = false;
    use HasFactory;
    use SoftDeletes;

    //Mutators
    public function setNombreAttribute($value){
        $this->attributes['Nombre'] = $value. ' 2022';
    }

    //Accessors
    public function getNombreAttribute($value){
        return strtoupper($value);
    }
}
