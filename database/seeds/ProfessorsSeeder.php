<?php

use App\User;
use Illuminate\Database\Seeder;

class ProfessorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Profesor 01',
            'code' => 'P0001',
            'email' => 'p1@p.com',
            'faculties_id' => '1',
            'password' => bcrypt('123456'), // secret
            'remember_token' => 'P0001f34th3r',
        ]);
        User::create([
            'name' => 'Profesor 02',
            'code' => 'P0002',
            'email' => 'p2@p.com',
            'faculties_id' => '3',
            'password' => bcrypt('123456'), // secret
            'remember_token' => 'P0002f34th3r',
        ]);
        User::create([
            'name' => 'Profesor 03',
            'code' => 'P0003',
            'email' => 'p3@p.com',
            'faculties_id' => '3',
            'password' => bcrypt('123456'), // secret
            'remember_token' => 'P0003f34th3r',
        ]);
        User::create([
            'name' => 'Profesor 04',
            'code' => 'P0004',
            'email' => 'p4@p.com',
            'faculties_id' => '4',
            'password' => bcrypt('123456'), // secret
            'remember_token' => 'P0004f34th3r',
        ]);
        User::create([
            'name' => 'Profesor 05',
            'code' => 'P0005',
            'email' => 'p5@p.com',
            'faculties_id' => '5',
            'password' => bcrypt('123456'), // secret
            'remember_token' => 'P0005f34th3r',
        ]);
        User::create([
            'name' => 'Profesor 06',
            'code' => 'P0006',
            'email' => 'p6@p.com',
            'faculties_id' => '6',
            'password' => bcrypt('123456'), // secret
            'remember_token' => 'P0006f34th3r',
        ]);
        User::create([
            'name' => 'Profesor 07',
            'code' => 'P0007',
            'email' => 'p7@p.com',
            'faculties_id' => '7',
            'password' => bcrypt('123456'), // secret
            'remember_token' => 'P0007f34th3r',
        ]);
        User::create([
            'name' => 'Profesor 08',
            'code' => 'P0008',
            'email' => 'p8@p.com',
            'faculties_id' => '8',
            'password' => bcrypt('123456'), // secret
            'remember_token' => 'P0008f34th3r',
        ]);

    }
}
