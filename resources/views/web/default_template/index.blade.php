<!doctype html>
<html>
<head>
    <meta charset="gb2312">
    <title>首页_追梦小窝的博客 - 努力霍城自己想要的样子</title>
    <meta name="keywords" content="个人博客,追梦小窝的博客,个人博客模板,追梦小窝" />
    <meta name="description" content="追梦小窝的博客，是一个站在web前端设计之路的女程序员个人网站，提供个人博客模板免费资源下载的个人原创网站。" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('style/web/default_template/css/base.css')}}" rel="stylesheet">
    <link href="{{asset('style/web/default_template/css/index.css')}}" rel="stylesheet">
    <link href="{{asset('style/web/default_template/css/m.css')}}" rel="stylesheet">
    <script src="{{asset('style/web/default_template/js/jquery.min.js')}}"></script>
    <script src="{{asset('style/web/default_template/js/jquery.easyfader.min.js')}}"></script>
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
    <div class="banner">
        <div id="sucaihuo" class="fader"> <img class="slide" src="{{url('style/web/default_template/images')}}/banner01.jpg"> <img class="slide" src="{{url('style/web/default_template/images')}}/banner02.jpg"> <img class="slide" src="{{url('style/web/default_template/images')}}/banner03.jpg">
            <div class="fader_controls">
                <div class="page prev" data-target="prev">&lsaquo;</div>
                <div class="page next" data-target="next">&rsaquo;</div>
                <ul class="pager_list">
                </ul>
            </div>
        </div>
        <script>
            $(function() {
                $('#sucaihuo').easyFader();
            });
        </script>
    </div>
    {{--<div class="blog" >--}}
        {{--<figure>--}}
            {{--<ul>--}}
                {{--<a href="/"><img src="{{url('style/web/default_template/images')}}/mb01.jpg"><span>下载个人博客模板</span></a>--}}
            {{--</ul>--}}
            {{--<p><a href="/">灯具公司复古风格PSD设计稿</a></p>--}}
            {{--<figcaption>此模板为PSD设计稿，复古风格。首页主要突出产品，以及公司简介。手绘灯作为头部背景图片，这个比较特别。html可以做出灯一闪一闪的效果，或者说旁边有个按钮...</figcaption>--}}
        {{--</figure>--}}
    {{--</div>--}}
    <div class="newblogs">
        <h2 class="hometitle">最新文章</h2>
        <ul>
            @foreach($blog as $value)
            <li>
                <h3 class="blogtitle">
                    <span>
                        <a href="/jstt/css3/" title="css3" target="_blank"  class="classname">个人博客</a>
                    </span>
                    <a href="/jstt/css3/2018-03-26/812.html" target="_blank" >{{$value['title']}}</a>
                </h3>
                <div class="bloginfo">
                    <span class="blogpic">
                        <a href="/jstt/css3/2018-03-26/812.html" title="{{$value['title']}}">
                            <img src="{{url('style/web/default_template/images')}}/t01.jpg" alt="{{$value['title']}}" />
                        </a>
                    </span>
                    <p>{{substr($value['content'],0,200)}}</p>
                </div>
                <div class="autor"><span class="lm f_l"></span><span class="dtime f_l">{{$value['date']}}</span><span class="viewnum f_l">浏览（<a href="/">{{$value['views']}}</a>）</span><span class="f_r"><a href="/jstt/css3/2018-03-26/812.html" class="more">阅读原文>></a></span></div>
                <div class="line"></div>
            </li>
            @foreach
        </ul>
    </div>
    <div class="rbox">
        <div class="paihang">
            <h2 class="hometitle">模板排行</h2>
            <ul>
                <li><b><a href="/download/div/2015-04-10/746.html" target="_blank">【活动作品】柠檬绿兔小白个人博客模板30...</a></b>
                    <p><i><img src="{{url('style/web/default_template/images')}}/t02.jpg"  /></i>展示的是首页html，博客页面布局格式简单，没有复杂的背景，色彩局部点缀，动态的幻灯片展示，切换卡，标...</p>
                </li>
                <li><b><a href="/download/div/2014-02-19/649.html" target="_blank"> 个人博客模板（2014草根寻梦）30...</a></b>
                    <p><i><img src="{{url('style/web/default_template/images')}}/b03.jpg"  /></i>2014第一版《草根寻梦》个人博客模板简单、优雅、稳重、大气、低调。专为年轻有志向却又低调的草根站长设...</p>
                </li>
                <li><b><a href="/download/div/2013-08-08/571.html" target="_blank">黑色质感时间轴html5个人博客模板30...</a></b>
                    <p><i><img src="{{url('style/web/default_template/images')}}/b04.jpg"  /></i>黑色时间轴html5个人博客模板颜色以黑色为主色，添加了彩色作为网页的一个亮点，导航高亮显示、banner图片...</p>
                </li>
                <li><b><a href="/download/div/2014-09-18/730.html" target="_blank">情侣博客模板系列之《回忆》Html30...</a></b>
                    <p><i><img src="{{url('style/web/default_template/images')}}/b05.jpg"  /></i>Html5+css3情侣博客模板，主题《回忆》，使用css3技术实现网站动画效果，主题《回忆》,分为四个主要部分，...</p>
                </li>
                <li><b><a href="/download/div/2014-04-17/661.html" target="_blank">黑色Html5个人博客模板主题《如影随形》30...</a></b>
                    <p><i><img src="{{url('style/web/default_template/images')}}/b06.jpg"  /></i>014第二版黑色Html5个人博客模板主题《如影随形》，如精灵般的影子会给人一种神秘的感觉。一张剪影图黑白...</p>
                </li>
                <li><b><a href="/jstt/bj/2015-01-09/740.html" target="_blank">【匆匆那些年】总结个人博客经历的这四年…30...</a></b>
                    <p><i><img src="{{url('style/web/default_template/images')}}/mb02.jpg"  /></i>博客从最初的域名购买，到上线已经有四年的时间了，这四年的时间，有笑过，有怨过，有悔过，有执着过，也...</p>
                </li>
            </ul>
        </div>
        <div class="paihang">
            <h2 class="hometitle">站长推荐</h2>
            <ul>
                <li><b><a href="/download/div/2015-04-10/746.html" target="_blank">【活动作品】柠檬绿兔小白个人博客模板30...</a></b>
                    <p><i><img src="{{url('style/web/default_template/images')}}/t02.jpg"  /></i>展示的是首页html，博客页面布局格式简单，没有复杂的背景，色彩局部点缀，动态的幻灯片展示，切换卡，标...</p>
                </li>
                <li><b><a href="/download/div/2014-02-19/649.html" target="_blank"> 个人博客模板（2014草根寻梦）30...</a></b>
                    <p><i><img src="{{url('style/web/default_template/images')}}/b03.jpg"  /></i>2014第一版《草根寻梦》个人博客模板简单、优雅、稳重、大气、低调。专为年轻有志向却又低调的草根站长设...</p>
                </li>
                <li><b><a href="/download/div/2013-08-08/571.html" target="_blank">黑色质感时间轴html5个人博客模板30...</a></b>
                    <p><i><img src="{{url('style/web/default_template/images')}}/b04.jpg"  /></i>黑色时间轴html5个人博客模板颜色以黑色为主色，添加了彩色作为网页的一个亮点，导航高亮显示、banner图片...</p>
                </li>
                <li><b><a href="/download/div/2014-09-18/730.html" target="_blank">情侣博客模板系列之《回忆》Html30...</a></b>
                    <p><i><img src="{{url('style/web/default_template/images')}}/b05.jpg"  /></i>Html5+css3情侣博客模板，主题《回忆》，使用css3技术实现网站动画效果，主题《回忆》,分为四个主要部分，...</p>
                </li>
                <li><b><a href="/download/div/2014-04-17/661.html" target="_blank">黑色Html5个人博客模板主题《如影随形》30...</a></b>
                    <p><i><img src="{{url('style/web/default_template/images')}}/b06.jpg"  /></i>014第二版黑色Html5个人博客模板主题《如影随形》，如精灵般的影子会给人一种神秘的感觉。一张剪影图黑白...</p>
                </li>
                <li><b><a href="/jstt/bj/2015-01-09/740.html" target="_blank">【匆匆那些年】总结个人博客经历的这四年…30...</a></b>
                    <p><i><img src="{{url('style/web/default_template/images')}}/mb02.jpg"  /></i>博客从最初的域名购买，到上线已经有四年的时间了，这四年的时间，有笑过，有怨过，有悔过，有执着过，也...</p>
                </li>
            </ul>
        </div>
        <div class="links">
            <h2 class="hometitle">友情链接</h2>
            <ul>
                <li><a href="http://www.yangqq.com">追梦小窝的博客</a></li>
                <li><a href="http://www.yangqq.com/download/">个人博客模板</a></li>
                <li><a href="http://www.yangqq.com/link.html">优秀个人博客</a></li>
            </ul>
        </div>
        <div class="weixin">
            <h2 class="hometitle">官方微信</h2>
            <ul>
                <img src="{{url('style/web/default_template/images')}}/wx.jpg">
            </ul>
        </div>
    </div>
</article>
@include('web.default_template.public.footer')
</body>
</html>
