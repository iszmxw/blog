<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Models\Navi;
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
        $data['user_data'] = $request->get('user_data');
        $data['list'] = Navi::getPaginate([],'taxis','ASC',10);
        $data['category'] = Sort::getList([]);
        dump($data['category']);
        return view('admin.navbar_list',$data);
    }

    //添加导航栏数据
    public function navbar_add_check(Request $request)
    {
        $naviname = $request->get('naviname');
        $url = $request->get('url');
        $hide = $request->get('hide');
        $newtab = $request->get('newtab');
        if(!$naviname)return response()->json(['data'=>'请输入导航栏名称','status'=>'0']);
        if(!$url)return response()->json(['data'=>'请输入链接地址','status'=>'0']);
        $data['naviname'] = $naviname;
        $data['url'] = $url;
        $data['hide'] = $hide;
        $data['newtab'] = $newtab;
        DB::beginTransaction();
        try{
            Navi::create($data);
            DB::commit();
            return response()->json(['data'=>'添加导航栏成功','status'=>'1']);
        }catch (\Exception $e){
            dd($e);
            DB::rollBack();
            return response()->json(['data'=>'添加导航栏失败','status'=>'0']);
        }
    }

    //异步获取导航栏数据，编辑时使用
    public function navbar_data(Request $request)
    {
        $id = $request->get('id');
        $data = Navi::getOne(['id'=>$id]);
        if ($data){
            return response()->json(['data'=>$data,'status'=>'1']);
        }else{
            return response()->json(['data'=>'获取数据失败请稍后再试！','status'=>'0']);
        }
    }

    //编辑导航栏数据提交
    public function navbar_data_edit_check(Request $request)
    {
        $id = $request->get('id');
        $naviname = $request->get('naviname');
        $url = $request->get('url');
        $hide = $request->get('hide');
        $newtab = $request->get('newtab');
        if(!$naviname)return response()->json(['data'=>'请输入导航栏名称','status'=>'0']);
        $data['naviname'] = $naviname;
        if ($url)$data['url'] = $url;
        if ($hide)$data['hide'] = $hide;
        if ($newtab)$data['newtab'] = $newtab;
        DB::beginTransaction();
        try{
            Navi::EditData(['id'=>$id],$data);
            DB::commit();
            return response()->json(['data'=>'修改数据成功','status'=>'1']);
        }catch (\Exception $e){
            dd($e);
            DB::rollBack();
            return response()->json(['data'=>'修改数据失败！','status'=>'0']);
        }
    }

    public function navbar_delete_check(Request $request)
    {
        $id = $request->get('id');
        DB::beginTransaction();
        try{
            Navi::selected_delete(['id'=>$id]);
            DB::commit();
            return response()->json(['data'=>'删除导航栏成功','status'=>'1']);
        }catch (\Exception $e){
            dd($e);
            DB::rollBack();
            return response()->json(['data'=>'删除失败，请稍后再试！','status'=>'0']);
        }
    }
}
