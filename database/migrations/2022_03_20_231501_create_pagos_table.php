<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->integer('dias')->NULL;
            $table->double('monto',8,2);
            $table->unsignedBigInteger('id_membresia');
            $table->unsignedBigInteger('id_empleado');
            $table->unsignedBigInteger('id_cliente');
            $table->foreign("id_membresia")
                ->references("id")->on("membresias");
            $table->foreign("id_empleado")
                ->references("id")->on("empleados");
            $table->foreign("id_cliente")
                ->references("id")->on("clientes");
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
        Schema::dropIfExists('pagos');
    }
}
