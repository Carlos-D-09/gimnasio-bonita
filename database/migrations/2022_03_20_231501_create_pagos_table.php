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
            $table->string('Nombre',100);
            $table->date('fecha');
            $table->integer('dias')->NULL;
            $table->double('monto',8,2);
        //     $table->foreignId("id_membresia")
        //         ->references("id")->on("membresia")
        //         ->onDelete("cascade")
        //         ->onUpdate("cascade");
        //     $table->foreignId("id_empleado")
        //         ->references("id")->on("empleados")
        //         ->onDelete("cascade")
        //         ->onUpdate("cascade");
        //     $table->foreignId("id_cliente")
        //         ->references("id")->on("clientes")
        //         ->onDelete("cascade")
        //         ->onUpdate("cascade");
        // });
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
