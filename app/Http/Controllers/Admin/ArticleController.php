<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attachment;
use App\Models\Blog;
use App\Models\Sort;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function article_add(Request $request)
    {
        $user_data = $request->get('user_data');
        $sort = Sort::getList([]);
        return view('admin.article_add',['user_data'=>$user_data,'sort'=>$sort]);
    }

    //上传文章富文本图片
    public function article_image_upload(Request $request)
    {
        // 接收数据
        $file = $request->file('imageData');
        // 判断是否上传成功
        if (!$file->isValid() ) {
            return ['status' => 0,'msg' => '文件上传失败'];
        }
        // 获取文件扩展名
        $ext = $file->getClientOriginalExtension();
        // 判断文件类型是否允许
        if (! in_array(strtolower($ext),['jpg','png','gif'])) {
            return ['status' => 0,'msg' => '文件类型不允许'];
        }
        //文件将要上传的路径
        $upload_path = 'content/uploadfile/article/'.date('Ymd').'/';
        //重命名文件
        $NewFileName = time().mt_rand(1,999).'.'.$ext;
        // 上传文件并判断
        $path = $file->move(public_path().'/'.$upload_path,$NewFileName);
        $img_url = '/'.$upload_path.$NewFileName;
        if ($path) return ['status'  => 1,'msg' => '文件上传成功','img' => $img_url];
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 添加文章
     */
    public function article_add_check(Request $request)
    {
        $attachment = [];
        $filedata = $request->input('filedata');
        if (!empty($filedata)){
            $arr = explode('&',$filedata);
            foreach ($arr as $key=>$val){
                $attachment[explode('=',$val)[0]] = explode('=',$val)[1];
            }
            $attachment['addtime'] = time();
        }
        $title = $request->get('title');
        $sortid = $request->get('sortid');
        $password = $request->get('password');
        $excerpt = $request->get('excerpt');//摘要
        $content = $request->get('content');
        if ($sortid == '-1')return response()->json(['data'=>'请选择栏目分类！','status'=>'0']);
        if (!$title)return response()->json(['data'=>'请输入文章标题！','status'=>'0']);
        $data['title'] = $title;
        $data['sortid'] = $sortid;
        $data['password'] = $password?$password:'';
        $data['excerpt'] = $excerpt?$excerpt:'';
        $data['content'] = $content?$content:'';
        $data['date'] = time();
        //数据库事物回滚
        DB::beginTransaction();
        try {
            $re = Blog::AddData($data);
            if (!empty($filedata)){
                $attachment['blogid'] = $re['gid'];
                Attachment::AddData($attachment);
            }
            DB::commit();
            return response()->json(['data'=>'祝贺你添加成功了！','status'=>'1']);
        } catch (\Exception $e) {
            DB::rollBack();//事件回滚
            return response()->json(['data' => '添加失败，请检查', 'status' => '0']);
        }

    }

    //文章列表
    public function article_list(Request $request)
    {
        $user_data = $request->get('user_data');
        $sort_id = $request->get('sort_id');
        $title = $request->get('title');
        $where = [];
        if (!empty($sort_id)){
            $where[] = ['sortid',$sort_id];
        }
        $where[] = ['title',$title];
        $list = Blog::getPaginate($where,['blog.gid','blog.title','sort.sortname','blog.views','blog.date'],15,'date','DESC');
        $sort = Sort::getList([],['sid','sortname']);
        $view = ['user_data'=>$user_data,'list'=>$list,'sort'=>$sort];
        return view('admin.article_list',$view);
    }


    //编辑文章
    public function article_edit(Request $request)
    {
        $view['sort'] = Sort::getList([]);
        $id = $request->get('id');
        $view['blog'] = Blog::getOne(['gid'=>$id]);
        $attachment = Attachment::getOne(['blogid'=>$id]);
        $view['attachment'] = 'filename='.$attachment['filename'].'&filesize='.$attachment['filesize'].'&mimetype='.$attachment['mimetype'].'&filepath='.$attachment['filepath'];
        $view['attachment_id'] = $attachment['aid'];
        return view('admin.article_edit',$view);
    }

    //编辑文章操作
    public function article_edit_check(Request $request)
    {
        $filedata = $request->input('filedata');
        $attachment_id = $request->input('attachment_id');
        if (!empty($filedata)){
            $arr = explode('&',$filedata);
            foreach ($arr as $key=>$val){
                $attachment[explode('=',$val)[0]] = explode('=',$val)[1];
            }
        }
        $gid = $request->get('gid');
        $title = $request->get('title');
        $sortid = $request->get('sortid');
        $password = $request->get('password');
        $excerpt = $request->get('excerpt');//摘要
        $content = $request->get('content');
        if ($sortid == '-1')return response()->json(['data'=>'请选择栏目分类！','status'=>'0']);
        if (!$title)return response()->json(['data'=>'请输入文章标题！','status'=>'0']);
        $data['title'] = $title;
        $data['sortid'] = $sortid;
        $data['password'] = $password?$password:'';
        $data['excerpt'] = $excerpt?$excerpt:'';
        $data['content'] = $content?$content:'';
        //数据库事物回滚
        DB::beginTransaction();
        try {
            Blog::EditData(['gid'=>$gid],$data);
            if (!empty($filedata)){
                Attachment::EditData(['aid'=>$attachment_id],$attachment);
            }
            DB::commit();
            return response()->json(['data'=>'修改成功！','status'=>'1']);
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();//事件回滚
            return response()->json(['data' => '修改失败请稍后再试！', 'status' => '0']);
        }

    }

    //删除文章
    public function article_delete_check(Request $request)
    {
        $id = $request->get('id');
        //数据库事物回滚
        DB::beginTransaction();
        try {
            Blog::selected_delete(['gid'=>$id]);
            DB::commit();
            return response()->json(['data'=>'您的文章已被删除！','status'=>'1']);
        } catch (\Exception $e) {
            DB::rollBack();//事件回滚
            return response()->json(['data' => '删除失败请稍后再试！', 'status' => '0']);
        }

    }

}
