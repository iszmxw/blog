<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>追梦小窝 | 授权提醒</title>
    <link href="{{asset('style/web/default_template/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('style/web/default_template/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('style/web/default_template/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('style/web/default_template/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('style/admin/inspinia/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
    <link href="{{asset('style/admin/inspinia/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">

</head>

<body class="gray-bg">

{{--<div class="lock-word animated fadeInDown">--}}
{{--<span class="first-word">已锁定</span><span>屏幕</span>--}}
{{--</div>--}}
<div class="middle-box text-center lockscreen animated fadeInDown">
    <div>
        <div class="m-b-md">
            <img alt="image" id="image" class="img-circle circle-border" width="212" height="212"
                 src="https://cambrian-images.cdn.bcebos.com/771df369020a47a1337b265dbad378df_1531717703740.jpeg">
            <div id="image_model" class="img-circle"
                 style="width: 202px;line-height: 202px;font-size: 24px;color: #fff;background: rgba(0, 0, 0, 0.5);;position: absolute;top: 115px;left: 4px;"></div>
        </div>
        <h3>授权提示</h3>
        <p>您可以扫描小程序码进行用户授权，或者切换到QQ授权页面进行授权，授权后即可访问</p>
        {{--<form class="m-t" role="form" action="index.html">--}}
        {{--<div class="form-group">--}}
        {{--<input type="password" class="form-control" placeholder="******" required="">--}}
        {{--</div>--}}
        {{--</form>--}}
        <button type="submit" class="btn btn-primary block full-width"
                onclick="mini_auth('{{url('api/wx_mini/get_scan_code')}}')">刷新小程序码
        </button>
        <br>
        <button type="submit" class="btn btn-primary block full-width"
                onclick="qq_auth('{{url('wall/qq_login_auth')}}')">前往QQ授权
        </button>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{asset('style/web/default_template/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('style/web/default_template/js/bootstrap.min.js')}}"></script>
<script src="{{asset('style/admin/inspinia/js/plugins/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('style/admin/inspinia/js/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{asset('style/admin/inspinia/js/plugins/toastr/toastr_style.js')}}"></script>
<script>
    var setTime;

    //定时监控页面的登录状态
    function setInte(json) {
        setTime = setInterval(function () {
            $.get('http://blog.54zm.com/wall/scan_code_status?uuid=' + json.data.uuid, function (response) {
                if (response.status === 0) {
                    toastr.success('二维码已过期，即将刷新页面');
                    setInterval(function () {
                        window.location.reload();
                    }, 1600)
                } else if (response.status === 1) {
                    $('#image_model').html(response.msg);
                    $('#image_model').show();
                } else if (response.status === 2) {
                    toastr.success(response.msg);
                    clearInterval(setTime);
                    setInterval(function () {
                        window.location.href = '{{url('wall/index')}}';
                    }, 1600)
                }
            })
        }, 1600)
    }

    function qq_auth(url) {
        window.location.href = url
    }

    //页面初次请求
    $.get('http://blog.54zm.com/api/wx_mini/get_scan_code', function (json) {
        if (json.status == 1) {
            $("#image").attr("src", json.data.image);
            setInte(json);//定时监控页面的登录状态
        } else {
            clearInterval(setTime);
            toastr.error('小程序码获取失败，请刷新！');
            $('#image_model').html('已失效，请刷新！');
            $('#image_model').show();
        }
    });

    function mini_auth(url) {
        clearInterval(setTime);
        $.get(url, function (json) {
            if (json.status == 1) {
                swal({
                    title: "提示信息",
                    text: json.msg,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "确定",
                }, function () {
                    $('#image_model').hide();
                    $("#image").attr("src", json.data.image);
                    setInte(json);//定时监控页面的登录状态
                });
            }
        })
    }
</script>
</body>

</html>
