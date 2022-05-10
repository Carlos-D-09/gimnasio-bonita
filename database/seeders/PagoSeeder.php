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
            'Nombre' => 'Pago de membresia en Gimnasio Bonita',
            'fecha' => '2022-05-09',
            'dias' => 15,
            'monto' => 1000, 	
            'id_membresia' => 1,
            'id_empleado' => 1,
            'id_cliente' => 1
        ]);

        DB::table('pagos')-> insert ([
            'id' => 2,
            'Nombre' => 'Pago de membresia en Gimnasio Bonita',
            'fecha' => '2022-05-09',
            'dias' => 10,
            'monto' => 700, 	
            'id_membresia' => 2,
            'id_empleado' => 1,
            'id_cliente' => 2
        ]);
        
    }
}
