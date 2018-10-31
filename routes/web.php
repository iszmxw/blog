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
    dump("欢迎来到追梦小窝的博客！");
    return view('web.default_template.index');
});
//工具
Route::any('git_pull', 'Tooling\ToolingController@get_pull');
