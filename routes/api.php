<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::group(['namespace'=>'Api'],function(){
    //微信订阅号(aszmxw)
    Route::group(['prefix'=>'wechat'],function(){
        //token基本配置
        Route::any('token','WechatController@token');
        Route::any('getAccessToken','WechatController@getAccessToken');
    });
});
