<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\membresia;

class MembresiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('membresias')-> insert ([
            'id' => 1,
            'nombre' => 'Costo diario',
            'duracion' => 1,
            'costo' => 50,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        membresia::factory(10)->create();
    }
}
