<!DOCTYPE html>
<html lang="ZH-CN">

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="description" content="@yield('description')">
    <meta name="template" content="Iszmxw-Simple-Pro">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link rel="icon" type="image/ico"
          href="{{asset('style/web/iszmxw-simple-pro/images/ec83d6ed69d84517beb3ee9ccc49f8b4.jpg')}}">
    <link rel="stylesheet" href="{{asset('style/web/iszmxw-simple-pro/static/plugins/layui/css/layui.css')}}"
          media="all">
    <link rel="stylesheet" href="{{asset('style/web/iszmxw-simple-pro/static/css/perfree.min.css')}}"
          media="all">
    <link rel="stylesheet"
          href="{{asset('style/web/iszmxw-simple-pro/static/plugins/font-awesome/css/font-awesome.min.css')}}"
          media="all">
    <link rel="stylesheet" href="{{asset('style/web/iszmxw-simple-pro/static/plugins/skplayer/skPlayer.min.css')}}"
          media="all">
    <link rel="dns-prefetch" href="//cdn.bootcss.com">
    <link rel="stylesheet" href="{{asset('style/web/iszmxw-simple-pro/static/plugins/highlight/styles/vs.css')}}"
          media="all">
    <link rel="stylesheet"
          href="{{asset('style/web/iszmxw-simple-pro/static/plugins/layer/theme/default/layer.css?v=3.1.1')}}"
          id="layuicss-layer">
    <script src="{{asset('style/web/iszmxw-simple-pro/static/plugins/jquery/jquery-1.8.3.min.js')}}"></script>
    @yield('style')
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
</head>

<body>
<div style="display: none;" id="hitokoto"></div>
<script>
    /**自定义背景颜色
     */
    /**渐变色背景
     "*/
    $("body").css("background-image", "linear-gradient(to top, #fbc2eb 0%, #a6c1ee 100%)");
    /***/
    /**自定义背景图片
     */
</script>
<div class="p-box">
    {{--左边导航栏--}}
    <div class="p-left-box">
        @include('web.iszmxw_simple_pro.public.left')
    </div>
    {{--右边内容部分--}}
    <div class="p-right-box">
        @include('web.iszmxw_simple_pro.public.right')
    </div>
</div>
<div class="p-layout-right-btn">
    <a class="go-top"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
</div>
<script src="https://v1.hitokoto.cn/?encode=js&amp;select=%23hitokoto" defer=""></script>
<script type="text/javascript" src="{{asset('style/web/iszmxw-simple-pro/static/plugins/pjax/pjax.js')}}"></script>
<script type="text/javascript" src="{{asset('style/web/iszmxw-simple-pro/static/plugins/layer/layer.js')}}"></script>
<script type="text/javascript" src="{{asset('style/web/iszmxw-simple-pro/static/plugins/layui/layui.js')}}"></script>
<script type="text/javascript" src="{{asset('style/web/iszmxw-simple-pro/static/js/common.js')}}"></script>
<script type="text/javascript" src="{{asset('style/web/iszmxw-simple-pro/static/plugins/skplayer/skPlayer.js')}}"></script>
<script type="text/javascript" src="{{asset('style/web/iszmxw-simple-pro/static/js/main.min.js')}}"></script>
<script type="text/javascript" src="{{asset('style/web/iszmxw-simple-pro/static/plugins/clipboard/clipboard.min.js')}}"></script>
<script type="text/javascript" src="{{asset('style/web/iszmxw-simple-pro/static/plugins/jquery.tocify/jquery-ui-1.9.1.custom.min.js')}}"></script>
<script type="text/javascript" src="{{asset('style/web/iszmxw-simple-pro/static/plugins/jquery.tocify/jquery.tocify.js')}}"></script>
@yield('script')
<script>
    //设置pjax
    var pjax = new Pjax({
        elements: ".pjax,form",
        cacheBust: false,
        debug: false,
        selectors: [
            "title",
            "meta[name=keywords]",
            "meta[name=description]",
            ".p-content-box",
            "#toxBox",
            ".p-right-ad-box",
            ".loadJs"
        ]
    })
    var index;
    document.addEventListener('pjax:send', function () {
        index = layer.load();
    });
    document.addEventListener('pjax:success', function () {
        layer.close(index);
    });
    var isAutoPlay = JSON.parse("false ");
    //音乐配置
    var player = new skPlayer({
        autoplay: isAutoPlay,
        listshow: false,
        mode: 'listloop',
        music: {
            type: 'cloud',
            source: "2764311047 "
        }
    });
</script>
<script>
    /**自定义js代码
     */
    (function (window, document, undefined) {
        var hearts = [];
        window.requestAnimationFrame = (function () {
            return window.requestAnimationFrame ||
                window.webkitRequestAnimationFrame ||
                window.mozRequestAnimationFrame ||
                window.oRequestAnimationFrame ||
                window.msRequestAnimationFrame ||
                function (callback) {
                    setTimeout(callback, 1000 / 60);
                }
        })();
        init();

        function init() {
            css(".heart{width: 10px;height: 10px;position: fixed;background: #f00;transform: rotate(45deg);-webkit-transform: rotate(45deg);-moz-transform: rotate(45deg);}.heart:after,.heart:before{content: '';width: inherit;height: inherit;background: inherit;border-radius: 50%;-webkit-border-radius: 50%;-moz-border-radius: 50%;position: absolute;}.heart:after{top: -5px;}.heart:before{left: -5px;}");
            attachEvent();
            gameloop();
        }

        function gameloop() {
            for (var i = 0; i < hearts.length; i++) {
                if (hearts[i].alpha <= 0) {
                    document.body.removeChild(hearts[i].el);
                    hearts.splice(i, 1);
                    continue;
                }
                hearts[i].y--;
                hearts[i].scale += 0.004;
                hearts[i].alpha -= 0.013;
                hearts[i].el.style.cssText = "left:" + hearts[i].x + "px;top:" + hearts[i].y + "px;opacity:" + hearts[i].alpha + ";transform:scale(" + hearts[i].scale + "," + hearts[i].scale + ") rotate(45deg);background:" + hearts[i].color;
            }
            requestAnimationFrame(gameloop);
        }

        function attachEvent() {
            var old = typeof window.onclick === "function" && window.onclick;
            window.onclick = function (event) {
                old && old();
                createHeart(event);
            }
        }

        function createHeart(event) {
            var d = document.createElement("div");
            d.className = "heart";
            hearts.push({
                el: d,
                x: event.clientX - 5,
                y: event.clientY - 5,
                scale: 1,
                alpha: 1,
                color: randomColor()
            });
            document.body.appendChild(d);
        }

        function css(css) {
            var style = document.createElement("style");
            style.type = "text/css";
            try {
                style.appendChild(document.createTextNode(css));
            } catch (ex) {
                style.styleSheet.cssText = css;
            }
            document.getElementsByTagName('head')[0].appendChild(style);
        }

        function randomColor() {
            return "rgb(" + (~~(Math.random() * 255)) + "," + (~~(Math.random() * 255)) + "," + (~~(Math.random() * 255)) + ")";
        }
    })(window, document);    /***/
    /**自定义盒子宽度
     */
    $(".p-box").css("width", "80%");
    /***/
</script>
<div class="loadJs">
</div>
</body>
</html>