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
    <div class="p-left-box">
        <div class="p-left-box-2">
            <div class="p-left-logo-box">
                <a class="p-left-logo-box-text pjax" href="/" data-pjax-state="">
                    <i class="fa fa-snowflake-o"></i>
                    <span class="p-left-logo-box-text-name">追梦小窝</span>
                </a>
            </div>
            <div class="p-left-user-box">
                <a class="p-left-user-img-box pjax" href="/" data-pjax-state=""> <img
                            src="{{asset('style/web/iszmxw-simple-pro/images/ec83d6ed69d84517beb3ee9ccc49f8b4.jpg')}}">
                </a>
                <a class="p-left-user-name-box pjax" href="/" data-pjax-state=""> <span>追梦小窝</span> </a>
                <div class="p-left-user-hitokoto-box">
            <span class="text-muted text-xs block">
              <div id="chakhsu">♥简简单单的生活,安安静静</div>
              <script>
                var chakhsu = function (r) {
                    function t() {
                        return b[Math.floor(Math.random() * b.length)]
                    }

                    function e() {
                        return String.fromCharCode(94 * Math.random() + 33)
                    }

                    function n(r) {
                        for (var n = document.createDocumentFragment(), i = 0; r > i; i++) {
                            var l = document.createElement("span");
                            l.textContent = e(), l.style.color = t(), n.appendChild(l)
                        }
                        return n
                    }

                    function i() {
                        var t = o[c.skillI];
                        c.step ? c.step-- : (c.step = g, c.prefixP < l.length ? (c.prefixP >= 0 && (c.text += l[c.prefixP]), c.prefixP++) : "forward" === c.direction ? c.skillP < t.length ? (c.text += t[c.skillP], c.skillP++) : c.delay ? c.delay-- : (c.direction = "backward", c.delay = a) : c.skillP > 0 ? (c.text = c.text.slice(0, -1), c.skillP--) : (c.skillI = (c.skillI + 1) % o.length, c.direction = "forward")), r.textContent = c.text, r.appendChild(n(c.prefixP < l.length ? Math.min(s, s + c.prefixP) : Math.min(s, t.length - c.skillP))), setTimeout(i, d)
                    }

                    var l = "♥", o = ["简简单单的生活,安安静静的写博客"].map(function (r) {
                            return r + ""
                        }), a = 2, g = 1, s = 5, d = 75,
                        b = ["rgb(110,64,170)", "rgb(150,61,179)", "rgb(191,60,175)", "rgb(228,65,157)", "rgb(254,75,131)", "rgb(255,94,99)", "rgb(255,120,71)", "rgb(251,150,51)", "rgb(226,183,47)", "rgb(198,214,60)", "rgb(175,240,91)", "rgb(127,246,88)", "rgb(82,246,103)", "rgb(48,239,130)", "rgb(29,223,163)", "rgb(26,199,194)", "rgb(35,171,216)", "rgb(54,140,225)", "rgb(76,110,219)", "rgb(96,84,200)"],
                        c = {text: "", prefixP: -s, skillI: 0, skillP: 0, direction: "forward", delay: a, step: g};
                    i()
                };
                chakhsu(document.getElementById('chakhsu'));
              </script>
            </span>
                </div>
            </div>
            <hr class="layui-bg-black">
            <!--左侧菜单-->
            <div class="p-left-menu-box">
                <ul class="layui-nav layui-nav-tree" lay-filter="left-side">
                    <li class="layui-nav-item " lay-unselect=""><a href="/" class=" nav-menu-a  p-nav-menu-btn  pjax"
                                                                   target="_self" data-pjax-state=""><i
                                    class="fa fa-home fa-fw"></i> <span
                                    class="p-left-menu-nav-txt">首页</span></a></li>
                    <li class="layui-nav-item " lay-unselect=""><a href="/time.html"
                                                                   class=" nav-menu-a  p-nav-menu-btn  pjax"
                                                                   target="_self" data-pjax-state=""><i
                                    class="fa fa-clock-o fa-fw"></i> <span
                                    class="p-left-menu-nav-txt">归档</span></a></li>
                    <li class="layui-nav-item " lay-unselect=""><a href="/category.html"
                                                                   class=" nav-menu-a  p-nav-menu-btn  pjax"
                                                                   target="_self" data-pjax-state=""><i
                                    class="fa fa-bars fa-fw"></i> <span class="p-left-menu-nav-txt">分类</span></a></li>
                    <li class="layui-nav-item " lay-unselect=""><a href="/photoList.html"
                                                                   class=" nav-menu-a  p-nav-menu-btn  pjax"
                                                                   target="_self" data-pjax-state=""><i
                                    class="fa fa-image fa-fw"></i> <span class="p-left-menu-nav-txt">相册</span></a></li>
                    <li class="layui-nav-item " lay-unselect=""><a href="/link.html"
                                                                   class=" nav-menu-a  p-nav-menu-btn  pjax"
                                                                   target="_self" data-pjax-state=""><i
                                    class="fa fa-user-o fa-fw"></i> <span
                                    class="p-left-menu-nav-txt">朋友</span></a></li>
                    <span class="layui-nav-bar"></span>
                </ul>
            </div>
            <hr class="layui-bg-black">
            <!-- 左侧导航底部社交按钮start -->
            <div class="p-left-bottom-box">
                <div class="p-l-b-content layui-clear">
                    <a class="p-l-b-btn" href="http://weibo.com/gbcxf" target="_blank" title="微博"> <span
                                class="p-l-b-btn-icon"><i class="fa fa-weibo" aria-hidden="true"></i></span> <span
                                class="p-l-b-btn-name">微博</span> </a>
                    <a class="p-l-b-btn" href="https://github.com/perfree" target="_blank" title="GitHub"> <span
                                class="p-l-b-btn-icon"><i class="fa fa-github" aria-hidden="true"></i></span> <span
                                class="p-l-b-btn-name">GitHub</span> </a>
                    <a class="p-l-b-btn"
                       href="http://www.jpress.yinpengfei.com/attachment/20190605/af8f6fa8de17421ea73eae37917f1924.jpg"
                       target="_blank" title="微信"> <span class="p-l-b-btn-icon"><i class="fa fa-weixin"
                                                                                   aria-hidden="true"></i></span> <span
                                class="p-l-b-btn-name">微信</span> </a>
                </div>
            </div>
            <!-- 左侧导航底部社交按钮end -->
        </div>
    </div>
    <div class="p-right-box">
        <div class="p-header-box box-shadow">
            <div class="p-header-box-menu-btn">
                <a id="onOffMenu"><i class="layui-icon"></i> </a>
                <a id="phoneOnOffMenu" style="display: none"><i class="layui-icon"></i> </a>
            </div>
            <div class="p-header-box-search-box">
                <form action="/article/search" data-pjax-state="">
                    <input type="text" placeholder="请输入搜索内容" name="keyword" required="">
                    <button type="submit"><i class="layui-icon"></i></button>
                </form>
            </div>
            <a class="phone-title pjax" href="/" data-pjax-state=""> <i class="fa fa-snowflake-o"></i> <span
                        class="p-left-logo-box-text-name">Perfree</span> </a>
            <div class="p-header-box-right-box">
                <div class="p-header-box-music-box">
                    <div id="skPlayer"></div>
                </div>
                <div class="p-header-box-login-box">
                    <a class="p-header-box-login-box-login" href="/user/login">登录</a>
                    <span style="float: left;line-height: 50px;">|</span>
                    <a class="p-header-box-login-box-register" href="/user/register">注册</a>
                </div>
                <a id="phoneSetting" style="display: none"> <i class="layui-icon"></i> </a>
            </div>
            <div class="p-phone-top-nav box-shadow">
                <form action="/article/search" data-pjax-state="">
                    <input type="text" placeholder="请输入搜索内容" name="keyword" required="">
                    <button type="submit"><i class="layui-icon"></i></button>
                </form>
                <div class="p-phone-top-nav-login-box">
                    <div class="no-login layui-clear">
                        <a class="login-btn" href="/user/login">登录</a>
                        <a class="register-btn" href="/user/register">注册</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-container-box">
            <div class="p-content-box">
                <div class="p-content-box-lwlhitokoto">
                    <h3>Perfree</h3>
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
                                 style="background-image: url('./images/429ac173b205465ba3e3a1410bd38e88.jpg')">
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
                                <span class="p-article-msg-btn"> <i class="fa fa-comment-o" aria-hidden="true"></i> 48条评论 </span>
                                <span class="p-article-msg-btn"> <i class="fa fa-clock-o" aria-hidden="true"></i> 2019年06月03日 </span>
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
                                <span class="p-article-msg-btn eye-cont"> <i class="fa fa-eye" aria-hidden="true"></i> 400浏览 </span>
                                <span class="p-article-msg-btn"> <i class="fa fa-comment-o" aria-hidden="true"></i> 7条评论 </span>
                                <span class="p-article-msg-btn"> <i class="fa fa-clock-o" aria-hidden="true"></i> 2019年09月12日 </span>
                                <a href="/article/1360" class="p-article-msg-all-btn pjax" data-pjax-state="">阅读全文</a>
                            </div>
                        </div>
                    </div>
                    <div class="p-content-box-article-box">
                        <!--缩略图获取方式-->
                        <a href="/article/1359" class="pjax" data-pjax-state="">
                            <div class="p-article-thumb"
                                 style="background-image: url('./images/99d1d59fa97e438aae07087e98be63bb.jpg')">
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
                                <span class="p-article-msg-btn eye-cont"> <i class="fa fa-eye" aria-hidden="true"></i> 574浏览 </span>
                                <span class="p-article-msg-btn"> <i class="fa fa-comment-o" aria-hidden="true"></i> 4条评论 </span>
                                <span class="p-article-msg-btn"> <i class="fa fa-clock-o" aria-hidden="true"></i> 2019年08月13日 </span>
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
                                <span class="p-article-msg-btn eye-cont"> <i class="fa fa-eye" aria-hidden="true"></i> 575浏览 </span>
                                <span class="p-article-msg-btn"> <i class="fa fa-comment-o" aria-hidden="true"></i> 8条评论 </span>
                                <span class="p-article-msg-btn"> <i class="fa fa-clock-o" aria-hidden="true"></i> 2019年06月06日 </span>
                                <a href="/article/10" class="p-article-msg-all-btn pjax" data-pjax-state="">阅读全文</a>
                            </div>
                        </div>
                    </div>
                    <div class="p-content-box-article-box">
                        <!--缩略图获取方式-->
                        <a href="/article/7" class="pjax" data-pjax-state="">
                            <div class="p-article-thumb"
                                 style="background-image: url('./images/81d2350c430a462a83b0b31018b6c991.jpg')">
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
                                <span class="p-article-msg-btn eye-cont"> <i class="fa fa-eye" aria-hidden="true"></i> 590浏览 </span>
                                <span class="p-article-msg-btn"> <i class="fa fa-comment-o" aria-hidden="true"></i> 7条评论 </span>
                                <span class="p-article-msg-btn"> <i class="fa fa-clock-o" aria-hidden="true"></i> 2019年05月08日 </span>
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
                                <span class="p-article-msg-btn eye-cont"> <i class="fa fa-eye" aria-hidden="true"></i> 943浏览 </span>
                                <span class="p-article-msg-btn"> <i class="fa fa-comment-o" aria-hidden="true"></i> 5条评论 </span>
                                <span class="p-article-msg-btn"> <i class="fa fa-clock-o" aria-hidden="true"></i> 2019年04月24日 </span>
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
                <script>
                    $(function () {
                        var yiyan = $("#hitokoto").text();
                        $("#yiyan").text(yiyan);
                    })

                    function closeNotice() {
                        $(".p-notice-box").hide();
                    }
                </script>
            </div>
            <div class="p-right-side-box">
                <!-- 热门start -->
                <div class="p-right-card-box">
                    <h2 class="p-right-card-title">热门文章</h2>
                    <div class="p-right-card-body">
                        <ul>
                            <li class="p-hot-article-box"><a href="/article/9" class="pjax" data-pjax-state=""> <img
                                            src="./templates/iszmxw-simple-pro/static/images/1.png" alt=""
                                            class="p-hot-article-img">
                                    <div class="p-hot-article-right-box">
                                        <h2>Perfree-Simple-Pro-致更好的你</h2>
                                        <span><i class="fa fa-eye" aria-hidden="true"></i> 3608</span>
                                    </div>
                                </a></li>
                            <li class="p-hot-article-box"><a href="/article/1" class="pjax" data-pjax-state=""> <img
                                            src="./templates/iszmxw-simple-pro/static/images/2.png" alt=""
                                            class="p-hot-article-img">
                                    <div class="p-hot-article-right-box">
                                        <h2>PerfreeSimple-安安静静的写博客</h2>
                                        <span><i class="fa fa-eye" aria-hidden="true"></i> 1416</span>
                                    </div>
                                </a></li>
                            <li class="p-hot-article-box"><a href="/article/4" class="pjax" data-pjax-state=""> <img
                                            src="./templates/iszmxw-simple-pro/static/images/3.png" alt=""
                                            class="p-hot-article-img">
                                    <div class="p-hot-article-right-box">
                                        <h2>推荐一个很棒的html网页背景图片网站</h2>
                                        <span><i class="fa fa-eye" aria-hidden="true"></i> 943</span>
                                    </div>
                                </a></li>
                            <li class="p-hot-article-box"><a href="/article/7" class="pjax" data-pjax-state=""> <img
                                            src="./templates/iszmxw-simple-pro/static/images/4.png" alt=""
                                            class="p-hot-article-img">
                                    <div class="p-hot-article-right-box">
                                        <h2>谁又不曾孤独呢-孤独患者</h2>
                                        <span><i class="fa fa-eye" aria-hidden="true"></i> 590</span>
                                    </div>
                                </a></li>
                            <li class="p-hot-article-box"><a href="/article/2" class="pjax" data-pjax-state=""> <img
                                            src="./templates/iszmxw-simple-pro/static/images/5.png" alt=""
                                            class="p-hot-article-img">
                                    <div class="p-hot-article-right-box">
                                        <h2>Python数据分析之Pandas数据可视化</h2>
                                        <span><i class="fa fa-eye" aria-hidden="true"></i> 577</span>
                                    </div>
                                </a></li>
                        </ul>
                    </div>
                </div>
                <!-- 热门end -->
                <div class="p-right-card-box">
                    <h2 class="p-right-card-title">博客信息</h2>
                    <div class="p-right-card-body p-right-blog-msg-box">
                        <ul class="layui-clear">
                            <li class="layui-clear"> <span class="msg-box-left"><i class="fa fa-book"
                                                                                   aria-hidden="true"></i>
                    文章数目</span> <span class="msg-box-right">9</span></li>
                            <li class="layui-clear"> <span class="msg-box-left"><i class="fa fa-comment-o"
                                                                                   aria-hidden="true"></i>
                    标签数目</span> <span class="msg-box-right">9</span></li>
                            <li class="layui-clear"> <span class="msg-box-left"><i class="fa fa-bar-chart"
                                                                                   aria-hidden="true"></i>
                    运行天数</span> <span id="initDay" style="display:none">2017-05-28</span> <span class="msg-box-right"
                                                                                                id="dayDiff">0天</span>
                            </li>
                            <li class="layui-clear"> <span class="msg-box-left"><i class="fa fa-refresh"
                                                                                   aria-hidden="true"></i>
                    最后活动</span> <span id="articleLastTime" style="display:none"> 2019-09-12 14:55 </span> <span
                                        class="msg-box-right" id="articleLastTimeDiff">月前</span></li>
                        </ul>
                    </div>
                </div>
                <div class="p-right-card-box ">
                    <h2 class="p-right-card-title">广告</h2>
                    <div class="p-right-card-body p-right-ad-box">
                        <!-- 右导航 -->
                    </div>
                </div>
                <!-- 标签start -->
                <div class="p-right-card-box">
                    <h2 class="p-right-card-title">标签云</h2>
                    <div class="p-right-card-body">
                        <div class="p-right-tag-cloud">
                            <a href="/article/tag/python" class="layui-btn layui-btn-radius perfree-tag pjax"
                               title="共3篇文章"
                               data-pjax-state="">python</a>
                            <a href="/article/tag/数据分析" class="layui-btn layui-btn-radius perfree-tag pjax"
                               title="共1篇文章"
                               data-pjax-state="">数据分析</a>
                            <a href="/article/tag/语法" class="layui-btn layui-btn-radius perfree-tag pjax" title="共1篇文章"
                               data-pjax-state="">语法</a>
                            <a href="/article/tag/杂七杂八" class="layui-btn layui-btn-radius perfree-tag pjax"
                               title="共1篇文章"
                               data-pjax-state="">杂七杂八</a>
                            <a href="/article/tag/Jpress" class="layui-btn layui-btn-radius perfree-tag pjax"
                               title="共1篇文章"
                               data-pjax-state="">Jpress</a>
                            <a href="/article/tag/我的项目" class="layui-btn layui-btn-radius perfree-tag pjax"
                               title="共1篇文章"
                               data-pjax-state="">我的项目</a>
                            <a href="/article/tag/乱七八糟" class="layui-btn layui-btn-radius perfree-tag pjax"
                               title="共1篇文章"
                               data-pjax-state="">乱七八糟</a>
                            <a href="/article/tag/主题模板" class="layui-btn layui-btn-radius perfree-tag pjax"
                               title="共1篇文章"
                               data-pjax-state="">主题模板</a>
                            <a href="/article/tag/服务器" class="layui-btn layui-btn-radius perfree-tag pjax" title="共1篇文章"
                               data-pjax-state="">服务器</a>
                        </div>
                    </div>
                </div>
                <!-- 标签end -->
                <div id="toxBox">
                </div>
            </div>
            <div class="p-footer-box">
                <div class="p-footer-box-left">
                    © 2020 追梦小窝版权所有 豫ICP备18035337号
                </div>
                <div class="p-footer-box-right"></div>
            </div>
        </div>
    </div>
</div>
<div class="p-layout-right-btn">
    <a class="go-top"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
</div>
<script src="https://v1.hitokoto.cn/?encode=js&amp;select=%23hitokoto" defer=""></script>
<script type="text/javascript" src="./templates/iszmxw-simple-pro/static/plugins/pjax/pjax.js"></script>
<script type="text/javascript" src="./templates/iszmxw-simple-pro/static/plugins/layer/layer.js"></script>
<script type="text/javascript" src="./templates/iszmxw-simple-pro/static/plugins/layui/layui.js"></script>
<script type="text/javascript" src="./templates/iszmxw-simple-pro/static/js/common.js"></script>
<script type="text/javascript" src="./templates/iszmxw-simple-pro/static/plugins/skplayer/skPlayer.js"></script>
<script type="text/javascript" src="./templates/iszmxw-simple-pro/static/js/main.min.js"></script>
<script type="text/javascript"
        src="./templates/iszmxw-simple-pro/static/plugins/clipboard/clipboard.min.js"></script>
<script type="text/javascript"
        src="./templates/iszmxw-simple-pro/static/plugins/jquery.tocify/jquery-ui-1.9.1.custom.min.js"></script>
<script type="text/javascript"
        src="./templates/iszmxw-simple-pro/static/plugins/jquery.tocify/jquery.tocify.js"></script>
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