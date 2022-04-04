<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OfertaActividades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oferta_actividades', function (Blueprint $table) {
            $table->id();
            $table->time('horaInicio');
            $table->time('horaFin');
            $table->smallInteger('cupos');
            $table->unsignedBigInteger('id_empleado');
            $table->unsignedBigInteger('id_clase');
            $table->foreign("id_empleado")
                ->references("id")->on("empleados");
            $table->foreign("id_clase")
                ->references("id")->on("clases");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}