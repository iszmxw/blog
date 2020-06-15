<!DOCTYPE html>
<html lang="ZH-CN">

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="description" content="@yield('description')">
    <meta name="template" content="iszmxw_simple_pro">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link rel="icon" type="image/ico"
          href="{{asset('style/web/iszmxw_simple_pro/images/ec83d6ed69d84517beb3ee9ccc49f8b4.jpg')}}">
    <link rel="stylesheet" href="{{asset('style/web/iszmxw_simple_pro/static/plugins/layui/css/layui.css')}}"
          media="all">
    <link rel="stylesheet" href="{{asset('style/web/iszmxw_simple_pro/static/css/perfree.min.css')}}"
          media="all">
    <link rel="stylesheet"
          href="{{asset('style/web/iszmxw_simple_pro/static/plugins/font-awesome/css/font-awesome.min.css')}}"
          media="all">
    <link rel="stylesheet" href="{{asset('style/web/iszmxw_simple_pro/static/plugins/skplayer/skPlayer.min.css')}}"
          media="all">
    <link rel="dns-prefetch" href="//cdn.bootcss.com">
    <link rel="stylesheet" href="{{asset('style/web/iszmxw_simple_pro/static/plugins/highlight/styles/vs.css')}}"
          media="all">
    <link rel="stylesheet"
          href="{{asset('style/web/iszmxw_simple_pro/static/plugins/layer/theme/default/layer.css?v=3.1.1')}}"
          id="layuicss-layer">
    <script src="{{asset('style/web/iszmxw_simple_pro/static/plugins/jquery/jquery-1.8.3.min.js')}}"></script>
    @yield('style')
</head>

<body>
<div style="display: none;" id="hitokoto"></div>
<script>
    /**自定义背景颜色
     */
    /**渐变色背景
     "*/
    $("body").css("background-image", "linear-gradient(to top, #fbc2eb 0%, #a6c1ee 100%)");
    /***/
    /**自定义背景图片
     */
</script>
<div class="p-box">
    {{--左边导航栏--}}
    <div class="p-left-box">
        @include('web.iszmxw_simple_pro.public.left')
    </div>
    {{--右边内容部分--}}
    <div class="p-right-box">
        @include('web.iszmxw_simple_pro.public.right')
    </div>
</div>
<div class="p-layout-right-btn">
    <a class="go-top"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
</div>
<script src="https://v1.hitokoto.cn/?encode=js&amp;select=%23hitokoto" defer=""></script>
<script type="text/javascript" src="{{asset('style/web/iszmxw_simple_pro/static/plugins/pjax/pjax.js')}}"></script>
<script type="text/javascript" src="{{asset('style/web/iszmxw_simple_pro/static/plugins/layer/layer.js')}}"></script>
<script type="text/javascript" src="{{asset('style/web/iszmxw_simple_pro/static/plugins/layui/layui.js')}}"></script>
<script type="text/javascript" src="{{asset('style/web/iszmxw_simple_pro/static/js/common.js')}}"></script>
<script type="text/javascript"
        src="{{asset('style/web/iszmxw_simple_pro/static/plugins/skplayer/skPlayer.js')}}"></script>
<script type="text/javascript" src="{{asset('style/web/iszmxw_simple_pro/static/js/main.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('style/web/iszmxw_simple_pro/static/plugins/clipboard/clipboard.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('style/web/iszmxw_simple_pro/static/plugins/jquery.tocify/jquery-ui-1.9.1.custom.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('style/web/iszmxw_simple_pro/static/plugins/jquery.tocify/jquery.tocify.js')}}"></script>
@yield('script')
<div class="loadJs">
</div>
</body>
</html>