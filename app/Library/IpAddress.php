<?php

namespace App\Library;


class IpAddress
{

    public static function address($ip)
    {
        $url = "https://sp0.baidu.com/8aQDcjqpAAV3otqbppnN2DJv/api.php?query={$ip}&resource_id=6006";
        $response = HttpCurl::doGet($url);
        $re = json_decode($response,true);
        return $re;
    }
}
