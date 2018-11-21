<?php

namespace App\Library;


class IpAddress
{

    public static function address($ip)
    {
        $url = "https://sp0.baidu.com/8aQDcjqpAAV3otqbppnN2DJv/api.php?query={$ip}&resource_id=6006";
        $re = HttpCurl::doGet($url);
        return $re;
    }
}
