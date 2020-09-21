<?php

namespace App\Http\Controllers\Admin;

use App\Library\Upload;
use App\Models\Options;
use App\Models\ViewLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SystemController extends Controller
{
    // 上传图片操作
    public function upload_images(Request $request)
    {
        $file = $request->file('file');
        // 文件将要上传的路径
        $upload_path = 'uploads/images/iszmxw/';
        // 重命名文件
        $ext       = strtolower($file->getClientOriginalExtension());
        $file_name = time() . mt_rand(1, 999) . "." . $ext;
        // 图片移动后的临时路径
        $img_path = '/' . $upload_path . $file_name;
        // 上传文件并判断
        $path = $file->move(public_path() . '/' . $upload_path, $file_name);
        // 文件移动成功
        try {
            if ($path->isFile()) {
                $json = Upload::github_upload($img_path);
                // 上传后删掉图片
                @unlink(public_path($img_path));
                $array = json_decode($json, true);
                if (isset($array['content']['download_url']) && $array['content']['path']) {
                    return [
                        'code'          => 20000,
                        'path'          => $array['content']['path'],
                        'complete_path' => $array['content']['download_url'],
                        'message'       => 'ok',
                    ];
                }
            }
        } catch (\Exception $e) {
            // 上传后删掉图片
            @unlink(public_path($img_path));
        }
        return ['code' => 50000, 'message' => '上传文件无效,请重新上传文件'];
    }

    // 获取网站系统配置
    public function config(Request $request)
    {
        $site_title       = Options::getOption('site_title');
        $site_description = Options::getOption('site_description');
        $site_url         = Options::getOption('site_url');
        $icp              = Options::getOption('icp');
        $footer_info      = Options::getOption('footer_info');
        $data             = [
            'site_title'       => $site_title,
            'site_description' => $site_description,
            'site_url'         => $site_url,
            'icp'              => $icp,
            'footer_info'      => $footer_info,
        ];
        return ['code' => 200, 'message' => 'ok', 'data' => $data];
    }


    /**
     * 保存网站配置
     * @param Request $request
     * @return array
     * @throws \Exception
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/4/7 19:46
     */
    public function save_config(Request $request)
    {
        $param = $request->all();
        DB::beginTransaction();
        try {
            foreach ($param as $key => $val) {
                Options::SaveOption($key, $val);
            }
            DB::commit();
            return ['code' => 200, 'message' => '操作成功！'];
        } catch (\Exception $e) {
            DB::rollback();
            return ['code' => 500, 'message' => '操作失败请稍后再试！'];
        }
    }

    /**
     * 访客记录
     * @param Request $request
     * @return array
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/4/7 19:52
     */
    public function view_log(Request $request)
    {
        $view_log = ViewLog::getPaginate([], [], 10, 'id', 'DESC');
        return ['code' => 200, 'message' => 'ok', 'data' => $view_log];
    }
}
