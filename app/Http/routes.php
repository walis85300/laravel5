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

// Sin loguearse a la vista de administrador
Route::get('/adminLogin', ['as'=>'index', 'uses'=>'WelcomeAdminController@index']);
Route::post('/adminLogin', ['as'=>'loginAdmin', 'uses'=>'WelcomeAdminController@login']);



// Vistas logueadas del sitio de administrador
Route::get('/admin', ['as'=>'admin.index', 'uses'=>'AdminController@index']);
Route::get('/logout', ['as'=>'admin.logout', 'uses'=>'AdminController@logout']);


// RUTAS DEL MODULO COLOR
Route::get('/admin/color/all',['as'=>'color.index', 'uses'=>'ColorCrudController@index']);
Route::get('/admin/color/edit/{id}',['as'=>'color.edit', 'uses'=>'ColorCrudController@edit']);
Route::put('/admin/color/edit/{id}',['as'=>'color.update', 'uses'=>'ColorCrudController@update']);
Route::get('/admin/color/create', ['as'=>'color.createGet', 'uses'=>'ColorCrudController@createGet']);
Route::post('/admin/color/create', ['as'=>'color.create', 'uses'=>'ColorCrudController@create']);
Route::delete('/admin/color/delete/{id?}',['as'=>'color.delete', 'uses'=>'ColorCrudController@destroy']);

// RUTAS DEL MODULO MARCA
Route::resource('admin/marca/', 'MarcaCrudController');
Route::get('/admin/marca/{id}/edit', ['as'=>'admin.marca.edit', 'uses'=>'MarcaCrudController@edit']);
Route::put('/admin/marca/{id}', ['as'=>'admin.marca.update', 'uses'=>'MarcaCrudController@update']);
Route::delete('/admin/marca/{id}', ['as'=>'admin.marca.delete', 'uses'=>'MarcaCrudController@destroy']);

// RUTAS DEL MODULO MODELO
Route::resource('admin/modelo', 'ModeloCrudController');

