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
    Route::group(['middleware' => 'admin', 'prefix' => 'api'], function () {

        Route::get('login', 'LoginController@login');

    });
});

