<?php

namespace App\Http\Controllers\Tooling;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ToolingController extends Controller
{
    //钩子pull更新代码
    public function get_pull()
    {
        exec("cd /www/wwwroot/blog_54zm_cn && git pull",$res);
        dump($res);
    }
}
