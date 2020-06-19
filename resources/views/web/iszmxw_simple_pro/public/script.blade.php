<script src="{{asset('style/web/iszmxw_simple_pro/static/plugins/jquery/jquery-1.8.3.min.js')}}"></script>
<script src="https://v1.hitokoto.cn/?encode=js&amp;select=%23hitokoto" defer=""></script>
<script type="text/javascript" src="{{asset('style/web/iszmxw_simple_pro/static/plugins/pjax/pjax.js')}}"></script>
<script type="text/javascript" src="{{asset('style/web/iszmxw_simple_pro/static/plugins/layer/layer.js')}}"></script>
<script type="text/javascript" src="{{asset('style/web/iszmxw_simple_pro/static/plugins/layui/layui.js')}}"></script>
<script type="text/javascript" src="{{asset('style/web/iszmxw_simple_pro/static/js/common.js')}}"></script>
<script type="text/javascript"
        src="{{asset('style/web/iszmxw_simple_pro/static/plugins/skplayer/skPlayer.js')}}"></script>
<script type="text/javascript" src="{{asset('style/web/iszmxw_simple_pro/static/js/main.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('style/web/iszmxw_simple_pro/static/plugins/clipboard/clipboard.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('style/web/iszmxw_simple_pro/static/plugins/jquery.tocify/jquery-ui-1.9.1.custom.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('style/web/iszmxw_simple_pro/static/plugins/jquery.tocify/jquery.tocify.js')}}"></script>
<script>
    // 渐变色背景
    $("body").css("background-image", "linear-gradient(to top, #fbc2eb 0%, #a6c1ee 100%)");
    $(function () {
        var yiyan = $("#hitokoto").text();
        $("#yiyan").text(yiyan);
    })

    function closeNotice() {
        $(".p-notice-box").hide();
    }

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

        var l = "", o = ["{{$user_data['description']}}"].map(function (r) {
                return r + ""
            }), a = 2, g = 1, s = 5, d = 75,
            b = ["rgb(110,64,170)", "rgb(150,61,179)", "rgb(191,60,175)", "rgb(228,65,157)", "rgb(254,75,131)", "rgb(255,94,99)", "rgb(255,120,71)", "rgb(251,150,51)", "rgb(226,183,47)", "rgb(198,214,60)", "rgb(175,240,91)", "rgb(127,246,88)", "rgb(82,246,103)", "rgb(48,239,130)", "rgb(29,223,163)", "rgb(26,199,194)", "rgb(35,171,216)", "rgb(54,140,225)", "rgb(76,110,219)", "rgb(96,84,200)"],
            c = {text: "", prefixP: -s, skillI: 0, skillP: 0, direction: "forward", delay: a, step: g};
        i()
    };
    chakhsu(document.getElementById('chakhsu'));
</script>
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
    $li = $(".p-header-box-login-box .layui-nav .layui-nav-item");
    $li.hover(function () {
        $(this).find('span').addClass('layui-nav-mored');
        $(this).find('dl').addClass('layui-anim');
        $(this).find('dl').addClass('layui-anim-upbit');
        $(this).find('dl').addClass('layui-show');
    }, function () {
        $(this).find('span').removeClass('layui-nav-mored');
        $(this).find('dl').removeClass('layui-anim');
        $(this).find('dl').removeClass('layui-anim-upbit');
        $(this).find('dl').removeClass('layui-show');
    })
    /**自定义盒子宽度
     */
    $(".p-box").css("width", "80%");
    /***/
</script>