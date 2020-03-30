<?php

namespace App\Http\Controllers\AdminWeb;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Options;
use App\Models\Twitter;
use App\Models\User;
use App\Models\Userqq;
use App\Models\ViewLog;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class AdminController extends Controller
{
    /**
     * 后台首页
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author: iszmxw <mail@54zm.com>
     * @Date：2019/11/16 10:00
     */
    public function index(Request $request)
    {
        $data['php_version']     = phpversion();
        $data['laravel_version'] = app()->version();
        $data['blog_count']      = Blog::getCount();
        $data['comment_count']   = Comment::getCount();
        $data['twitter_count']   = Twitter::getCount();
        $phpinfo                 = $request->get('phpinfo');
        if ($phpinfo == 'yes') {
            echo phpinfo();
        } else {
            return view('admin.index', $data);
        }
    }

    /**
     * 基本配置
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author: iszmxw <mail@54zm.com>
     * @Date：2019/11/16 10:00
     */
    public function config(Request $request)
    {
        $user_data             = $request->get('user_data');
        $config['blogname']    = Options::getValue('blogname');
        $config['bloginfo']    = Options::getValue('bloginfo');
        $config['blogurl']     = Options::getValue('blogurl');
        $config['icp']         = Options::getValue('icp');
        $config['footer_info'] = Options::getValue('footer_info');
        return view('admin.config', ['user_data' => $user_data, 'config' => $config]);
    }

    /**
     * 修改站点基本配置
     * @param Request $request
     * @return array
     * @throws \Exception
     * @author: iszmxw <mail@54zm.com>
     * @Date：2019/11/16 10:10
     */
    public function config_edit_check(Request $request)
    {
        $data['blogname']    = $request->get('blogname');
        $data['bloginfo']    = $request->get('bloginfo');
        $data['blogurl']     = $request->get('blogurl');
        $data['icp']         = $request->get('icp');
        $data['footer_info'] = $request->get('footer_info');
        //数据库事物回滚
        DB::beginTransaction();
        try {
            if ($data['blogname']) {
                Options::EditData(['option_name' => 'blogname'], ['option_value' => $data['blogname']]);
            }
            if ($data['bloginfo']) {
                Options::EditData(['option_name' => 'bloginfo'], ['option_value' => $data['bloginfo']]);
            }
            if ($data['blogurl']) {
                Options::EditData(['option_name' => 'blogurl'], ['option_value' => $data['blogurl']]);
            }
            if ($data['icp']) {
                Options::EditData(['option_name' => 'icp'], ['option_value' => $data['icp']]);
            }
            if ($data['footer_info']) {
                Options::EditData(['option_name' => 'footer_info'], ['option_value' => $data['footer_info']]);
            }
            DB::commit();
            return ['msg' => '修改成功！', 'code' => 200];
        } catch (\Exception $e) {
            \Log::debug($e);
            DB::rollBack();//事件回滚
            return ['msg' => '编辑失败，请稍后再试！', 'code' => 500];
        }
    }

    /**
     * 浏览记录
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author: iszmxw <mail@54zm.com>
     * @Date：2019/11/16 10:04
     */
    public function view_log(Request $request)
    {
        $user_data = $request->get('user_data');
        $view_log  = ViewLog::getPaginate([], ['*'], 20, 'updated_at', 'DESC');
        return view('admin.view_log_list', ['user_data' => $user_data, 'view_log' => $view_log]);
    }

    /**
     * 登录页面
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     * @author: iszmxw <mail@54zm.com>
     * @Date：2019/11/16 10:09
     */
    public function login(Request $request)
    {
        $data = $request->session()->get('user_data');
        if ($data) {//检测是否已经登录，已经登录就跳转
            return redirect('admin_web');
        } else {
            return view('admin.login');
        }
    }

    /**
     * 后台登录检测
     * @param Request $request
     * @return array
     * @author: iszmxw <mail@54zm.com>
     * @Date：2019/11/16 10:09
     */
    public function login_check(Request $request)
    {
        $username  = $request->get('username');
        $password  = $request->get('password');
        $user_data = User::getOne(['username' => $username]);
        $data      = $user_data;
        if ($user_data) {
            if (decrypt($user_data['password']) == $password) {
                Redis::connection('blog_admin')->set('user_data', json_encode($data));
                session(['user_data' => $data]);
                return ['msg' => '登录成功！', 'code' => 200];
            } else {
                return ['msg' => '密码不正确！', 'code' => 500];
            }
        } else {
            return ['msg' => '用户不存在，请检查用户名是否正确！！', 'code' => 500];
        }
    }


    /**
     * QQ登录授权第一步
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @author: iszmxw <mail@54zm.com>
     * @Date：2019/11/16 10:11
     */
    public function qq_login_auth(Request $request)
    {
        $prev_url = url()->previous();
//        $appid = '101523010';
        $appid        = '101518045';
        $redirect_uri = 'http://blog.54zm.com/admin/qq_login';
        $request_url  = 'https://graph.qq.com/oauth2.0/authorize';
        $url          = "{$request_url}?response_type=code&client_id={$appid}&redirect_uri={$redirect_uri}&state={$prev_url}&scope=get_user_info";
        return redirect($url);
    }

    /**
     * QQ登录授权第二步
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @author: iszmxw <mail@54zm.com>
     * @Date：2019/11/16 10:12
     */
    public function qq_login(Request $request)
    {
        $client_id     = '101518045';
        $client_secret = '9d7c45e29ed77a7d728b2367f06361f8';
        $code          = $request->get('code');
        //上一页地址
        $state = $request->get('state');
        //跳转回调地址
        $redirect_uri = 'http://blog.54zm.com/admin/qq_login';
        //请求地址
        $url      = "https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&client_id={$client_id}&client_secret={$client_secret}&code={$code}&redirect_uri={$redirect_uri}";
        $client   = new Client();
        $response = $client->get($url)->getBody()->getContents();
        //检测返回结果是否包含错误信息
        $error_msg = strstr($response, 'error');
        if ($error_msg) {
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
        $openid              = json_decode($re_json, true)['openid'];
        $user_info           = $client->get("https://graph.qq.com/user/get_user_info?access_token={$access_token}&oauth_consumer_key={$client_id}&openid={$openid}")->getBody()->getContents();
        $user_info           = json_decode($user_info, true);
        $user_info['openid'] = $openid;
        $qq_id               = Userqq::getValue(['openid' => $openid], 'id');
        $id                  = Userqq::getValue(['openid' => $openid], 'user_id');
        //需要更新的数据
        $user_qq_data = [
            'nickname'   => $user_info['nickname'],
            'header_img' => $user_info['figureurl_qq_2'],
            'sex'        => $user_info['gender'],
            'year'       => $user_info['year'],
            'province'   => $user_info['province'],
            'city'       => $user_info['city'],
        ];
        if (!empty($id) && $id == '1') {
            Userqq::EditData(['openid' => $openid], $user_qq_data);
            $user_data = User::getOne(['id' => $id]);
            Redis::connection('blog_admin')->set('user_data', json_encode($user_data));
            session(['user_data' => $user_data]);
            return redirect('admin');
        } elseif (empty($qq_id)) {
            $user_qq_data['openid'] = $openid;
            Userqq::create($user_qq_data);
            //用户登录留言使用
            session(['qq_data' => $user_qq_data]);
            $request->attributes->add(['qq_data' => $user_qq_data]); //添加参数
        } else {
            Userqq::EditData(['openid' => $openid], $user_qq_data);
            //用户登录留言使用
            session(['qq_data' => $user_qq_data]);
            $request->attributes->add(['qq_data' => $user_qq_data]); //添加参数
        }
        return redirect('http://blog.54zm.com');
    }

    /**
     * 退出后台
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @author: iszmxw <mail@54zm.com>
     * @Date：2019/11/16 10:20
     */
    public function quit()
    {
        session()->put('user_data', '');
        return redirect('admin/login');
    }
}
