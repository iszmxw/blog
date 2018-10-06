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
    //Ajax请求部分
    Route::group(['prefix'=>'ajax'],function (){
        Route::post('login_check','AdminController@login_check');
        Route::post('article_add_check','ArticleController@article_add_check');
        Route::post('article_delete_check','ArticleController@article_delete_check');
        Route::post('article_edit_check','ArticleController@article_edit_check');
    });
});

