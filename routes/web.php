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

//Authors

Route::get('/authors', 'AuthorsController@index');
Route::get('/authors/{id}', 'AuthorsController@show');
Route::delete('/authors/{id}', 'AuthorsController@destroy');
Route::post('/authors', 'AuthorsController@store');
Route::put('/authors/{id}', 'AuthorsController@update');

//Books
Route::get('/books', 'BooksController@index');