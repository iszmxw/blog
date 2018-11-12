<?php

namespace App\Http\Controllers\Admin;

use App\Library\HttpCurl;
use App\Models\Options;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class AdminController extends Controller
{
    //后台首页
    public function index(Request $request)
    {
        $user_data = $request->get('user_data');
        $data['php_version'] = phpversion();
        $data['laravel_version'] = app()->version();
        $phpinfo = $request->get('phpinfo');
        if ($phpinfo == 'yes'){
            echo phpinfo();
        }else{
            return view('admin.index',['user_data'=>$user_data,'data'=>$data]);
        }
    }

    //基本配置
    public function config(Request $request)
    {
        $user_data = $request->get('user_data');
        $config['blogname'] = Options::getValue(['option_name'=>'blogname'],'option_value');
        $config['bloginfo'] = Options::getValue(['option_name'=>'bloginfo'],'option_value');
        $config['blogurl'] = Options::getValue(['option_name'=>'blogurl'],'option_value');
        $config['icp'] = Options::getValue(['option_name'=>'icp'],'option_value');
        $config['footer_info'] = Options::getValue(['option_name'=>'footer_info'],'option_value');
        return view('admin.config',['user_data'=>$user_data,'config'=>$config]);
    }

    public function config_edit_check(Request $request)
    {
        $data['blogname'] = $request->get('blogname');
        $data['bloginfo'] = $request->get('bloginfo');
        $data['blogurl'] = $request->get('blogurl');
        $data['icp'] = $request->get('icp');
        $data['footer_info'] = $request->get('footer_info');
        //数据库事物回滚
        DB::beginTransaction();
        try {
            if ($data['blogname'])Options::EditData(['option_name'=>'blogname'],['option_value'=>$data['blogname']]);
            if ($data['bloginfo'])Options::EditData(['option_name'=>'bloginfo'],['option_value'=>$data['bloginfo']]);
            if ($data['blogurl'])Options::EditData(['option_name'=>'blogurl'],['option_value'=>$data['blogurl']]);
            if ($data['icp'])Options::EditData(['option_name'=>'icp'],['option_value'=>$data['icp']]);
            if ($data['footer_info'])Options::EditData(['option_name'=>'footer_info'],['option_value'=>$data['footer_info']]);
            DB::commit();
            return response()->json(['data'=>'修改成功！','status'=>'1']);
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();//事件回滚
            return response()->json(['data'=>'编辑失败，请稍后再试！','status'=>'0']);
        }
    }

    public function login()
    {
        return view('admin.login');
    }

    public function login_check(Request $request)
    {
        $username = $request->get('username');
        $password = $request->get('password');
        $user_data = User::getOne(['username'=>$username]);
        $data = $user_data->toArray();
        if ($user_data){
            if (decrypt($user_data['password']) == $password){
                Redis::set('user_data',json_encode($data));
                session(['user_data'=>$data]);
                return response()->json(['data'=>'登录成功！','Status'=>'1']);
            }else{
                return response()->json(['data'=>'密码不正确！','Status'=>'0']);
            }
        }else{
            return response()->json(['data'=>'用户不存在，请检查用户名是否正确！！','Status'=>'0']);
        }
    }


    //QQ登录授权
    public function qq_login_auth(Request $request)
    {
        $appid = '101523010';
        $appkey = 'ac7d4e7a120f907e69df29799619cc47';
        $redirect_uri = 'http://blog.54zm.cn/admin/qq_login';
        $request_url='https://graph.qq.com/oauth2.0/authorize';
        $url = $request_url.'?response_type=code&client_id='.$appid.'&redirect_uri='.$redirect_uri.'&state=state';
        return redirect($url);
    }

    //QQ登录
    public function qq_login(Request $request)
    {
        $grant_type = 'authorization_code';
        $client_id = '101523010';
        $client_secret = 'ac7d4e7a120f907e69df29799619cc47';
        $code = $request->get('code');
        $redirect_uri = 'http://blog.54zm.cn/admin/qq_login';
        $request_url = 'https://graph.qq.com/oauth2.0/token';
        $url = "{$request_url}?grant_type={$grant_type}&client_id={$client_id}&client_secret={$client_secret}&code={$code}&redirect_uri={$redirect_uri}";
        $re = HttpCurl::doGet($url);
        return $re;
    }

    public function quit()
    {
        session()->put('user_data','');
        return redirect('admin');
    }
}
