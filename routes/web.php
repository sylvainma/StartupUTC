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

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/search', function () {
    return view('search');
})->name('search');

Route::resource('/startups', 'StartupController', ['only' => [
   'show', 'edit', 'update'
]]);

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
