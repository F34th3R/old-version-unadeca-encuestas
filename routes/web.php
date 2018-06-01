<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();
Route::get('/register', 'Auth\RegisterController@index')->name('register.index');
Route::post('/register', 'Auth\RegisterController@create')->name('register.create');
Route::post('/login', 'Auth\LoginController@loginControl')->name('login');

//logout//

Route::middleware(['auth'])->group(function (){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@redirect');
    Route::get('/home/my', 'HomeController@my')->name('home.my');
    Route::get('/home/my/{user}', 'HomeController@store')->name('home.update');

    // Users
    Route::get('users/', 'UserController@index')->name('users.index')
        ->middleware('permission:users.index');

    Route::get('users/create', 'UserController@create')->name('users.create')
        ->middleware('permission:users.create');

    Route::get('users/{user}', 'UserController@show')->name('users.show')
        ->middleware('permission:users.show');

    Route::post('users/store', 'UserController@store')->name('users.store')
        ->middleware('permission:users.create');

    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
        ->middleware('permission:users.edit');

    Route::put('users/{user}', 'UserController@update')->name('users.update')
        ->middleware('permission:users.edit');

    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
        ->middleware('permission:users.destroy');

    // Questions
    Route::get('questions/', 'QuestionController@index')->name('questions.index')
        ->middleware('permission:questions.index');

    Route::get('questions/{question}', 'QuestionController@show')->name('questions.show')
        ->middleware('permission:questions.show');

    Route::get('questions/create', 'QuestionController@create')->name('questions.create')
        ->middleware('permission:questions.create');

    Route::post('questions/store', 'QuestionController@store')->name('questions.store')
        ->middleware('permission:questions.create');

    Route::get('questions/{question}/edit', 'QuestionController@edit')->name('questions.edit')
        ->middleware('permission:questions.edit');

    Route::put('questions/{question}', 'QuestionController@update')->name('questions.update')
        ->middleware('permission:questions.edit');

    Route::delete('questions/{question}', 'QuestionController@destroy')->name('questions.destroy')
        ->middleware('permission:questions.destroy');

    //Template
    Route::get('polls/template', 'TemplateController@index')->name('polls.template.index')
        ->middleware('permission:polls.create');

    Route::get('polls/{poll}/template/create', 'TemplateController@create')->name('polls.template.create')
        ->middleware('permission:polls.create');

    Route::post('polls/template/create/intermediate', 'TemplateController@intermediate')->name('polls.template.intermediate')
        ->middleware('permission:polls.create');

    Route::post('polls/template/store', 'TemplateController@store')->name('polls.template.store')
        ->middleware('permission:polls.create');

    // Polls
    Route::get('polls/', 'PollController@index')->name('polls.index')
        ->middleware('permission:polls.index');

    Route::get('polls/create', 'PollController@create')->name('polls.create')
        ->middleware('permission:polls.create');

    Route::get('polls/{poll}', 'PollController@show')->name('polls.show')
        ->middleware('permission:polls.show');

    Route::post('polls/store', 'PollController@store')->name('questions.store')
        ->middleware('permission:polls.create');

    Route::get('polls/{poll}/edit', 'PollController@edit')->name('polls.edit')
        ->middleware('permission:polls.edit');

    Route::put('polls/{poll}', 'PollController@update')->name('polls.update')
        ->middleware('permission:polls.edit');

    Route::delete('polls/{poll}', 'PollController@destroy')->name('polls.destroy')
        ->middleware('permission:polls.destroy');

    // Do polls
    Route::get('poll/', 'DoPollController@index')->name('do.polls')
        ->middleware('permission:student');

    Route::get('poll/create', 'DoPollController@create')->name('do.polls.create')
        ->middleware('permission:polls.create');

    Route::get('poll/{poll}', 'DoPollController@show')->name('do.polls.show')
        ->middleware('permission:polls.show');

    Route::post('poll/store', 'DoPollController@store')->name('do.questions.store')
        ->middleware('permission:polls.create');

    Route::get('poll/{poll}/edit', 'DoPollController@edit')->name('do.polls.edit')
        ->middleware('permission:polls.edit');

    Route::put('poll/{poll}', 'DoPollController@update')->name('do.polls.update')
        ->middleware('permission:polls.edit');

    Route::delete('poll/{poll}', 'DoPollController@destroy')->name('do.polls.destroy')
        ->middleware('permission:polls.destroy');

    // Results
//    Route::get('results/', 'TypePollController@index')->name('results.index')
//        ->middleware('permission:results.index');
//
//    Route::get('results/{result}', 'TypePollController@show')->name('results.show')
//        ->middleware('permission:results.show');
//
//    Route::get('results/create', 'TypePollController@create')->name('results.create')
//        ->middleware('permission:results.create');
//
//    Route::post('results/store', 'TypePollController@store')->name('results.store')
//        ->middleware('permission:results.create');
//
//    Route::get('results/{result}/edit', 'TypePollController@edit')->name('results.edit')
//        ->middleware('permission:results.edit');
//
//    Route::put('results/{result}', 'TypePollController@update')->name('results.update')
//        ->middleware('permission:results.edit');
//
//    Route::delete('results/{result}', 'TypePollController@destroy')->name('results.destroy')
//        ->middleware('permission:results.destroy');

    // Daily verse
    Route::get('daily-verses/', 'HomeController@index')->name('daily-verses.index')
        ->middleware('permission:daily-verses.index');

    Route::get('daily-verses/{daily-verse}', 'HomeController@show')->name('daily-verses.show')
        ->middleware('permission:daily-verses.show');

    Route::get('daily-verses/create', 'HomeController@create')->name('daily-verses.create')
        ->middleware('permission:daily-verses.create');

    Route::post('daily-verses/store', 'HomeController@store')->name('daily-verses.store')
        ->middleware('permission:daily-verses.create');

    Route::get('daily-verses/{daily-verse}/edit', 'HomeController@edit')->name('daily-verses.edit')
        ->middleware('permission:daily-verses.edit');

    Route::put('daily-verses/{daily-verse}', 'HomeController@update')->name('daily-verse.update')
        ->middleware('permission:daily-verses.edit');

    Route::delete('daily-verses/{daily-verse}', 'HomeController@destroy')->name('daily-verses.destroy')
        ->middleware('permission:daily-verse.destroy');

    // Titles
    Route::get('titles/', 'TitleController@index')->name('titles.index')
        ->middleware('permission:titles.index');

    Route::get('titles/{title}', 'TitleController@show')->name('titles.show')
        ->middleware('permission:titles.show');

    Route::get('titles/create', 'TitleController@create')->name('titles.create')
        ->middleware('permission:titles.create');

    Route::post('titles/store', 'TitleController@store')->name('titles.store')
        ->middleware('permission:titles.create');

    Route::get('titles/{title}/edit', 'TitleController@edit')->name('titles.edit')
        ->middleware('permission:titles.edit');

    Route::put('titles/{title}', 'TitleController@update')->name('titles.update')
        ->middleware('permission:titles.edit');

    Route::delete('titles/{title}', 'TitleController@destroy')->name('titles.destroy')
        ->middleware('permission:titles.destroy');

    //Faculties
    Route::get('faculties/', 'FacultyController@index')->name('faculties.index')
        ->middleware('permission:faculties.index');

    Route::get('faculties/create', 'FacultyController@create')->name('faculties.create')
        ->middleware('permission:faculties.create');

    Route::get('faculties/{faculty}', 'FacultyController@show')->name('faculties.show')
        ->middleware('permission:faculties.show');

    Route::post('faculties/store', 'FacultyController@store')->name('faculties.store')
        ->middleware('permission:faculties.create');

    Route::get('faculties/{faculty}/edit', 'FacultyController@edit')->name('faculties.edit')
        ->middleware('permission:faculties.edit');

    Route::put('faculties/{faculty}', 'FacultyController@update')->name('faculties.update')
        ->middleware('permission:faculties.edit');

    Route::delete('faculties/{faculty}', 'FacultyController@destroy')->name('faculties.destroy')
        ->middleware('permission:faculties.destroy');

    //Subjects
    Route::get('subjects/', 'SubjectController@index')->name('subjects.index')
        ->middleware('permission:subjects.index');

    Route::get('subjects/create', 'SubjectController@create')->name('subjects.create')
        ->middleware('permission:subjects.create');

    Route::get('subjects/{subject}', 'SubjectController@show')->name('subjects.show')
        ->middleware('permission:subjects.show');

    Route::post('subjects/store', 'SubjectController@store')->name('subjects.store')
        ->middleware('permission:subjects.create');

    Route::get('subjects/{subject}/edit', 'SubjectController@edit')->name('subjects.edit')
        ->middleware('permission:subjects.edit');

    Route::put('subjects/{subject}', 'SubjectController@update')->name('subjects.update')
        ->middleware('permission:subjects.edit');

    Route::delete('subjects/{subject}', 'SubjectController@destroy')->name('subjects.destroy')
        ->middleware('permission:subjects.destroy');

    // Roles
    Route::get('roles/', 'RoleController@index')->name('roles.index')
        ->middleware('permission:roles.index');

    Route::get('roles/create', 'RoleController@create')->name('roles.create')
        ->middleware('permission:roles.create');

    Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
        ->middleware('permission:roles.show');

    Route::post('roles/store', 'RoleController@store')->name('roles.store')
        ->middleware('permission:roles.create');

    Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
        ->middleware('permission:roles.edit');

    Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
        ->middleware('permission:roles.edit');

    Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
        ->middleware('permission:roles.destroy');

    // Permissions
    Route::get('permissions/', 'PermissionController@index')->name('permissions.index')
        ->middleware('permission:permissions.index');

    Route::get('permissions/create', 'PermissionController@create')->name('permissions.create')
        ->middleware('permission:permissions.create');

    Route::get('permissions/{permission}', 'PermissionController@show')->name('permissions.show')
        ->middleware('permission:permissions.show');

    Route::post('permissions/store', 'PermissionController@store')->name('permissions.store')
        ->middleware('permission:permissions.create');

    Route::get('permissions/{permission}/edit', 'PermissionController@edit')->name('permissions.edit')
        ->middleware('permission:permissions.edit');

    Route::put('permissions/{permission}', 'PermissionController@update')->name('permissions.update')
        ->middleware('permission:permissions.edit');

    Route::delete('permissions/{permission}', 'PermissionController@destroy')->name('permissions.destroy')
        ->middleware('permission:permissions.destroy');

});

