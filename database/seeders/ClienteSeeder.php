<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert([
            'id' => 1,
            'nombre' => 'Carlos Daniel Medina Sahagún',
            'fecha_nacimiento' => '1999-10-17',
            'domicilio' => 'Patria 1374',
            'telefono' => '3333221191',
            'correo' => 'carlosCliente1@test.com',
            'fecha_registro' => now(),
            'status' => 1,
            'password' => Hash::make('12345'),
            'id_empleado' => 1
        ]);
        DB::table('clientes')->insert([
            'id' => 2,
            'nombre' => 'Carlos Daniel Medina Sahagún',
            'fecha_nacimiento' => '1998-10-17',
            'domicilio' => 'Patria 1373',
            'telefono' => '3333221197',
            'correo' => 'carlosCliente2@test.com',
            'fecha_registro' => now(),
            'status' => 1,
            'password' => Hash::make('12345'),
            'id_empleado' => 2
        ]);
    }
}
