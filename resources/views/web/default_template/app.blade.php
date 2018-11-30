<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>博客--@yield('title')</title>
    <link href="{{asset('style/web/default_template/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('style/web/default_template/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('style/web/default_template/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('style/web/default_template/css/style.css')}}" rel="stylesheet">
    @yield('style')
</head>
<body class="">
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            @include('web.default_template.public.header')
        </div>
    </nav>
    <div id="page-wrapper" class="gray-bg">

        <div class="row border-bottom">
            <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" action="">
                        <div class="form-group">
                            <input type="text" placeholder="请输入搜索内容" class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message">欢迎来到追梦小窝的博客收藏馆</span>
                    </li>
                    <li>
                        <a href="{{url('admin/register')}}">
                            <i class="fa fa-sign-out"></i> 登记
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="row wrapper border-bottom white-bg page-heading">
            @yield('header_bar')
        </div>

        <div class="wrapper wrapper-content  animated fadeInRight blog">
            <div class="row">
                @yield('content')
            </div>
        </div>
        @include('web.default_template.public.footer')
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{asset('style/web/default_template/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('style/web/default_template/js/bootstrap.min.js')}}"></script>
<script src="{{asset('style/web/default_template/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('style/web/default_template/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{asset('style/web/default_template/js/inspinia.js')}}"></script>
<script src="{{asset('style/web/default_template/js/plugins/pace/pace.min.js')}}"></script>
<script>
    $(function(){
        var menu = $(".menu");
        for(var i=0;i<menu.length;i++){
            var li = $(menu[i]).find('ul li');
            for(var _i=0;_i<li.length;_i++){
                if($(li[_i]).hasClass('active')){
                    $(li[_i]).parent('ul').addClass('in');
                    $(menu[i]).addClass('active');
                }
            }
        }
    });
</script>
@yield('script')
</body>
</html>