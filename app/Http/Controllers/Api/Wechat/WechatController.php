<?php

namespace App\Http\Controllers\Api\Wechat;

use App\Models\Options;
use EasyWeChat\Factory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class WechatController extends Controller
{
    public $wechat;
    public function __construct($app)
    {
        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志
        $config = config('wechat.official_account');
        $this->wechat = Factory::officialAccount($config);
    }

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
        $this->wechat = Factory::officialAccount($config);
        $this->wechat->server->push(function ($message) {
            return "您好！欢迎使用 公众号服务!";
        });
        $response = $this->wechat->server->serve();
        // 将响应输出
        return $response;
    }

    public function oauth_callback(Request $request)
    {
//        $list = $this->wechat->menu->list();
//        Options::EditData(['option_name'=>'test_info'],['option_value'=>serialize($list)]);
//        Options::EditData(['option_name'=>'test_info'],['option_value'=>11]);
//        dump($list);
    }
}
