<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| 这里是后台的相关路由；
| 已经设置一好了命名空间
|
*/


Route::namespace('Admin')->group(function () {
    //不需要检测登录和权限就可以访问的路由
    Route::get('login','AdminController@login');
    Route::get('qq_login','AdminController@qq_login');
    Route::get('qq_login_auth','AdminController@qq_login_auth');
    Route::get('quit','AdminController@quit');

    //需要检测登录和权限才能访问
    Route::middleware('admin')->group(function () {
        Route::get('/','AdminController@index');
        Route::get('config','AdminController@config');
        Route::get('view_log','AdminController@view_log');

        //栏目管理
        Route::group(['prefix'=>'category'],function (){
            Route::get('category_list','CategoryController@category_list');
            Route::get('navbar_list','CategoryController@navbar_list');
        });

        //文章管理
        Route::group(['prefix'=>'article'],function (){
            Route::get('article_add','ArticleController@article_add');
            Route::get('article_edit','ArticleController@article_edit');
            Route::get('article_list','ArticleController@article_list');
        });

        //云拓展
        Route::group(['prefix'=>'plugins'],function (){
            Route::get('twitter_list','PluginsController@twitter_list');
            Route::get('tag_list','PluginsController@tag_list');
            Route::get('link_list','PluginsController@link_list');
            Route::get('comment_list','PluginsController@comment_list');
        });

        //Ajax请求部分
        Route::group(['prefix'=>'ajax'],function (){
            Route::post('login_check','AdminController@login_check');
            Route::post('config_edit_check','AdminController@config_edit_check');
            //文章
            Route::post('article_add_check','ArticleController@article_add_check');
            Route::post('article_delete_check','ArticleController@article_delete_check');
            Route::post('article_edit_check','ArticleController@article_edit_check');
            //标签
            Route::post('tag_delete_check','PluginsController@tag_delete_check');
            Route::post('tag_edit_data','PluginsController@tag_edit_data');
            Route::post('tag_edit_data_check','PluginsController@tag_edit_data_check');
            //友情链接
            Route::post('link_list_data','PluginsController@link_list_data');
            Route::post('link_list_data_check','PluginsController@link_list_data_check');
            Route::post('link_delete_check','PluginsController@link_delete_check');
            Route::post('link_list_add_check','PluginsController@link_list_add_check');
            //分类
            Route::post('category_add_check','CategoryController@category_add_check');
            Route::post('category_data','CategoryController@category_data');
            Route::post('category_data_edit_check','CategoryController@category_data_edit_check');
            Route::post('category_delete_check','CategoryController@category_delete_check');

            //首页导航栏
            Route::post('navbar_add_check','CategoryController@navbar_add_check');
            Route::post('navbar_data','CategoryController@navbar_data');
            Route::post('navbar_data_edit_check','CategoryController@navbar_data_edit_check');
            Route::post('navbar_delete_check','CategoryController@navbar_delete_check');
            //导航栏排序以及层级修改
            Route::post('navbar_sort','CategoryController@navbar_sort');

            //评论管理
            Route::post('comment_delete_check','PluginsController@comment_delete_check');
            Route::post('comment_hide_check','PluginsController@comment_hide_check');
            Route::post('comment_data','PluginsController@comment_data');
            Route::post('comment_data_check','PluginsController@comment_data_check');

            //微语管理
            Route::post('twitter_delete_check','PluginsController@twitter_delete_check');
        });
    });

});

