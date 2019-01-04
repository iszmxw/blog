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
        Route::any('getAccessToken','WechatController@getAccessToken');
    });

    //小程序
    Route::group(['prefix'=>'wechat_xcx','namespace'=>'Wechat'],function () {
        //消息推送接口设置
        Route::get('message_push', 'MiniController@message_push');
        //获取access_token
        Route::get('access_token', 'MiniController@access_token');
        Route::get('get_access_token', 'MiniController@get_access_token');
        //获取小程序码
        Route::get('getwxacode', 'MiniController@getwxacode');
        //获取小程序二维码
        Route::get('createwxaqrcode', 'MiniController@createwxaqrcode');
        //登录小程序
        Route::get('login', 'MiniController@login');
        //测试专用
        Route::get('test', 'MiniController@test');
        //小程序首页
        Route::get('index', 'MiniController@index');
        //小程序文章页面
        Route::get('article', 'MiniController@article');
    });

    //发送邮件(aszmxw)
    Route::group(['prefix'=>'mail'],function(){
        //发送邮件
        Route::any('push_content','MailController@push_content');
    });
});
