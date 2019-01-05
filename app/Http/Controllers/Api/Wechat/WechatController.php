<?php

namespace App\Http\Controllers\Api\Wechat;

use EasyWeChat\Factory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WechatController extends Controller
{
    /**
     * 获取配置信息
     * @return \EasyWeChat\OfficialAccount\Application
     */
    public static function App()
    {
        $config = config('wechat.official_account');
        $app = Factory::officialAccount($config);
        return $app;
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
        $app = Factory::officialAccount($config);
        $app->server->push(function ($message) {
            return "您好！欢迎使用 公众号服务!";
        });
        $response = $app->server->serve();
        // 将响应输出
        return $response;
    }


    /**
     * 授权回调设置
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function oauth_callback(Request $request)
    {
        $app = self::App();
        $app->server->push(function ($message) {
            return "您好！欢迎使用 公众号服务!";
        });
        $response = $app->server->serve();
        // 将响应输出
        return $response;

//        $oauth = $app->oauth;
//        // 未登录
//        if (empty($_SESSION['wechat_user'])) {
//            // 这里不一定是return，如果你的框架action不是返回内容的话你就得使用
//            return $oauth->redirect();
//        }
    }


    /**
     * 授权回调后处理个人信息
     * @param Request $request
     */
    public function profile(Request $request)
    {
        $app = self::App();
        $oauth = $app->oauth;
        // 获取 OAuth 授权结果用户信息
        $user = $oauth->user();
        dump($user->toArray());
    }

    /**
     * 创建菜单
     * @param Request $request
     */
    public function create_menu(Request $request)
    {
        $app = self::App();
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

    /**
     * 获取用户信息
     * @return array|\EasyWeChat\Kernel\Support\Collection|object|\Psr\Http\Message\ResponseInterface|string
     * @throws \EasyWeChat\Kernel\Exceptions\InvalidConfigException
     */
    public function get_user_info()
    {
        $app = self::App();
        $user = $app->user->list($nextOpenId = null);  //获取正常用户列表 $nextOpenId 可选;
//        $user = $app->user->get('olnffwJeNFN5WB2D_jXslSQ-bAj4'); //获取单个用户信息
//        $user = $app->user->block('olnffwOHy9V00GaXnrKfxiM2mF5Q');
//        $user = $app->user->blacklist($nextOpenId = null); // 获取拉黑用户列表 $nextOpenId 可选;
        return $user;
    }
}
