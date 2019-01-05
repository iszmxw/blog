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
        $config = config('wechat.official_account');
        $app = Factory::officialAccount($config);
        $app->server->push(function ($message) {
            return "您好！欢迎使用 公众号服务!";
        });
        $response = $app->server->serve();
        // 将响应输出
        return $response;
    }

    public function oauth_callback(Request $request)
    {
        $config = config('wechat.official_account');
        $app = Factory::officialAccount($config);
        dd($app->access_token->getToken(true));
        $list = $app->menu->list();
//        Options::EditData(['option_name'=>'test_info'],['option_value'=>serialize($list)]);
//        Options::EditData(['option_name'=>'test_info'],['option_value'=>11]);
//        dump($list);
        dump($list);
    }
}
