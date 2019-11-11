<?php
/**
 * Created by PhpStorm.
 * User: mail
 * Date: 2018/12/29
 * Time: 10:10
 */
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\OrderShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller{
    public function push_content(Request $request)
    {
        $build = new OrderShipped();
        Mail::to('17722524152@189.cn')->send($build->subject('恭喜您，今日seo提交成功！'));
        dd('恭喜您，今日seo提交成功！');
    }
}