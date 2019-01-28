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
    return view('welcome');
});

Auth::routes();

// MVC
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user', 'UserController@index')->name('user');

// API
Route::apiResource('/api/task', 'Services\TaskService');
Route::apiResource('/api/user', 'Services\UserService');
