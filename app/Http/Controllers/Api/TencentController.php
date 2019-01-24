<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;


class TencentController extends Controller
{
    public function login(Request $request)
    {
        dd($request);
    }
}