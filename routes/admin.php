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

    //Ajax请求部分
    Route::group(['prefix'=>'article'],function (){
        Route::get('article_add','ArticleController@article_add');
    });
    //Ajax请求部分
    Route::group(['prefix'=>'ajax'],function (){
        Route::post('login_check','AdminController@login_check');
        Route::post('article_add_check','ArticleController@article_add_check');
    });
});

