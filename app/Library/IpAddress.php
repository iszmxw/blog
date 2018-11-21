<?php

namespace App\Library;


class IpAddress
{

    public static function address($ip)
    {
        $url = "https://sp0.baidu.com/8aQDcjqpAAV3otqbppnN2DJv/api.php?query={$ip}&co=&resource_id=6006";
        $response = HttpCurl::doGet($url);
        $response = mb_convert_encoding($response, 'utf-8','GB2312');
        $re = json_decode($response,JSON_UNESCAPED_UNICODE);
        return $re;
    }
}
