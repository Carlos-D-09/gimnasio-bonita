<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empleados')-> insert ([
            'id' => 1,
            'nombre' => 'Alex',
            'RFC' => 'OTELDE',
            'fecha_nacimiento' => '2000-12-31',
            'domicilio' => 'Alvaro Obregon',
            'telefono' => '37777777',
            'correo' => 'ola@test.com',
            'sueldo' => 8000,
            'fecha_ingreso' => now(),
            'NSS' => 'PLEOWL',
            'password' => '123',
            'id_tipoUsuario' => 1
        ]);
        DB::table('empleados')-> insert ([
            'id' => 2,
            'nombre' => 'Carlos Daniel Medina Sahagún',
            'RFC' => 'MESC991017RF5',
            'fecha_nacimiento' => '1999-10-17',
            'domicilio' => 'Patria 1378',
            'telefono' => '3333221191',
            'correo' => 'carlos@test.com',
            'sueldo' => 8000,
            'fecha_ingreso' => now(),
            'NSS' => 'PLEOWL',
            'password' => '12345',
            'id_tipoUsuario' => 1
        ]);
    }
}
