<?php

use App\PermisionRole;
use Caffeinated\Shinobi\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin //
        Permission::create([
            'name' => 'Administrador',
            'slug' => 'admin',
            'description' => 'Con el poder de un administrador',
        ]);
        // Student //
        Permission::create([
            'name' => 'Estudiante',
            'slug' => 'student',
            'description' => 'Con la habilidad de ser un estudiante',
        ]);
        // Professor //
        Permission::create([
            'name' => 'Profesor',
            'slug' => 'professor',
            'description' => 'Con la habilidad de ser un profesor',
        ]);
        // Guest //
        Permission::create([
            'name' => 'Huésped',
            'slug' => 'guest',
            'description' => 'Con la habilidad de ser un profesor',
        ]);
        // Users //
//      Index
        Permission::create([
            'name' => 'Navega por los Usuarios',
            'slug' => 'users.index',
            'description' => 'Lista y navega por todos los usuarios del sistema',
        ]);
//      Show
        Permission::create([
            'name' => 'Muestra los datos de los Usuarios',
            'slug' => 'users.show',
            'description' => 'Muestra los datos de cada usuario del sistema ',
        ]);
//      Create
        Permission::create([
            'name' => 'Crear Usuarios',
            'slug' => 'users.create',
            'description' => 'Crea nuevos usuarios en el sistema',
        ]);
//      Edit
        Permission::create([
            'name' => 'Editar Usuarios',
            'slug' => 'users.edit',
            'description' => 'Edita cualquier dato de usuario en el sistema',
        ]);
//      Destroy
        Permission::create([
            'name' => 'Eliminar Usuarios',
            'slug' => 'users.destroy',
            'description' => 'Elimina cualquier usuario en el sistema',
        ]);

        // Titles //
//      Index
        Permission::create([
            'name' => 'Navega los títulos de cada encuesta',
            'slug' => 'titles.index',
            'description' => 'Lista y navega por todos los título del sistema',
        ]);
//      Show
        Permission::create([
            'name' => 'Muestra los datos de títulos de cada encuesta',
            'slug' => 'titles.show',
            'description' => 'Muestra los datos de cada título de encuesta del sistema',
        ]);
//      Create
        Permission::create([
            'name' => 'Crea títulos de encuesta',
            'slug' => 'titles.create',
            'description' => 'Crea nuevos títulos de encuesta en el sistema',
        ]);
//      Edit
        Permission::create([
            'name' => 'Edita los títulos de encuestas',
            'slug' => 'titles.edit',
            'description' => 'Edita cualquier dato del títulos de encuesta en el sistema',
        ]);
//      Destroy
        Permission::create([
            'name' => 'Elimina títulos de encuesta',
            'slug' => 'titles.destroy',
            'description' => 'Elimina cualquier título de encuesta en el sistema',
        ]);

        // Questions //
//      Index
        Permission::create([
            'name' => 'Browse the question',
            'slug' => 'questions.index',
            'description' => 'List and browse all system questions',
        ]);
//      Show
        Permission::create([
            'name' => 'Show question data',
            'slug' => 'questions.show',
            'description' => 'See in detail each question of the system',
        ]);
//      Create
        Permission::create([
            'name' => 'Create questions',
            'slug' => 'questions.create',
            'description' => 'Create new questions in the system',
        ]);
//      Edit
        Permission::create([
            'name' => 'Edit questions',
            'slug' => 'questions.edit',
            'description' => 'Edit any data of a question of the system',
        ]);
//      Destroy
        Permission::create([
            'name' => 'Destroy questions',
            'slug' => 'questions.destroy',
            'description' => 'Remove any question from the system',
        ]);

        // Polls //
//      Index
        Permission::create([
            'name' => 'Browse the polls',
            'slug' => 'polls.index',
            'description' => 'List and browse all system polls',
        ]);
//      Show
        Permission::create([
            'name' => 'Show polls data',
            'slug' => 'polls.show',
            'description' => 'See in detail each polls of the system',
        ]);
//      Create
        Permission::create([
            'name' => 'Create polls',
            'slug' => 'polls.create',
            'description' => 'Create new polls in the system',
        ]);
//      Edit
        Permission::create([
            'name' => 'Edit polls',
            'slug' => 'polls.edit',
            'description' => 'Edit any data of a polls of the system',
        ]);
//      Destroy
        Permission::create([
            'name' => 'Destroy polls',
            'slug' => 'polls.destroy',
            'description' => 'Remove any polls from the system',
        ]);

        // Results //
//      Index
        Permission::create([
            'name' => 'Browse the result',
            'slug' => 'results.index',
            'description' => 'List and browse all system results',
        ]);
//      Show
        Permission::create([
            'name' => 'Show result data',
            'slug' => 'results.show',
            'description' => 'See in detail each result of the system',
        ]);
//      Create
        Permission::create([
            'name' => 'Create results',
            'slug' => 'results.create',
            'description' => 'Create new results in the system',
        ]);
//      Edit
        Permission::create([
            'name' => 'Edit results',
            'slug' => 'results.edit',
            'description' => 'Edit any data of a results of the system',
        ]);
//      Destroy
        Permission::create([
            'name' => 'Destroy results',
            'slug' => 'results.destroy',
            'description' => 'Remove any results from the system',
        ]);

        // Daily verse //
//      Index
        Permission::create([
            'name' => 'Browse the daily verse',
            'slug' => 'daily-verses.index',
            'description' => 'List and browse all system daily verses',
        ]);
//      Show
        Permission::create([
            'name' => 'Show daily verse data',
            'slug' => 'daily-verses.show',
            'description' => 'See in detail each result of the system',
        ]);
//      Create
        Permission::create([
            'name' => 'Create daily verses',
            'slug' => 'daily-verses.create',
            'description' => 'Create new daily verse in the system',
        ]);
//      Edit
        Permission::create([
            'name' => 'Edit daily verse',
            'slug' => 'daily-verses.edit',
            'description' => 'Edit any data of a daily verse of the system',
        ]);
//      Destroy
        Permission::create([
            'name' => 'Destroy daily verse',
            'slug' => 'daily-verse.destroy',
            'description' => 'Remove any daily verse from the system',
        ]);

        // Faculties //
//      Index
        Permission::create([
            'name' => 'Browse the faculties',
            'slug' => 'faculties.index',
            'description' => 'List and browse all system faculties',
        ]);
//      Show
        Permission::create([
            'name' => 'Show faculty data',
            'slug' => 'faculties.show',
            'description' => 'See in detail each faculty of the system',
        ]);
//      Create
        Permission::create([
            'name' => 'Create faculty',
            'slug' => 'faculties.create',
            'description' => 'Create new daily faculty in the system',
        ]);
//      Edit
        Permission::create([
            'name' => 'Edit faculty',
            'slug' => 'faculties.edit',
            'description' => 'Edit any data of a faculty of the system',
        ]);
//      Destroy
        Permission::create([
            'name' => 'Destroy faculty',
            'slug' => 'faculties.destroy',
            'description' => 'Remove any faculty from the system',
        ]);

        // Subjects //
//      Index
        Permission::create([
            'name' => 'Browse the subjects',
            'slug' => 'subjects.index',
            'description' => 'List and browse all system subjects',
        ]);
//      Show
        Permission::create([
            'name' => 'Show subject data',
            'slug' => 'subjects.show',
            'description' => 'See in detail each subjects of the system',
        ]);
//      Create
        Permission::create([
            'name' => 'Create subject',
            'slug' => 'subjects.create',
            'description' => 'Create new subject in the system',
        ]);
//      Edit
        Permission::create([
            'name' => 'Edit subject',
            'slug' => 'subjects.edit',
            'description' => 'Edit any data of a subject of the system',
        ]);
//      Destroy
        Permission::create([
            'name' => 'Destroy subject',
            'slug' => 'subjects.destroy',
            'description' => 'Remove any subject from the system',
        ]);

        // Roles //
//      Index
        Permission::create([
            'name' => 'Browse the roles',
            'slug' => 'roles.index',
            'description' => 'List and browse all system roles',
        ]);
//      Show
        Permission::create([
            'name' => 'Show role data',
            'slug' => 'roles.show',
            'description' => 'See in detail each roles of the system',
        ]);
//      Create
        Permission::create([
            'name' => 'Create role',
            'slug' => 'roles.create',
            'description' => 'Create new role in the system',
        ]);
//      Edit
        Permission::create([
            'name' => 'Edit role',
            'slug' => 'roles.edit',
            'description' => 'Edit any data of a role of the system',
        ]);
//      Destroy
        Permission::create([
            'name' => 'Destroy role',
            'slug' => 'roles.destroy',
            'description' => 'Remove any role from the system',
        ]);

        // Permissions //
//      Index
        Permission::create([
            'name' => 'Browse the permissions',
            'slug' => 'permissions.index',
            'description' => 'List and browse all system permissions',
        ]);
//      Show
        Permission::create([
            'name' => 'Show permission data',
            'slug' => 'permissions.show',
            'description' => 'See in detail each permissions of the system',
        ]);
//      Create
        Permission::create([
            'name' => 'Create permission',
            'slug' => 'permissions.create',
            'description' => 'Create new permission in the system',
        ]);
//      Edit
        Permission::create([
            'name' => 'Edit permission',
            'slug' => 'permissions.edit',
            'description' => 'Edit any data of a permission of the system',
        ]);
//      Destroy
        Permission::create([
            'name' => 'Destroy permission',
            'slug' => 'permissions.destroy',
            'description' => 'Remove any permission from the system',
        ]);

        // Items (rubros) //
//      Index
        Permission::create([
            'name' => 'Browse the permissions',
            'slug' => 'rubros.index',
            'description' => 'List and browse all system permissions',
        ]);
//      Show
        Permission::create([
            'name' => 'Show permission data',
            'slug' => 'rubros.show',
            'description' => 'See in detail each permissions of the system',
        ]);
//      Create
        Permission::create([
            'name' => 'Create permission',
            'slug' => 'rubros.create',
            'description' => 'Create new permission in the system',
        ]);
//      Edit
        Permission::create([
            'name' => 'Edit permission',
            'slug' => 'rubros.edit',
            'description' => 'Edit any data of a permission of the system',
        ]);
//      Destroy
        Permission::create([
            'name' => 'Destroy permission',
            'slug' => 'rubros.destroy',
            'description' => 'Remove any permission from the system',
        ]);

        // Quarters (Cuatrimestres) //
//      Index
        Permission::create([
            'name' => 'Browse the permissions',
            'slug' => 'quarters.index',
            'description' => 'List and browse all system permissions',
        ]);
//      Show
        Permission::create([
            'name' => 'Show permission data',
            'slug' => 'quarters.show',
            'description' => 'See in detail each permissions of the system',
        ]);
//      Create
        Permission::create([
            'name' => 'Create permission',
            'slug' => 'quarters.create',
            'description' => 'Create new permission in the system',
        ]);
//      Edit
        Permission::create([
            'name' => 'Edit permission',
            'slug' => 'quarters.edit',
            'description' => 'Edit any data of a permission of the system',
        ]);
//      Destroy
        Permission::create([
            'name' => 'Destroy permission',
            'slug' => 'quarters.destroy',
            'description' => 'Remove any permission from the system',
        ]);
    }
}
