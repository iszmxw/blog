<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">
    <title>登录小窝</title>
    <link href="{{asset('style/admin/login/css/default.css')}}" rel="stylesheet" type="text/css"/>
    <!--必要样式-->
    <link href="{{asset('style/admin/login/css/styles.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('style/admin/login/css/demo.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('style/admin/login/css/loaders.css')}}" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class='login'>
    <div class='login_title'>
        <span>管理员登录</span>
    </div>
    <div class='login_fields'>
        {{--<div id="scan-login" style="display:none">--}}
        {{--<img src="{{url('api/wx_mini/scan_code')}}" alt="小程序二维码" style="width:80%;height:80%;display:block;margin:0 auto;">--}}
        {{--</div>--}}
        <div id="input-login">
            <input type="hidden" id="url" value="{{url('admin_web/ajax/login_check')}}"> <input type="hidden" id="_token"
                                                                                            value="{{csrf_token()}}">
            <div class='login_fields__user'>
                <div class='icon'>
                    <img alt="" src='{{asset('style/admin/login/img/user_icon_copy.png')}}'>
                </div>
                <input name="username" placeholder='用户名' maxlength="16" type='text' autocomplete="off">
                <div class='validation'>
                    <img alt="" src='{{asset('style/admin/login/img/tick.png')}}'>
                </div>
            </div>
            <div class='login_fields__password'>
                <div class='icon'>
                    <img alt="" src='{{asset('style/admin/login/img/lock_icon_copy.png')}}'>
                </div>
                <input name="password" placeholder='密码' maxlength="16" type='text' autocomplete="off">
                <div class='validation'>
                    <img alt="" src='{{asset('style/admin/login/img/tick.png')}}'>
                </div>
            </div>
            <div class='login_fields__submit'>
                <input id="login" type='button' value='登录'> <input id="login_qq" type="button" value='QQ登录'
                                                                   onclick="toLogin()">
            </div>
        </div>
    </div>
    <div class='success'></div>
    <div class='disclaimer'>
        {{--<p onclick="scan_code()">小程序扫码登录</p><br>--}}
        <p>欢迎登录追梦小窝后台管理系统 <a href="{{url('/')}}" target="_blank">前往首页</a></p>
    </div>
</div>
<div class='authent'>
    <div class="loader" style="height: 44px;width: 44px;margin-left: 28px;">
        <div class="loader-inner ball-clip-rotate-multiple">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <p>认证中...</p>
</div>
<div class="OverWindows"></div>

<link href="{{asset('style/admin/login/layui/css/layui.css')}}" rel="stylesheet" type="text/css"/>
<script type="text/javascript" src="{{asset('style/admin/login/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('style/admin/login/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src='{{asset('style/admin/login/js/stopExecutionOnTimeout.js')}}'></script>
<script type="text/javascript" src="{{asset('style/admin/login/layui/layui.js')}}"></script>
<script type="text/javascript" src="{{asset('style/admin/login/js/Particleground.js')}}"></script>
<script type="text/javascript" src="{{asset('style/admin/login/js/Treatment.js')}}"></script>
<script type="text/javascript" src="{{asset('style/admin/login/js/jquery.mockjax.js')}}"></script>
<script type="text/javascript">

    let $authent = $('.authent');
    let $login = $('.login');
    let $success = $('.success');

    function toLogin() {
        window.location.href = 'qq_login_auth';
    }

    var ajaxmockjax = 1;//是否启用虚拟Ajax的请求响 0 不启用  1 启用
    //默认账号密码
    $(document).keypress(function (e) {
        // 回车键事件
        if (e.which === 13) {
            $('#login').click();
        }
    });
    //粒子背景特效
    $('body').particleground({
        dotColor: '#E8DFE8',
        lineColor: '#133b88'
    });
    $('input[name="password"]').focus(function () {
        $(this).attr('type', 'password');
    });
    $('input[type="text"]').focus(function () {
        $(this).prev().animate({'opacity': '1'}, 200);
    });
    $('input[type="text"],input[type="password"]').blur(function () {
        $(this).prev().animate({'opacity': '.5'}, 200);
    });
    $('input[name="username"],input[name="password"]').keyup(function () {
        var Len = $(this).val().length;
        if (!$(this).val() === '' && Len >= 5) {
            $(this).next().animate({
                'opacity': '1',
                'right': '30'
            }, 200);
        } else {
            $(this).next().animate({
                'opacity': '0',
                'right': '20'
            }, 200);
        }
    });
    layui.use('layer', function () {
        //非空验证
        $('#login').click(function () {
            let username = $('input[name="username"]').val();
            let password = $('input[name="password"]').val();
            let _token = $('#_token').val();
            if (username === '') {
                ErroAlert('请输入您的账号');
            } else if (password === '') {
                ErroAlert('请输入密码');
            } else {
                //认证中..
                fullscreen();
                $login.addClass('test'); //倾斜特效
                setTimeout(function () {
                    $login.addClass('testtwo'); //平移特效
                }, 300);
                setTimeout(function () {
                    $authent.show().animate({right: -320}, {
                        easing: 'easeOutQuint',
                        duration: 600,
                        queue: false
                    });
                    $authent.animate({opacity: 1}, {
                        duration: 200,
                        queue: false
                    }).addClass('visible');
                }, 500);

                //登录
                var JsonData = {username: username, password: password, _token: _token};
                //此处做为ajax内部判断
                var url = $("#url").val();
                $.post(url, JsonData, function (data) {
                    //认证完成
                    setTimeout(function () {
                        $authent.show().animate({right: 90}, {
                            easing: 'easeOutQuint',
                            duration: 600,
                            queue: false
                        });
                        $authent.animate({opacity: 0}, {
                            duration: 200,
                            queue: false
                        }).addClass('visible');
                        $login.removeClass('testtwo'); //平移特效
                    }, 2000);
                    setTimeout(function () {
                        $authent.hide();
                        $login.removeClass('test');
                        if (data.code === 200) {
                            //登录成功
                            $('.login div').fadeOut(100);
                            $success.fadeIn(1000);
                            $success.html(data.msg);
                            //跳转操作
                            setInterval(function () {
                                window.location.reload()
                            }, 1500);
                        } else {
                            var index = layer.alert(
                                data.msg,
                                {
                                    icon: 5,
                                    time: 2000,
                                    offset: 't',
                                    closeBtn: 0,
                                    title: '错误信息',
                                    btn: [],
                                    anim: 2,
                                    shade: 0
                                });
                            layer.style(index, {
                                color: '#777'
                            });
                        }
                    }, 2400);
                })
            }
        })
    })
    var fullscreen = function () {
        elem = document.body;
        if (elem.webkitRequestFullScreen) {
            elem.webkitRequestFullScreen();
        } else if (elem.mozRequestFullScreen) {
            elem.mozRequestFullScreen();
        } else if (elem.requestFullScreen) {
            elem.requestFullscreen();
        } else {
            //浏览器不支持全屏API或已被禁用
        }
    }
</script>

</body>
</html>
