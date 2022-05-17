<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('imagen',250);
            $table->string('nombre', 150);
            $table->date('fecha_nacimiento');
            $table->string('domicilio', 100);
            $table->string('telefono',13);
            $table->string('correo', 50);
            $table->date('fecha_registro');
            $table->boolean('status');
            $table->string('password', 150);
            $table->unsignedBigInteger('id_empleado');
            $table->foreign("id_empleado")
                ->references("id")->on("empleados");
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
        Schema::dropIfExists('clientes');
    }
}
