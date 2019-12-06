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

Route::get('diaries/create', 'DiaryController@add')->middleware('auth');
Route::post('diaries/create', 'DiaryController@create')->middleware('auth');
Route::get('/profile', 'ProfileController@add')->middleware('auth');
Route::post('profile/edit', 'ProfileController@update')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


