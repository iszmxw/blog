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
                                    src="{{asset('style/web/iszmxw_simple_pro/static/images')}}/1.png" alt=""
                                    class="p-hot-article-img">
                            <div class="p-hot-article-right-box">
                                <h2>Perfree-Simple-Pro-致更好的你</h2>
                                <span><i class="fa fa-eye" aria-hidden="true"></i> 3608</span>
                            </div>
                        </a></li>
                    <li class="p-hot-article-box"><a href="/article/1" class="pjax" data-pjax-state=""> <img
                                    src="{{asset('style/web/iszmxw_simple_pro/static/images')}}/2.png" alt=""
                                    class="p-hot-article-img">
                            <div class="p-hot-article-right-box">
                                <h2>PerfreeSimple-安安静静的写博客</h2>
                                <span><i class="fa fa-eye" aria-hidden="true"></i> 1416</span>
                            </div>
                        </a></li>
                    <li class="p-hot-article-box"><a href="/article/4" class="pjax" data-pjax-state=""> <img
                                    src="{{asset('style/web/iszmxw_simple_pro/static/images')}}/3.png" alt=""
                                    class="p-hot-article-img">
                            <div class="p-hot-article-right-box">
                                <h2>推荐一个很棒的html网页背景图片网站</h2>
                                <span><i class="fa fa-eye" aria-hidden="true"></i> 943</span>
                            </div>
                        </a></li>
                    <li class="p-hot-article-box"><a href="/article/7" class="pjax" data-pjax-state=""> <img
                                    src="{{asset('style/web/iszmxw_simple_pro/static/images')}}/4.png" alt=""
                                    class="p-hot-article-img">
                            <div class="p-hot-article-right-box">
                                <h2>谁又不曾孤独呢-孤独患者</h2>
                                <span><i class="fa fa-eye" aria-hidden="true"></i> 590</span>
                            </div>
                        </a></li>
                    <li class="p-hot-article-box"><a href="/article/2" class="pjax" data-pjax-state=""> <img
                                    src="{{asset('style/web/iszmxw_simple_pro/static/images')}}/5.png" alt=""
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