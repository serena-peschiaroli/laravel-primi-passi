<?php

use Illuminate\Support\Facades\Route;

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

    $data = [
        'header_title' => $header_title,
        'body_title' => $body_title,
    ];
    return view('home', $data);
});
