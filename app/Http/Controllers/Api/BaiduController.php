<?php

namespace App\Http\Controllers\Api;

use App\Mail\OrderShipped;
use App\Models\Blog;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class BaiduController extends Controller
{

    /**
     * 收集
     * @param Request $request
     * @return array
     * @author: iszmxw <mail@54zm.com>
     * @Date：2021/12/30 17:43
     */
    public function collect(Request $request): array
    {
        $params = $request->all();
        if ($params['type']) {
            $uuid = uniqid($params['type']);
            Redis::set($uuid, $params);
        }
        return ['status' => 200, 'msg' => 'ok'];
    }

    /**
     * 百度seo内容提交
     * @param Request $request
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/6/15 16:44
     */
    public function push_content(Request $request)
    {
        $start = $request->get('start');
        $type  = $request->get('type');
        if (empty($start)) {
            $blog = Blog::getList(['baidu_seo' => '0'], 'id', 0, 10);
        } else {
            $blog = Blog::getList(['baidu_seo' => '0'], 'id', $start, 10);
        }
        if (empty($type)) {
            //每周无线推送的地址
            $api = 'http://data.zz.baidu.com/urls?appid=1606122614792135&token=zIWbEIZuASc0biYF&type=batch';
        } else {
            //每天推送十条的地址
            $api = 'http://data.zz.baidu.com/urls?appid=1606122614792135&token=zIWbEIZuASc0biYF&type=realtime';
        }
        foreach ($blog as $key => $val) {
            $urls[] = 'http://blog.54zm.com/article/' . $val['id'];
        }
        $data['body'] = implode("\n", $urls);
        $client       = new Client();
        $result       = $client->post($api, $data);
        echo $result->getBody()->getContents();
    }


    /**
     * 邮件通知
     * @param Request $request
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/6/15 16:48
     */
    public function push_mail(Request $request)
    {
        $build = new OrderShipped();
        Mail::to('17722524152@189.cn')->send($build->subject('恭喜您，今日seo提交成功！'));
        dd('恭喜您，今日seo提交成功！');
    }

}
