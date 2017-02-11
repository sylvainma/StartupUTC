<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 *  REST API
 *
 */

Route::group(['prefix' => 'api/v1'], function() {

  Route::get('/', function () {
    return response()->success();
  });

  /**
   *  Recherche
   *
   */

  Route::get('/search', 'ApiSearchController@search');
  Route::post('/search', 'ApiSearchController@search2');

  /**
   *  Startups
   *
   */

  Route::get('/startups/paginate/', 'ApiStartupsController@paginate');
  Route::resource('/startups', 'ApiStartupsController', ['only' => [
      'index', 'show'
  ]]);

  // Address
  //Route::post('/startups/{id}/address', 'ApiStartupsController@storeAddress');
  //Route::match(['put', 'patch'], '/startups/{id}/address', 'ApiStartupsController@updateAddress');
  //Route::delete('/startups/{id}/address', 'ApiStartupsController@destroyAddress');

  // Keywords
  //Route::post('/startups/{id}/keywords', 'ApiStartupsController@storeKeyword');
  //Route::delete('/startups/{id}/keywords/{idk}', 'ApiStartupsController@destroyKeyword');

  // Founders
  //Route::post('/startups/{id}/founders', 'ApiStartupsController@storeIndividual');
  //Route::delete('/startups/{id}/founders/{idi}', 'ApiStartupsController@destroyIndividual');

  /**
   *  Individuals
   *
   */
  Route::resource('/individuals', 'ApiIndividualsController', ['only' => [
     'index', 'show'
  ]]);

  /**
   *  Departments
   *
   */
  Route::resource('/departments', 'ApiDepartmentsController', ['only' => [
    'index', 'show'
  ]]);

  /**
   *  Fields
   *
   */
  Route::resource('/fields', 'ApiFieldsController', ['only' => [
    'index', 'show'
  ]]);

  /**
   *  Contact
   *
   */
  Route::post('/contact', 'ApiContactController@contact');

});
