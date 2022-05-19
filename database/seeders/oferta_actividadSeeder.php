<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\oferta_actividades;

class oferta_actividadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oferta_actividades')-> insert ([
            'id' => 1,
            'horaInicio' => '18:00:00',
            'horaFin' => '20:00:00',
            'dia' => 'lunes',
            'cupos' => 20,
            'costo' => 1500,
            'id_empleado' => 5,
            'id_clase' => 1,
            'status' => 'activo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('oferta_actividades')-> insert ([
            'id' => 2,
            'horaInicio' => '14:00:00',
            'horaFin' => '16:00:00',
            'dia' => 'miercoles',
            'cupos' => 15,
            'costo' => 500,
            'id_empleado' => 4,
            'id_clase' => 2,
            'status' => 'activo',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        /*$table->id();
            $table->time('horaInicio');
            $table->time('horaFin');
            $table->string('dia');
            $table->smallInteger('cupos');
            $table->double('costo',8,2);
            $table->unsignedBigInteger('id_empleado');
            $table->unsignedBigInteger('id_clase');
            $table->foreign("id_empleado")
                ->references("id")->on("empleados")->constrained();
            $table->foreign("id_clase")
                ->references("id")->on("clases")->constrained()->onDelete('cascade');
            $table->string('status'); */
    }
}
