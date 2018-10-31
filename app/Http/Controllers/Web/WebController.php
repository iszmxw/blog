<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebController extends Controller
{
    //首页
    public function index(Request $request)
    {
        return view('web.default_template.index');
    }

    public function about()
    {
        return view('web.default_template.about');
    }
}
