<?php

use App\PermissionRole;
use App\PermissionUser;
use App\RoleUser;
use App\User;
use Caffeinated\Shinobi\Models\Role;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Feather
        User::create([
            'name' => 'Feather',
            'code' => '3117',
            'email' => 'feather@feather.com',
            'password' => bcrypt('123456'), // secret
            'remember_token' => '3117f34th3r',
        ]);
        //Admin
        User::create([
            'name' => 'Feather Admin',
            'code' => 'A3117',
            'email' => 'admin@feather.com',
            'password' => bcrypt('123456'), // secret
            'remember_token' => 'A3117f34th3r',
        ]);
        //Student
        User::create([
            'name' => 'Feather Student',
            'code' => 'S3117',
            'email' => 'student@feather.com',
            'password' => bcrypt('123456'), // secret
            'remember_token' => 'S117f34th3r',
        ]);
        //Professor
        User::create([
            'name' => 'Feather Professor',
            'code' => 'P3117',
            'email' => 'professor@feather.com',
            'password' => bcrypt('123456'), // secret
            'remember_token' => 'P117f34th3r',
        ]);
        //Guest
        User::create([
            'name' => 'Feather Guest',
            'code' => 'G3117',
            'email' => 'guest@feather.com',
            'password' => bcrypt('123456'), // secret
            'remember_token' => 'G117f34th3r',
        ]);

        // Professors Seeder

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

        // Students Seeder

        User::create([
            'name' => 'Student 01',
            'code' => 'S0001',
            'email' => 's1@s.com',
            'faculties_id' => '1',
            'password' => bcrypt('123456'), // secret
            'remember_token' => 'S0001f34th3r',
        ]);
        User::create([
            'name' => 'Student 02',
            'code' => 'S0002',
            'email' => 's2@s.com',
            'faculties_id' => '3',
            'password' => bcrypt('123456'), // secret
            'remember_token' => 'S0002f34th3r',
        ]);
        User::create([
            'name' => 'Student 03',
            'code' => 'S0003',
            'email' => 's3@s.com',
            'faculties_id' => '3',
            'password' => bcrypt('123456'), // secret
            'remember_token' => 'S0003f34th3r',
        ]);
        User::create([
            'name' => 'Student 04',
            'code' => 'S0004',
            'email' => 's4@s.com',
            'faculties_id' => '4',
            'password' => bcrypt('123456'), // secret
            'remember_token' => 'S0004f34th3r',
        ]);
        User::create([
            'name' => 'Student 05',
            'code' => 'S0005',
            'email' => 's5@s.com',
            'faculties_id' => '5',
            'password' => bcrypt('123456'), // secret
            'remember_token' => 'S0005f34th3r',
        ]);
        User::create([
            'name' => 'Student 06',
            'code' => 'S0006',
            'email' => 's6@s.com',
            'faculties_id' => '6',
            'password' => bcrypt('123456'), // secret
            'remember_token' => 'S0006f34th3r',
        ]);
        User::create([
            'name' => 'Student 07',
            'code' => 'S0007',
            'email' => 's7@s.com',
            'faculties_id' => '7',
            'password' => bcrypt('123456'), // secret
            'remember_token' => 'S0007f34th3r',
        ]);
        User::create([
            'name' => 'Student 08',
            'code' => 'S0008',
            'email' => 's8@s.com',
            'faculties_id' => '8',
            'password' => bcrypt('123456'), // secret
            'remember_token' => 'S0008f34th3r',
        ]);

        //Roles
        Role::create([
            'name' => 'Feather',
            'slug' => 'feather',
            'special' => 'all-access',
        ]);
        Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
        ]);
        Role::create([
            'name' => 'Student',
            'slug' => 'student',
        ]);
        Role::create([
            'name' => 'Professor',
            'slug' => 'professor',
        ]);
        Role::create([
            'name' => 'Guest',
            'slug' => 'guest',
        ]);
        // Feather
        RoleUser::create([
            'role_id' => 1,
            'user_id' => 1,
        ]);
        // Admin
        RoleUser::create([
            'role_id' => 2,
            'user_id' => 2,
        ]);
        // Student
        RoleUser::create([
            'role_id' => 3,
            'user_id' => 3,
        ]);
        // Professor
        RoleUser::create([
            'role_id' => 4,
            'user_id' => 4,
        ]);
        // Guest
        RoleUser::create([
            'role_id' => 5,
            'user_id' => 5,
        ]);

        // Admin
        PermissionRole::create([
           'permission_id' => 1,
           'role_id' => 2,
        ]);
        // Student
        PermissionRole::create([
            'permission_id' => 2,
            'role_id' => 3,
        ]);
        // Professor
        PermissionRole::create([
            'permission_id' => 3,
            'role_id' => 4,
        ]);
        // Guest
        PermissionRole::create([
            'permission_id' => 4,
            'role_id' => 5,
        ]);
        $const = \Caffeinated\Shinobi\Models\Permission::get();
        for ($i = 5; $i <= count($const); $i++ ){
            PermissionUser::create([
                'permission_id' => $i,
                'user_id' => 2,
            ]);
        };
    }
}
