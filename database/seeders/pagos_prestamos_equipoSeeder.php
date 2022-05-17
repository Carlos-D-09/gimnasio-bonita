<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\pagos_prestamos_equipos;

class pagos_prestamos_equipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pagos_prestamos_equipos')-> insert ([
            'id' => 1,
            'fecha' => '2017-03-14',
            'total' => 100,
            'id_empleado' => 2,
            'id_cliente' => 1
        ]);
        /* $table->id();
            $table->date('fecha');
            $table->double('total',8,2);
            $table->unsignedBigInteger('id_empleado');
            $table->unsignedBigInteger('id_cliente');
            $table->foreign("id_empleado")
                ->references("id")->on("empleados");
            $table->foreign("id_cliente")
                ->references("id")->on("clientes");
        */
    }
}
