<p align="center"><img src="vuepress/markdown/static/svg/xw.svg" width="100"></p>
<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="#"><img src="https://img.shields.io/badge/%E6%96%87-%E6%A1%A3-green?logo=symantec&style=plastic" alt="文档"></a>
<a href="#"><img src="https://img.shields.io/badge/%E8%AF%AD%E8%A8%80-markdown-blue" alt="语言"></a>
<a href="#"><img src="https://img.shields.io/badge/%E8%BF%9B%E5%BA%A6-0%25-brightgreen" alt="进度"></a>
<a href="#"><img src="https://img.shields.io/badge/License-MIT-red" alt="License"></a>
</p>

<p align="center">
<a href="http://blog.54zm.com"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="http://blog.54zm.com"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="http://blog.54zm.com"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="http://blog.54zm.com"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

<p align="center">
<a href="https://join.slack.com/t/996icu/shared_invite/enQtNTc5MTU4MDkxOTA1LTJlYWVmMGQxOWNjZDA2NzdkMzQ3MjkzYmFlYTAxMTczZGQ0NmQ5ZWY5MTVjODQ4MWFkZGRhMmRmY2UwZGUyOTQ"><img src="https://img.shields.io/badge/slack-996ICU-%23de335e.svg"></a>
<a href="https://github.com/996icu/996.ICU/blob/master/LICENSE"><img src="https://img.shields.io/badge/license-NPL%20(The%20996%20Prohibited%20License)-blue.svg"></a>
<a href="https://996.icu"><img src="https://img.shields.io/badge/link-996.icu-red.svg"></a>
</p>

# blog
Laravel重写Blog   采用Laravel版本： 5.7.3 
######
### 博客地址：http://blog.54zm.com
######
### 文档地址：http://iszmxw.gitee.io/blog/

### 安装
#### git clone https://gitee.com/iszmxw/blog.git 或者 git clone https://github.com/iszmxw/blog
### 清除缓存
#### php artisan cache:clear
### 应用程序加密密钥生成
#### php artisan key:generate
### 复制生成配置文件
#### cp .env.example .env

### 配置文件.env
#### APP_NAME=网站名称

#### APP_URL=网站地址

#### DB_CONNECTION=mysql

#### DB_HOST=127.0.0.1

#### DB_PORT=3306

#### DB_DATABASE=数据库名称

#### DB_USERNAME=数据库账号

#### DB_PASSWORD=数据库密码

#### REDIS_HOST=127.0.0.1

#### REDIS_PASSWORD=redis密码

#### REDIS_PORT=6379

#### WC_AppID=微信订阅号appid

#### WC_AppSecret=微信AppSecret

### composer仓库 （主要用了以下扩展）
#### 1、"caouecs/laravel-lang": "~3.0",
#### 2、"barryvdh/laravel-debugbar": "^3.2",
#### 3、"barryvdh/laravel-ide-helper": "^2.5",
#### 4、"guzzlehttp/guzzle": "~6.0",
#### 5、"lyndon1994/xiongzhang-sdk": "^1.0",
#### 6、"predis/predis": "^1.1",
#### 7、"xethron/migrations-generator": "^2.0"
