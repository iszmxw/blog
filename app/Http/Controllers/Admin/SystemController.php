<?php

namespace App\Http\Controllers\Admin;

use App\Models\Options;
use App\Models\ViewLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SystemController extends Controller
{
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
            dd($e);
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
