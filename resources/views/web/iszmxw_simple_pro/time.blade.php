@extends('web.iszmxw_simple_pro.app')

@section('keywords','追梦小窝博客归档')
@section('description','追梦小窝博客归档')

@section('title', '追梦小窝-时间轴')
{{--样式引入--}}
@section('style')
    <style type="text/css">
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
{{--@section('content')--}}
{{--@endsection--}}

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