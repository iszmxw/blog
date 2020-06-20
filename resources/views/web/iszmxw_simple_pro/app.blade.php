<!DOCTYPE html>
<html lang="ZH-CN">
{{--头部--}}
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="description" content="@yield('description')">
    <meta name="template" content="iszmxw_simple_pro">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="author" content="">
    <title>@yield('title')</title>
    {{--引用公共css--}}
    @include('web.iszmxw_simple_pro.public.style')
    <style>
        .p-right-box {
            opacity: 0.9;
        }

        .layui-layer {
            opacity: 1;
        }

        .background {
            z-index: -1;
            position: fixed;
            top: 0px;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center center;
        }
    </style>
    @yield('style')
</head>
{{--身体--}}
<body>
<div style="display: none;" id="hitokoto"></div>
<div class="p-box">
    {{--左边导航栏--}}
    <div class="p-left-box">
        @include('web.iszmxw_simple_pro.public.left')
    </div>
    {{--右边内容部分--}}
    <div class="p-right-box">
        @include('web.iszmxw_simple_pro.public.header')
        <div class="p-container-box">
            @yield('content')
            @include('web.iszmxw_simple_pro.public.slidebar')
            @include('web.iszmxw_simple_pro.public.footer')
        </div>
    </div>
</div>
<div class="p-layout-right-btn">
    <a class="go-top"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
</div>
{{--背景图像--}}
<img class="background" src="{{asset('style/web/iszmxw_simple_pro/images/7.jpg')}}">
{{--引用公共js--}}
@include('web.iszmxw_simple_pro.public.script')
{{--可自动加载的js部分--}}
<div class="loadJs">
    @yield('script')
</div>
</body>
</html>