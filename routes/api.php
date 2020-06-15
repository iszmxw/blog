<?php

/*
|--------------------------------------------------------------------------
| API 路由
|--------------------------------------------------------------------------
|
| 所有api路由都在这里
|
*/
//小程序相关api
Route::group(['namespace' => 'Api'], function () {
    // 内容推送工具
    Route::any('baidu/push_content', 'BaiduController@push_content');
    // 发送邮件
    Route::any('mail/push_mail', 'BaiduController@push_mail');

    // 小程序
    Route::group(['prefix' => 'wx_mini', 'namespace' => 'Wechat', 'middleware' => 'wx_mini'], function () {
        // 消息推送接口设置
        Route::get('message_push', 'MiniController@message_push');
        // 获取小程序码
        Route::any('getwxacode', 'MiniController@getwxacode');
        // 获取小程序二维码
        Route::get('createwxaqrcode', 'MiniController@createwxaqrcode');
        // 获取登录二维码
        Route::any('get_scan_code', 'MiniController@get_scan_code');
        // 扫码登录创建状态更改
        Route::any('scan_code', 'MiniController@scan_code');
        // 扫码登录确认
        Route::any('scan_code_confirm', 'MiniController@scan_code_confirm');

        // 登录小程序
        Route::any('login', 'MiniController@login');
        // 退出小程序
        Route::any('quit', 'MiniController@quit');
        // 获取access_token
        Route::get('access_token', 'MiniController@access_token');

        // 小程序首页
        Route::any('index', 'MiniController@index');
        // 小程序文章页面
        Route::any('article', 'MiniController@article');
        // 获取栏目分类
        Route::any('get_category', 'MiniController@get_category');
    });

});
