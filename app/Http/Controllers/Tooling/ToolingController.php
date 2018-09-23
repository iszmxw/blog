<?php

namespace App\Http\Controllers\Tooling;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ToolingController extends Controller
{
    //
    public function get_pull()
    {
//        $email = "mail@54zm.com";//用户仓库邮箱
//        $name  = "mail@54zm.com";//仓库用户名,一般和邮箱一致即可
//        $ress = "clone start --------".PHP_EOL;
//        $ress .= shell_exec("git config --global user.email {$email}}");
//        $ress .= shell_exec("git config --global user.name {$name}}");
        exec("cd /www/wwwroot/blog_54zm_cn && git pull",$res);
//        exec("cd /www/web/54zm_com/public_html && git pull origin master 2>&1",$output);
        dump($res);
    }
}
