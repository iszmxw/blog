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

    //授权回调设置
    public function oauth_callback(Request $request)
    {
        $config = config('wechat.official_account');
        $app = Factory::officialAccount($config);
    }

    //创建菜单
    public function create_menu(Request $request)
    {
        $config = config('wechat.official_account');
        $app = Factory::officialAccount($config);
        $buttons = [
            [
                "type" => "view",
                "name" => "追梦小窝",
                "url"  => "http://blog.54zm.com"
            ],
            [
                "name"       => "更多内容",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "百度一下",
                        "url"  => "http://www.baidu.com/"
                    ],
                    [
                        "type" => "view",
                        "name" => "腾讯视频",
                        "url"  => "http://v.qq.com/"
                    ],
                ],
            ],
        ];
        $list = $app->menu->create($buttons);
        dump($list);
    }
}
