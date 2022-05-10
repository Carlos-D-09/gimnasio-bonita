<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembresiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('membresia')-> insert ([
            'id' => 1,
            'Nombre' => 'Membresia premium',
            'Duracion' => 15,
            'costo' => 1000
        ]);	
        
        DB::table('membresia')-> insert ([
            'id' => 2,
            'Nombre' => 'Membresia premium',
            'Duracion' => 10,
            'costo' => 700
        ]);	

        DB::table('membresia')-> insert ([
            'id' => 3,
            'Nombre' => 'Membresia premium',
            'Duracion' => 30,
            'costo' => 2000
        ]);	
    }
}
