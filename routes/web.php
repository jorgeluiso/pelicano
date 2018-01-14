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

/* AUTHENTICATION ROUTES *****************************************************/

Auth::routes();

Route::get('/',      'HomeController@index')->name('home');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

/* CLIENTS ROUTES ************************************************************/

Route::get('/client',                  'ClientController@list')->name('list_clients');
Route::get('/client/new',              'ClientController@create')->name('create_client');
Route::get('/client/{client_id}',      'ClientController@show')->name('show_client');
Route::get('/client/{client_id}/edit', 'ClientController@edit')->name('edit_client');

Route::post('/client/nuevo',            'ClientController@submitCreate')->name('submit_create_client');
Route::post('/client/{client_id}/edit', 'ClientController@submitEdit')->name('submit_edit_client');
