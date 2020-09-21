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
        Route::any('logout', 'LoginController@logout');

        Route::any('save_data', 'LoginController@save_data');
        Route::any('show_data', 'LoginController@show_data');
        // 获取用户信息
        Route::any('info', 'LoginController@info');

        // 系统首页
        Route::group(['prefix' => 'dashboard'], function () {
            Route::any('index', 'DashboardController@index');
        });

        // 系统管理
        Route::group(['prefix' => 'system'], function () {
            // 上传图片
            Route::any('upload_images', 'SystemController@upload_images');
            // 获取网站系统配置
            Route::any('config', 'SystemController@config');
            // 保存网站配置
            Route::any('save_config', 'SystemController@save_config');
            // 访客记录
            Route::any('view_log', 'SystemController@view_log');
        });


        // 栏目管理
        Route::group(['prefix' => 'category'], function () {
            // 栏目列表
            Route::any('category_list', 'CategoryController@category_list');
            // 添加栏目
            Route::any('category_add', 'CategoryController@category_add');
            // 编辑栏目
            Route::any('category_edit', 'CategoryController@category_edit');
            // 删除栏目
            Route::any('category_delete', 'CategoryController@category_delete');
        });

        // 文章管理
        Route::group(['prefix' => 'article'], function () {
            // 添加文章
            Route::any('article_add', 'ArticleController@article_add');
            // 删除文章
            Route::any('article_delete', 'ArticleController@article_delete');
            // 编辑文章
            Route::any('article_edit', 'ArticleController@article_edit');
            // 文章列表
            Route::any('article_list', 'ArticleController@article_list');
            // 获取单条博客数据
            Route::any('article_one', 'ArticleController@article_one');
        });


//        // 首页导航管理
//        Route::group(['prefix' => 'navbar'], function () {
//            // 导航列表
//            Route::any('navbar_list', 'NavbarController@navbar_list');
//            // 导航排序
//            Route::any('navbar_sort', 'NavbarController@navbar_sort');
//            // 添加导航
//            Route::any('navbar_add', 'NavbarController@navbar_add');
//            // 删除导航
//            Route::any('navbar_delete', 'NavbarController@navbar_delete');
//        });


    });
});

