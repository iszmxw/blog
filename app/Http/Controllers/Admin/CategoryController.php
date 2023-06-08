<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Sort;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class CategoryController extends Controller
{
    // 栏目列表
    public function category_list(Request $request): array
    {
        $where = [];
        $list  = Sort::getPaginate($where, '', 100, 'sort', 'ASC');
        $sort  = Sort::getList([]);
        foreach ($list as $value) {
            $value['article_num'] = Blog::getCount(['sort_id' => $value['id']]);
        }
        return ['code' => 200, 'message' => 'ok', 'data' => $list];
    }


    /**
     * 添加栏目
     * @param Request $request
     * @return array
     * @throws \Exception
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/4/20 12:07
     */
    public function category_add(Request $request): array
    {
        $data = $request->all();
        DB::beginTransaction();
        try {
            Sort::AddData($data);
            DB::commit();
            return ['code' => 200, 'message' => '添加栏目成功！'];
        } catch (\Exception $e) {
            DB::rollback();
            return ['code' => 500, 'message' => '添加栏目失败，请稍后再试！'];
        }
    }

    /**
     * 编辑栏目
     * @param Request $request
     * @return array
     * @throws \Exception
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/4/20 12:04
     */
    public function category_edit(Request $request): array
    {
        $data = $request->all();
        DB::beginTransaction();
        try {
            Sort::EditData(['id' => $data['id']], $data);
            DB::commit();
            return ['code' => 200, 'message' => '编辑栏目成功！'];
        } catch (\Exception $e) {
            DB::rollback();
            return ['code' => 500, 'message' => '编辑栏目失败，请稍后再试！'];
        }
    }

    /**
     * 删除栏目
     * @param Request $request
     * @return array
     * @throws \Exception
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/4/20 12:05
     */
    public function category_delete(Request $request): array
    {
        $data = $request->all();
        DB::beginTransaction();
        try {
            Sort::selected_delete($data);
            DB::commit();
            return ['code' => 200, 'message' => '删除栏目成功！'];
        } catch (\Exception $e) {
            DB::rollback();
            return ['code' => 500, 'message' => '删除栏目失败，请稍后再试！'];
        }
    }
}
