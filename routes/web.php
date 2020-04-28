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
Route::group(['middleware' => 'web_common', 'namespace' => 'Web'], function () {
    Route::get('/', 'WebController@index');
    Route::get('article/{article_id}', 'WebController@article');
    Route::get('category/{category_id}', 'WebController@category');
    Route::get('about', 'WebController@about');


    Route::group(['prefix' => 'blog'], function () {
        //api
        Route::group(['prefix' => 'api'], function () {
            Route::any('comment', 'WebController@comment_api');
        });
    });


    Route::group(['prefix' => 'wall'], function () {
        Route::any('index', 'WallController@index');
        Route::any('register', 'WallController@register');
        Route::any('qq_login_auth', 'WallController@qq_login_auth');
        Route::any('qq_login', 'WallController@qq_login');
        Route::any('get_user_list', 'WallController@get_user_list');
        //小程序扫码登录状态检测
        Route::any('scan_code_status', 'WallController@scan_code_status');
        Route::any('quit', 'WallController@quit');
    });

});


//工具
Route::any('git_pull', 'Tooling\ToolingController@get_pull');


Route::get('phpinfo', function () {
//    dd("别想了，你还是做个好人吧！");
    phpinfo();
});


Route::get('iszmxw/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('bomb', 'Web\WebController@bomb');

Route::get('images', 'Web\WebController@images');