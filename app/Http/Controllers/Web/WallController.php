<?php
/**
 * Created by PhpStorm.
 * User: mail
 * Date: 2019/3/16
 * Time: 11:11
 */

namespace App\Http\Controllers\Web;

use App\Models\User;
use App\Models\Userqq;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class WallController extends Controller
{
    public function index()
    {
        dump('index');
    }

    public function register()
    {
        return view('web.default_template.register');
    }


    //QQ登录授权第一步
    public function qq_login_auth(Request $request)
    {
        $prev_url = url()->previous();
//        $appid = '101523010';
        $appid = '101518045';
        $redirect_uri = 'http://blog.54zm.com/wall/qq_login';
        $request_url = 'https://graph.qq.com/oauth2.0/authorize';
        $url = $request_url.'?response_type=code&client_id='.$appid.'&redirect_uri='.$redirect_uri.'&state='.$prev_url.'&scope=get_user_info';

        return redirect($url);
    }


    //QQ登录授权第二步
    public function qq_login(Request $request)
    {
        $client_id = '101518045';
        $client_secret = '9d7c45e29ed77a7d728b2367f06361f8';
        $code = $request->get('code');
        //上一页地址
        $state = $request->get('state');
        dd($state);
        //跳转回调地址
        $redirect_uri = 'http://blog.54zm.com/wall/qq_login';
        //请求地址
        $url = "https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&client_id={$client_id}&client_secret={$client_secret}&code={$code}&redirect_uri={$redirect_uri}";
        $client = new Client();
        $response = $client->get($url)->getBody()->getContents();

        //检测返回结果是否包含错误信息
        $error_msg = strstr($response, 'error');
        if ($error_msg) {
            //如果包含错误信息则返回上一级页面重新登录
            return redirect(config('app.url').'/admin/qq_login_auth');
        }

        //获取access_token
        $data = explode('&', $response);
        $data = explode('=', $data[0]);
        $access_token = $data[1];
        $result = $client->get('https://graph.qq.com/oauth2.0/me?access_token='.$access_token)->getBody()->getContents();
        //将返回的jsonp转换为json
        $re_json = trim(str_replace(';', '', str_replace(')', '', str_replace('callback(', '', $result))));
        //获取openid
        $openid = json_decode($re_json, true)['openid'];

        $user_info = $client->get("https://graph.qq.com/user/get_user_info?access_token={$access_token}&oauth_consumer_key={$client_id}&openid={$openid}")->getBody()->getContents();

        $user_info = json_decode($user_info, true);

        $user_info['openid'] = $openid;
        $qq_id = Userqq::getValue(['openid' => $openid], 'id');
        //需要更新的数据
        $user_qq_data = [
            'nickname' => $user_info['nickname'],
            'header_img' => $user_info['figureurl_qq_2'],
            'sex' => $user_info['gender'],
            'year' => $user_info['year'],
            'province' => $user_info['province'],
            'city' => $user_info['city'],
        ];
        if (empty($qq_id)) {
            $user_qq_data['openid'] = $openid;
            Userqq::create($user_qq_data);
            //用户登录留言使用
            session(['qq_data' => $user_qq_data]);
            $request->attributes->add(['qq_data' => $user_qq_data]); //添加参数
        } else {
            Userqq::EditData(['openid' => $openid], $user_qq_data);
            //用户登录留言使用
            session(['qq_data' => $user_qq_data]);
            Redis::connection('blog_admin')->set('qq_data', json_encode($user_qq_data));
            $request->attributes->add(['qq_data' => $user_qq_data]); //添加参数
        }
        dd($qq_id);
        return redirect('http://blog.54zm.com/wall');
    }
}