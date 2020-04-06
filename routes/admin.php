<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| 这里是后台接口的相关路由；
| 已经设置一好了命名空间
|
*/


Route::group(['namespace' => 'Admin'], function () {
    //需要检测登录和权限才能访问
    Route::group(['prefix' => 'api'], function () {

        // 登录后台
        Route::any('login', 'LoginController@login');
        // 获取用户信息
        Route::any('info', 'LoginController@info');

    });
});

