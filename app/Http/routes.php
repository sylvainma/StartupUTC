<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'api/v1'], function() {

    Route::get('/', function () {
      return 'Hello World';
    });

    // Startups
    Route::resource('/startups', 'ApiStartupsController', ['only' => [
        'index', 'show', 'store', 'update', 'destroy'
    ]]);

    // Founders
    Route::resource('/founders', 'ApiFoundersController', ['only' => [
        'index', 'show', 'store', 'update', 'destroy'
    ]]);

});
