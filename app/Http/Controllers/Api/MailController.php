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

class MailController extends Controller{
    public function push_content(Request $request)
    {
        dd($request);
    }
}