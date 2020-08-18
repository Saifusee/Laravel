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

Route::get('greet', 'PracticeController@greet');
Route::get('data', 'PracticeController@database');
Route::get('create', 'PracticeController@create');
Route::get('data/{id}', 'PracticeController@dataid');
Route::get('greet/{id}', 'PracticeController@id');

