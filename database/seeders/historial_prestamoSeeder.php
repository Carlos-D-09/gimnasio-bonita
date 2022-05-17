<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\historial_prestamos;

class historial_prestamoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('historial_prestamos')-> insert ([
            'id' => 1,
            'devuelto' => true,
            'id_equipo' => 1,
            'id_pagos_prestamos_equipo' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        /* $table->id();
            $table->boolean('devuelto');
            $table->unsignedBigInteger('id_equipo');
            $table->unsignedBigInteger('id_pagos_prestamos_equipo');
            $table->foreign("id_equipo")
                ->references("id")->on("equipos");
            $table->foreign("id_pagos_prestamos_equipo")
                ->references("id")->on("pagos_prestamos_equipos");
        */
    }
}
