<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Permission\Traits\HasRoles;

class encargado_sucursal extends Model
{
    use HasFactory;
    use HasRoles;
}
