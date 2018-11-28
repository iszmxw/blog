<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Support\Facades\View;

class Admin
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
        $route = $request->getPathInfo();
        switch ($route){
            case '/admin';
            case '/admin/config';
            case '/admin/view_log';
            case '/admin/ajax/config_edit_check';
            //文章管理
            case '/admin/article/article_add';
            case '/admin/ajax/article_add_check';
            case '/admin/ajax/article_delete_check';
            case '/admin/article/article_edit';
            case '/admin/ajax/article_edit_check';
            case '/admin/article/article_list';
            //栏目管理
            case '/admin/category/category_list';
            case '/admin/category/navbar_list';
            case '/admin/ajax/navbar_add_check';
            case '/admin/ajax/navbar_data';
            case '/admin/ajax/navbar_data_edit_check';
            case '/admin/ajax/navbar_delete_check';
            case '/admin/ajax/navbar_sort';
            //说说管理
            case '/admin/plugins/twitter_list';
            case '/admin/plugins/twitter_delete_check';
            //标签管理
            case '/admin/plugins/tag_list';
            case '/admin/ajax/tag_edit_data';
            case '/admin/ajax/tag_edit_data_check';
            case '/admin/ajax/tag_delete_check';
            //评论管理
            case '/admin/plugins/comment_list';
            case '/admin/ajax/comment_delete_check';
            case '/admin/ajax/comment_hide_check';
            case '/admin/ajax/comment_data';
            case '/admin/ajax/comment_data_check';
            //友情链接
            case '/admin/plugins/link_list';
            case '/admin/ajax/link_list_data';
            case '/admin/ajax/link_list_data_check';
            case '/admin/ajax/link_delete_check';
            case '/admin/ajax/link_list_add_check';
                $re = self::CheckIsLoginAndHasRole($request);
                return self::format_response($re,$next);
                break;
            case '/admin/login';
                $data = $request->session()->get('user_data');
                if ($data){//检测是否已经登录，已经登录就跳转
                    return redirect('admin');
                }
                break;
            case '/admin/quit';
                break;
        }
        return $next($request);
    }

    //检测是否登录
    public static function CheckIsLogin($request)
    {
        $data = $request->session()->get('user_data');
        if ($data){
            dump(base_path().$data['photo']);
            $data['photo'] = realpath(base_path().$data['photo']);
            dump($data['photo']);
            $request->attributes->add(['user_data'=>$data]);
            View::share('user_data', $data);
            return self::RtData(1,$request);
        }else{
            if ($request->isMethod('post')) {
                return self::RtJson(0,'登录状态失效!');
            } elseif ($request->isMethod('get')) {
                return self::RtData(0,redirect('admin/login'));
            }
        }
    }

    //检测登录和权限
    public static function CheckIsLoginAndHasRole($request)
    {
        $re = self::CheckIsLogin($request);
        if ($re['status'] == '0'){
            return $re;
        }else{
            //权限暂时不做拦截
            return $re;
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
            return $re['data'];
        } else {
            return $next($re['data']);
        }
    }
}
