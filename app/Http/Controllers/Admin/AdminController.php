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
//        $users = User::getOne(['username'=>'admin']);
//        $redis = Redis::get('user_data');
//        dump("恭喜您登录成功，可以开始写项目啦！");
//        dump(json_decode($redis));
        return view('admin.index');
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
