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
    Route::group(['prefix'=>'wechat'],function(){
        //token基本配置
        Route::any('token','WechatController@token');
        Route::any('getAccessToken','WechatController@getAccessToken');
    });

    //发送邮件(aszmxw)
    Route::group(['prefix'=>'mail'],function(){
        //发送邮件
        Route::any('push_content','MailController@push_content');
    });
    //小程序
    Route::prefix('wechat_xcx')->group(function () {
        //消息推送接口设置
        Route::get('message_push', 'WeChat\ApiController@message_push');
        //获取access_token
        Route::get('access_token', 'WeChat\ApiController@access_token');
        Route::get('get_access_token', 'WeChat\ApiController@get_access_token');
        //获取小程序码
        Route::get('getwxacode', 'WeChat\ApiController@getwxacode');
        //获取小程序二维码
        Route::get('createwxaqrcode', 'WeChat\ApiController@createwxaqrcode');
        //登录小程序
        Route::get('login', 'WeChat\ApiController@login');
        //测试专用
        Route::get('test', 'WeChat\ApiController@test');

        //小程序首页
        Route::get('index', 'WeChat\ApiController@index');
        //小程序文章页面
        Route::get('article', 'WeChat\ApiController@article');
    });
});
