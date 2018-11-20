<?php

return [

    /*
    |--------------------------------------------------------------------------
    | 默认微信公众号配置
    |--------------------------------------------------------------------------
    |
    | 在这里可以设置微信公众号的一些参数，也可以设置小程序的一些参数
    | 设置好参数后以便后期使用方便
    | 追梦小窝==2018-11-20
    |
    */

    /*
    |--------------------------------------------------------------------------
    | 订阅号
    | 公众号开发信息
    |--------------------------------------------------------------------------
    |
    | 主要记录：开发者ID(AppID)、开发者密码(AppSecret)
    |
    */

    'AppID' => env('WC_AppID', 'wx24f1bdc282e9141d'),
    'AppSecret' => env('WC_AppSecret', 'c8b578a9aa74d0bb5a62b8339f1b9e85'),

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => 'predis',

        'default' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => env('REDIS_DB', 0),
        ],

        'cache' => [
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => env('REDIS_CACHE_DB', 1),
        ],

    ],

];
