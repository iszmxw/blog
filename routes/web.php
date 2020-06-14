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
    dd("别想了，你还是做个好人吧！");
    phpinfo();
});


Route::get('iszmxw/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('bomb', 'Web\WebController@bomb');

Route::get('images', 'Web\WebController@images');


// 测试
Route::group(['prefix' => 'test', 'namespace' => 'Web'], function () {
    Route::any('index', 'TianYiController@index');
    Route::any('github', 'TianYiController@github');
});

Route::any('mp3', function () {
    $json = '[{"name":"Glad You Came","song_id":29769734,"cover":"https://p2.music.126.net/h3uSv4hgZmJK1Q9Kcjtszg==/109951164473961104.jpg?param=200y200","author":"Boyce Avenue"},{"name":"认真地老去","song_id":461080452,"cover":"https://p2.music.126.net/LwisuwyurwWs3zpkoBIC9g==/19024849695642179.jpg?param=200y200","author":"张希&曹方"},{"name":"别找我麻烦","song_id":208889,"cover":"https://p2.music.126.net/KSrqsJKY88n4QgsLo-t3Jg==/109951164795671702.jpg?param=200y200","author":"蔡健雅"},{"name":"小樱","song_id":406070435,"cover":"https://p2.music.126.net/ejJnFAcW3kgPXu_ChaL9Kg==/109951164291843663.jpg?param=200y200","author":"饭碗的彼岸"},{"name":"江上清风游","song_id":32743519,"cover":"https://p2.music.126.net/rxtmC5LLUxMfWx7szJr-bw==/7968160767131459.jpg?param=200y200","author":"变奏的梦想"},{"name":"城南花已开 ❁ 愿君彼安好（Remake）（翻自 三亩地） ","song_id":1351635310,"cover":"https://p2.music.126.net/fROLf2j_ua4VPv98P65Y6Q==/109951164141716409.jpg?param=200y200","author":"桑子"},{"name":"寻","song_id":31445474,"cover":"https://p2.music.126.net/tgkN397ohC6XpqRRHzndLw==/2925800441997173.jpg?param=200y200","author":"三亩地"}]';
    dump($json);
    echo json_decode($json,true);
});