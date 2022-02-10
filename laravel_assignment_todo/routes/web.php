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

// ホーム画面の表示
Route::get('/', 'HomeController@showHome')->name('show.home');
// Taskの追加
Route::post('/add', 'TaskController@add')->name('add');
