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
                        <span class="m-r-sm text-muted welcome-message">欢迎来到{{$user_data['nickname']}}博客管理后台</span>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <div class="dropdown-messages-box">
                                    <a href="profile.html" class="pull-left">
                                        <img alt="image" class="img-circle" src="{{url('style/admin/inspinia/img/a7.jpg')}}">
                                    </a>
                                    <div class="media-body">
                                        <small class="pull-right">46小时前</small>
                                        <strong>小明</strong> 评论了 <strong>小红</strong>. <br>
                                        <small class="text-muted">2017.10.06 7:58</small>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="dropdown-messages-box">
                                    <a href="profile.html" class="pull-left">
                                        <img alt="image" class="img-circle" src="{{url('style/admin/inspinia/img/a4.jpg')}}">
                                    </a>
                                    <div class="media-body ">
                                        <small class="pull-right text-navy">5小时前</small>
                                        <strong>小红</strong> 打电话给了 <strong>小黑</strong>. <br>
                                        <small class="text-muted">2017.10.06 7:58</small>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="dropdown-messages-box">
                                    <a href="profile.html" class="pull-left">
                                        <img alt="image" class="img-circle" src="{{url('style/admin/inspinia/img/profile.jpg')}}">
                                    </a>
                                    <div class="media-body ">
                                        <small class="pull-right">23小时前</small>
                                        <strong>小黑</strong> 点赞了 <strong>小红</strong>. <br>
                                        <small class="text-muted">2017.10.06 7:58</small>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a href="mailbox.html">
                                        <i class="fa fa-envelope"></i> <strong>阅读所有消息</strong>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="mailbox.html">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> 你有16条消息
                                        <span class="pull-right text-muted small">4 分钟前</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="profile.html">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 个新的关注者
                                        <span class="pull-right text-muted small">12 分钟前</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="grid_options.html">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> 重启服务器
                                        <span class="pull-right text-muted small">4 分钟前</span>
                                    </div>
                                </a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="text-center link-block">
                                    <a href="notifications.html">
                                        <strong>查看所有信息</strong>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="{{url('admin/quit')}}">
                            <i class="fa fa-sign-out"></i> 注销
                        </a>
                    </li>
                </ul>

            </nav>
        </div>

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