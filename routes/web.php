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

//API Authors

Route::get('api/authors', 'AuthorsController@index');
Route::get('api/authors/{id}', 'AuthorsController@show');
Route::delete('api/authors/{id}', 'AuthorsController@destroy');
Route::post('api/authors', 'AuthorsController@store');
Route::put('api/authors/{id}', 'AuthorsController@update');

//Web Authors
Route::get('/web/authors', 'AuthorsController@home');
Route::get('/web/authors/{id}', 'AuthorsController@showOneAuthor');

//API Genres
Route::get('api/genres', 'GenresController@index');

//API Books
Route::get('api/books', 'BooksController@index');
Route::get('api/books/{id}', 'BooksController@show');
Route::delete('api/books/{id}', 'BooksController@destroy');
Route::put('api/books/{id}', 'BooksController@update');
Route::post('api/books', 'BooksController@store');

//Web Books
Route::get('/web/books', 'BooksController@home');
Route::get('web/books/{id}', 'BooksController@showOneBook');
