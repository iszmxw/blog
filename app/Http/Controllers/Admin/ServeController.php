<?php

namespace App\Http\Controllers\Admin;

use App\Models\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ServeController extends Controller
{
    /**
     * @param Request $request
     * @return array
     * @throws \Exception
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020-12-14 22:47
     */
    public function link_add(Request $request)
    {
        $data   = $request->all();
        if (empty($data['sitename'])){
            return ['code' => 500, 'message' => '友链标题不能为空！'];
        }
        if (empty($data['hide'])){
            return ['code' => 500, 'message' => '请设置是否隐藏此友链！'];
        }
        if (empty($data['siteurl'])){
            return ['code' => 500, 'message' => '网站地址不能为空！'];
        }
        if (filter_var($data['siteurl'],FILTER_VALIDATE_URL) == false){
            return ['code' => 500, 'message' => '网站地址格式不正确！'];
        }
        if (isset($data['order']) && !is_numeric($data['order'])){
            return ['code' => 500, 'message' => '排序格式不正确，应该为数字！'];
        }
        // 添加事物包裹进行添加数据
        DB::beginTransaction();
        try {
            Link::AddData($data);
            DB::commit();
            return ['code' => 200, 'message' => '添加成功！'];
        } catch (\Exception $e) {
            DB::rollBack();
            return ['code' => 500, 'message' => '添加失败，请稍后再试！'];
        }
    }

    /**
     * 删除
     * @param Request $request
     * @return array
     * @throws \Exception
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/4/28 16:41
     */
    public function link_delete(Request $request)
    {
        $data = $request->all();
        DB::beginTransaction();
        try {
            Link::selected_delete($data);
            Db::commit();
            return ['code' => 200, 'message' => '删除导航栏成功！'];
        } catch (\Exception $e) {
            DB::rollback();
            return ['code' => 500, 'message' => '删除导航栏失败，请稍后再试！'];
        }
    }

    /**
     *
     * @param Request $request
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020-12-14 22:48
     */
    public function link_edit(Request $request)
    {

    }

    /**
     * 列表
     * @param Request $request
     * @return array
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/4/28 16:19
     */
    public function link_list(Request $request)
    {
        $list = Link::getPaginate([], '', 100, 'order', 'ASC');
        return ['code' => 200, 'message' => 'ok', 'data' => $list];
    }


    /**
     *
     * @param Request $request
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020-12-14 22:48
     */
    public function link_one(Request $request)
    {

    }

    /**
     * 导航排序
     * @param Request $request
     * @return array
     * @throws \Exception
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/4/28 16:46
     */
    public function link_sort(Request $request)
    {
        $data = $request->all();
        DB::beginTransaction();
        try {
            foreach ($data as $key => $value) {
                Link::EditData(['id' => $value], ['sort' => $key]);
            }
            Db::commit();
            return ['code' => 200, 'message' => '排序成功！'];
        } catch (\Exception $e) {
            DB::rollBack();
            return ['code' => 500, 'message' => '排序失败，请稍后再试！'];
        }
    }

}
