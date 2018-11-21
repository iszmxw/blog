<?php

namespace App\Library;


class HttpCurl
{
    /**
     * @param string $url
     * @return mixed
     */
    public static function doGet($url)
    {
        //初始化
        $ch = curl_init();
        $head = array(
            "Content-Type: application/json;charset=UTF-8"
        );
        curl_setopt($ch, CURLOPT_URL, $url);
        // 执行后不直接打印出来
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        // 跳过证书检查
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // 不从证书中检查SSL加密算法是否存在
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        //执行并获取HTML文档内容
        $output = curl_exec($ch);

        //释放curl句柄
        curl_close($ch);

        return $output;
    }

    /**
     * @param string $url
     * @param array $post_data
     * @param array $header
     * @return mixed
     */
    public static function doPost($url, $post_data, $header = [])
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        // 执行后不直接打印出来
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // 设置请求方式为post
        curl_setopt($ch, CURLOPT_POST, true);
        // post的变量
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        // 请求头，可以传数组
        curl_setopt($ch, CURLOPT_HEADER, $header);
        // 跳过证书检查
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // 不从证书中检查SSL加密算法是否存在
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    /**
     * 发送请求集合
     * @param $url
     * @param $method
     * @param array $postData
     * @param array $headers
     * @param bool $ssl
     * @param array $ssl_config
     * @param bool $debug
     * @return mixed
     */
    public static function httpRequest($url, $method, $postData = [], $headers = [], $ssl = false, $ssl_config = [], $debug = false)
    {
        // 将方法统一换成大写
        $method = strtoupper($method);
        // 初始化
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.2; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0");
        // 在发起连接前等待的时间，如果设置为0，则无限等待
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 60);
        // 设置CURL允许执行的最长秒数
        curl_setopt($curl, CURLOPT_TIMEOUT, 7);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, true);
                if (!empty($postData)) {
                    $tmpdatastr = is_array($postData) ? http_build_query($postData) : $postData;
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $tmpdatastr);
                }
                break;
            default:
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method); /* //设置请求方式 */
                break;
        }

        curl_setopt($curl, CURLOPT_URL, $url);

        if ($ssl == true) {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, TRUE);
            // 严格校验
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
            // 设置证书
            curl_setopt($curl, CURLOPT_SSLCERTTYPE, 'PEM');

            $certPemPath = realpath($ssl_config["certPemPath"]);
            $keyPemPath = realpath($ssl_config["keyPemPath"]);

            curl_setopt($curl, CURLOPT_SSLCERT, $certPemPath);
            curl_setopt($curl, CURLOPT_SSLKEYTYPE, 'PEM');
            curl_setopt($curl, CURLOPT_SSLKEY, $keyPemPath);
        }


        // 启用时会将头文件的信息作为数据流输出
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        // 指定最多的HTTP重定向的数量，这个选项是和CURLOPT_FOLLOWLOCATION一起使用的
        curl_setopt($curl, CURLOPT_MAXREDIRS, 2);

        // 添加请求头部
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLINFO_HEADER_OUT, true);
        // COOKIE带过去
//        curl_setopt($curl, CURLOPT_COOKIE, $Cookiestr);
        $response = curl_exec($curl);
        $requestInfo = curl_getinfo($curl);
        $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $response_error = curl_error($curl);
        // 开启调试模式就返回 curl 的结果
        if ($debug) {
            echo "=====post data======\r\n";
            dump($postData);
            echo "=====info===== \r\n";
            dump($requestInfo);
            echo "=====response=====\r\n";
            dump($response);
            echo "=====http_code=====\r\n";
            dump($http_code);
            echo "=====http_error=====\r\n";
            dump($response_error);

            dump(curl_getinfo($curl, CURLINFO_HEADER_OUT));
        }
        curl_close($curl);
        return $response;
    }
}
