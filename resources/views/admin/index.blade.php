<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>追梦小窝 | 后台首页</title>
    @include('admin.public.common_css')
</head>
<body class="">
<div id="wrapper">
    {{--侧边栏--}}
    @include('admin.public.nav')
    <div id="page-wrapper" class="gray-bg">
        {{--头部--}}
        @include('admin.public.header')
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>控制面板</h5>
                            <div class="ibox-tools">
                                <span class="label label-warning-light pull-right">系统配置</span>
                            </div>
                        </div>
                        <div class="ibox-content">

                            <div>
                                <div class="feed-activity-list">

                                    <div class="feed-element">
                                        <a href="javascript:;" class="pull-left">
                                            <img alt="image" class="img-circle"
                                                 src="{{url('style/admin/images/logo.jpeg')}}">
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right">统计</small>
                                            当前有<strong>{{ $blog_count }}</strong>篇文章，<strong>{{ $comment_count }}</strong>条评论，<strong>{{ $twitter_count }}</strong>条微语<br>
                                            <small class="text-muted">{{date('Y-m-d H:i:s',time())}}</small>
                                        </div>
                                    </div>

                                    <div class="feed-element">
                                        <a href="javascript:;" class="pull-left">
                                            <img alt="image" class="img-circle"
                                                 src="{{url('style/admin/images/logo.jpeg')}}">
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right">PHP</small>
                                            <strong>当前PHP版本：</strong> {{$php_version}} <br>
                                            <small class="text-muted">{{date('Y-m-d H:i:s',time())}}</small>

                                        </div>
                                    </div>

                                    <div class="feed-element">
                                        <a href="javascript:;" class="pull-left">
                                            <img alt="image" class="img-circle"
                                                 src="{{url('style/admin/images/logo.jpeg')}}">
                                        </a>
                                        <div class="media-body ">
                                            <small class="pull-right">Laravel</small>
                                            <strong>当前Laravel版本：</strong> {{$laravel_version}} <br>
                                            <small class="text-muted">{{date('Y-m-d H:i:s',time())}}</small>

                                        </div>
                                    </div>

                                </div>

                                <button class="btn btn-primary btn-block m-t"
                                        onclick="window.location.href='{{url('admin?phpinfo=yes')}}'"><i
                                            class="fa fa-arrow-down"></i> 更多服务器信息
                                </button>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        {{--底部--}}
        @include('admin.public.footer')
    </div>
</div>
@include('admin.public.common_js')
</body>
</html>
