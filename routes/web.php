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
Route::group(['middleware'=>'web_common','namespace'=>'Web'],function () {
    Route::get('/', 'WebController@index');
    Route::get('article/{article_id}', 'WebController@article');
    Route::get('category/{category_id}', 'WebController@category');
    Route::get('about', 'WebController@about');


    Route::group(['prefix'=>'blog'],function () {
        //api
        Route::group(['prefix'=>'api'],function () {
            Route::any('comment', 'WebController@comment_api');
        });
    });


    Route::group(['prefix'=>'wall'], function() {
        Route::any('index', 'WallController@index');
        Route::any('register', 'WallController@register');
        Route::any('qq_login_auth', 'WallController@qq_login_auth');
        Route::any('qq_login', 'WallController@qq_login');
    });

});


//工具
Route::any('git_pull', 'Tooling\ToolingController@get_pull');
