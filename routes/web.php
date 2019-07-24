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

Route::get('/', function () {
    return view('/welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/p/create','PostController@create');
Route::post('/p/store','PostController@store');
Route::get('/p/{post}','PostController@show');

Route::post('/follow/{user}','FollowController@store');

Route::get('/profile/{user}', 'ProfileController@show')->name('show');
Route::patch('/profile/{user}', 'ProfileController@update')->name('update');
Route::get('/profile/{user}/edit','ProfileController@edit');