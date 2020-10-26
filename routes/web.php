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

Route::group(['prefix' => 'admin'], function() {
    Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::get('profile/edit', 'Admin\ProfileController@edit')->middleware('auth');
    Route::get('profile/create', 'Admin\ProfileController@add')->middleware('auth');
});


// 以下、「PHP/Laravel 09 Routing」課題
// 課題１：Routing

// 課題２：同じURLを含む複数のページ（例：課題４のadmin/profile/createやadmin/profile/edit）に対して、
//         まとめて設定をすることができるという点。

// 課題３：以下のとおり回答します。
// Route::get('XXX','AAAController@bbb')
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
