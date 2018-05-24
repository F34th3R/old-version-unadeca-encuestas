<?php

use App\Title;
use Illuminate\Database\Seeder;

class TitlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Title::create([
            'title' => 'Autoevaluación de las actividades docentes',
        ]);

        Title::create([
            'title' => 'Evaluación de la actividad docente por parte de los colegas',
        ]);

        Title::create([
            'title' => 'Evaluación de la actividad docente por parte de los directores de escuela',
        ]);

        Title::create([
            'title' => 'Evaluación de la actividad docente por parte de los directores de escuela profesor contrato',
        ]);

        Title::create([
            'title' => 'Opinión estudiantil de la actividad docente',
        ]);
    }
}
