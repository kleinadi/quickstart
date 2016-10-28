<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use App\Task;
use Illuminate\Http\Request;

/**
* Display ALL Tasks
*/
Route::get('/', 'TaskController@index');


/**
* Add a new Task
*/

Route::post('/task', 'TaskController@newTask');


/**
* Delete an existing Task
*/

Route::delete('/task/{id}', function ($id) {
    Task::findOrFail($id)->delete();

    return redirect('/');
});