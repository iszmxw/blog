## 安装

```shell script
git clone https://gitee.com/iszmxw/blog.git
```

## 清除缓存
```shell script
php artisan cache:clear
```

## 应用程序加密密钥生成
```shell script
php artisan key:generate
```

## 复制生成配置文件
```shell script
cp .env.example .env
```

## 配置文件.env
```env
APP_NAME=网站名称
APP_URL=网站地址
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=数据库名称
DB_USERNAME=数据库账号
DB_PASSWORD=数据库密码
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=redis密码
REDIS_PORT=6379
WC_AppID=微信订阅号appid
WC_AppSecret=微信AppSecret
```

## composer仓库 （主要用了以下扩展）

[//]: # (- 1、"caouecs/laravel-lang": "~3.0",)
- 2、"barryvdh/laravel-debugbar": "^3.2",
- 3、"barryvdh/laravel-ide-helper": "^2.5",
- 4、"guzzlehttp/guzzle": "~6.0",
- 5、"lyndon1994/xiongzhang-sdk": "^1.0",
- 6、"predis/predis": "^1.1",
- 7、"xethron/migrations-generator": "^2.0"