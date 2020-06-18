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
            <h3>文章归档</h3>
            <span>目前共发布了9篇文章,继续努力~</span>
        </div>
        <div class="p-article-timeline-box">
            <ul class="layui-timeline" id="timelineBox">
                @foreach($blog as $key=>$val)
                    <li class="layui-timeline-item">
                        <i class="layui-icon layui-timeline-axis"></i>
                        <div class="layui-timeline-content layui-text">
                            <h3 class="layui-timeline-title">{{$val['created_at']}}</h3>
                            <span class="time-box-top">
                                <i class="fa fa-caret-up"></i>
                            </span>
                            <a href="{{url('article')}}/{{$val['id']}}" title="{{$val['title']}}"
                               class="pjax">{{$val['title']}}</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div id="timeLinePage" style="text-align: center;">
            <div class="layui-box layui-laypage layui-laypage-molv" id="layui-laypage-1">
                <a href="javascript:;"
                   class="layui-laypage-prev layui-disabled"
                   data-page="0">上一页</a><span
                        class="layui-laypage-curr"><em
                            class="layui-laypage-em" style="background-color:#337ab7;"></em><em>1</em></span><a
                        href="javascript:;" class="layui-laypage-next layui-disabled" data-page="2">下一页</a></div>
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
        // layui.use('laypage', function () {
        //     var laypage = layui.laypage;
        //     // 执行一个laypage实例
        //     laypage.render({
        //         elem: 'timeLinePage',
        //         count: articles.length,
        //         theme: '#337ab7',
        //         jump: function (obj, first) {
        //             var timeIndex = layer.load();
        //             $("#timelineBox").html('');
        //             var html = '';
        //             var start = 0;
        //             if (obj.curr > 1) {
        //                 start = (obj.curr - 1) * 10;
        //             }
        //             for (var i = start; i < articles.length; i++) {
        //                 if (i <= start + 9) {
        //                     var articleHtml = '<li class="layui-timeline-item">' +
        //                         '<i class="layui-icon layui-timeline-axis">&#xe63f;</i>' +
        //                         '<div class="layui-timeline-content layui-text">' +
        //                         '<h3 class="layui-timeline-title">' + articles[i].created + '</h3>' +
        //                         '<span class="time-box-top"><i class="fa fa-caret-up"></i></span>' +
        //                         '<a href="' + articles[i].url + '" title="' + articles[i].title + '" class="pjax">' +
        //                         articles[i].title +
        //                         '</a>' +
        //                         '</div>' +
        //                         '</li>';
        //                     html += articleHtml;
        //                 }
        //             }
        //             $("#timelineBox").append(html);
        //             $("html,body").animate({scrollTop: $('.p-content-box').offset().top}, 300);
        //             layer.close(timeIndex);
        //             //首次不执行
        //             if (!first) {
        //                 //do something
        //             }
        //         }
        //     });
        // });
    </script>
@endsection