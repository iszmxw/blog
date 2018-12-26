<?php

namespace App\Http\Controllers\Api;

use App\Library\HttpCurl;
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
