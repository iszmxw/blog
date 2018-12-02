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
        $list = Sort::getPaginate([],'taxis',10);
        $sort = Sort::getList([]);
        foreach ($list as $value){
            $value['blogs'] = Blog::getCount(['sortid'=>$value['sid']]);
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
        $data['category'] = Sort::getList([]);
        $navi = Navi::get_select(['pid'=>'0'],['id','naviname','url','newtab'],'taxis','ASC')->toArray();
        foreach ($navi as $key=>$val){
            $navi[$key]['sub_menu'] = Navi::get_select(['pid'=>$val['id']],['id','naviname','url','newtab'],'taxis','ASC')->toArray();
        }
        $data['navi'] = $navi;
        return view('admin.navbar_list',$data);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 导航栏排序以及层级修改
     */
    public function navbar_sort(Request $request)
    {
        $data = $request->get('data');
        DB::beginTransaction();
        try{
            foreach($data as $key=>$val){
                if(empty($val['children'])){
                    Navi::EditData(['id'=>$val['id']],['taxis'=>$key,'pid'=>'0']);
                }else{
                    foreach($val['children'] as $k=>$v){
                        Navi::EditData(['id'=>$v['id']],['taxis'=>$k,'pid'=>$val['id']]);
                    }
                }
            }
            DB::commit();
            return response()->json(['data'=>'编辑成功','status'=>'1']);
        }catch (\Exception $e){
            dd($e);
            DB::rollBack();
            return response()->json(['data'=>'编辑失败','status'=>'0']);
        }
    }

    //添加导航栏数据
    public function navbar_add_check(Request $request)
    {
        $pid = $request->get('pid');
        $naviname = $request->get('naviname');
        $navicon = $request->get('navicon');
        $system_url = $request->get('system_url');
        $url = $request->get('url');
        $url_type = $request->get('url_type');
        if($url_type == 1){
            if(!$system_url)return response()->json(['data'=>'请选择系统地址','status'=>'0']);
            $category_url = config('app.url').'/category/'.$system_url;
            $data['type_id'] = $system_url;
        }else{
            if(!$url)return response()->json(['data'=>'请输入链接地址','status'=>'0']);
            $category_url = $url;
            $data['type_id'] = 0;
        }
        $hide = $request->get('hide');
        $newtab = $request->get('newtab');
        $isdefault = $request->get('isdefault');
        if (empty($hide)) $hide = 'y';
        if (empty($newtab)) $newtab = 'n';
        if(!$naviname)return response()->json(['data'=>'请输入导航栏名称','status'=>'0']);
        $data['naviname'] = $naviname;
        $data['navicon'] = $navicon;
        $data['url'] = $category_url;
        $data['newtab'] = $newtab;
        $data['hide'] = $hide;
        $data['pid'] = $pid;
        $data['isdefault'] = $isdefault;
        $data['type'] = $url_type;
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
        $pid = $request->get('pid');
        $naviname = $request->get('naviname');
        $navicon = $request->get('navicon');
        $system_url = $request->get('system_url');
        $url = $request->get('url');
        $url_type = $request->get('url_type');
        if($url_type == 1){
            if(!$system_url)return response()->json(['data'=>'请选择系统地址','status'=>'0']);
            $category_url = config('app.url').'/category/'.$system_url;
            $data['type_id'] = $system_url;
        }else{
            if(!$url)return response()->json(['data'=>'请输入链接地址','status'=>'0']);
            $category_url = $url;
            $data['type_id'] = 0;
        }
        $hide = $request->get('hide');
        $newtab = $request->get('newtab');
        $isdefault = $request->get('isdefault');
        if (empty($hide)) $hide = 'y';
        if (empty($newtab)) $newtab = 'n';
        if(!$naviname)return response()->json(['data'=>'请输入导航栏名称','status'=>'0']);
        $data['naviname'] = $naviname;
        $data['navicon'] = $navicon;
        $data['url'] = $category_url;
        $data['newtab'] = $newtab;
        $data['hide'] = $hide;
        $data['pid'] = $pid;
        $data['isdefault'] = $isdefault;
        $data['type'] = $url_type;
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
