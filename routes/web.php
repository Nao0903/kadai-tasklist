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

Route::get('/', 'TasksController@index');

/*
Route::get('tasks/{id}', 'MessagesController@show');
Route::post('tasks','MessagesController@store');
Route::put('tasks/{id}', 'MessagesController@update');
Route::delete('tasks/{id}', 'MessagesController@destroy');

Route::get('tasks', 'MessagesController@index')->name('tasks.index');
Route::get('tasks/create', 'MessageController@create')->name('tasks.create');
Route::get('tasks/{id}/edit', 'tasksController@edit')->name('tasks.edit');
*/

Route::resource('tasks', 'TasksController');