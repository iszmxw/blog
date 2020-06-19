<div class="p-header-box box-shadow">
    <div class="p-header-box-menu-btn">
        <a id="onOffMenu"><i class="layui-icon"></i> </a>
        <a id="phoneOnOffMenu" style="display: none"><i class="layui-icon"></i> </a>
    </div>
    <div class="p-header-box-search-box">
        <form action="{{url('/article/search')}}">
            <input type="text" placeholder="请输入搜索内容" name="keyword" required="">
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
            <a class="p-header-box-login-box-login" href="{{url('wall/register')}}">登录</a>
            <span style="float: left;line-height: 50px;">|</span>
            <a class="p-header-box-login-box-register" href="{{url('wall/register')}}">注册</a>
        </div>
        <a id="phoneSetting" style="display: none"> <i class="layui-icon"></i></a>
    </div>
    <div class="p-phone-top-nav box-shadow">
        <form action="{{url('/article/search')}}">
            <input type="text" placeholder="请输入搜索内容" name="keyword" required="">
            <button type="submit"><i class="layui-icon"></i></button>
        </form>
        <div class="p-phone-top-nav-login-box">
            <div class="no-login layui-clear">
                <a class="login-btn" href="{{url('wall/register')}}">登录</a>
                <a class="register-btn" href="{{url('wall/register')}}">注册</a>
            </div>
        </div>
    </div>
</div>