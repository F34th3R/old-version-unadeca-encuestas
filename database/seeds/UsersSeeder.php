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
        User::create([
            'name' => 'Feather Guest',
            'code' => 'G3117',
            'email' => 'guest@feather.com',
            'password' => bcrypt('123456'), // secret
            'remember_token' => 'G117f34th3r',
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
