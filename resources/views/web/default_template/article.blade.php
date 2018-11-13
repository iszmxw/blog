@extends('web.default_template.app')

@section('title', $blog['title'].'_追梦小窝的博客 - 努力霍城自己想要的样子')
{{--样式引入--}}
@section('style')

@endsection

{{--内容部分--}}
@section('content')
    <div class="ibox">
        <div class="ibox-content">
            <div class="pull-right">
                <button class="btn btn-white btn-xs" type="button">{{$blog['sortname']}}</button>
                <button class="btn btn-white btn-xs" type="button">{{$blog['author']}}</button>
            </div>
            <div class="text-center article-title">
                <h1>
                    {{$blog['title']}}
                </h1>
                <span class="text-muted"><i class="fa fa-clock-o"></i> {{$blog['date']}}</span>
            </div>
            <p>
                {!! $blog['content'] !!}
            </p>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <h5>标签:</h5>
                    @foreach($blog['tags'] as $value)
                        <button class="btn btn-primary btn-xs" type="button" onclick="window.location.href='{{url('tag').'/'.$value['tid']}}'">{{$value['tagname']}}</button>
                    @endforeach
                </div>
                <div class="col-md-6">
                    <div class="small text-right">
                        <h5>统计:</h5>
                        <div> <i class="fa fa-comments-o"> </i> 56 评论 </div>
                        <i class="fa fa-eye"> </i> {{$blog['views']}} 查看
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">

                    <h2>评论:</h2>
                    <div class="social-feed-box">
                        <div class="social-avatar">
                            <a href="" class="pull-left">
                                <img alt="image" src="img/a1.jpg">
                            </a>
                            <div class="media-body">
                                <a href="#">
                                    小明
                                </a>
                                <small class="text-muted">今天下午2017.12.12 4:21</small>
                            </div>
                        </div>
                        <div class="social-body">
                            <p>
                                时间是一切财富中最宝贵的财富。
                            </p>
                        </div>
                    </div>
                    <div class="social-feed-box">
                        <div class="social-avatar">
                            <a href="" class="pull-left">
                                <img alt="image" src="img/a2.jpg">
                            </a>
                            <div class="media-body">
                                <a href="#">
                                    小红
                                </a>
                                <small class="text-muted">今天下午2017.12.12 4:21</small>
                            </div>
                        </div>
                        <div class="social-body">
                            <p>
                                时间是一切财富中最宝贵的财富。
                            </p>
                        </div>
                    </div>
                    <div class="social-feed-box">
                        <div class="social-avatar">
                            <a href="" class="pull-left">
                                <img alt="image" src="img/a3.jpg">
                            </a>
                            <div class="media-body">
                                <a href="#">
                                    小黑
                                </a>
                                <small class="text-muted">今天下午2017.12.12 4:21</small>
                            </div>
                        </div>
                        <div class="social-body">
                            <p>
                                时间是一切财富中最宝贵的财富。
                            </p>
                        </div>
                    </div>
                    <div class="social-feed-box">
                        <div class="social-avatar">
                            <a href="" class="pull-left">
                                <img alt="image" src="img/a5.jpg">
                            </a>
                            <div class="media-body">
                                <a href="#">
                                    小白
                                </a>
                                <small class="text-muted">今天下午2017.12.12 4:21</small>
                            </div>
                        </div>
                        <div class="social-body">
                            <p>
                                时间是一切财富中最宝贵的财富。
                            </p>
                        </div>
                    </div>


                </div>
            </div>


        </div>
    </div>
@endsection

{{--js引用--}}
@section('style')

@endsection