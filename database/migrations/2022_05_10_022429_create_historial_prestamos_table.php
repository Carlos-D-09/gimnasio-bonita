<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialPrestamosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_prestamos', function (Blueprint $table) {
            $table->id();
            $table->boolean('devuelto');
            $table->unsignedBigInteger('id_equipo');
            $table->smallInteger('cantidad');
            $table->unsignedBigInteger('id_pagos_prestamos_equipo');
            $table->foreign("id_equipo")
                ->references("id")->on("equipos");
            $table->foreign("id_pagos_prestamos_equipo")
                ->references("id")->on("pagos_prestamos_equipos");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historial_prestamos');
    }
}
