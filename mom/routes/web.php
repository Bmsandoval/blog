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

Route::get('/items', 'ItemsController@index');

Route::get('/items/{item}', 'ItemsController@show');


//region Posts CRUDL
// Create
Route::get('/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
// Read
Route::get('/posts/{post}', 'PostsController@show')->where('post','[0-9\-]+');
// Update
Route::get('/posts/{post}/edit', 'PostsController@edit')->where('post','[0-9\-]+');
Route::patch('/posts/{post}/update', 'PostsController@update')->where('post','[0-9\-]+');
// Delete
Route::delete('/posts/{post}/delete', 'PostsController@destroy')->where('post','[0-9\-]+');
// List
Route::get('/posts', 'PostsController@index');
//endregion

Route::view('/about', 'main.about');

Route::view('/', 'main.cover');




