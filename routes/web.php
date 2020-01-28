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

// route::get('libros', 'BookController@index');
// route::get('libros/{id}', 'BookController@show')->where(['id' => '[0-9]+']);
// route::get('libros/crear', 'BookController@create');
// route::post('libros/crear','BookController@store');
route::get('Two','TwoController@index');
route::post('Insertar','TwoController@Insertar');
Route::get('Two/borrar/{id}','TwoController@Borrar');
Route::post('Two/editar/{id}','TwoController@Editar');
Route::get('Load','TwoController@Load');

