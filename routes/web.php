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
//前台页面
Route::get('/', 'Web\WebController@index');
Route::get('about', 'Web\WebController@about');


//工具
Route::any('git_pull', 'Tooling\ToolingController@get_pull');
