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
Route::get('diaries/', 'DiaryController@index')->middleware('auth');

Route::get('profile/edit', 'ProfileController@edit')->middleware('auth');
Route::post('profile/edit', 'ProfileController@update')->middleware('auth');

Route::get('/timeschedules', 'TimeScheduleController@index')->middleware('auth');
Route::get('/timeschedules/create', 'TimeScheduleController@add')->middleware('auth');
Route::post('/timeschedules/create', 'TimeScheduleController@create')->middleware('auth');
Route::get('/timeschedules/edit', 'TimeScheduleController@edit')->middleware('auth');
Route::post('/timeschedules/edit', 'TimeScheduleController@update')->middleware('auth');
Route::get('/timeschedules/delete', 'TimeScheduleController@delete')->middleware('auth');


Auth::routes();



