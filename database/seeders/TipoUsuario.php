<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoUsuario extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_usuario')-> insert ([
            'nombre' => 'Gerente',
            'descripcion' => 'Usuario que puede realizar todas las operaciones dentro de la aplicacion, menos registrarse a una clase'
        ]);
        DB::table('tipo_usuario')-> insert ([
            'nombre' => 'Encargado de sucursal',
            'descripcion' => 'Usuario que puede realizar todas las operaciones dentro de la aplicación, menos registrarse a una clase y dar de alta otros usuario de su mismo tipo'
        ]);
        DB::table('tipo_usuario')-> insert ([
            'nombre' => 'Maestro',
            'descripcion' => 'Usuario que solo puede consultar las clases que tiene que impartir y los alumnos que se registraron a ella'
        ]);
    }
}
