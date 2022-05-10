<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateDatabaseSeeders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Artisan::call('db:seed', [
            '--class' => 'TipoUsuario',
        ]);
        DB::statement('SET GLOBAL FOREIGN_KEY_CHECKS=0');

        Artisan::call('db:seed', [
            '--class' => 'EmpleadoSeeder',
        ]);
        DB::statement('SET GLOBAL FOREIGN_KEY_CHECKS=0');

        Artisan::call('db:seed', [
            '--class' => 'ClienteSeeder',
        ]);
        DB::statement('SET GLOBAL FOREIGN_KEY_CHECKS=0');

        Artisan::call('db:seed', [
            '--class' => 'MembresiaSeeder',
        ]);
        DB::statement('SET GLOBAL FOREIGN_KEY_CHECKS=0');

        Artisan::call('db:seed', [
            '--class' => 'PagoSeeder',
        ]);
        DB::statement('SET GLOBAL FOREIGN_KEY_CHECKS=0');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
