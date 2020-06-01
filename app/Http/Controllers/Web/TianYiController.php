<?php
/**
 * Created by PhpStorm.
 * User: mail
 * Date: 2020/06/01
 * Time: 11:35
 */

namespace App\Http\Controllers\Web;

use QL\QueryList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TianYiController extends Controller
{
    public function index(Request $request)
    {
        $url = "https://cloud.189.cn/v2/listFiles.action?fileId=7149639355806000&mediaType=&keyword=&inGroupSpace=false&orderBy=1&order=ASC&pageNum=1&pageSize=60&noCache=0.3625186131502507";
        $ql  = QueryList::get('https://github.com', 'param1=testvalue & params2=somevalue', [
            'headers' => [
                // 从浏览器填写Cookie
                'Cookie' => 'edrive_view_mode=icon; offline_Pic_Showed=true; wpsGuideStatus=true; bad_id92f4b1d0-eda7-11e6-9886-e964fbee51ea=c534ecf1-a1a4-11ea-befb-e9a14b03d6c0; IS_SHOW_TREE=false; JSESSIONID=aaacjXskMK5U_7is47wjx; Login_Hash=; COOKIE_LOGIN_USER=D5C1110BA65EFCBC4CB6D9F298CC886604AAE93F764CC5CB195A9E3125BB7F9E52FBDBED2DD95F3E4ADF42118D76AA3AF7BD3E51593F3579E2321152'
            ]
        ]);
        echo $ql->getHtml();
//        $userName = $ql->find('.header-nav-current-user>.css-truncate-target')->text();
//        echo $userName;
    }
}