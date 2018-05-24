<?php

use App\Faculty;
use Illuminate\Database\Seeder;

class FacultiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Faculty::create([
            'name' => 'General',
        ]);
        Faculty::create([
            'name' => 'Administración',
        ]);
        Faculty::create([
            'name' => 'C. Libres',
        ]);
        Faculty::create([
            'name' => 'Educación',
        ]);
        Faculty::create([
            'name' => 'Enfermería',
        ]);
        Faculty::create([
            'name' => 'Psicología',
        ]);
        Faculty::create([
            'name' => 'Ingeniería de Sistemas',
        ]);
        Faculty::create([
            'name' => 'Teología',
        ]);

//        Faculty::create([
//            'name' => 'GENERAL',
//        ]);
//        Faculty::create([
//            'name' => 'ADMINISTRACIÓN',
//        ]);
//        Faculty::create([
//            'name' => 'C.LIBRES',
//        ]);
//        Faculty::create([
//            'name' => 'EDUCACIÓN',
//        ]);
//        Faculty::create([
//            'name' => 'ENFERMERÍA',
//        ]);
//        Faculty::create([
//            'name' => 'PSICOLOGÍA',
//        ]);
//        Faculty::create([
//            'name' => 'SISTEMAS',
//        ]);
//        Faculty::create([
//            'name' => 'TEOLOGIA',
//        ]);
    }
}
