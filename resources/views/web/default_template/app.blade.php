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
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>博客</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{url('/')}}">主页</a>
                    </li>
                    <li class="active">
                        <strong>博客</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
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
@yield('script')
</body>
</html>