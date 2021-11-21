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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::auth();

Route::get('/', 'HomeController@index');

Route::get('/user', 'UserController@index');

Route::get('/select', 'SelectController@index');

Route::get('/option', 'OptionController@index');

Route::get('/depot', 'DepotController@index');

Route::get('/product', 'ProductController@index');

Route::get('/painter', 'PainterController@index');

Route::get('/dealer', 'DealerController@index');

Route::get('/crm', 'CrmAuthController@index');
Route::get('/crm/create', 'CrmController@create');
Route::post('/crm', 'CrmController@store');

Route::group([ 'middleware' => 'can:admin-access'], function () {

	Route::get('/user/{id}/edit', 'UserController@edit');
	Route::put('/user/{id}', 'UserController@update');

	Route::get('/select/create', 'SelectController@create');
	Route::post('/select', 'SelectController@store');
	Route::get('/select/{id}/edit', 'SelectController@edit');
	Route::put('/select/{id}', 'SelectController@update');

	Route::get('/option/create', 'OptionController@create');
	Route::post('/option', 'OptionController@store');
	Route::get('/option/{id}/edit', 'OptionController@edit');
	Route::put('/option/{id}', 'OptionController@update');

	Route::get('/depot/create', 'DepotController@create');
	Route::post('/depot', 'DepotController@store');
	Route::get('/depot/{id}/edit', 'DepotController@edit');
	Route::put('/depot/{id}', 'DepotController@update');

	Route::get('/product/create', 'ProductController@create');
	Route::post('/product', 'ProductController@store');
	Route::get('/product/{id}/edit', 'ProductController@edit');
	Route::put('/product/{id}', 'ProductController@update');

	Route::get('/painter/create', 'PainterController@create');
	Route::post('/painter', 'PainterController@store');
	Route::get('/painter/{id}/edit', 'PainterController@edit');
	Route::put('/painter/{id}', 'PainterController@update');
	Route::get('/painter/{id}/details', 'PainterController@details');

	Route::get('/dealer/create', 'DealerController@create');
	Route::post('/dealer', 'DealerController@store');
	Route::get('/dealer/{id}/edit', 'DealerController@edit');
	Route::put('/dealer/{id}', 'DealerController@update');
	Route::get('/dealer/{id}/details', 'DealerController@details');
});

Route::group([ 'middleware' => 'can:agent-access'], function () {
	Route::get('/relation/create', 'RelationController@create');
	Route::get('/get-point', 'RelationController@getPoint');
	Route::post('/relation', 'RelationController@store');
});