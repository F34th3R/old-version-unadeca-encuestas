<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
             PermissionsSeeder::class,
             UsersSeeder::class,
             TitlesSeeder::class,
             QuestionsSeeder::class,
             QuestionsTitlesSeeder::class,
             QuartersSeeder::class,
             PollsSeeder::class,
             PollsQuestionsSeeder::class,
//             PollsQuestionsVotesSeeder::class, //
             FacultiesSeeder::class,
             MattersSeeder::class,
         ]);
    }
}
