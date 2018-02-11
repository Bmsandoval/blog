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
Route::get('/create', 'PostsController@create')->name('posts.create')->middleware('auth');
Route::post('/posts', 'PostsController@store')->name('posts.store')->middleware('auth');
// Read
Route::get('/posts/{post}', 'PostsController@show')->where('post','[0-9\-]+')->name('posts.read');
// Update
Route::get('/posts/{post}/edit', 'PostsController@edit')->where('post','[0-9\-]+')->name('posts.edit')->middleware('auth');
Route::patch('/posts/{id}/update', 'PostsController@update')->where('post','[0-9\-]+')->name('posts.update')->middleware('auth');
// Delete
// TODO: uncomment following line once users are enabled
//Route::delete('/posts/{id}/delete', 'PostsController@destroy')->where('id','[0-9\-]+')->name('posts.delete')->middleware('auth');
// List
Route::get('/posts', 'PostsController@index')->name('posts.index');
//endregion

Route::get('login', ['as'=>'login', 'uses'=> 'Auth\LoginController@showLogin']);

// route to process the form
Route::post('dologin', ['as'=>'dologin','uses' => 'Auth\LoginController@doLogin']);

Route::get('logout', ['as'=>'logout','uses' => 'Auth\LoginController@doLogout']);


Route::view('/about', 'main.about');

Route::view('/', 'main.cover');




