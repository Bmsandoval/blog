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
Route::group(['prefix' => 'posts'], function () {
    $c = 'PostsController@';
    $n = 'posts.';
    Route::middleware(['can:view,post'])->group(function () use ($c, $n) {
        // Create
        Route::get('/create', ['as'=>$n.'create','uses'=> $c.'create']);
        Route::post('/', ['as'=>$n.'store','uses'=>$c.'store']);
        Route::get('/stash', ['as'=>$n.'stash', 'uses'=>$c.'stash']);
        // Update
        Route::get('/{post}/edit', ['as'=>$n.'edit', 'uses'=>$c.'edit'])
            ->where('post','[0-9\-]+');
        Route::patch('/{id}/update', ['as'=>$n.'update', 'uses'=>$c.'update'])
            ->where('id','[0-9\-]+');
        // Delete
        //Route::delete('/{id}/delete', $c.'destroy')->where('id','[0-9\-]+')->name('delete');
    });
    // Read
    Route::get('/{post}', ['as'=>$n.'show','uses'=>$c.'show'])
        ->where('post','[0-9\-]+');
    // List
    Route::get('/', ['as'=>$n.'list', 'uses'=>$c.'list']);
});
//endregion

//region Users Routes
Route::get('/invite', 'UsersController@invite')->name('users.invite')->middleware('auth');
Route::post('/send', 'UsersController@send')->name('users.send')->middleware('auth');
// Create
Route::get('/create/{token}', 'UsersController@create')->name('users.create');
Route::post('/activate/{token}', 'UsersController@store')->name('users.store');
// Read
Route::get('/users/{user}', 'UsersController@show')->where('user','[a-zA-Z0-9]+')->name('users.read')->middleware('auth');
// Update
Route::get('/users/{user}/edit', 'UsersController@edit')->where('user','[a-zA-Z0-9]+')->name('users.edit')->middleware('auth');
Route::patch('/users/{user}/update', 'UsersController@update')->where('user','[a-zA-Z0-9]+')->name('users.update')->middleware('auth');
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
Route::view('/about', 'main.about')->name('about');
Route::view('/', 'main.cover')->name('home');
Route::view('/test', 'test')->name('test');
// endregion




