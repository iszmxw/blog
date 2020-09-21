<?php

namespace App\Http\Controllers\Admin;

use App\Models\Navi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NavbarController extends Controller
{
    /**
     * 导航列表
     * @param Request $request
     * @return array
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/4/28 16:19
     */
    public function navbar_list(Request $request)
    {
        $list = Navi::getPaginate([], '', 100, 'sort', 'ASC');
        return ['code' => 200, 'message' => 'ok', 'data' => $list];
    }

    /**
     * 导航排序
     * @param Request $request
     * @return array
     * @throws \Exception
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/4/28 16:46
     */
    public function navbar_sort(Request $request)
    {
        $data = $request->all();
        DB::beginTransaction();
        try {
            foreach ($data as $key => $value) {
                Navi::EditData(['id' => $value], ['sort' => $key]);
            }
            Db::commit();
            return ['code' => 200, 'message' => '排序成功！'];
        } catch (\Exception $e) {
            DB::rollBack();
            return ['code' => 500, 'message' => '排序失败，请稍后再试！'];
        }
    }

    /**
     * 添加导航
     * @param Request $request
     * @return array
     * @throws \Exception
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/4/28 16:35
     */
    public function navbar_add(Request $request)
    {
        $data   = $request->all();
        $domain = config('app.url');
        if ($data['type'] === 1 && empty($data['type_id'])) {
            return ['code' => 500, 'message' => '请选择要设置为导航的栏目地址'];
        }
        if ($data['type'] === 2 && empty($data['url'])) {
            return ['code' => 500, 'message' => '请输入导航栏地址'];
        }
        // 添加系统导航栏目
        if ($data['type'] === 1 && isset($data['type_id'])) {
            $data['url'] = $domain . "/category/" . $data['type_id'];
        }
        // 添加网址导航
        if ($data['type'] === 2 && isset($data['url'])) {
            $data['type_id'] = 0;
        }
        // 添加事物包裹进行添加数据
        DB::beginTransaction();
        try {
            Navi::AddData($data);
            DB::commit();
            return ['code' => 200, 'message' => '添加成功！'];
        } catch (\Exception $e) {
            DB::rollBack();
            return ['code' => 500, 'message' => '添加失败，请稍后再试！'];
        }
    }

    /**
     * 删除导航
     * @param Request $request
     * @return array
     * @throws \Exception
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/4/28 16:41
     */
    public function navbar_delete(Request $request)
    {
        $data = $request->all();
        DB::beginTransaction();
        try {
            Navi::selected_delete($data);
            Db::commit();
            return ['code' => 200, 'message' => '删除导航栏成功！'];
        } catch (\Exception $e) {
            DB::rollback();
            return ['code' => 500, 'message' => '删除导航栏失败，请稍后再试！'];
        }
    }
    
}
