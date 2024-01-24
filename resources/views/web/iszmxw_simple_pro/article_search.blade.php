@extends('web.iszmxw_simple_pro.app')

@section('keywords','')
@section('description','')

@section('title', '追梦小窝首页')
{{--样式引入--}}
@section('style')
    <style type="text/css">
        .page-link {
            display: block;
            padding: 2px 8px;
        }

        .p-left-user-box .p-left-user-hitokoto-box {
            height: 72px;
        }

        .heart {
            width: 10px;
            height: 10px;
            position: fixed;
            background: #f00;
            transform: rotate(45deg);
            -webkit-transform: rotate(45deg);
            -moz-transform: rotate(45deg);
        }

        .heart:after,
        .heart:before {
            content: '';
            width: inherit;
            height: inherit;
            background: inherit;
            border-radius: 50%;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            position: absolute;
        }

        .heart:after {
            top: -5px;
        }

        .heart:before {
            left: -5px;
        }
    </style>
@endsection

{{--内容部分--}}
@section('content')
    <div class="p-content-box">
        <div class="p-content-box-lwlhitokoto">
            <h3>{{$user_data['nickname']}}</h3>
            <span id="yiyan">大丈夫立世无所畏惧。</span>
        </div>
        <div class="p-notice-box">
            <span><i class="layui-icon layui-icon-speaker" style="font-weight: 700;"></i> 这是一条不正经的测试公告呀~</span>
            <a class="close-notice" href="javascript:;" onclick="closeNotice();">
                <i class="fa fa-times" aria-hidden="true"></i>
            </a>
        </div>
        <div class="p-content-box-articleList-box">
            <!-- 置顶文章start -->
        {{--            <div class="p-content-box-article-box">--}}
        {{--                <!--缩略图获取方式-->--}}
        {{--                <a href="/article/9" class="pjax">--}}
        {{--                    <div class="p-article-thumb"--}}
        {{--                         style="background-image: url('{{asset('style/web/iszmxw_simple_pro/images/429ac173b205465ba3e3a1410bd38e88.jpg')}}')">--}}
        {{--                    </div>--}}
        {{--                </a>--}}
        {{--                <div class="p-article-brief-box">--}}
        {{--                    <h2 class="p-article-title"><a href="/article/9" class="pjax"> <span--}}
        {{--                                    class="p-article-top">置顶</span> Perfree-Simple-Pro-致更好的你 </a></h2>--}}
        {{--                    <p class="p-article-content"> 一款高仿Typecho的handsome博客主题 主题简介--}}
        {{--                        抛弃一切繁琐,只想简简单单的呈现你的文采,如你所见,这是一款简约清新的博客主题模板,该模板收费69元,包含相册插件和留言板插件(开发中)以及以后所有新出的插件,你只管创作,其他交给 </p>--}}
        {{--                    <hr>--}}
        {{--                    <div class="p-article-msg">--}}
        {{--                                <span class="p-article-msg-btn"> <i class="fa fa-eye"--}}
        {{--                                                                    aria-hidden="true"></i> 3608浏览 </span>--}}
        {{--                        <span class="p-article-msg-btn"> <i class="fa fa-comment-o"--}}
        {{--                                                            aria-hidden="true"></i> 48条评论 </span>--}}
        {{--                        <span class="p-article-msg-btn"> <i class="fa fa-clock-o"--}}
        {{--                                                            aria-hidden="true"></i> 2019年06月03日 </span>--}}
        {{--                        <a href="/article/9" class="p-article-msg-all-btn pjax">阅读全文</a>--}}
        {{--                    </div>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        <!-- 置顶文章end -->
            <!--文章列表start-->
            @if(count($blog) <= 0)
                没找到关于 {{isset($keyword) ? $keyword : ''}} 的文章，换个关键词试试~
            @endif
            @foreach($blog as $key=>$val)
                <div class="p-content-box-article-box">
                    <!--缩略图获取方式-->
                    {{--                    @if($val['thumb'])--}}
                    {{--                        <a href="{{url('article')}}/{{$val['id']}}" class="pjax">--}}
                    {{--                            <div class="p-article-thumb"--}}
                    {{--                                 style="background-image: url('http://blog.ethanyep.cn/{{$val['thumb']}}')">--}}
                    {{--                            </div>--}}
                    {{--                        </a>--}}
                    {{--                    @endif--}}
                    <div class="p-article-brief-box">
                        <h2 class="p-article-title">
                            <a href="{{url('article')}}/{{$val['id']}}" class="pjax">
                                {{$val['title']}}
                            </a>
                        </h2>
                        <p class="p-article-content">
                            {{$val['content']}}
                        </p>
                        <hr>
                        <div class="p-article-msg">
                            <span class="p-article-msg-btn">
                                <i class="fa fa-user-o" aria-hidden="true"></i> 追梦小窝
                            </span>
                            <span class="p-article-msg-btn eye-cont">
                                <i class="fa fa-eye" aria-hidden="true"></i> {{$val['views']}}浏览
                            </span>
                            <span class="p-article-msg-btn">
                                <i class="fa fa-comment-o" aria-hidden="true"></i> {{$val['comments']}}条评论
                            </span>
                            <span class="p-article-msg-btn">
                                <i class="fa fa-clock-o" aria-hidden="true"></i> {{$val['created_at']}}
                            </span>
                            <a href="{{url('article')}}/{{$val['id']}}" class="p-article-msg-all-btn pjax">阅读全文</a>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="perfree-page-box layui-clear">
                {{$blog->links()}}
            </div>

        {{--            <div class="perfree-page-box layui-clear">--}}
        {{--                <a class="page-item previous disabled pjax" href="javascript:;">上一页</a>--}}
        {{--                <a class="page-item active pjax" href="javascript:;">1</a>--}}
        {{--                <a class="page-item  pjax" href="/article/category/index-2">2</a>--}}
        {{--                <a class="page-item next pjax" href="/article/category/index-2">下一页</a>--}}
        {{--            </div>--}}
        <!--文章列表end-->
        </div>
    </div>
@endsection

@section('toxBox')
@endsection

{{--js引用--}}
@section('script')
@endsection