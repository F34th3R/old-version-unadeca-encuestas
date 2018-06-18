<?php

use App\Quarter;
use Illuminate\Database\Seeder;

class QuartersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quarter::create([
            'name' => 'Primer cuatrimestre',
            'init_date' => '2018-02-01',
            'end_date' => '2018-02-28',
        ]);
        Quarter::create([
            'name' => 'Segundo cuatrimestre',
            'init_date' => '2018-03-01',
            'end_date' => '2018-03-28',
        ]);
        Quarter::create([
            'name' => 'Tercer cuatrimestre',
            'init_date' => '2018-04-01',
            'end_date' => '2018-04-28',
        ]);
    }
}
