<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfertaActvidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oferta_actvidades', function (Blueprint $table) {
            $table->id();
            $table->time('horaInicio');
            $table->time('horaFin');
            $table->integer('cuposTotales');
            // $table->foreignId("id_empleado")
            //     ->references("id")->on("empleados")
            //     ->onDelete("cascade")
            //     ->onUpdate("cascade");
            // $table->foreignId("id_clases")
            //     ->references("id")->on("clases")
            //     ->onDelete("cascade")
            //     ->onUpdate("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oferta_actvidades');
    }
}
