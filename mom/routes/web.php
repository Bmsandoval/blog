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
Route::get('/create', 'PostsController@create')->name('posts.create');
Route::post('/posts', 'PostsController@store')->name('posts.store');
// Read
Route::get('/posts/{post}', 'PostsController@show')->where('post','[0-9\-]+')->name('posts.read');
// Update
Route::get('/posts/{post}/edit', 'PostsController@edit')->where('post','[0-9\-]+')->name('posts.edit');
Route::patch('/posts/{id}/update', 'PostsController@update')->where('post','[0-9\-]+')->name('posts.update');
// Delete
// TODO: uncomment following line once users are enabled
//Route::delete('/posts/{id}/delete', 'PostsController@destroy')->where('id','[0-9\-]+')->name('posts.delete');
// List
Route::get('/posts', 'PostsController@index')->name('posts.index');
//endregion

Route::view('/about', 'main.about');

Route::view('/', 'main.cover');




