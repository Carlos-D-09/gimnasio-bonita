<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 150);
            $table->char('RFC',14);
            $table->date('fecha_nacimiento');
            $table->string('domicilio');
            $table->string('telefono', 13);
            $table->string('correo', 50);
            $table->double('sueldo', 8, 2);
            $table->date('fecha_ingreso');
            $table->char('NSS',11);
            $table->string('password',150);
            // $table->foreignId("id_tipoUsuario")
            //     ->references("id")->on("tipo_usuario")
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
        Schema::dropIfExists('empleados');
    }
}
