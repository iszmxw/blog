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

    @yield('style')
    {{--百度统计--}}
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "https://hm.baidu.com/hm.js?5c2003e8cbfc324a649d5954794b67d9";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
    {{--51.la--}}
    <script charset="UTF-8" id="LA_COLLECT" src="//sdk.51.la/js-sdk-pro.min.js"></script>
    <script>LA.init({id:"3If4KokRItZzvcZr",ck:"3If4KokRItZzvcZr",autoTrack:true,hashMode:true,screenRecord:true})</script>
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
{{--<img class="background" src="{{asset('style/web/iszmxw_simple_pro/images/7.jpg')}}">--}}
{{--引用公共js--}}
@include('web.iszmxw_simple_pro.public.script')
{{--可自动加载的js部分--}}
<div class="loadJs">
    @yield('script')
</div>
</body>
</html>