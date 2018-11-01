<!doctype html>
<html>
<head>
    <meta charset="gb2312">
    <title>内容页_追梦小窝的博客 - 努力霍城自己想要的样子</title>
    <meta name="keywords" content="个人博客,追梦小窝的博客,个人博客模板,追梦小窝" />
    <meta name="description" content="追梦小窝的博客，是一个站在web前端设计之路的女程序员个人网站，提供个人博客模板免费资源下载的个人原创网站。" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('style/web/default_template/css/base.css')}}" rel="stylesheet">
    <link href="{{asset('style/web/default_template/css/info.css')}}" rel="stylesheet">
    <link href="{{asset('style/web/default_template/css/m.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{asset('style/web/default_template/js/modernizr.js')}}"></script>
    <![endif]-->
    <script>
        window.onload = function ()
        {
            var oH2 = document.getElementsByTagName("h2")[0];
            var oUl = document.getElementsByTagName("ul")[0];
            oH2.onclick = function ()
            {
                var style = oUl.style;
                style.display = style.display == "block" ? "none" : "block";
                oH2.className = style.display == "block" ? "open" : ""
            }
        }
    </script>
</head>
<body>

@include('web.default_template.public.header')
<article>
    <div class="infos">
        <div class="newsview">
            <h2 class="intitle">您现在的位置是：<a href="/">网站首页</a>&nbsp;&gt;&nbsp;<a href="/">{{$blog['sortname']}}</a></h2>
            <h3 class="news_title">{{$blog['title']}}</h3>
            <div class="news_author">
                <span class="au01">{{$blog['author']}}</span>
                <span class="au02">{{$blog['date']}}</span>
                <span class="au03">共<b>{{$blog['views']}}</b>人围观</span>
            </div>
            <div class="tags">
                <a href="/">中兴</a>
                <a href="/" target="_blank">咔咔</a>
                <a href="/" target="_blank">MWC</a>
                <a href="/" target="_blank">小蚁</a>
                <a href="/" target="_blank">运动相机</a>
            </div>
            <div class="news_about">
                <strong>申明</strong>
                本博客所有文章如无特别注明均为原创。作者：{{$blog['author']}} ，复制或转载请以超链接形式注明转自 追梦小窝的博客 。
            </div>
            <div class="news_infos">
                {!! $blog['content'] !!}
            </div>
        </div>
    </div>
    <div class="nextinfo">
        <p>上一篇：<a href="/" >传微软将把入门级Surface平板价格下调150美元</a></p>
        <p>下一篇：<a href="/">云南之行――大理洱海一日游</a></p>
    </div>
    <div class="otherlink">
        <h2>相关文章</h2>
        <ul>
            <li><a href="/" title="云南之行――丽江古镇玉龙雪山">云南之行――丽江古镇玉龙雪山</a></li>
            <li><a href="/" title="云南之行――大理洱海一日游">云南之行――大理洱海一日游</a></li>
            <li><a href="/" target="_blank">住在手机里的朋友</a></li>
            <li><a href="/" target="_blank">豪雅手机正式发布! 在法国全手工打造的奢侈品</a></li>
            <li><a href="/" target="_blank">教你怎样用欠费手机拨打电话</a></li>
            <li><a href="/" target="_blank">原来以为，一个人的勇敢是，删掉他的手机号码...</a></li>
        </ul>
    </div>
    <div class="news_pl">
        <h2>文章评论</h2>
        <ul>
        </ul>
    </div>

</article>
@include('web.default_template.public.footer')
</body>
</html>
