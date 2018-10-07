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
            Tag::where(['tidS'=>$tid])->delete();
            DB::commit();
            return response()->json(['data'=>'删除成功！','status'=>'1']);
        }catch (\Exception $e){
//            dd($e);
            DB::rollBack();
            return response()->json(['data'=>'删除失败请稍后再试！','status'=>'1']);
        }
    }
}
