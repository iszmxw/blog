<?php

namespace App\Http\Controllers\Admin;

use App\Models\Navi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class NavbarController extends Controller
{
    /**
     * 导航列表
     * @param Request $request
     * @return array
     * @author: iszmxw <mail@54zm.com>
     * @Date：2020/4/28 16:19
     */
    public function navbar_list(Request $request)
    {
        $list = Navi::getPaginate([], '', 100, 'sort', 'ASC');
        return ['code' => 200, 'message' => 'ok', 'data' => $list];
    }
}
