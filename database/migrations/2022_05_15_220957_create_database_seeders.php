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

        Artisan::call('db:seed', [
            '--class' => 'claseSeeder',
        ]);
        DB::statement('SET GLOBAL FOREIGN_KEY_CHECKS=0');

        Artisan::call('db:seed', [
            '--class' => 'oferta_actividadSeeder',
        ]);
        DB::statement('SET GLOBAL FOREIGN_KEY_CHECKS=0');

        Artisan::call('db:seed', [
            '--class' => 'agendaSeeder',
        ]);
        DB::statement('SET GLOBAL FOREIGN_KEY_CHECKS=0');

        Artisan::call('db:seed', [
            '--class' => 'equipoSeeder',
        ]);
        DB::statement('SET GLOBAL FOREIGN_KEY_CHECKS=0');

        Artisan::call('db:seed', [
            '--class' => 'pagos_prestamos_equipoSeeder',
        ]);
        DB::statement('SET GLOBAL FOREIGN_KEY_CHECKS=0');

        Artisan::call('db:seed', [
            '--class' => 'pagos_claseSeeder',
        ]);
        DB::statement('SET GLOBAL FOREIGN_KEY_CHECKS=0');

        Artisan::call('db:seed', [
            '--class' => 'historial_prestamoSeeder',
        ]);
        DB::statement('SET GLOBAL FOREIGN_KEY_CHECKS=0');
    }

    /**  pagos_prestamos_equipoSeeder
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
