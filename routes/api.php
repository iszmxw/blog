<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['namespace'=>'Api'],function(){
    //熊掌号推送(aszmxw)
    Route::group(['prefix'=>'baidu'],function(){
        //token基本配置
        Route::any('xiongzhang','BaiduController@xiongzhang');
        //内容推送工具
        Route::any('push_content','BaiduController@push_content');
    });
    //微信订阅号(aszmxw)
    Route::group(['prefix'=>'wechat','namespace'=>'Wechat'],function(){
        //token基本配置
        Route::any('serve','WechatController@serve');
        //创建菜单
        Route::any('create_menu','WechatController@create_menu');
        //获取用户信息
        Route::any('get_user_info','WechatController@get_user_info');
        Route::group(['prefix'=>'user'],function(){
            Route::any('profile','WechatController@profile');
        });
        //授权回调地址
        Route::any('oauth_callback','WechatController@oauth_callback');
    });

    //小程序
    Route::group(['prefix'=>'wechat_xcx','namespace'=>'Wechat'],function () {
        //消息推送接口设置
        Route::get('message_push', 'MiniController@message_push');

        //获取小程序码
        Route::get('getwxacode', 'MiniController@getwxacode');
        //获取小程序二维码
        Route::get('createwxaqrcode', 'MiniController@createwxaqrcode');

        //测试专用
        Route::get('test', 'MiniController@test');


        //登录小程序
        Route::any('login', 'MiniController@login');
        //获取access_token
        Route::get('access_token', 'MiniController@access_token');
        Route::get('get_access_token', 'MiniController@get_access_token');


        //小程序首页
        Route::any('index', 'MiniController@index');
        //小程序文章页面
        Route::any('article', 'MiniController@article');
        //获取栏目分类
        Route::any('get_category', 'MiniController@get_category');
    });

    //发送邮件(aszmxw)
    Route::group(['prefix'=>'mail'],function(){
        //发送邮件
        Route::any('push_content','MailController@push_content');
    });


    //腾讯
    Route::group(['prefix'=>'tencent'],function(){
        Route::any('login','TencentController@login');
    });
});
