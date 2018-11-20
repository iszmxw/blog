<?php

namespace App\Http\Controllers\Api;

use App\Library\HttpCurl;
use App\Models\Options;
use App\Models\User;
use App\Models\Userqq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class WechatController extends Controller
{
    //token
    public function token(Request $request)
    {
    }
}
