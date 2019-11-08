<?php

namespace App\Http\Controllers\Api\Wechat;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Sort;
use App\Models\UserMini;
use App\Models\UserMiniFormid;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Ramsey\Uuid\Uuid;


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
        $nonce     = $_GET["nonce"];
        $tmpArr    = array($token, $timestamp, $nonce);
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
        $access_token = self::access_token();
        $url          = 'https://api.weixin.qq.com/wxa/getwxacode?access_token=' . $access_token;
        $client       = new Client();
        $data         = json_encode(['path' => 'pages/index/index'], true);
        $img_code     = $client->post($url, ['body' => $data])->getBody()->getContents();
        $newFilePath  = self::CreateImage('getwxacode.png', $img_code);

        return asset($newFilePath);
    }

    /**
     * 获取登录二维码
     * @param Request $request
     * @return array
     * @throws \Exception
     */
    public function get_scan_code(Request $request)
    {
        //随机取得uuid
        $uuid         = Uuid::uuid1()->getHex();
        $access_token = self::access_token();
        $url          = 'https://api.weixin.qq.com/wxa/getwxacode?access_token=' . $access_token;
        $client       = new Client();
        $data         = json_encode(['path' => 'pages/scanCodeConfirm/scanCodeConfirm?uuid=' . $uuid], true);
        $img_code     = $client->post($url, ['body' => $data])->getBody()->getContents();
        $data         = [
            'status' => '-1',
        ];
        try {
            //缓存预备登录的用户 设置7200秒（两个小时）
            $seconds = Carbon::now()->addSeconds(7200);
            Cache::add($uuid, encrypt($data), $seconds);
            $imgurl = self::CreateImage($uuid . ".png", $img_code, './scan_code');
            $imgurl = asset($imgurl);
        } catch (\Exception $exception) {
            Cache::forget($uuid);

            return ['status' => 0, 'msg' => '创建二维码失败，请刷新页面', 'data' => []];
        }

        return ['status' => 1, 'msg' => '初始化二维码成功，请您使用微信扫码登录', 'data' => ['uuid' => $uuid, 'image' => $imgurl]];
    }


    //扫码登录状态修改为已扫码status==0
    public function scan_code(Request $request)
    {
        $uuid  = $request->get('uuid');
        $token = $request->get('token');
        $data  = [
            'token'  => $token,
            'status' => '0',//已扫码状态
        ];
        try {
            Cache::forget($uuid);
            //缓存预备登录的用户 设置7200秒（两个小时）
            $seconds = Carbon::now()->addSeconds(7200);
            Cache::add($uuid, encrypt($data), $seconds);
        } catch (\Exception $exception) {

            return ['status' => 0, 'msg' => '扫码失败，请重新扫码', 'data' => []];
        }

        return ['status' => 1, 'msg' => '扫码成功', 'data' => ['uuid' => $uuid, 'token' => $token]];
    }

    //扫码登录确认
    public function scan_code_confirm(Request $request)
    {
        $uuid  = $request->get('uuid');
        $token = $request->get('token');
        $data  = [
            'token'  => $token,
            'status' => '1',
        ];
        try {
            Cache::forget($uuid);
            //设置当前用户登录状态，1为登录成功
            $seconds = Carbon::now()->addSeconds(7200);
            Cache::add($uuid, encrypt($data), $seconds);
        } catch (\Exception $exception) {

            return ['status' => 0, 'msg' => '登录失败，请重新扫码', 'data' => []];
        }

        return ['status' => 1, 'msg' => '登录成功', 'data' => []];
    }


    //获取栏目分类
    public function get_category()
    {
        $list = Sort::select(['id', 'name'])->get();
        $data = ['status' => 1, 'data' => ['list' => $list], 'msg' => ''];

        return $data;
    }

    //获取小程序二维码
    public function createwxaqrcode()
    {
        $access_token = self::access_token();
        $url          = 'https://api.weixin.qq.com/cgi-bin/wxaapp/createwxaqrcode?access_token=' . $access_token;
        $data         = json_encode(['path' => 'pages/index/index', 'width' => 430], JSON_UNESCAPED_UNICODE);
        $client       = new Client();
        $img_code     = $client->post($url, ['body' => $data])->getBody()->getContents();
        $newFilePath  = self::CreateImage('createwxaqrcode.png', $img_code);

        return asset($newFilePath);
    }

    //登录小程序
    public function login(Request $request)
    {
        $code                = $request->get('code');
        $token               = $request->get('token');
        $userInfo            = $request->get('userInfo');
        $userInfo['address'] = $request->get('address');
        $form_id             = $request->get('form_id');
        $appid               = 'wxe97a91b8d58d8021';
        $appsecret           = '51feac652d4ad42e402a028f76a63ddc';
        $url                 = "https://api.weixin.qq.com/sns/jscode2session?appid={$appid}&secret={$appsecret}&js_code={$code}&grant_type=authorization_code";
        $client              = new Client();
        $mini_user           = Cache::get($token);
        //当cache中没有该用户时执行登录操作
        if (empty($mini_user)) {
            $re = $client->get($url)->getBody()->getContents();
            //code换区的信息
            $base_info   = json_decode($re, true);
            $session_key = $base_info['session_key'];
            $openid      = $base_info['openid'];
            //检测维护用户信息
            $user_info = self::get_user_info($openid, $userInfo);
            if (!empty($form_id)) {
                UserMiniFormid::AddData(['openid' => $openid, 'form_id' => $form_id], ['form_id' => $form_id]);
            }
            $user_info['session_key'] = $session_key;
            $token                    = base64_encode(base64_encode($openid . time() . $session_key));
            //设置7200秒（两个小时）
            $seconds = Carbon::now()->addSeconds(7200);
            $re_info = Cache::add($token, encrypt($user_info), $seconds);

            //返回登录状态
            if (empty($re_info)) {
                return ['status' => '-100', 'msg' => '登录失败！,请重新登录', 'data' => []];
            }

            //发送消息通知
            if ($user_info['is_register']) {
                self::send_template_message($openid, '', ['追梦小屋小程序', '感谢您的关注，您的支持是对我们最大的鼓励', $user_info['nickname'], date('Y-m-d H:i:s', time())]);
            } else {
                self::send_template_message($openid, '', ['欢迎你回来了', '有时间常回家看看，定期为您提供服务', $user_info['nickname'], date('Y-m-d H:i:s', time())]);
            }
        }

        return ['status' => 1, 'msg' => '登录成功！', 'data' => ['token' => $token, 'test' => $mini_user]];

    }

    //退出小程序
    public function quit(Request $request)
    {
        $re = Cache::flush();
        dd($re);
    }

    //维护用户信息，并且返回用户信息
    public static function get_user_info($openid, $userInfo)
    {
        //用户信息
        $data = [
            'openid'    => $openid,
            'nickname'  => $userInfo['nickName'],
            'avatarurl' => $userInfo['avatarUrl'],
            'gender'    => $userInfo['gender'],
            'country'   => $userInfo['country'],
            'province'  => $userInfo['province'],
            'city'      => $userInfo['city'],
            'language'  => $userInfo['language'],
            'address'   => $userInfo['address'],
        ];
        if (UserMini::checkRowExists(['openid' => $openid])) {
            //编辑用户信息
            $user_info                = UserMini::EditData(['openid' => $openid], $data);
            $user_info['is_register'] = false;
        } else {
            //创建新用户
            $user_info                = UserMini::AddData($data);
            $user_info['is_register'] = true;
        }

        return $user_info;
    }


    /**
     * 获取access_token并且维护access_token过期时间
     * @return mixed
     */
    public static function access_token()
    {
        $access_token = Cache::get('access_token');
        if (empty($access_token)) {
            $appid     = 'wxe97a91b8d58d8021';
            $appsecret = '51feac652d4ad42e402a028f76a63ddc';
            $url       = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=' . $appid . '&secret=' . $appsecret;
            $client    = new Client();
            $result    = $client->get($url)->getBody()->getContents();
            //获取$access_token过期时间
            $access_token = json_decode($result, true)['access_token'];
            $expires_in   = json_decode($result, true)['expires_in'];
            //设置7200秒（两个小时）
            $seconds = Carbon::now()->addSeconds($expires_in);
            $re_info = Cache::add('access_token', $access_token, $seconds);
            if (!empty($re_info)) {
                return $access_token;
            } else {
                return self::access_token();
            }
        } else {
            return $access_token;
        }
    }


    //发送模板消息，并且消费form_id
    public static function send_template_message($openid, $template_id, $values)
    {
        $template_id = empty($template_id) ? '2Z9ma8ZfCnNpVP1uMLWMMysrdiScecKmDA4MzgNGbxo' : $template_id;
        $form_data   = UserMiniFormid::getOne(['openid' => $openid], ['form_id']);
        $form_id     = $form_data['form_id'];
        $values      = empty($values) ? ['追梦小屋小程序', '感谢您的关注，您的支持是对我们最大的鼓励', '追梦小窝', date('Y-m-d H:i:s', time())] : $values;
        $result      = self::template_message($openid, $template_id, $form_id, $values);
        UserMiniFormid::selected_delete(['form_id' => $form_id]);
        if ($result["errcode"] == 0) {
            return ['status' => 1, 'msg' => '消息发送成功', 'data' => []];
        } else {
            //发送失败，删除无用form_id重新调用该方法
            if ($form_id != "the formId is a mock one") {
                UserMiniFormid::selected_delete(['form_id' => $form_id]);
            }

            return ['status' => 0, 'msg' => '消息发送失败', 'data' => []];
        }
    }


    /**
     * 模板消息处理
     * @param $openid
     * @param $template_id
     * @param $form_id
     * @param array $values
     * @param string $page
     * @param string $emphasis_keyword
     * @return string
     */
    public static function template_message($openid, $template_id, $form_id, $values = [], $page = 'pages/index/index', $emphasis_keyword = 'keyword1.DATA')
    {
        $client       = new Client();
        $access_token = self::access_token();
        $url          = "https://api.weixin.qq.com/cgi-bin/message/wxopen/template/send?access_token={$access_token}";
        $body         = [
            'touser'           => $openid,
            'template_id'      => $template_id,
            'page'             => $page,
            'form_id'          => $form_id,
            'emphasis_keyword' => $emphasis_keyword,
        ];
        foreach ($values as $key => $val) {
            $keyword                         = "keyword" . ($key + 1);
            $body['data'][$keyword]['value'] = $val;
        }
        $re     = $client->post($url, ['body' => json_encode($body)])->getBody()->getContents();
        $result = json_decode($re, true);

        return $result;
    }


    //小程序首页数据
    public function index()
    {
        $pagesize    = request()->get('pagesize');
        $category_id = request()->get('category_id');
        $where       = [];
        $category_id ? $where[] = ['sort_id', $category_id] : '';
        $list = Blog::where($where)->select('gid', 'title', 'date')->limit($pagesize)->orderby('date', 'DESC')->get();
        foreach ($list as $key => $val) {
            $val['date'] = date('Y-m-d', $val['date']);
        }
        if ($pagesize - $list->count() > 10) {
            $data = ['status' => 0, 'data' => ['list' => $list], 'msg' => ''];
        } else {
            $data = ['status' => 1, 'data' => ['list' => $list], 'msg' => ''];
        }

        return $data;
    }

    //小程序文章页面
    public function article()
    {
        $blog_id = request()->get('blog_id');
        if ($blog_id) {
            $article = Blog::where(['gid' => $blog_id])->select('title', 'content')->first();
            $data    = ['status' => '1', 'data' => $article];
        } else {
            $data = ['status' => '1', 'data' => '没有数据'];
        }

        return $data;
    }

    //创建图片
    public static function CreateImage($newFile, $img_code, $path = './')
    {
        if (!is_dir($path)) {
            mkdir($path, 755);
        }
        $dir = realpath($path);
        //目录+文件
        $newFilePath = $dir . (empty($newFile) ? '/' . time() . '.jpg' : '/' . $newFile);
        $data        = $img_code;//得到post过来的二进制原始数据
        if (empty($data)) {
            $data = file_get_contents("php://input");
        }
        $resource = fopen($newFilePath, "w");//打开文件准备写入
        fwrite($resource, $data);//写入二进制流到文件
        fclose($resource);//关闭文件

        $result = $path . (empty($newFile) ? '/' . time() . '.jpg' : '/' . $newFile);

        return str_replace('./', '', $result);
    }
}