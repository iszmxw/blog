<?php

namespace App\Http\Controllers\Web;

use App\Models\Navi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebController extends Controller
{
    //首页
    public function index(Request $request)
    {
        $nav = $request->get('nav');
        return view('web.default_template.index',['nav'=>$nav]);
    }

    public function about()
    {
        return view('web.default_template.about');
    }
}
