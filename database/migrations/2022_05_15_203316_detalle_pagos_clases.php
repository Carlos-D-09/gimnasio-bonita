<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetallePagosClases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_pagos_clases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pago_clase');
            $table->unsignedBigInteger('id_oferta');
            $table->double('costo', 8, 2);
            $table->foreign("id_pago_clase")
                ->references("id")->on("pagos_clases");
            $table->foreign("id_oferta")
                ->references("id")->on("oferta_actividades");
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
