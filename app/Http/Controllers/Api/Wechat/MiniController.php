<?php

namespace App\Http\Controllers\Api\Wechat;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Sort;
use App\Models\UserMini;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;


class MiniController extends Controller
{
    /**
     * 微信小程序相关信息
     * AppID(小程序ID) wxe97a91b8d58d8021
     * AppSecret(小程序密钥) 51feac652d4ad42e402a028f76a63ddc
     */
    //消息推送接口设置
    public function message_push()
    {
        // 微信公众后台填写的Token
        $token = 'iszmxw';
        // 如果验证正确，则返回参数echostr的内容，否则终止执行
        $re = $this->checkSignature($token);
        if ($re) {
            echo $_GET['echostr'];
        }
        exit();
    }

    //检测函数
    private function checkSignature($token)
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        $tmpArr = array($token, $timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);
        if ($tmpStr == $signature) {
            return true;
        } else {
            return false;
        }
    }

    //获取小程序码
    public function getwxacode()
    {
        $access_token = json_decode($this->access_token(), true)['access_token'];
        $url = 'https://api.weixin.qq.com/wxa/getwxacode?access_token='.$access_token;
        $data = [
            'path' => 128,
            'width' => 450,
            'auto_color' => true,
            'is_hyaline' => false,
        ];
        $data = json_encode($data, JSON_UNESCAPED_UNICODE);
        $client = new Client();
        $re = $client->post($url, $data)->getBody()->getContents();

        return $re;
    }

    //获取栏目分类
    public function get_category()
    {
        $list = Sort::select(['sid as id', 'sortname as name'])->get();
        $data = ['status' => 1, 'list' => $list];

        return $data;
    }

    //获取小程序二维码
    public function createwxaqrcode()
    {
        $access_token = json_decode($this->access_token(), true)['access_token'];
        $url = 'https://api.weixin.qq.com/cgi-bin/wxaapp/createwxaqrcode?access_token='.$access_token;
        $data = [
            'path' => 128,
            'width' => 430,
        ];
        $data = json_encode($data, JSON_UNESCAPED_UNICODE);
        $client = new Client();
        $re = $client->post($url, $data)->getBody()->getContents();

        return $re;
    }

    //登录小程序
    public function login(Request $request)
    {
        $code = $request->get('code');
        $token = $request->get('token');
        $userInfo = $request->get('userInfo');
//        dd($code,$token,$userInfo);
        $re = Redis::connection('blog_web')->get('b3hXMGIwV19OdlEtaGdfa29YYWkyOXRzU1dIWTE1NTI5ODU1MzZlYkFGSEpQQSs2andXSzQ2bElRKytBPT0=');
        dd($re);
        $appid = 'wxe97a91b8d58d8021';
        $appsecret = '51feac652d4ad42e402a028f76a63ddc';
        $url = "https://api.weixin.qq.com/sns/jscode2session?appid={$appid}&secret={$appsecret}&js_code={$code}&grant_type=authorization_code";
        $client = new Client();
        $re = $client->get($url)->getBody()->getContents();
        //code换区的信息
        $base_info = json_decode($re, true);
        $redis_key = $base_info['session_key'];
        $openid = $base_info['openid'];
        //检测维护用户信息
        self::get_user_info($openid, $userInfo);
        //获取access_token
        $user_info = $this->get_access_token($openid);
        $token = base64_encode($openid.time().$redis_key);
        $re = Redis::connection('blog_web')->setex($token, '7200', encrypt($user_info));
        if ($re) {
            return ['status' => 1, 'msg' => '登录成功！', 'data' => ['token' => $token]];
        } else {
            return ['status' => 0, 'msg' => '登录失败！', 'data' => []];
        }

    }


    public static function get_user_info($openid, $userInfo)
    {
        //用户信息
        $data = [
            'openid' => $openid,
            'nickname' => $userInfo['nickName'],
            'avatarurl' => $userInfo['avatarUrl'],
            'gender' => $userInfo['gender'],
            'country' => $userInfo['country'],
            'province' => $userInfo['province'],
            'city' => $userInfo['city'],
            'language' => $userInfo['language'],
        ];
        if (UserMini::checkRowExists(['openid' => $openid])) {
            //编辑用户信息
            $user_info = UserMini::AddData($data, ['openid' => $openid]);
        } else {
            //创建新用户
            $user_info = UserMini::AddData($data);
        }

        return $user_info;
    }


    //获取access_token中转站
    public function get_access_token($openid)
    {
        $appid = 'wxe97a91b8d58d8021';
        $appsecret = '51feac652d4ad42e402a028f76a63ddc';
        $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$appid.'&secret='.$appsecret;
        $client = new Client();
        $result = $client->get($url)->getBody()->getContents();
        //获取$access_token过期时间
        $expires_in = json_decode($result, true)['expires_in'];
        $access_token = json_decode($result, true)['access_token'];
        $data = [
            'access_token' => $access_token,
            'access_token_expires_time' => time() + $expires_in,
        ];
        //更新access_token到数据库
        $user_info = UserMini::EditData(['openid' => $openid], $data);

        return $user_info;
    }


    //小程序首页数据
    public function index()
    {
        $pagesize = request()->get('pagesize');
        $category_id = request()->get('category_id');
        $where = [];
        $category_id ? $where[] = ['sortid', $category_id] : '';
        $list = Blog::where($where)->select('gid', 'title', 'date')->limit($pagesize)->orderby('date', 'DESC')->get();
        foreach ($list as $key => $val) {
            $val['date'] = date('Y-m-d', $val['date']);
        }
        if ($pagesize - $list->count() > 10) {
            $data = ['status' => 0, 'list' => $list];
        } else {
            $data = ['status' => 1, 'list' => $list];
        }

        return $data;
    }

    //小程序文章页面
    public function article()
    {
        $blog_id = request()->get('blog_id');
        if ($blog_id) {
            $article = Blog::where(['gid' => $blog_id])->select('title', 'content')->first();
            $data = ['status' => '1', 'data' => $article];
        } else {
            $data = ['status' => '1', 'data' => '没有数据'];
        }

        return $data;
    }
}