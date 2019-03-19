<?php

namespace App\Http\Controllers\Api\Wechat;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Sort;
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
        $userInfo = $request->get('userInfo');
        $appid = 'wxe97a91b8d58d8021';
        $appsecret = '51feac652d4ad42e402a028f76a63ddc';
        $url = "https://api.weixin.qq.com/sns/jscode2session?appid={$appid}&secret={$appsecret}&js_code={$code}&grant_type=authorization_code";
        $client = new Client();
        $re = $client->get($url)->getBody()->getContents();
        //code换区的信息
        $base_info = json_decode($re, true);
        $redis_key = $base_info['session_key'];
        $data['base_info'] = $base_info;

        $openid = $base_info['openid'];
        return $openid;

        //判断当前是否已经获取过access_token
        $access_token = Redis::connection('blog_web')->get($redis_key);
        if (empty($access_token)) {
            $access_token = $this->get_access_token($redis_key);
        }
        $data['access_token'] = json_decode($access_token, true)['access_token'];

        return $data;
    }


    //获取access_token中转站
    public function get_access_token($redis_key)
    {
        $appid = 'wxe97a91b8d58d8021';
        $appsecret = '51feac652d4ad42e402a028f76a63ddc';
        $url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$appid.'&secret='.$appsecret;
        $client = new Client();
        $access_token = $client->get($url)->getBody()->getContents();
        //获取$access_token过期时间
        $expires_in = json_decode($access_token, true)['expires_in'];
        //运用管道命令存储redis
        Redis::connection('blog_web')->setex($redis_key, $expires_in, $access_token);
        return $access_token;
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