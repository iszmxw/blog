<?php

/*
|--------------------------------------------------------------------------
| API 路由
|--------------------------------------------------------------------------
|
| 所有api路由都在这里
|
*/


// 后台业务接口
Route::group(['prefix' => 'admin', 'namespace' => 'ApiAdmin', 'middleware' => 'api_admin'], function () {
    // 登录系统
    Route::any('login', 'AdminController@login');
    // 登录日志
    Route::any('login_log', 'AdminController@login_log');
    // 短息转发存储
    Route::any('sms', 'AdminController@sms');
    // 退出系统
    Route::any('logout', 'AdminController@logout');
    // 用户信息
    Route::any('user_info', 'AdminController@user_info');
    // 系统首页
    Route::any('dashboard', 'AdminController@dashboard');

    // 账户管理
    Route::group(['prefix' => 'account'], function () {
        // 添加账号
        Route::any('add', 'AccountController@add');
        // 超级管理员编辑账号信息
        Route::any('edit', 'AccountController@edit');
        // 账户修改自己的信息
        Route::any('edit_info', 'AccountController@edit_info');
        // 修改账号密码
        Route::any('password', 'AccountController@password');
        // 账号状态更改
        Route::any('status', 'AccountController@status');
        // 账号脚本状态修改
        Route::any('script_status', 'AccountController@script_status');
        // 用户列表
        Route::any('list', 'AccountController@list');
        // 广告主获取账户信息
        Route::any('info', 'AccountController@info');
    });
});


Route::group(['namespace' => 'Api'], function () {
    //熊掌号推送(aszmxw)
    Route::group(['prefix' => 'baidu'], function () {
        //token基本配置
        Route::any('xiongzhang', 'BaiduController@xiongzhang');
        //内容推送工具
        Route::any('push_content', 'BaiduController@push_content');
    });


    //微信订阅号(aszmxw)
    Route::group(['prefix' => 'wechat', 'namespace' => 'Wechat'], function () {
        //token基本配置
        Route::any('serve', 'WechatController@serve');
        //创建菜单
        Route::any('create_menu', 'WechatController@create_menu');
        //获取用户信息
        Route::any('get_user_info', 'WechatController@get_user_info');
        Route::group(['prefix' => 'user'], function () {
            Route::any('profile', 'WechatController@profile');
        });
        //授权回调地址
        Route::any('oauth_callback', 'WechatController@oauth_callback');
    });


    //小程序
    Route::group(['prefix' => 'wx_mini', 'namespace' => 'Wechat', 'middleware' => 'wx_mini'], function () {
        //消息推送接口设置
        Route::get('message_push', 'MiniController@message_push');

        //获取小程序码
        Route::any('getwxacode', 'MiniController@getwxacode');
        //获取小程序二维码
        Route::get('createwxaqrcode', 'MiniController@createwxaqrcode');
        //获取登录二维码
        Route::any('get_scan_code', 'MiniController@get_scan_code');
        //扫码登录创建状态更改
        Route::any('scan_code', 'MiniController@scan_code');
        //扫码登录确认
        Route::any('scan_code_confirm', 'MiniController@scan_code_confirm');

        //登录小程序
        Route::any('login', 'MiniController@login');
        //退出小程序
        Route::any('quit', 'MiniController@quit');
        //获取access_token
        Route::get('access_token', 'MiniController@access_token');

        //小程序首页
        Route::any('index', 'MiniController@index');
        //小程序文章页面
        Route::any('article', 'MiniController@article');
        //获取栏目分类
        Route::any('get_category', 'MiniController@get_category');
    });


    //发送邮件(aszmxw)
    Route::group(['prefix' => 'mail'], function () {
        //发送邮件
        Route::any('push_content', 'MailController@push_content');
    });

});
