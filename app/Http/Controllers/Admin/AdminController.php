<?php

namespace App\Http\Controllers\Admin;

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
        Options::EditData(['']);
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

    public function quit()
    {
        session()->put('user_data','');
        return redirect('admin');
    }
}
