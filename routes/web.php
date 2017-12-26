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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clientes', 'ClientController@list')->name('list_clients');
Route::get('/clientes/nuevo', 'ClientController@create')->name('create_client');
Route::post('/clientes/nuevo', 'ClientController@submitCreate')->name('submit_create_client');
Route::get('/clientes/{client_id}', 'ClientController@show')->name('show_client');
Route::get('/clientes/{client_id}/editar', 'ClientController@edit')->name('edit_client');
Route::post('/clientes/{client_id}/editar', 'ClientController@submitEdit')->name('submit_edit_client');
