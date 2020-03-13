<?php


namespace App\Library;

use GuzzleHttp\Client;

class IpAddress
{
    /**
     * 根据ip获取用户的地址
     * @param $ip
     * @return array|bool
     * @author：iszmxw <mail@54zm.com>
     * @time：2019/12/20 22:25
     */
    public static function address($ip)
    {
        if ("127.0.0.1" == $ip) {
            return ['origip' => $ip, 'location' => '本地开发'];
        }
        $url      = "https://sp0.baidu.com/8aQDcjqpAAV3otqbppnN2DJv/api.php?query={$ip}&resource_id=6006";
        $client   = new Client();
        $response = $client->get($url)->getBody()->getContents();
        $response = mb_convert_encoding($response, 'utf-8', 'GB2312');
        $re       = json_decode($response, true);
        if (empty($re['data'])) {
            return false;
        } else {
            return $re['data']['0'];
        }
    }
}