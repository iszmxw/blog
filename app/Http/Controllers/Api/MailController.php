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
    public function push_content(Request $request)
    {
        $name = '傻妞';
        $flag = Mail::send('welcome',['name'=>$name]);
        if($flag){
            echo '发送邮件成功，请查收！';
        }else{
            echo '发送邮件失败，请重试！';
        }
    }
}