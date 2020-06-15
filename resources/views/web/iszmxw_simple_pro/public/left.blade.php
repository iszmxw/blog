<div class="p-left-box-2">
    <div class="p-left-logo-box">
        <a class="p-left-logo-box-text pjax" href="/" data-pjax-state="">
            <i class="fa fa-snowflake-o"></i>
            <span class="p-left-logo-box-text-name">追梦小窝</span>
        </a>
    </div>
    <div class="p-left-user-box">
        <a class="p-left-user-img-box pjax" href="/" data-pjax-state=""> <img
                    src="{{asset('style/web/iszmxw_simple_pro/images/ec83d6ed69d84517beb3ee9ccc49f8b4.jpg')}}">
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