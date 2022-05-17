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
            'imagen' => '/images/user.png',
            'nombre' => 'Alex',
            'RFC' => 'OTELDE',
            'fecha_nacimiento' => '2000-12-31',
            'domicilio' => 'Alvaro Obregon',
            'telefono' => '37777777',
            'correo' => 'ola@test.com',
            'sueldo' => 8000,
            'fecha_ingreso' => '2022-04-28',
            'NSS' => 'PLEOWL',
            'password' => Hash::make('12345'),
            'id_tipoUsuario' => 1
        ]);

        DB::table('empleados')-> insert ([
            'id' => 2,
            'imagen' => '/images/user.png',
            'nombre' => 'Carlos Daniel Medina Sahagún',
            'RFC' => 'MESC99101',
            'fecha_nacimiento' => '1999-10-17',
            'domicilio' => 'Patria 1378',
            'telefono' => '3333222191',
            'correo' => 'carlos@test.com',
            'sueldo' => 9000,
            'fecha_ingreso' => '2022-04-29',
            'NSS' => 'DFDSAD',
            'password' => Hash::make('12345'),
            'id_tipoUsuario' => 1
        ]);
        DB::table('empleados')-> insert ([
            'id' => 3,
            'imagen' => '/images/user.png',
            'nombre' => 'Carlos Daniel Sahagún',
            'RFC' => 'MESC4232',
            'fecha_nacimiento' => '1998-10-17',
            'domicilio' => 'Patria #1',
            'telefono' => '3333221191',
            'correo' => 'carlos2@test.com',
            'sueldo' => 6000,
            'fecha_ingreso' => '2022-04-20',
            'NSS' => 'irutjieke',
            'password' => Hash::make('12345'),
            'id_tipoUsuario' => 2
        ]);
        DB::table('empleados')-> insert ([
            'id' => 4,
            'imagen' => '/images/user.png',
            'nombre' => 'Carlos Daniel Medina',
            'RFC' => 'MESC324234',
            'fecha_nacimiento' => '1997-10-17',
            'domicilio' => 'Patria #78',
            'telefono' => '3333229188',
            'correo' => 'carlos3@test.com',
            'sueldo' => 1000,
            'fecha_ingreso' => '2022-04-18',
            'NSS' => 'OEIKROEKO',
            'password' => Hash::make('12345'),
            'id_tipoUsuario' => 3
        ]);
        DB::table('empleados')-> insert ([
            'id' => 5,
            'imagen' => '/images/user.png',
            'nombre' => 'Diego Alejandro Medina Sahagun',
            'RFC' => 'MESC324245',
            'fecha_nacimiento' => '1997-10-29',
            'domicilio' => 'Patria #21',
            'telefono' => '3333221234',
            'correo' => 'diego@test.com',
            'sueldo' => 7000,
            'fecha_ingreso' => '2022-04-04',
            'NSS' => 'OERIOWLELR',
            'password' => Hash::make('12345'),
            'id_tipoUsuario' => 3
        ]);

    }
}
