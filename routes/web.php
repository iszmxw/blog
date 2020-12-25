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

    Route::get('/', 'SiteController@index');
    Route::get('time', 'SiteController@time');
    Route::get('category', 'SiteController@category');
    Route::get('category/{category_id}', 'SiteController@category_article');
    Route::get('photo_list', 'SiteController@photo_list');
    // 友情链接页面
    Route::get('link', 'SiteController@link');
    // 文章详情页面
    Route::get('article/{article_id}', 'SiteController@article');
    // 获取文章数据
    Route::post('article/{article_id}', 'SiteController@article');
    // 标签文章列表
    Route::get('article/tag/{tag_id}', 'SiteController@article_tag');
    // 搜索文章
    Route::get('article/search/keyword', 'SiteController@article_search');
    // 评论接口
    Route::group(['prefix' => 'blog'], function () {
        // api
        Route::group(['prefix' => 'api'], function () {
            Route::any('comment', 'SiteController@comment_api');
        });
    });

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
    dump(env('APP_ENV'), $res);
});

/**
 * 杂七杂八测试
 */
Route::get('iszmxw/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

// mp3
Route::any('mp3', 'Web\IszmxwController@mp3');
// photo
Route::any('photo/getPhoto', 'Web\IszmxwController@photo');