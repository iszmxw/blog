<?php
/**
 * Created by PhpStorm.
 * User: mail
 * Date: 2020/06/01
 * Time: 11:35
 */

namespace App\Http\Controllers\Web;

use GuzzleHttp\Client;
use QL\QueryList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TianYiController extends Controller
{
    public function index(Request $request)
    {
        $url = "https://cloud.189.cn/v2/listFiles.action";
        $ql  = QueryList::get($url, 'fileId=7149639355806000&mediaType=&keyword=&inGroupSpace=false&orderBy=1&order=ASC&pageNum=1&pageSize=60&noCache=0.45276064742957023', [
            'headers' => [
                // 从浏览器填写Cookie
                'Cookie'       => "edrive_view_mode=icon; offline_Pic_Showed=true; wpsGuideStatus=true; bad_id92f4b1d0-eda7-11e6-9886-e964fbee51ea=c534ecf1-a1a4-11ea-befb-e9a14b03d6c0; IS_SHOW_TREE=false; JSESSIONID=aaacjXskMK5U_7is47wjx; Login_Hash=; COOKIE_LOGIN_USER=D5C1110BA65EFCBC4CB6D9F298CC886604AAE93F764CC5CB195A9E3125BB7F9E52FBDBED2DD95F3E4ADF42118D76AA3AF7BD3E51593F3579E2321152",
                'X-Request-ID' => '745f8a4509ab4ee8a0e404341885aea7',
                'X-Cache'      => 'MISS from BC12_dx-guangdong-jiangmen-7-cache-1(baishan)',
                'X-Ser'        => 'BC42_dx-lt-yd-shandong-jinan-5-cache-6, BC12_dx-guangdong-jiangmen-7-cache-1',
            ]
        ]);
        dd($ql);
    }

    /**
     * 上传文件到github
     * @param Request $request
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/6/12 10:32
     */
    public function github(Request $request)
    {
        $access_token = "6a5d3519667172b429d3df3233a03766894dcdec";
        $path         = "images/2020/0612"; // 文件保存路径
        $file         = "images-" . date('YmdHis', time()) . time() . ".png";
        $url          = "https://api.github.com/repos/iszmxw/FigureBed/contens/{$path}/{$file}?access_token={$access_token}";
        $client       = new Client();
        $options      = [
            "form_params" => [
                "message"   => "文件上传测试",
                "committer" => [
                    "name"  => "iszmxw",
                    "email" => "mail@54zm.com"
                ],
                "content"   => "bXkgbmV3IGZpbGUgY29udGVudHM="
            ]
        ];
        $res          = $client->put($url, $options)->getBody()->getContents();
        dd($options, $res);
    }
}