<?php

namespace App\Library;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class Upload
{
    /**
     * 本地上传图片方法
     * @param $request
     * @param $field
     * @param $upload_path
     * @param $file_name
     * @return array
     * @author：iszmxw <mail@54zm.com>
     * @time：2019/12/30 20:47
     */
    public static function images($request, $field, $upload_path, $file_name)
    {
        $file = $request->file($field);
        if (empty($file)) {
            return ['code' => 500, 'message' => '请您选择要上传的文件!'];
        }
        //检验一下上传的文件是否有效
        if ($file->isValid()) {
            if ($file->getSize() > $file_size = 5000 * 1024) {
                return ['code' => 500, 'message' => '上传文件过大,不能大于5M'];
            }
            $ext = strtolower($file->getClientOriginalExtension());
            if (!in_array($ext, ['png', 'jpg', 'gif'])) {
                return ['code' => 500, 'message' => '请上传png、jpg、gif格式的图片'];
            }
            //重命名文件,文件名加上后缀
            $NewFileName = $file_name . '.' . $ext;
            // 上传文件并判断
            $path    = $file->move(public_path() . '/' . $upload_path, $NewFileName);
            $img_url = '/' . $upload_path . $NewFileName;
            if ($path->isFile()) {
                return ['code' => 200, 'path' => $img_url, 'complete_path' => asset($img_url), 'message' => 'ok'];
            }
        } else {
            return ['code' => 500, 'message' => '上传文件无效'];
        }
    }


    /**
     * 下载远程图片保存到本地
     * @param $url // 远程图片地址
     * @param string $save_dir 需要保存的地址
     * @param string $filename 保存文件名
     * @return array
     */
    public static function download($url, $filename, $save_dir = './public/upload/iszmxw/')
    {
        if (trim($save_dir) == '') {
            $save_dir = './';
        }
        if (0 !== strrpos($save_dir, '/'))
            $save_dir .= '/';

        //创建保存目录
        if (!file_exists($save_dir) && !mkdir($save_dir, 0777, true))
            return array('file_name' => '', 'save_path' => '', 'error' => 5);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 信任任何证书
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        $file = curl_exec($ch);
        curl_close($ch);
        if (empty($filename)) {
            $filename = pathinfo($url, PATHINFO_BASENAME);
        }
        $resource = fopen($save_dir . $filename, 'a');
        fwrite($resource, $file);
        fclose($resource);
        unset($file, $url);
        return ['save_path' => $save_dir . $filename, 'error' => 0];
    }


    /**
     * 上传文件到github
     * @param $img_path
     * @return string
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/6/20 23:24
     */
    public static function github_upload($img_path)
    {
        $access_token = "6a5d3519667172b429d3df3233a03766894dcdec";
        $path         = "images/2020/0612"; // 文件保存路径
        $new_file     = "images-" . date('YmdHis', time()) . time() . ".png";
        $url          = "https://api.github.com/repos/iszmxw/FigureBed/contents/{$path}/{$new_file}?access_token={$access_token}";
        $client       = new Client();
        $options      = [
            "json" => [
                "message"   => "文件上传测试",
                "committer" => [
                    "name"  => "iszmxw",
                    "email" => "mail@54zm.com"
                ],
                "content"   => self::imgToBase64($img_path)
            ]
        ];
        return $client->put($url, $options)->getBody()->getContents();
    }

    public static function imgToBase64($img)
    {
        $img_file   = './' . $img;
        $img_base64 = '';
        if (file_exists($img_file)) {
            $fp = fopen($img_file, "r"); // 图片是否可读权限
            if ($fp) {
                $filesize     = filesize($img_file);
                $content      = fread($fp, $filesize);
                $file_content = base64_encode($content); // base64编码
                $img_base64   = $file_content;//合成图片的base64编码
            }
            fclose($fp);
        }
        return $img_base64; //返回图片的base64
    }


}