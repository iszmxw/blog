<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $user_data = $request->get('user_data');
        $data['php_version'] = phpversion();
        $data['laravel_version'] = app()->version();
//        dump($data);
        $phpinfo = $request->get('phpinfo');
        if ($phpinfo == 'yes'){
            echo phpinfo();
        }else{
            return view('admin.index',['user_data'=>$user_data,'data'=>$data]);
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

    public function quit()
    {
        session()->put('user_data','');
        return redirect('admin');
    }
}
