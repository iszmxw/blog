<?php

namespace App\Http\Controllers\Admin;
use App\Models\Blog;
use App\Models\Sort;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //栏目分类列表
    public function category_list(Request $request)
    {
        $user_data = $request->get('user_data');
        $list = Sort::getPaginate([],'taxis','ASC',10);
        $sort = Sort::getList([]);
        foreach ($list as $value){
            $value['blogs'] = Blog::where(['sortid'=>$value['sid']])->count();
        }
        return view('admin.category_list',['user_data'=>$user_data,'sort'=>$sort,'list'=>$list]);
    }

    //添加分类
    public function category_add_check(Request $request)
    {
        $data['sortname'] = $request->get('sortname');
        $data['alias'] = $request->get('alias');
        $data['pid'] = $request->get('pid');
        $data['description'] = $request->get('description');
        DB::beginTransaction();
        try{
            Sort::create($data);
            DB::commit();
            return response()->json(['data'=>'添加分类成功！','status'=>'1']);
        }catch (\Exception $e){
            dd($e);
            DB::rollBack();
            return response()->json(['data'=>'添加失败请稍后再试！','status'=>'0']);
        }
    }

    //分类数据获取
    public function category_data(Request $request)
    {
        $id = $request->get('id');
        $data = Sort::getOne(['sid'=>$id]);
        return response()->json(['status'=>'1','data'=>$data]);
    }

    //修改分类数据
    public function category_data_edit_check(Request $request)
    {
        $sid = $request->get('sid');
        $data['sortname'] = $request->get('sortname');
        $data['alias'] = $request->get('alias');
        $data['pid'] = $request->get('pid');
        $data['description'] = $request->get('description');
        DB::beginTransaction();
        try{
            Sort::EditData(['sid'=>$sid],$data);
            DB::commit();
            return response()->json(['data'=>'编辑分类信息成功！','status'=>'1']);
        }catch (\Exception $e){
            dd($e);
            DB::rollBack();
            return response()->json(['data'=>'编辑失败请稍后再试！','status'=>'0']);
        }
    }

    //删除分类信息
    public function category_delete_check(Request $request)
    {
        $sid = $request->get('id');
        DB::beginTransaction();
        try{
            Sort::selected_delete(['sid'=>$sid]);
            DB::commit();
            return response()->json(['data'=>'删除分类信息成功！','status'=>'1']);
        }catch (\Exception $e){
            dd($e);
            DB::rollBack();
            return response()->json(['data'=>'删除失败请稍后再试！','status'=>'0']);
        }

    }

    //首页导航栏列表
    public function navbar_list(Request $request)
    {
        $user_data = $request->get('user_data');
        return view('admin.navbar_list',['user_data'=>$user_data]);
    }
}
