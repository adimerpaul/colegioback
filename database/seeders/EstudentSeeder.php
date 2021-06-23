<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estudents')->insert([
            'nombre'=>'JUANITO PEREZ',
            'carnet'=>'1010',
            'sexo'=>1,
            'fechanac'=>'2000-01-01'
        ]);
    }
}
