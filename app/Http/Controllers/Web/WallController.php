<?php
/**
 * Created by PhpStorm.
 * User: mail
 * Date: 2019/3/16
 * Time: 11:11
 */

namespace App\Http\Controllers\Web;

use App\Library\IpAddress;
use App\Library\Upload;
use App\Models\UserMini;
use App\Models\Userqq;
use App\Models\UserqqError;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Jenssegers\ImageHash\ImageHash;
use Jenssegers\ImageHash\Implementations\DifferenceHash;

class WallController extends Controller
{
    public function index(Request $request)
    {
        $qq_data = session()->get('qq_data');
        $ip      = $request->ip();
        $qq      = $request->get('qq');
        if (empty($qq_data['qq']) && is_numeric($qq)) {
            $url = "http://q1.qlogo.cn/g?b=qq&nk=$qq@qq.com&s=640";
            @unlink("./upload/qq_images/{$qq_data['openid']}/2.jpg");
            $images = Upload::download($url, '2.jpg', "./upload/qq_images/{$qq_data['openid']}");
            // 处理高清头像
            if ($images['error'] != 0) {
                return ['code' => 500, 'message' => '网络错误'];
            }
            $hasher    = new ImageHash(new DifferenceHash());
            $img1      = $qq_data['hd_img'];
            $img2      = $images['save_path'];
            $hash1     = $hasher->hash($img1);
            $hash2     = $hasher->hash($img2);
            $distance1 = $hasher->distance($hash1, $hash2);
            if ($distance1 <= 5) {
                $res = Userqq::EditData(['openid' => $qq_data['openid']], ['qq' => $qq]);
                session(['qq_data' => $res]);
                return view('wall.index');
            } else {
                $address = IpAddress::address($ip);
                UserqqError::AddData([
                    'openid'  => $qq_data['openid'],
                    'qq'      => $qq,
                    'ip'      => $ip,
                    'address' => $address['location']
                ]);
                dd("对不起系统检测到您输入的QQ号码不是您此次登录的QQ，请您确保输入与登录QQ一致，当前错误代码：{$distance1}");
            }
        }

        if (empty($qq_data['type'])) {
            return view('wall.index');
        }
        if (empty($qq_data['qq'])) {
            return view('wall.qq');
        } else {
            return view('wall.index');
        }
    }

    public function get_user_list()
    {
        $qq   = Userqq::where([])->select(['id', 'openid', 'nickname', 'header_img']);
        $mini = UserMini::where([])->select(['id', 'openid', 'nickname', 'avatarurl as header_img']);
        $list = $qq->union($mini)->get();

        return $list;
    }

    public function register()
    {
        if (session('qq_data')) {
            return redirect('/wall/index');
        }

        return view('wall.register');
    }


    //QQ登录授权第一步
    public function qq_login_auth(Request $request)
    {
        $prev_url     = url()->previous();
        $appid        = '101518045';
        $redirect_uri = 'https://blog.ethanyep.cn/wall/qq_login';
        $request_url  = 'https://graph.qq.com/oauth2.0/authorize';
        $url          = $request_url . '?response_type=code&client_id=' . $appid . '&redirect_uri=' . $redirect_uri . '&state=' . $prev_url . '&scope=get_user_info';

        return redirect($url);
    }


    //QQ登录授权第二步
    public function qq_login(Request $request)
    {
        $client_id     = '101518045';
        $client_secret = '9d7c45e29ed77a7d728b2367f06361f8';
        $code          = $request->get('code');
        //上一页地址
        $state = $request->get('state');
        //跳转回调地址
        $redirect_uri = 'https://blog.ethanyep.cn/wall/qq_login';
        //请求地址
        $url      = "https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&client_id={$client_id}&client_secret={$client_secret}&code={$code}&redirect_uri={$redirect_uri}";
        $client   = new Client();
        $response = $client->get($url)->getBody()->getContents();

        //检测返回结果是否包含错误信息
        $error_msg = strstr($response, 'error');
        if ($error_msg) {
            dd($error_msg);
            //如果包含错误信息则返回上一级页面重新登录
            return redirect(config('app.url') . '/admin/qq_login_auth');
        }

        //获取access_token
        $data         = explode('&', $response);
        $data         = explode('=', $data[0]);
        $access_token = $data[1];
        $result       = $client->get('https://graph.qq.com/oauth2.0/me?access_token=' . $access_token)->getBody()->getContents();
        //将返回的jsonp转换为json
        $re_json = trim(str_replace(';', '', str_replace(')', '', str_replace('callback(', '', $result))));
        //获取openid
        $openid = json_decode($re_json, true)['openid'];

        $user_info = $client->get("https://graph.qq.com/user/get_user_info?access_token={$access_token}&oauth_consumer_key={$client_id}&openid={$openid}")->getBody()->getContents();

        $user_info = json_decode($user_info, true);

        $user_info['openid'] = $openid;
        $qq_id               = Userqq::getValue(['openid' => $openid], 'id');
        @unlink("./upload/qq_images/{$openid}/1.jpg");
        $images = Upload::download($user_info['figureurl_qq'], '1.jpg', "./upload/qq_images/{$openid}");
        //需要更新的数据
        $user_qq_data = [
            'nickname'   => $user_info['nickname'],
            'header_img' => $user_info['figureurl_qq_2'],
            'sex'        => $user_info['gender'],
            'year'       => $user_info['year'],
            'province'   => $user_info['province'],
            'city'       => $user_info['city'],
        ];
        // 处理高清头像
        if ($images['error'] == 0) {
            $user_qq_data['hd_img'] = $images['save_path'];
        }
        if (empty($qq_id)) {
            $user_qq_data['openid'] = $openid;
            Userqq::create($user_qq_data);
        } else {
            Userqq::EditData(['openid' => $openid], $user_qq_data);
        }
        //用户登录留言使用
        $session_data         = Userqq::getOne(['openid' => $openid]);
        $session_data['type'] = 'qq';
        session(['qq_data' => $session_data]);
        $request->attributes->add(['qq_data' => $user_qq_data]); //添加参数
        return redirect(url('wall/index'));
    }


    //检测登录状态
    public function scan_code_status(Request $request)
    {
        $uuid = $request->get('uuid');
        if ($uuid) {
            $data = Cache::get($uuid);
            if ($data) {
                $data = decrypt($data);
                if ($data['status'] == '0') {
                    return ['status' => 1, 'msg' => '扫码成功', 'data' => []];
                } elseif ($data['status'] == '1') {
                    $cache_data = Cache::get($data['token']);
                    if ($cache_data) {
                        $user_info = decrypt($cache_data);
                        // 用户登录留言使用
                        $user_info['header_img'] = $user_info['avatarurl'];
                        session(['qq_data' => $user_info]);

                        return ['status' => 2, 'msg' => '登录成功', 'data' => ['user_info' => $user_info]];
                    } else {
                        return ['status' => 0, 'msg' => '请重新扫码，页面已过期', 'data' => []];
                    }
                }
            } else {
                return ['status' => 0, 'msg' => '请重新扫码，页面已过期', 'data' => []];
            }
        } else {
            return ['status' => 0, 'msg' => '缺少uuid', 'data' => []];
        }

    }


    //退出登录
    public function quit()
    {
        session(['qq_data' => '']);
        return redirect('wall/index');
    }
}