@extends('web.iszmxw_simple_pro.app')

@section('keywords','追梦小窝博客归档')
@section('description','追梦小窝博客归档')

@section('title', '追梦小窝-时间轴')
{{--样式引入--}}
@section('style')

@endsection

{{--内容部分--}}
@section('content')
    <div class="p-content-box">
        <div class="p-content-box-lwlhitokoto">
            <h3>追梦小窝</h3>
            <span id="yiyan">大丈夫立世无所畏惧。</span>
        </div>
        <div class="p-notice-box">
            <span><i class="layui-icon layui-icon-speaker" style="font-weight: 700;"></i> 这是一条不正经的测试公告呀~</span>
            <a class="close-notice" href="javascript:;" onclick="closeNotice();"><i class="fa fa-times"
                                                                                    aria-hidden="true"></i></a>
        </div>
        <div class="p-content-box-articleList-box">
            <!-- 置顶文章start -->
            <div class="p-content-box-article-box">
                <!--缩略图获取方式-->
                <a href="/article/9" class="pjax" data-pjax-state="">
                    <div class="p-article-thumb"
                         style="background-image: url('{{asset('style/web/iszmxw_simple_pro/images/429ac173b205465ba3e3a1410bd38e88.jpg')}}')">
                    </div>
                </a>
                <div class="p-article-brief-box">
                    <h2 class="p-article-title"><a href="/article/9" class="pjax" data-pjax-state=""> <span
                                    class="p-article-top">置顶</span> Perfree-Simple-Pro-致更好的你 </a></h2>
                    <p class="p-article-content"> 一款高仿Typecho的handsome博客主题 主题简介
                        抛弃一切繁琐,只想简简单单的呈现你的文采,如你所见,这是一款简约清新的博客主题模板,该模板收费69元,包含相册插件和留言板插件(开发中)以及以后所有新出的插件,你只管创作,其他交给 </p>
                    <hr>
                    <div class="p-article-msg">
                                <span class="p-article-msg-btn"> <i class="fa fa-eye"
                                                                    aria-hidden="true"></i> 3608浏览 </span>
                        <span class="p-article-msg-btn"> <i class="fa fa-comment-o"
                                                            aria-hidden="true"></i> 48条评论 </span>
                        <span class="p-article-msg-btn"> <i class="fa fa-clock-o"
                                                            aria-hidden="true"></i> 2019年06月03日 </span>
                        <a href="/article/9" class="p-article-msg-all-btn pjax" data-pjax-state="">阅读全文</a>
                    </div>
                </div>
            </div>
            <!-- 置顶文章end -->
            <!--文章列表start-->
            <div class="p-content-box-article-box">
                <!--缩略图获取方式-->
                <div class="p-article-brief-box">
                    <h2 class="p-article-title"><a href="/article/1360" class="pjax" data-pjax-state="">
                            测试数学公式 </a></h2>
                    <p class="p-article-content"> $ J_\alpha(x) = \sum_{m=0}^\infty \frac{(-1)^m}{m! \Gamma (m +
                        \alpha +
                        1)} {\left({ \frac{x}{2} }\right)}^{2m + \alpha} </p>
                    <hr>
                    <div class="p-article-msg">
                        <span class="p-article-msg-btn"> <i class="fa fa-user-o" aria-hidden="true"></i> perfree </span>
                        <span class="p-article-msg-btn eye-cont"> <i class="fa fa-eye"
                                                                     aria-hidden="true"></i> 400浏览 </span>
                        <span class="p-article-msg-btn"> <i class="fa fa-comment-o" aria-hidden="true"></i> 7条评论 </span>
                        <span class="p-article-msg-btn"> <i class="fa fa-clock-o"
                                                            aria-hidden="true"></i> 2019年09月12日 </span>
                        <a href="/article/1360" class="p-article-msg-all-btn pjax" data-pjax-state="">阅读全文</a>
                    </div>
                </div>
            </div>
            <div class="p-content-box-article-box">
                <!--缩略图获取方式-->
                <a href="/article/1359" class="pjax" data-pjax-state="">
                    <div class="p-article-thumb"
                         style="background-image: url('{{asset('style/web/iszmxw_simple_pro/images/99d1d59fa97e438aae07087e98be63bb.jpg')}}')">
                    </div>
                </a>
                <div class="p-article-brief-box">
                    <h2 class="p-article-title"><a href="/article/1359" class="pjax" data-pjax-state="">
                            Python数学计算/解方程/求导
                        </a></h2>
                    <p class="p-article-content"> 本文总结了一些简单的Python数学操作,如均值、方差、标准差,函数方程,求导等 均值、方差、标准差 # 数据集 # 1,
                        2, 3, 4, 5
                        arr = [1, 2, 3, 4, 5] # 均值 arr_mean = np.mean(a </p>
                    <hr>
                    <div class="p-article-msg">
                        <span class="p-article-msg-btn"> <i class="fa fa-user-o" aria-hidden="true"></i> perfree </span>
                        <span class="p-article-msg-btn eye-cont"> <i class="fa fa-eye"
                                                                     aria-hidden="true"></i> 574浏览 </span>
                        <span class="p-article-msg-btn"> <i class="fa fa-comment-o" aria-hidden="true"></i> 4条评论 </span>
                        <span class="p-article-msg-btn"> <i class="fa fa-clock-o"
                                                            aria-hidden="true"></i> 2019年08月13日 </span>
                        <a href="/article/1359" class="p-article-msg-all-btn pjax" data-pjax-state="">阅读全文</a>
                    </div>
                </div>
            </div>
            <div class="p-content-box-article-box">
                <!--缩略图获取方式-->
                <div class="p-article-brief-box">
                    <h2 class="p-article-title"><a href="/article/10" class="pjax" data-pjax-state="">
                            推荐一款分布式文件服务器 </a>
                    </h2>
                    <p class="p-article-content">
                        说到分布式文件服务器,可能大家最常听说的就是FastDfs,而一提起它又比较头疼,安装起来太麻烦了,文件不好迁移啦等等之类的,今天就给大家推荐一款最近刚刚兴起的分布式文件服务器,Go-FastDfs,它是一个基于http协议的分布式文件系统
                    </p>
                    <hr>
                    <div class="p-article-msg">
                        <span class="p-article-msg-btn"> <i class="fa fa-user-o" aria-hidden="true"></i> perfree </span>
                        <span class="p-article-msg-btn eye-cont"> <i class="fa fa-eye"
                                                                     aria-hidden="true"></i> 575浏览 </span>
                        <span class="p-article-msg-btn"> <i class="fa fa-comment-o" aria-hidden="true"></i> 8条评论 </span>
                        <span class="p-article-msg-btn"> <i class="fa fa-clock-o"
                                                            aria-hidden="true"></i> 2019年06月06日 </span>
                        <a href="/article/10" class="p-article-msg-all-btn pjax" data-pjax-state="">阅读全文</a>
                    </div>
                </div>
            </div>
            <div class="p-content-box-article-box">
                <!--缩略图获取方式-->
                <a href="/article/7" class="pjax" data-pjax-state="">
                    <div class="p-article-thumb"
                         style="background-image: url('{{asset('style/web/iszmxw_simple_pro/images/81d2350c430a462a83b0b31018b6c991.jpg')}}')">
                    </div>
                </a>
                <div class="p-article-brief-box">
                    <h2 class="p-article-title"><a href="/article/7" class="pjax" data-pjax-state="">
                            谁又不曾孤独呢-孤独患者 </a>
                    </h2>
                    <p class="p-article-content">
                        孤独，真的成为了人的生活常态，不知道为什么最近总能想到这个话题，不知道你能不能明白生命叫孤独，不知道你有没有和你谈的来的人。也许正因为孤独，你才迷恋各种游戏、电影、综艺、甚至发了疯的写代码不敢停下来，你怕闲下来就像我一样在这儿思考自己是否真
                    </p>
                    <hr>
                    <div class="p-article-msg">
                        <span class="p-article-msg-btn"> <i class="fa fa-user-o" aria-hidden="true"></i> perfree </span>
                        <span class="p-article-msg-btn eye-cont"> <i class="fa fa-eye"
                                                                     aria-hidden="true"></i> 590浏览 </span>
                        <span class="p-article-msg-btn"> <i class="fa fa-comment-o" aria-hidden="true"></i> 7条评论 </span>
                        <span class="p-article-msg-btn"> <i class="fa fa-clock-o"
                                                            aria-hidden="true"></i> 2019年05月08日 </span>
                        <a href="/article/7" class="p-article-msg-all-btn pjax" data-pjax-state="">阅读全文</a>
                    </div>
                </div>
            </div>
            <div class="p-content-box-article-box">
                <!--缩略图获取方式-->
                <div class="p-article-brief-box">
                    <h2 class="p-article-title"><a href="/article/4" class="pjax" data-pjax-state="">
                            推荐一个很棒的html网页背景图片网站
                        </a></h2>
                    <p class="p-article-content"> 这里边有很多简洁纯净的网页背景图片,非常小清新,而且免费,可以在线直接预览 点此前往 网页截图:
                        支持在线预览背景图,直接替换网页背景 </p>
                    <hr>
                    <div class="p-article-msg">
                        <span class="p-article-msg-btn"> <i class="fa fa-user-o" aria-hidden="true"></i> perfree </span>
                        <span class="p-article-msg-btn eye-cont"> <i class="fa fa-eye"
                                                                     aria-hidden="true"></i> 943浏览 </span>
                        <span class="p-article-msg-btn"> <i class="fa fa-comment-o" aria-hidden="true"></i> 5条评论 </span>
                        <span class="p-article-msg-btn"> <i class="fa fa-clock-o"
                                                            aria-hidden="true"></i> 2019年04月24日 </span>
                        <a href="/article/4" class="p-article-msg-all-btn pjax" data-pjax-state="">阅读全文</a>
                    </div>
                </div>
            </div>
            <div class="perfree-page-box layui-clear">
                <a class="page-item previous disabled pjax" href="javascript:;" data-pjax-state="">上一页</a>
                <a class="page-item active pjax" href="javascript:;" data-pjax-state="">1</a>
                <a class="page-item  pjax" href="/article/category/index-2" data-pjax-state="">2</a>
                <a class="page-item next pjax" href="/article/category/index-2" data-pjax-state="">下一页</a>
            </div>
            <!--文章列表end-->
        </div>
    </div>
@endsection

{{--js引用--}}
@section('script')
    <script>
        var articles = [];
        var article = {
            "title": "测试数学公式",
            "url": "/article/1360",
            "created": '09月12日'
        };
        articles.push(article);
        var article = {
            "title": "Python数学计算/解方程/求导",
            "url": "/article/1359",
            "created": '08月13日'
        };
        articles.push(article);
        var article = {
            "title": "推荐一款分布式文件服务器",
            "url": "/article/10",
            "created": '06月06日'
        };
        articles.push(article);
        var article = {
            "title": "Perfree-Simple-Pro-致更好的你",
            "url": "/article/9",
            "created": '06月03日'
        };
        articles.push(article);
        var article = {
            "title": "谁又不曾孤独呢-孤独患者",
            "url": "/article/7",
            "created": '05月08日'
        };
        articles.push(article);
        var article = {
            "title": "推荐一个很棒的html网页背景图片网站",
            "url": "/article/4",
            "created": '04月24日'
        };
        articles.push(article);
        var article = {
            "title": "Python脚本文件-基本语法",
            "url": "/article/3",
            "created": '04月24日'
        };
        articles.push(article);
        var article = {
            "title": "Python数据分析之Pandas数据可视化",
            "url": "/article/2",
            "created": '04月23日'
        };
        articles.push(article);
        var article = {
            "title": "PerfreeSimple-安安静静的写博客",
            "url": "/article/1",
            "created": '04月20日'
        };
        articles.push(article);
        console.log(articles);
        layui.use('laypage', function () {
            var laypage = layui.laypage;
            //执行一个laypage实例
            laypage.render({
                elem: 'timeLinePage',
                count: articles.length,
                theme: '#337ab7',
                jump: function (obj, first) {
                    var timeIndex = layer.load();
                    $("#timelineBox").html('');
                    var html = '';
                    var start = 0;
                    if (obj.curr > 1) {
                        start = (obj.curr - 1) * 10;
                    }
                    for (var i = start; i < articles.length; i++) {
                        if (i <= start + 9) {
                            var articleHtml = '<li class="layui-timeline-item">' +
                                '<i class="layui-icon layui-timeline-axis">&#xe63f;</i>' +
                                '<div class="layui-timeline-content layui-text">' +
                                '<h3 class="layui-timeline-title">' + articles[i].created + '</h3>' +
                                '<span class="time-box-top"><i class="fa fa-caret-up"></i></span>' +
                                '<a href="' + articles[i].url + '" title="' + articles[i].title + '" class="pjax">' +
                                articles[i].title +
                                '</a>' +
                                '</div>' +
                                '</li>';
                            html += articleHtml;
                        }
                    }
                    $("#timelineBox").append(html);
                    $("html,body").animate({scrollTop: $('.p-content-box').offset().top}, 300);
                    layer.close(timeIndex);
                    //首次不执行
                    if (!first) {
                        //do something
                    }
                }
            });
        });
    </script>
@endsection