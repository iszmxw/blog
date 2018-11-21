<?php

namespace App\Library;


class IpAddress
{

    public static function address($ip)
    {
        $url = "https://sp0.baidu.com/8aQDcjqpAAV3otqbppnN2DJv/api.php?query={$ip}&co=&resource_id=6006&t=1542771237972&ie=utf8&oe=gbk";
        $response = HttpCurl::httpRequest($url,'GET',[],['Content-Type: application/json;charset=GBK']);
//        $re = json_decode($response,JSON_UNESCAPED_UNICODE);
        return $response;
    }
}
