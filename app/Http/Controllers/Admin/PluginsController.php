<?php

namespace App\Http\Controllers\Admin;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\Link;
use App\Models\Tag;
use App\Models\Twitter;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PluginsController extends Controller
{
    //微语列表
    public function twitter_list(Request $request)
    {
        $user_data = $request->get('user_data');
        $list = Twitter::getList([]);
        foreach($list as $key=>$value){
            $list[$key]['header'] = User::getValue(['uid'=>$value['author']],'photo');
        }
        return view('admin.twitter_list',['user_data'=>$user_data,'list'=>$list]);
    }

    //删除微语
    public function twitter_delete_check(Request $request)
    {
        $id = $request->get('id');
        DB::beginTransaction();
        try{
            Twitter::selected_delete(['id'=>$id]);
            DB::commit();
            return response()->json(['data'=>'删除成功！','status'=>'1']);
        }catch (\Exception $e){
            DB::rollBack();
            return response()->json(['data'=>'删除失败请稍后再试！','status'=>'0']);
        }
    }

    //标签列表
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

    //友情链接
    public function link_list(Request $request)
    {
        $user_data = $request->get('user_data');
        $list = Link::getPaginate([],'',15,'id','ASC');
        return view('admin.link_list',['user_data'=>$user_data,'list'=>$list]);
    }

    //获取友情链接数据
    public function link_list_data(Request $request)
    {
        $id = $request->get('id');
        $data = Link::getOne(['id'=>$id]);
        return response()->json(['status'=>'1','data'=>$data]);
    }

    //编辑友情链接
    public function link_list_data_check(Request $request)
    {
        $id = $request->get('id');
        $data['sitename'] = $request->get('sitename');
        $data['siteurl'] = $request->get('siteurl');
        $data['description'] = $request->get('description');
        DB::beginTransaction();
        try{
            Link::EditData(['id'=>$id],$data);
            DB::commit();
            return response()->json(['status'=>'1','data'=>'修改数据成功！']);
        }catch (\Exception $e){
            DB::rollBack();
            return response()->json(['status'=>'0','data'=>'修改失败！请稍后再试！']);
        }
    }

    //删除友情链接
    public function link_delete_check(Request $request)
    {
        $id = $request->get('id');
        DB::beginTransaction();
        try{
            Link::selected_delete(['id'=>$id]);
            DB::commit();
            return response()->json(['status'=>'1','data'=>'删除数据成功！']);
        }catch (\Exception $e){
            DB::rollBack();
            return response()->json(['status'=>'0','data'=>'删除失败！请稍后再试！']);
        }
    }

    //添加友情链接
    public function link_list_add_check(Request $request)
    {
        $data['sitename'] = $request->get('sitename');
        $data['siteurl'] = $request->get('siteurl');
        $data['description'] = $request->get('description');
        DB::beginTransaction();
        try{
            Link::create($data);
            DB::commit();
            return response()->json(['status'=>'1','data'=>'添加友情链接成功！']);
        }catch (\Exception $e){
            DB::rollBack();
            return response()->json(['status'=>'0','data'=>'添加失败！请稍后再试！']);
        }
    }


    //评论列表
    public function comment_list(Request $request)
    {
        $user_data = $request->get('user_data');
        $list = Comment::getPaginate([],'','10','date','DESC');
        foreach($list as $key=>$value){
            if(!$value['mail'])$value['mail'] = 10000;
            $list[$key]['blog_title'] = Blog::getValue(['gid'=>$value['gid']],'title');
        }
        return view('admin.comment_list',['user_data'=>$user_data,'list'=>$list]);
    }

    //删除评论
    public function comment_delete_check(Request $request)
    {
        $cid = $request->get('cid');
        DB::beginTransaction();
        try{
            Comment::selected_delete(['cid'=>$cid]);
            DB::commit();
            return response()->json(['status'=>'1','data'=>'删除数据成功！']);
        }catch (\Exception $e){
            DB::rollBack();
            return response()->json(['status'=>'0','data'=>'删除失败！请稍后再试！']);
        }
    }

    //显示隐藏评论
    public function comment_hide_check(Request $request)
    {
        $cid = $request->get('cid');
        $hide = $request->get('hide');
        DB::beginTransaction();
        try{
            Comment::EditData(['cid'=>$cid],['hide'=>$hide]);
            DB::commit();
            return response()->json(['status'=>'1','data'=>'修改成功！']);
        }catch (\Exception $e){
            DB::rollBack();
            return response()->json(['status'=>'0','data'=>'修改失败！请稍后再试！']);
        }
    }

    //获取回复数据
    public function comment_data(Request $request)
    {
        $cid = $request->get('cid');
        $data = Comment::getOne(['cid'=>$cid]);
        if ($data){
            $data['date'] = date('Y-m-d H:i:s',$data['date']);
            return response()->json(['data'=>$data,'status'=>'1']);
        }else{
            return response()->json(['data'=>'获取数据失败！','status'=>'0']);
        }
    }

    //创建or编辑数据
    public function comment_data_check(Request $request)
    {
        $is_edit = $request->get('is_edit');
        $cid = $request->get('cid');
        if ($is_edit != 1){//判断是否编辑数据
            $comment = $request->get('comment');
            $poster = Comment::getValue(['cid'=>$cid],'poster');
            $comment = '@'.$poster.'：'.$comment;
            $data['mail'] = "442246396@qq.com";
            $data['url'] = "http://blog.54zm.com/";
            $data['ip'] = $request->getClientIp();
            $data['gid'] = $request->get('gid');
            $data['pid'] = $request->get('pid');
            $data['date'] = time();
            $data['poster'] = '追梦小窝';
            $data['comment'] = $comment;
            $message = "回复";
        }else{
            $data['poster'] = $request->get('poster');
            $data['mail'] = $request->get('mail');
            $data['url'] = $request->get('url');
            $data['comment'] = $request->get('comment');
            $message = "编辑";
        }
        if(!$request->get('comment'))return response()->json(['data'=>'请输入要回复的话！','status'=>'0']);
        DB::beginTransaction();
        try{
            if ($is_edit != 1){
                Comment::create($data);
            }else{
                Comment::EditData(['cid'=>$cid],$data);
            }
            DB::commit();
            return response()->json(['status'=>'1','data'=>$message.'成功！']);
        }catch (\Exception $e){
            DB::rollBack();
            return response()->json(['status'=>'0','data'=>$message.'失败！请稍后再试！']);
        }
    }

}
