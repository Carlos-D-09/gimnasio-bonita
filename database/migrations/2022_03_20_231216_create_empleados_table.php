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
            $table->char('RFC',14)->unique();
            $table->date('fecha_nacimiento');
            $table->string('domicilio');
            $table->string('telefono', 13);
            $table->string('correo', 50)->unique();
            $table->double('sueldo', 8, 2);
            $table->date('fecha_ingreso');
            $table->char('NSS',11)->unique();
            $table->string('password',150);
            $table->unsignedBigInteger('id_tipoUsuario');
            $table->foreign('id_tipoUsuario')->references("id")->on("tipo_usuario");
            $table->softDeletes();
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
