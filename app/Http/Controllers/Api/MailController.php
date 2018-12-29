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
        Mail::to('442246396@qq.com')->send(new OrderShipped());
    }
}