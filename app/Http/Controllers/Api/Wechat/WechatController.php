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
        $user = $app->user->get();
        $app->server->push(function(){

            return "欢迎关注追梦小窝的公众号，此公众号仅供提供一些服务！".$user;
        });

        return $app->server->serve();
    }
}
