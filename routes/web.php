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
// 前台页面
Route::group(['middleware' => 'web_common', 'namespace' => 'Web'], function () {

    // 新版
    if (env('APP_ENV') === 'example') {
        Route::get('/', 'SiteController@index');
        Route::get('time', 'SiteController@time');
        Route::get('article/{article_id}', 'SiteController@article');
        Route::get('category/{category_id}', 'SiteController@category');
        Route::get('about', 'SiteController@about');

        Route::group(['prefix' => 'blog'], function () {
            // api
            Route::group(['prefix' => 'api'], function () {
                Route::any('comment', 'SiteController@comment_api');
            });
        });
    } else {
        // 旧版网站
        Route::get('/', 'WebController@index');
        Route::get('article/{article_id}', 'WebController@article');
        Route::get('category/{category_id}', 'WebController@category');
        Route::get('about', 'WebController@about');
        Route::group(['prefix' => 'blog'], function () {
            // api
            Route::group(['prefix' => 'api'], function () {
                Route::any('comment', 'WebController@comment_api');
            });
        });
    }

    // 粉丝墙
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


// 工具==>钩子pull更新代码
Route::any('git_pull', function () {
    exec("cd /home/wwwroot/blog_54zm_com && git pull", $res);
    dump($res);
});

/**
 * 杂七杂八测试
 */
Route::get('iszmxw/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('bomb', 'Web\WebController@bomb');

Route::get('images', 'Web\WebController@images');
// mp3
Route::any('mp3', 'Web\IszmxwController@mp3');
// photo
Route::any('photo/getPhoto', 'Web\IszmxwController@photo');