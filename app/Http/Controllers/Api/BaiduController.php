<?php

namespace App\Http\Controllers\Api;

use App\Library\HttpCurl;
use App\Models\Blog;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaiduController extends Controller
{
    //token
    public function token(Request $request)
    {
        $TOKEN = 'BlogToken';
        $strSignature = $this->getSHA1($TOKEN, $_GET['timestamp'], $_GET['nonce']);
        if ($strSignature == $_GET['signature']) {
            echo $_GET['echostr'];
        } else {
            //校验失败
            echo 'failed';
        }
    }

    public function push_content(Request $request)
    {
        $client = new Client();
        $url = 'http://data.zz.baidu.com/urls?appid=1606122614792135&token=zIWbEIZuASc0biYF&type=realtime';
        $blog = Blog::getList([],'gid');
        foreach($blog as $key=>$val){
            $data[] = 'http://blog.54zm.com/article/'.$val['gid'];
        }
        dump(implode('\n',$data));
        $response = $client->post($url,$data);
        dump($response->getBody()->getContents());
    }

    /**
     * 用sha1算法生成安全签名
     * @param string $strToken 票据
     * @param string $intTimeStamp 时间戳
     * @param string $strNonce 随机字符串
     * @param string $strEncryptMsg 密文消息
     * @return string
     */
    function getSHA1($strToken, $intTimeStamp, $strNonce, $strEncryptMsg = '')
    {
        $arrParams = array(
            $strToken,
            $intTimeStamp,
            $strNonce,
        );
        if (!empty($strEncryptMsg)) {
            array_unshift($arrParams, $strEncryptMsg);
        }
        sort($arrParams, SORT_STRING);
        $strParam = implode($arrParams);
        return sha1($strParam);
    }

}
