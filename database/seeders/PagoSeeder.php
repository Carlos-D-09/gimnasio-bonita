<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() //ejemplo de un seeder de pago
    {
        DB::table('pagos')-> insert ([
            'id' => 1,
            'fecha' => '2022-05-09',
            'dias' => 15,
            'monto' => 1000,
            'id_membresia' => 1,
            'id_empleado' => 1,
            'id_cliente' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('pagos')-> insert ([
            'id' => 2,
            'fecha' => '2022-05-09',
            'dias' => 10,
            'monto' => 700,
            'id_membresia' => 2,
            'id_empleado' => 1,
            'id_cliente' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
