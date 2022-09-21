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
//トップページ / をTasksControllerのindexアクションに設定するという内容
Route::get('/', 'TasksController@index');


/*
//トップページ / をTasksControllerのindexアクションに設定するという内容
Route::get('/', function() {
    return view('welcome');
});
*/



/*
Route::get('tasks/{id}', 'TasksController@show');
Route::post('tasks','TasksController@store');
Route::put('tasks/{id}', 'TasksController@update');
Route::delete('tasks/{id}', 'TasksController@destroy');

Route::get('tasks', 'TasksController@index')->name('tasks.index');
Route::get('tasks/create', 'TasksController@create')->name('tasks.create');
Route::get('tasks/{id}/edit', 'tasksController@edit')->name('tasks.edit');
*/

//上記7つのルーターを以下resourseに纏めている
Route::resource('tasks', 'TasksController');


// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

//ユーザー認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

//ユーザー認証していれば、登録のstoreと削除のdestroyのみ実行できる。
Route::group(['middleware' => ['auth']], function () {
    Route::resource('tasks', 'TasksController', ['only' => ['store', 'destroy']]);
    
});