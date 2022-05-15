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
            $table->string('imagen',250); /*Si*/
            $table->string('nombre', 150);/*Si*/
            $table->char('RFC',14)->unique();
            $table->date('fecha_nacimiento'); /*Si*/
            $table->string('domicilio'); /*Si*/
            $table->string('telefono', 13); /*Si*/
            $table->string('correo', 50)->unique(); /*Si*/
            $table->double('sueldo', 8, 2); /*Si*/
            $table->date('fecha_ingreso'); /*Si*/
            $table->char('NSS',11)->unique(); /*Si*/
            $table->string('password',150);
            $table->unsignedBigInteger('id_tipoUsuario'); /*Si*/
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
