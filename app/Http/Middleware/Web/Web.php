<?php

namespace App\Http\Middleware\Web;

use App\Library\IpAddress;
use App\Models\Navi;
use App\Models\Sort;
use App\Models\Link;
use App\Models\Comment;
use App\Models\Twitter;
use App\Models\User;
use App\Models\Blog;
use App\Models\ViewLog;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
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
        $full = URL::full();
        $previous = URL::previous();
        $address = IpAddress::address($ip);
        //添加用户访问记录
        if ($address){
            $address['full'] = $full;
            $address['previous'] = $previous;
            self::AddViewlog($address);
        }
        //获取路由中的参数，文章id
        $article_id = $request->route('article_id');
        $route = $request->getPathInfo();
        //处理公共数据
        self::CommonData($request);

        //共享用户信息到所有视图
        $uesr_data = User::getOne(['uid'=>'1']);
        $uesr_data['photo'] = str_replace('../','/',$uesr_data['photo']);
        View::share('user_data', $uesr_data);

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


    //公共数据
    public static function CommonData($request)
    {
        $client = new Client();
        //左侧导航栏
        $nav = Navi::get_select(['pid'=>'0','hide'=>'n'],['id','naviname','navicon','url','newtab','pid','isdefault'],'taxis','ASC')->toArray();
        foreach ($nav as $key=>$val){
            $nav[$key]['sub_menu'] = Navi::get_select(['pid'=>$val['id'],'hide'=>'n'],['id','naviname','navicon','url','newtab','pid','isdefault'],'taxis','ASC')->toArray();
        }
        //分类统计
        $sort = Sort::getList([]);
        foreach ($sort as $key=>$val){
            $sort[$key]['count'] = Blog::getCount(['sortid'=>$val['sid']]);
        }
        //群信息
//        $response = $client->get('http://54zm.com/http_qun?qun=455924702');
//        $qun = json_decode($response->getBody()->getContents());
        //友情链接
        $link = Link::getList([]);
        //前十条评论数据调用
        $comments = Comment::getList(['hide'=>'n'],'',0,6,'date','DESC');
        foreach($comments as $key=>$val){
            if(empty($val['mail'])){
                $comments[$key]['mail'] = "10000";
            }
            $comments[$key]['blog_title'] = Blog::getValue(['gid'=>$val['gid']],'title');
        }
        //站点统计信息
        $site_info['naissance'] = floor((time()-strtotime('2015-8-1'))/86400);
        $site_info['comments'] = Comment::getCount([]);
        $site_info['twitters'] = Twitter::getCount([]);
        $site_info['blogs'] = Blog::getCount([]);

        View::share('nav',$nav);
        View::share('sort',$sort);
//        View::share('qun',$qun);
        View::share('link',$link);
        View::share('comments',$comments);
        View::share('site_info',$site_info);
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
            ViewLog::editData(['id'=>$log['id']],['num'=>$num,'full'=>$address['full']]);
        }else{
            ViewLog::addData(['ip'=>$address['origip'],'ip_position'=>$address['location'],'previous'=>$address['previous'],'full'=>$address['full']]);
        }
    }
}
