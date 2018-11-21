<?php

namespace App\Http\Middleware\Web;

use App\Library\IpAddress;
use App\Models\Navi;
use App\Models\ViewLog;
use Closure;

class Web
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $ip = $request->getClientIp();
        $address = IpAddress::address($ip);
        //添加用户访问记录
        self::AddViewlog($address);
        //获取路由中的参数，文章id
        $article_id = $request->route('article_id');
        $route = $request->getPathInfo();
        self::Navdata($request); //添加菜单
        switch ($route){
            case '/';
            case '/article/'.$article_id;
                break;
            case '/blog/api/comment';
                $re = self::User_qq($request);
                return self::format_response($re,$next);
                break;
        }
        return $next($request);
    }


    public static function Navdata($request)
    {
        $nav = Navi::get_select(['pid'=>'0','hide'=>'n'],['id','naviname','url','newtab'],'taxis','ASC')->toArray();
        foreach ($nav as $key=>$val){
            $val['sub_menu'] = Navi::get_select(['pid'=>$val['id'],'hide'=>'n'],['id','naviname','url','newtab'],'taxis','ASC')->toArray();
        }
        dump($nav);
        $request->attributes->add(['nav'=>$nav]);
        return $request;
    }

    //检测用户是否QQ登录
    public static function User_qq($request)
    {
        $data = session()->get('qq_data');
        if ($data){
            $request->attributes->add(['qq_data'=>$data]); //添加参数
            return self::RtData(1,$request);
        }else{
            if ($request->isMethod('post')) {
                $re = self::RtData(0,"请先登录后再操作!");
                return self::RtData(0,$re);
            } elseif ($request->isMethod('get')) {
                return self::RtData(0,redirect('admin/login'));
            }
        }
    }


    //返回结果
    public static function RtData($status,$data)
    {
        return ['status'=>$status,'data'=>$data];
    }


    //返回Json数据
    public static function RtJson($status,$data)
    {
        return response()->json(['status'=>$status,'data'=>$data]);
    }

    //格式化返回值
    public static function format_response($re, Closure $next)
    {
        if ($re['status'] == '0') {
            return response()->json($re['data']);
        } else {
            return $next($re['data']);
        }
    }

    //添加浏览记录
    public static function AddViewlog($address)
    {
        $log = ViewLog::getOne(['ip'=>$address['origip']]);
        if ($log){
            $num = $log['num'] + 1;
            ViewLog::editData(['num'=>$num],['id'=>$log['id']]);
        }else{
            ViewLog::addData(['ip'=>$address['origip'],'ip_position'=>$address['location']]);
        }
    }
}
