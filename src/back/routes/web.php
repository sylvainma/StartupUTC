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

/**
 *  Web App
 *
 */

Route::get('/', function () {
    return view('app');
});


/**
 *  REST API
 *
 */

Route::group(['prefix' => 'api/v1'], function() {

  Route::get('/', function () {
    return response()->success();
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
