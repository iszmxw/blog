<div class="p-right-side-box">
    <!-- 热门start -->
    <div class="p-right-card-box">
        <h2 class="p-right-card-title">热门文章</h2>
        <div class="p-right-card-body">
            <ul>
                @foreach($hot_blog as $key=>$val)
                    <li class="p-hot-article-box">
                        <a href="{{url('article')}}/{{$val['id']}}" class="pjax">
                            <img src="{{asset('style/web/iszmxw_simple_pro/static/images')}}/{{rand(1,5)}}.png"
                                 class="p-hot-article-img">
                            <div class="p-hot-article-right-box">
                                <h2>{{$val['title']}}</h2>
                                <span><i class="fa fa-eye" aria-hidden="true"></i> {{$val['views']}}</span>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- 热门end -->
    <div class="p-right-card-box">
        <h2 class="p-right-card-title">博客信息</h2>
        <div class="p-right-card-body p-right-blog-msg-box">
            <ul class="layui-clear">
                <li class="layui-clear">
                    <span class="msg-box-left">
                        <i class="fa fa-book" aria-hidden="true"></i>
                        文章数目
                    </span>
                    <span class="msg-box-right">{{$site_info['blogs']}}</span>
                </li>
                <li class="layui-clear">
                    <span class="msg-box-left">
                        <i class="fa fa-comment-o" aria-hidden="true"></i>
                        标签数目
                    </span>
                    <span class="msg-box-right">{{$site_info['tags']}}</span>
                </li>
                <li class="layui-clear">
                    <span class="msg-box-left">
                        <i class="fa fa-bar-chart" aria-hidden="true"></i>
                        运行天数
                    </span>
                    <span id="initDay" style="display:none">2015-08-01</span>
                    <span class="msg-box-right" id="dayDiff">0天</span>
                </li>
                <li class="layui-clear">
                    <span class="msg-box-left"><i class="fa fa-refresh" aria-hidden="true"></i>
                    最后活动</span>
                    <span id="articleLastTime" style="display:none"> 2020-05-29 14:55 </span>
                    <span class="msg-box-right" id="articleLastTimeDiff">月前</span>
                </li>
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
                @foreach($site_info['tags_list'] as $key=>$val)
                    <a href="{{url('article/tag/')}}/{{$val['id']}}" class="layui-btn layui-btn-radius perfree-tag pjax"
                       title="共3篇文章">{{$val['name']}}</a>
                @endforeach
            </div>
        </div>
    </div>
    <!-- 标签end -->
    <div id="toxBox">
        @yield('toxBox')
    </div>
</div>