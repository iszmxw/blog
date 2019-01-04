<?php

namespace App\Http\Controllers\Api\Wechat;

use EasyWeChat\Factory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class WechatController extends Controller
{
    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \EasyWeChat\Kernel\Exceptions\BadRequestException
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidArgumentException
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     * @throws \ReflectionException
     */
    public function serve()
    {
        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志
        $config = config('wechat.official_account');
        $app = Factory::officialAccount($config);
        $app->base->getValidIps();
        $app->server->push(function ($message) {
            return "您好！欢迎使用 EasyWeChat!您当前的微信服务器ip为：";
        });

        $response = $app->server->serve();
        // 将响应输出
        // Laravel 里请使用：return $response;
        return $response;
    }
}
