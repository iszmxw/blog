<?php
/**
 * Created by PhpStorm.
 * User: mail
 * Date: 2018/12/29
 * Time: 10:10
 */
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller{

    public function build()
    {
        return $this->view('emails.welcome');
    }


    public function push_content(Request $request)
    {
        $name = '傻妞';
        $flag = Mail::send('emails.welcome',['name'=>$name],function($message){
            $to = '442246396@qq.com';
            $message ->to($to)->subject('邮件测试');
        });
        if($flag){
            echo '发送邮件成功，请查收！';
        }else{
            echo '发送邮件失败，请重试！';
        }
    }
}