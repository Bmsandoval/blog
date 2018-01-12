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

Route::get('/posts', 'PostsController@index');

Route::get('/posts/{post}', 'PostsController@show');
Route::get('/', function () {
    $items = DB::table('items')->get();
    return view('welcome',[
        'items' => $items,
    ]);
});




