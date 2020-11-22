@extends('web.iszmxw_simple_pro.app')

@section('keywords',$blog['title'])
@section('description',$blog['title'])

@section('title', $blog['title'].'_追梦小窝')
{{--样式引入--}}
@section('style')
    <link rel="stylesheet" href="{{asset('style/web/iszmxw_simple_pro/static/plugins/highlight/styles/vs.css')}}" media="all">
@endsection

{{--内容部分--}}
@section('content')
    <div class="p-content-box">
        <div class="p-content-box-lwlhitokoto">
            <h2>{{$blog['title']}}</h2>
            <span><i class="fa fa-user-o" aria-hidden="true"></i> {{$blog['author']}}</span>
            <span><i class="fa fa-clock-o" aria-hidden="true"></i> {{$blog['created_at']}}</span>
            <span><i class="fa fa-eye" aria-hidden="true"></i> {{$blog['views']}}浏览</span>
            <span><i class="fa fa-comment-o" aria-hidden="true"></i> {{$blog['comment']}}条评论</span>
        </div>
        <div class="p-article-share-box layui-clear">
            <div class="p-share-left">
                <a class="p-index-link pjax" href="/"><i class="fa fa-home fa-fw"></i> 首页</a>/
                <span class="p-active-link">正文</span>
            </div>
            <div class="p-share-right">
                <span>分享到:</span>
                <a title="分享到QQ"
                   onclick="shareToqq(event, '{{asset($user_data["photo"])}}')"
                   class="qq"
                >
                    <i class="fa fa-qq" aria-hidden="true"></i>
                </a> /
                <a title="分享到qq空间"
                   onclick="shareToQzone(event,'{{asset($user_data["photo"])}}')">
                    <img src="{{asset('style/web/iszmxw_simple_pro/static/images/qzone.png')}}"
                         width="16px"
                         height="16px">
                </a>
                /
                <a class="weibo" onclick="shareToSinaWB(event,'{{asset($user_data["photo"])}}')"
                   title="分享到微博"><i class="fa fa-weibo" aria-hidden="true"></i></a> /
                <a title="分享到facebook"
                   href="https://www.facebook.com/sharer.php?title={{$blog['title']}}&amp;u={{url('article')}}/{{$blog['id']}}"
                   target="_blank">
                    <i class="fa fa-facebook" aria-hidden="true"></i>
                </a> /
                <a title="分享到Twitter"
                   href="https://twitter.com/share?text={{$blog['title']}}&amp;url={{url('article')}}/{{$blog['id']}}"
                   target="_blank">
                    <i class="fa fa-twitter" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <span id="edit-model" style="display: none">markdown</span>
        @if(isset($blog['thumb']))
            <div class="p-article-img" style="background-image: url('http://blog.54zm.com/{{$blog['thumb']}}')">
            </div>
        @endif
        <article class="p-article-content-box" id="article">
            <div id="articleContent">
                {!! $blog['content'] !!}
            </div>
            <ins class="p-article-ad-box">
                <!-- 文章内广告 -->
            </ins>
            <div class="p-article-foot-box">
                <span>最后修改：{{date('Y-m-d H:i:s',$blog['updated_at'])}}</span>
                <span style="float: right;">© 著作权归作者所有</span>
            </div>
            <div class="appreciate-box">
                <button class="layui-btn layui-btn-radius layui-btn-normal" onclick="appreciate();"><i
                            class="layui-icon"></i>赞赏
                </button>
                <span class="appreciate-tip">如果觉得我的文章对你有用，请随意赞赏</span>
            </div>

        </article>
        <div class="p-article-goto-box layui-clear">
            @if($blog['preArticle'])
                <a href="{{url('article')}}/{{$blog['preArticle']['id']}}" class="p-pre-article pjax"
                   articletitle="{{$blog['preArticle']['title']}}" id="preArticle"> 上一篇
                </a>
            @endif
            @if($blog['nextArticle'])
                <a href="{{url('article')}}/{{$blog['nextArticle']['id']}}"
                   articletitle="{{$blog['nextArticle']['title']}}"
                   class="p-next-article pjax" id="nextArticle"> 下一篇
                </a>
            @endif
        </div>
        <div class="p-article-comment-box">
            <h2>发表评论</h2>
            <form class="layui-form" action="{{url('blog/api/comment')}}" id="commentForm" method="post">
                <input type="hidden" name="articleId" value="{{ $blog['id'] }}" id="articleId">
                <input type="hidden" name="revertPid" id="revertPid">
                <textarea id="revert" style="display: none;" name="content" lay-verify="content"></textarea>
                <div class="p-send-comment-box layui-clear">
                    <span style="font-size: 14px;">说点什么吧~</span>
                    <button class="layui-btn p-send-comment-btn revert-submit" lay-submit lay-filter="comment">发表评论
                    </button>
                </div>
            </form>
        </div>
        <h2 class="p-commoent-count">评论列表</h2>
        <div class="p-article-comment-list-box" id="allComment">
            @foreach($comment_list as $key=>$val)
                <div class="p-article-revert-box">
                    <div class="p-article-revert-container layui-clear">
                        <div class="p-revert-user layui-clear">
                            <img alt="image" src="{{$val['header_img']}}" class="p-user-img">
                            <div class="p-article-revert-container-right">
                                <span class="p-revert-user-name">{{$val['poster']}}</span>
                                <span class="p-revert-time">{{date('Y-m-d H:i:s',$val['created_at'])}}</span>
                            </div>
                        </div>
                        <div class="p-revert-content">
                            {!! $val['comment'] !!}
                        </div>
                        <a href="javascript:;" data-cid="{{$val['id']}}" data-author="{{$val['poster']}}"
                           class="p-revert-btn">回复</a>
                    </div>
                    @if(isset($val['sub_comment']))
                        @foreach($val['sub_comment'] as $kk=>$vv)
                            <div class="p-article-revert-container p-revert-child layui-clear">
                                <div class="p-revert-user layui-clear">
                                    <img alt="image" src="{{$vv['header_img']}}" class="p-user-img">
                                    <div class="p-article-revert-container-right">
                                        <span class="p-revert-user-name">{{$vv['poster']}}</span>
                                        <span class="p-revert-time">{{date('Y-m-d H:i:s',$vv['created_at'])}}</span>
                                    </div>
                                </div>
                                <div class="p-revert-content">
                                    {!! $vv['comment'] !!}
                                </div>
                                <a data-cid="{{$vv['id']}}" data-author="{{$vv['poster']}}" class="p-revert-btn">回复</a>
                            </div>
                        @endforeach
                    @endif
                </div>
            @endforeach
            {{--评论分页--}}
            {{--            <div class="perfree-page-box layui-clear">--}}
            {{--                <a class="page-item previous disabled pjax" href="javascript:;">上一页</a>--}}
            {{--                <a class="page-item active pjax" href="javascript:;">1</a>--}}
            {{--                <a class="page-item next disabled pjax" href="javascript:;">下一页</a>--}}
            {{--            </div>--}}
        </div>
    </div>
@endsection


@section('toxBox')
    <div class="p-right-card-box p-toc-box">
        <h2 class="p-right-card-title">文章目录</h2>
        <div class="p-right-card-body">
            <div class="toc" id="toc">
            </div>
        </div>
    </div>
@endsection

{{--js引用--}}
@section('script')
    {{--收款码--}}
    <div id="appreciate-content">
        <div class="appreciate-content-tip">
            扫一扫支付
        </div>
        <img src="{{asset('style/web/iszmxw_simple_pro/images/zfb.png')}}"
             id="appreciate-content-aLiImg">
        <img src="{{asset('style/web/iszmxw_simple_pro/images/wx.png')}}"
             id="appreciate-content-wechatImg"
             style="display: none;">
        <hr>
        <div class="appreciate-content-btn-box">
            <button class="layui-btn layui-btn-normal ali-btn" onclick="changeImg(1);">支付宝支付</button>
            <button class="layui-btn wechat-btn" onclick="changeImg(2);">微信支付</button>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('style/web/iszmxw_simple_pro/static/js/article.js')}}"></script>
    <script>
        // 加载代码解析器
        $.getScript("{{asset('style/web/iszmxw_simple_pro/static/plugins/highlight/highlight.pack.js')}}", function () {
            hljs.initHighlighting();
            $('pre code').each(function () {
                var edit = $("#edit-model").text();
                var lines = $(this).text().split('\n').length - 1;
                if (edit == 'html') {
                    lines = $(this).text().split('\n').length;
                }
                var $numbering = $('<ul/>').addClass('pre-numbering hljs');
                $(this)
                    .addClass('has-numbering')
                    .parent()
                    .append($numbering);
                for (i = 1; i <= lines; i++) {
                    $numbering.append($('<li/>').text(i + "."));
                }
            });
        })
        // 加载数学公式
        // $.getScript("//cdn.bootcss.com/mathjax/2.7.0/MathJax.js?config=TeX-AMS-MML_HTMLorMML", function () {
        //     MathJax.Hub.Config({
        //         showProcessingMessages: false,
        //         messageStyle: "none",
        //         extensions: ["tex2jax.js"],
        //         jax: ["input/TeX", "output/HTML-CSS"],
        //         tex2jax: {
        //             inlineMath: [['$', '$'], ["\\(", "\\)"]],
        //             displayMath: [['$$', '$$'], ["\\[", "\\]"]],
        //             skipTags: ['script', 'noscript', 'style', 'textarea', 'pre', 'code', 'a']
        //         },
        //         "HTML-CSS": {
        //             availableFonts: ["STIX", "TeX"],
        //             showMathMenu: false,
        //             showProcessingMessages: false,
        //             messageStyle: "none"
        //         }
        //     });
        //     var mathId = document.getElementById("articleContent");
        //     MathJax.Hub.Queue(["Typeset", MathJax.Hub, mathId]);
        // });

        function appreciate() {
            layer.open({
                type: 1,
                title: '赞赏作者',
                shade: 0.6,
                anim: 1,
                shadeClose: true,
                area: ["300px", "350px"],
                content: $('#appreciate-content')
            });
        }

        function changeImg(type) {
            if (type == 1) {
                $(".layui-layer-wrap > #appreciate-content-wechatImg").hide();
                $(".layui-layer-wrap > #appreciate-content-aLiImg").show();
            } else {
                $(".layui-layer-wrap > #appreciate-content-aLiImg").hide();
                $(".layui-layer-wrap > #appreciate-content-wechatImg").show();
            }
        }

        var index;
        $('.p-article-goto-box').on('mouseenter', '#preArticle', function () {
            var preTitle = $("#preArticle").attr("articleTitle");
            index = layer.tips(preTitle, '#preArticle', {
                tips: 1
            });
        });
        $('.p-article-goto-box').on('mouseleave', '#preArticle', function () {
            layer.close(index);
        });
        $('.p-article-goto-box').on('mouseenter', '#nextArticle', function () {
            var preTitle = $("#nextArticle").attr("articleTitle");
            index = layer.tips(preTitle, '#nextArticle', {
                tips: 1
            });
        });
        $('.p-article-goto-box').on('mouseleave', '#nextArticle', function () {
            layer.close(index);
        });
    </script>
@endsection