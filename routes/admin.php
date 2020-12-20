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


        // 文章管理
        Route::group(['prefix' => 'serve'], function () {

            // 友情链接
            Route::group(['prefix' => 'link'], function () {
                // 添加友链
                Route::any('link_add', 'ServeController@link_add');
                // 删除友链
                Route::any('link_delete', 'ServeController@link_delete');
                // 编辑友链
                Route::any('link_edit', 'ServeController@link_edit');
                // 友链列表
                Route::any('link_list', 'ServeController@link_list');
                // 单条数据
                Route::any('link_one', 'ServeController@link_one');
            });

            // 标签管理
            Route::group(['prefix' => 'tag'], function () {
                // 删除标签
                Route::any('tag_delete', 'ServeController@tag_delete');
                // 标签列表
                Route::any('tag_list', 'ServeController@tag_list');
            });


            // 评论管理
            Route::group(['prefix' => 'comment'], function () {
                // 删除评论
                Route::any('comment_delete', 'ServeController@comment_delete');
                // 显示、隐藏评论
                Route::any('comment_status', 'ServeController@comment_status');
                // 评论列表
                Route::any('comment_list', 'ServeController@comment_list');
            });

        });


    });
});

