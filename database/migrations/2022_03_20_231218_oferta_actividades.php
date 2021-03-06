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
            $table->string('dia');
            $table->smallInteger('cupos');
            $table->double('costo',8,2);
            $table->unsignedBigInteger('id_empleado');
            $table->unsignedBigInteger('id_clase');
            $table->foreign("id_empleado")
                ->references("id")->on("empleados")->constrained();
            $table->foreign("id_clase")
                ->references("id")->on("clases")->constrained()->onDelete('cascade');
            $table->string('status');
            $table->timestamps();
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
