<?php

use Illuminate\Support\Facades\Route;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

Route::get('/', function () {
    $header_title = "Welcome";
    $body_title = "Hello World!";

    //ipotetici task

    $task = Task::all();

    $data = [
        'header_title' => $header_title,
        'body_title' => $body_title,
        'tasks' => $task, // dovrebbe aggiungere task a data array
    ];
    return view('home', $data);
});

/**
 * da tutorial, aggiungere nuovo task
 */
Route::post('/task', function (Request $request) {
    // validazione input
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    // se la validazione fallisce, indietro al form
    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    // creare nuovo task
    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');
});

/**
 * Delete An Existing Task
 */
Route::delete('/task/{id}', function ($id) {
    Task::findOrFail($id)->delete();

    return redirect('/');
});


