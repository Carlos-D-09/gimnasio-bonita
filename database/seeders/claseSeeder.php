<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\clase;

class claseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clases')-> insert ([
            'id' => 1,
            'imagen' => '/images/user.png',
            'nombre' => 'Gimnasia',
            'descripcion' => 'Clase de gimnasia asignada por deportistas profesionales',
            'status' => 'activo', //es activo o inactivo
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('clases')-> insert ([
            'id' => 2,
            'imagen' => '/images/user.png',
            'nombre' => 'Natacion',
            'descripcion' => 'Natacion',
            'status' => 'activo', //es activo o inactivo
            'created_at' => now(),
            'updated_at' => now()
        ]);

        /*$table->id();
            $table->string('imagen',250);
            $table->string('nombre', 150);
            $table->string('descripcion', 300);
            $table->string('status');
            */
        // clase::factory(5)->create();
    }
}
