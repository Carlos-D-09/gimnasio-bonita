<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\pagos_clases;

class pagos_claseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('pagos_clases')-> insert ([
            'id' => 1,
            'fecha' => '2021-12-31',
            'total' => 1500,
            'id_cliente' => 1,
            'id_empleado' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        /*$table->id();
            $table->date('fecha');
            $table->unsignedBigInteger('id_oferta');
            $table->unsignedBigInteger('id_empleado');
            $table->foreign('id_oferta')
                ->references('id')->on('oferta_actividades');
            $table->foreign('id_empleado')
                ->references('id')->on('empleados');*/
    }
}
