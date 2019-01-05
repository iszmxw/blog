<?php

namespace App\Http\Controllers\Api\Wechat;

use App\Models\Options;
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
//        $app->server->push(function ($message) {
//            return "您好！欢迎使用 EasyWeChat!您当前的openid为：".$message['FromUserName'];
//        });
        $list = $app->menu->list();

        Options::EditData(['option_name'=>'test_info'],['option_value'=>11]);

        $response = $app->server->serve();
        // 将响应输出
        // Laravel 里请使用：return $response;
        return $response;
    }

    public function oauth_callback(Request $request)
    {
        $config = config('wechat.official_account');
        $app = Factory::officialAccount($config);
//        $app->server->push(function ($message) {
//            return "您好！欢迎使用 EasyWeChat!您当前的openid为：".$message['FromUserName'];
//        });
        $list = $app->menu->list();
        Options::EditData(['option_name'=>'test_info'],['option_value'=>serialize($list)]);
    }
}
