<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="expires" content="0">
	<title>登录博客</title>
	<link href="{{asset('style/admin/login/css/default.css')}}" rel="stylesheet" type="text/css" />
	<!--必要样式-->
	<link href="{{asset('style/admin/login/css/styles.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('style/admin/login/css/demo.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('style/admin/login/css/loaders.css')}}" rel="stylesheet" type="text/css" />
</head>
<body>
<div class='login'>
	<div class='login_title'>
		<span>管理员登录</span>
	</div>
	<div class='login_fields'>
		<input type="hidden" id="url" value="{{url('admin/ajax/login_check')}}">
		<input type="hidden" id="_token" value="{{csrf_token()}}">
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
			<input type='button' value='登录'>
		</div>
		<div class='login_fields__submit'>
			<img src="{{asset('style/admin/images/qq_logo.png')}}" onclick="toLogin()">
		</div>
	</div>
	<div class='success'>
	</div>
	<div class='disclaimer'>
		<p>欢迎登录本博客后台管理系统  <a href="{{url('/')}}" target="_blank">前往首页</a></p>
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

<link href="{{asset('style/admin/login/layui/css/layui.css')}}" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="{{asset('style/admin/login/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('style/admin/login/js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src='{{asset('style/admin/login/js/stopExecutionOnTimeout.js')}}'></script>
<script type="text/javascript" src="{{asset('style/admin/login/layui/layui.js')}}"></script>
<script type="text/javascript" src="{{asset('style/admin/login/js/Particleground.js')}}"></script>
<script type="text/javascript" src="{{asset('style/admin/login/js/Treatment.js')}}"></script>
<script type="text/javascript" src="{{asset('style/admin/login/js/jquery.mockjax.js')}}"></script>
<script type="text/javascript">
    function toLogin(){
        //以下为按钮点击事件的逻辑。注意这里要重新打开窗口
        //否则后面跳转到QQ登录，授权页面时会直接缩小当前浏览器的窗口，而不是打开新窗口
        var A=window.open(
            "qq_login",
			"TencentLogin",
            "width=450,height=320,menubar=0,scrollbars=1,resizable=1,status=1,titlebar=0,toolbar=0,location=1"
		);
    }

    var ajaxmockjax = 1;//是否启用虚拟Ajax的请求响 0 不启用  1 启用
    //默认账号密码
    $(document).keypress(function (e) {
        // 回车键事件
        if (e.which == 13) {
            $('input[type="button"]').click();
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
        $(this).prev().animate({ 'opacity': '1' }, 200);
    });
    $('input[type="text"],input[type="password"]').blur(function () {
        $(this).prev().animate({ 'opacity': '.5' }, 200);
    });
    $('input[name="username"],input[name="password"]').keyup(function () {
        var Len = $(this).val().length;
        if (!$(this).val() == '' && Len >= 5) {
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
        $('input[type="button"]').click(function () {
            var username = $('input[name="username"]').val();
            var password = $('input[name="password"]').val();
            var _token = $('#_token').val();
            if (username == '') {
                ErroAlert('请输入您的账号');
            } else if (password == '') {
                ErroAlert('请输入密码');
            } else {
                //认证中..
                fullscreen();
                $('.login').addClass('test'); //倾斜特效
                setTimeout(function () {
                    $('.login').addClass('testtwo'); //平移特效
                }, 300);
                setTimeout(function () {
                    $('.authent').show().animate({ right: -320 }, {
                        easing: 'easeOutQuint',
                        duration: 600,
                        queue: false
                    });
                    $('.authent').animate({ opacity: 1 }, {
                        duration: 200,
                        queue: false
                    }).addClass('visible');
                }, 500);

                //登录
                var JsonData = { username: username, password: password, _token: _token };
                //此处做为ajax内部判断
                var url = $("#url").val();
				$.post(url,JsonData,function(data){
                    //认证完成
                    setTimeout(function () {
                        $('.authent').show().animate({ right: 90 }, {
                            easing: 'easeOutQuint',
                            duration: 600,
                            queue: false
                        });
                        $('.authent').animate({ opacity: 0 }, {
                            duration: 200,
                            queue: false
                        }).addClass('visible');
                        $('.login').removeClass('testtwo'); //平移特效
                    }, 2000);
                    setTimeout(function () {
                        $('.authent').hide();
                        $('.login').removeClass('test');
                        if (data.Status == '1') {
                            //登录成功
                            $('.login div').fadeOut(100);
                            $('.success').fadeIn(1000);
                            $('.success').html(data.data);
                            //跳转操作
							setInterval(function(){
                                window.location.reload()
							},1500);
                        } else {
                            var index = layer.alert(
                                data.data,
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
