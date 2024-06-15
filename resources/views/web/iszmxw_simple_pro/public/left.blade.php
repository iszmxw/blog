<div class="p-left-box-2">
    <div class="p-left-logo-box">
        <a class="p-left-logo-box-text pjax" href="/">
            <i class="fa fa-snowflake-o"></i>
            <span class="p-left-logo-box-text-name">{{$user_data['nickname']}}</span>
        </a>
    </div>
    <div class="p-left-user-box">
        <a class="p-left-user-img-box pjax" href="/">
            {{--<img src="{{asset($user_data['photo'])}}">--}}
            <img src="{{asset('style/web/iszmxw_simple_pro/static/images/head.jpg')}}">
        </a>
        <a class="p-left-user-name-box pjax" href="/"> <span>{{$user_data['nickname']}}</span></a>
        <div class="p-left-user-hitokoto-box">
            <span class="text-muted text-xs block">
              <div id="chakhsu"></div>
            </span>
        </div>
    </div>
    <hr class="layui-bg-black">
    <!--左侧菜单-->
    <div class="p-left-menu-box">
        <ul class="layui-nav layui-nav-tree" lay-filter="left-side">
            <li class="layui-nav-item " lay-unselect="">
                <a href="/" class="nav-menu-a p-nav-menu-btn pjax"
                   target="_self">
                    <i class="fa fa-home fa-fw"></i>
                    <span class="p-left-menu-nav-txt">首页</span>
                </a>
            </li>
            <li class="layui-nav-item " lay-unselect="">
                <a href="/time"
                   class=" nav-menu-a  p-nav-menu-btn  pjax"
                   target="_self">
                    <i class="fa fa-clock-o fa-fw"></i>
                    <span class="p-left-menu-nav-txt">归档</span>
                </a>
            </li>
            <li class="layui-nav-item " lay-unselect="">
                <a href="/category"
                   class=" nav-menu-a  p-nav-menu-btn  pjax"
                   target="_self">
                    <i class="fa fa-bars fa-fw"></i>
                    <span class="p-left-menu-nav-txt">分类</span>
                </a>
            </li>
            <li class="layui-nav-item " lay-unselect="">
                <a href="/photo_list"
                   class=" nav-menu-a  p-nav-menu-btn  pjax"
                   target="_self">
                    <i class="fa fa-image fa-fw"></i>
                    <span class="p-left-menu-nav-txt">相册</span>
                </a>
            </li>
            <li class="layui-nav-item " lay-unselect="">
                <a href="/link"
                   class=" nav-menu-a  p-nav-menu-btn  pjax"
                   target="_self">
                    <i class="fa fa-user-o fa-fw"></i>
                    <span class="p-left-menu-nav-txt">朋友</span>
                </a>
            </li>
            <span class="layui-nav-bar"></span>
        </ul>
    </div>
    <hr class="layui-bg-black">
    <!-- 左侧导航底部社交按钮start -->
    <div class="p-left-bottom-box">
        <div class="p-l-b-content layui-clear">
            <a class="p-l-b-btn" href="http://weibo.com/iszmxw" target="_blank" title="微博">
                <span class="p-l-b-btn-icon">
                    <i class="fa fa-weibo" aria-hidden="true"></i>
                </span>
                <span class="p-l-b-btn-name">微博</span>
            </a>
            <a class="p-l-b-btn" href="https://github.com/iszmxw" target="_blank" title="GitHub">
                <span class="p-l-b-btn-icon">
                    <i class="fa fa-github" aria-hidden="true"></i>
                </span>
                <span class="p-l-b-btn-name">GitHub</span>
            </a>
{{--            <a class="p-l-b-btn"--}}
{{--               href="{{asset('style/web/iszmxw_simple_pro/images/wechat.png')}}"--}}
{{--               target="_blank" title="微信">--}}
{{--                <span class="p-l-b-btn-icon">--}}
{{--                    <i class="fa fa-weixin" aria-hidden="true"></i>--}}
{{--                </span>--}}
{{--                <span class="p-l-b-btn-name">微信</span>--}}
{{--            </a>--}}
        </div>
    </div>
    <!-- 左侧导航底部社交按钮end -->
</div>