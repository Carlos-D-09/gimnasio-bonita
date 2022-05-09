<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\empleado;
use Illuminate\Support\Facades\Hash;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*User::create([
            'name' => 'alexander',
            'email' => 'alexander@gmail.com',
            'password' => bcrypt('12345')
        ])->assignRole('Gerente'); */

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
            'password' => Hash::make('12345'),
            'activo' => true,
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
            'NSS' => 'DFDSAD',
            'password' => Hash::make('12345'),
            'activo' => true,
            'id_tipoUsuario' => 1
        ]);
        DB::table('empleados')-> insert ([
            'id' => 3,
            'nombre' => 'Carlos Daniel Medina Sahagún',
            'RFC' => 'MESC324232',
            'fecha_nacimiento' => '1998-10-17',
            'domicilio' => 'Patria 1378',
            'telefono' => '3333221191',
            'correo' => 'carlos2@test.com',
            'sueldo' => 6000,
            'fecha_ingreso' => now(),
            'NSS' => 'dwaqrt',
            'password' => Hash::make('12345'),
            'activo' => true,
            'id_tipoUsuario' => 2
        ]);
        DB::table('empleados')-> insert ([
            'id' => 4,
            'nombre' => 'Carlos Daniel Medina Sahagún',
            'RFC' => 'MESC324234',
            'fecha_nacimiento' => '1997-10-17',
            'domicilio' => 'Patria 1378',
            'telefono' => '3333221191',
            'correo' => 'carlos3@test.com',
            'sueldo' => 6000,
            'fecha_ingreso' => now(),
            'NSS' => 'dwaqrq',
            'password' => Hash::make('12345'),
            'activo' => true,
            'id_tipoUsuario' => 3
        ]);
        DB::table('empleados')-> insert ([
            'id' => 5,
            'nombre' => 'Diego Alejandro Medina Sahagun',
            'RFC' => 'MESC324245',
            'fecha_nacimiento' => '1997-10-29',
            'domicilio' => 'Patria 1372',
            'telefono' => '3333221234',
            'correo' => 'diego@test.com',
            'sueldo' => 6000,
            'fecha_ingreso' => now(),
            'NSS' => 'dwaqrl',
            'password' => Hash::make('12345'),
            'activo' => false,
            'id_tipoUsuario' => 3
        ]);

    }
}
