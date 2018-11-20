<?php

namespace App\Http\Controllers\Api;

use App\Library\HttpCurl;
use App\Models\Options;
use App\Models\User;
use App\Models\Userqq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class WechatController extends Controller
{
    //token
    public function token(Request $request)
    {
        $signature = $request->get('signature');
        $timestamp = $request->get('timestamp');
        $nonce = $request->get('nonce');
        $echostr = $request->get('echostr');
        $token = 'iszmxw';
        $tmpArr = array($token,$timestamp, $nonce);
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );

        if( $signature == $tmpStr ){
            echo $echostr;
        }else{
            return false;
        }
    }
}
