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
            return "您好！欢迎使用 公众号服务!".$message['FromUserName'];
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
        $oauth = $app->oauth;
        // 未登录
        if (empty($_SESSION['wechat_user'])) {
            // 这里不一定是return，如果你的框架action不是返回内容的话你就得使用
            return $oauth->redirect();
        }
    }


    public function profile(Request $request)
    {
        // 已经登录过
        dump($request);
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

    public function get_user_info()
    {
        $config = config('wechat.official_account');
        $app = Factory::officialAccount($config);
//        $user = $app->user->list();  // $nextOpenId 可选;
//        $user = $app->user->get('olnffwJeNFN5WB2D_jXslSQ-bAj4');
//        $user = $app->user->block('olnffwOHy9V00GaXnrKfxiM2mF5Q');
        $user = $app->user->blacklist(); // $beginOpenid 可选
        return $user;
    }
}
