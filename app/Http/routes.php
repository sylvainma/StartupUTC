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

  /**
   *  Startups
   *
   */

  Route::resource('/startups', 'ApiStartupsController', ['only' => [
      'index', 'show', 'store', 'update', 'destroy'
  ]]);

  // Address
  Route::post('/startups/{id}/address', 'ApiStartupsController@storeAddress');
  Route::match(['put', 'patch'], '/startups/{id}/address', 'ApiStartupsController@updateAddress');
  Route::delete('/startups/{id}/address', 'ApiStartupsController@destroyAddress');

  // Company
  Route::post('/startups/{id}/company', 'ApiStartupsController@storeCompany');
  Route::match(['put', 'patch'], '/startups/{id}/company', 'ApiStartupsController@updateCompany');
  Route::delete('/startups/{id}/company', 'ApiStartupsController@destroyCompany');

  // Keywords
  Route::post('/startups/{id}/keywords', 'ApiStartupsController@storeKeyword');
  Route::delete('/startups/{id}/keywords/{idk}', 'ApiStartupsController@destroyKeyword');

  // Founders
  Route::post('/startups/{id}/founders', 'ApiStartupsController@storeIndividual');
  Route::delete('/startups/{id}/founders/{idi}', 'ApiStartupsController@destroyIndividual');

  /**
   *  Individuals
   *
   */
  Route::resource('/individuals', 'ApiIndividualsController', ['only' => [
     'index', 'show', 'store', 'update', 'destroy'
  ]]);

});
