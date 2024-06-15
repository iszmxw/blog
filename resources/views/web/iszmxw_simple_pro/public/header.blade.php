<div class="p-header-box box-shadow">
    <div class="p-header-box-menu-btn">
        <a id="onOffMenu"><i class="layui-icon"></i> </a>
        <a id="phoneOnOffMenu" style="display: none"><i class="layui-icon"></i> </a>
    </div>
    <div class="p-header-box-search-box">
        <form action="{{url('article/search/keyword')}}">
            <input type="text" placeholder="请输入搜索内容" name="keyword" value="{{isset($keyword) ? $keyword : ''}}">
            <button type="submit"><i class="layui-icon"></i></button>
        </form>
    </div>
    <a class="phone-title pjax" href="/">
        <i class="fa fa-snowflake-o"></i>
        <span class="p-left-logo-box-text-name">{{$user_data['nickname']}}</span>
    </a>
    <div class="p-header-box-right-box">
        <div class="p-header-box-music-box">
            <div id="skPlayer"></div>
        </div>

        <div class="p-header-box-login-box">
            @if(isset($qq_data))
                <ul class="layui-nav">
                    <li class="layui-nav-item">
                        <a href="">
                            <img src="{{$qq_data['header_img']}}" class="layui-nav-img">
                            {{$qq_data['nickname']}}
                            <span class="layui-nav-more"></span>
                        </a>
                        <dl class="layui-nav-child">
                            <dd>
                                <a href="{{url('wall/index')}}" target="_blank">个人中心</a>
                            </dd>
                            <dd>
                                <a href="{{url('wall/quit')}}" target="_blank">退出登录</a>
                            </dd>
                        </dl>
                    </li>
                    <span class="layui-nav-bar"></span></ul>
            @else
{{--                <a class="p-header-box-login-box-login" href="{{url('wall/register')}}">登录</a>--}}
{{--                <span style="float: left;line-height: 50px;">|</span>--}}
{{--                <a class="p-header-box-login-box-register" href="{{url('wall/register')}}">注册</a>--}}
            @endif
        </div>
        <a id="phoneSetting" style="display: none"> <i class="layui-icon"></i></a>
    </div>
    <div class="p-phone-top-nav box-shadow">
        <form action="{{url('/article/search')}}">
            <input type="text" placeholder="请输入搜索内容" name="keyword" required="">
            <button type="submit"><i class="layui-icon"></i></button>
        </form>
        <div class="p-phone-top-nav-login-box">
            @if(isset($qq_data))
            @else
                <div class="no-login layui-clear">
                    <a class="login-btn" href="{{url('wall/register')}}">登录</a>
                    <a class="register-btn" href="{{url('wall/register')}}">注册</a>
                </div>
            @endif
        </div>
    </div>
</div>