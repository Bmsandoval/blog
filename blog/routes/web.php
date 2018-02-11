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

// region Items Routes
Route::get('/items', 'ItemsController@index');
Route::get('/items/{item}', 'ItemsController@show');
// endregion

//region Posts Routes
// Create
Route::get('/create', 'PostsController@create')->name('posts.create')->middleware('auth');
Route::post('/posts', 'PostsController@store')->name('posts.store')->middleware('auth');
// Read
Route::get('/posts/{post}', 'PostsController@show')->where('post','[0-9\-]+')->name('posts.read');
// Update
Route::get('/posts/{post}/edit', 'PostsController@edit')->where('post','[0-9\-]+')->name('posts.edit')->middleware('auth');
Route::patch('/posts/{id}/update', 'PostsController@update')->where('id','[0-9\-]+')->name('posts.update')->middleware('auth');
// Delete
// TODO: uncomment following line once users are enabled
//Route::delete('/posts/{id}/delete', 'PostsController@destroy')->where('id','[0-9\-]+')->name('posts.delete')->middleware('auth');
// List
Route::get('/posts', 'PostsController@list')->name('posts.list');
//endregion

//region Users Routes
Route::get('/invite', 'UsersController@invite')->name('users.invite')->middleware('auth');
Route::post('/send', 'UsersController@send')->name('users.send')->middleware('auth');
// Create
Route::get('/create/{token}', 'UsersController@create')->name('users.create');
Route::post('/activate/{token}', 'UsersController@store')->name('users.store');
// Read
Route::get('/users/{user}', 'UsersController@show')->where('user','[a-zA-Z0-9]+')->name('users.read')->middleware('auth');
Route::get('/users/{user}', 'UsersController@showPrivate')->where('user','[a-zA-Z0-9]+')->name('users.read')->middleware('auth');
// Update
Route::get('/users/{user}/edit', 'UsersController@edit')->where('user','[a-zA-Z0-9]+')->name('users.edit')->middleware('auth');
Route::patch('/users/{id}/update', 'UsersController@update')->where('user','[a-zA-Z0-9]+')->name('users.update')->middleware('auth');
// Delete
// TODO: maybe, not sure if I want this power outside direct db access
//Route::delete('/users/{id}/delete', 'UsersController@destroy')->where('id','[0-9\-]+')->name('users.delete')->middleware('auth');
// List
Route::get('/users', 'UsersController@list')->name('users.list');
//endregion

// region Auth Routes
Route::get('login', ['as'=>'login', 'uses'=> 'Auth\LoginController@showLogin']);
Route::post('dologin', ['as'=>'dologin','uses' => 'Auth\LoginController@doLogin']);
Route::get('logout', ['as'=>'logout','uses' => 'Auth\LoginController@doLogout']);
// endregion

// region Basic Routes
Route::view('/about', 'main.about');
Route::view('/', 'main.cover');
// endregion




