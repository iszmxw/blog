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

Route::middleware('admin')->namespace('Admin')->group(function () {
    Route::get('/','AdminController@index');
    Route::get('login','AdminController@login');
    Route::get('quit','AdminController@quit');

    //文章管理
    Route::group(['prefix'=>'article'],function (){
        Route::get('article_add','ArticleController@article_add');
        Route::get('article_edit','ArticleController@article_edit');
        Route::get('article_list','ArticleController@article_list');
    });

    //云拓展
    Route::group(['prefix'=>'plugins'],function (){
        Route::get('tag_list','PluginsController@tag_list');
        Route::get('link_list','PluginsController@link_list');
    });

    //Ajax请求部分
    Route::group(['prefix'=>'ajax'],function (){
        Route::post('login_check','AdminController@login_check');
        Route::post('article_add_check','ArticleController@article_add_check');
        Route::post('article_delete_check','ArticleController@article_delete_check');
        Route::post('article_edit_check','ArticleController@article_edit_check');
        Route::post('tag_delete_check','PluginsController@tag_delete_check');
        Route::post('tag_edit_data','PluginsController@tag_edit_data');
        Route::post('tag_edit_data_check','PluginsController@tag_edit_data_check');
    });
});

