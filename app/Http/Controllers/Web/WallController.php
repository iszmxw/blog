<?php
/**
 * Created by PhpStorm.
 * User: mail
 * Date: 2019/3/16
 * Time: 11:11
 */

namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;

class WallController extends Controller
{
    public function register()
    {
        return view('web.default_template.register');
    }
}