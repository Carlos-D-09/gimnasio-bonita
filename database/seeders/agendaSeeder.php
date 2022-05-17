<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\agenda;

class agendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agendas')-> insert ([
            'id_cliente' => 1,
            'id_oferta' => 1
        ]);

        /* $table->id();
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_oferta');
            $table->foreign("id_cliente")
                ->references("id")->on("clientes");
            $table->foreign("id_oferta")
                ->references("id")->on("oferta_actividades")->constrained();*/ 
    }
}
