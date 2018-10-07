<?php

namespace App\Http\Controllers\Admin;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PluginsController extends Controller
{
    public function tag_list(Request $request)
    {
        $user_data = $request->get('user_data');
        $list = Tag::getList([]);
        return view('admin.tag_list',['user_data'=>$user_data,'list'=>$list]);
    }

    //删除标签
    public function tag_delete_check(Request $request)
    {
        $tid = $request->get('tid');
        DB::beginTransaction();
        try{
            Tag::where(['tid'=>$tid])->delete();
            DB::commit();
            return response()->json(['data'=>'删除成功！','status'=>'1']);
        }catch (\Exception $e){
            dd($e);
            DB::rollBack();
            return response()->json(['data'=>'删除失败请稍后再试！','status'=>'0']);
        }
    }

    //获取标签数据信息
    public function tag_edit_data(Request $request)
    {
        $tid = $request->get('tid');
        $data = Tag::getOne(['tid'=>$tid]);
        if ($data){
            return response()->json(['status'=>'1','data'=>$data]);
        }else{
            return response()->json(['status'=>'0','data'=>'获取数据失败，请稍后再试！']);
        }
    }

    //编辑标签
    public function tag_edit_data_check(Request $request)
    {
        $tid = $request->get('tid');
        $tagname = $request->get('tagname');
        DB::beginTransaction();
        try{
            Tag::EditData(['tid'=>$tid],['tagname'=>$tagname]);
            DB::commit();
            return response()->json(['status'=>'1','data'=>'修改标签成功！']);
        }catch (\Exception $e){
            DB::rollBack();
            return response()->json(['status'=>'0','data'=>'修改标签失败！']);
        }
    }
}
