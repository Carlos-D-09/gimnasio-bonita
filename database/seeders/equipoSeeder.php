<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\equipos;

class equipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipos')-> insert ([
            'id' => 1,
            'nombre' => 'Pesa de 10kg',
            'descripcion' => 'Una pesa con un peso considerable para su uso',
            'unidades' => 20,
            'cost_x_renta' => 100,
            'status' => 1
        ]);

        equipos::factory(5)->create();

        /*$table->id();
            $table->string('nombre',150);
            $table->string('descripcion', 150);
            $table->integer('unidades');
            $table->double('cost_x_renta',8,2);
            $table->boolean('status'); */
    }
}
