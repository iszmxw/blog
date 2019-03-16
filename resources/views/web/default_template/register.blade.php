<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>小窝博客 | 授权提醒</title>
    <link href="{{asset('style/web/default_template/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('style/web/default_template/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('style/web/default_template/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('style/web/default_template/css/style.css')}}" rel="stylesheet">

</head>

<body class="gray-bg">

{{--<div class="lock-word animated fadeInDown">--}}
    {{--<span class="first-word">已锁定</span><span>屏幕</span>--}}
{{--</div>--}}
<div class="middle-box text-center lockscreen animated fadeInDown">
    <div>
        <div class="m-b-md">
            <img alt="image" class="img-circle circle-border" src="https://cambrian-images.cdn.bcebos.com/771df369020a47a1337b265dbad378df_1531717703740.jpeg">
        </div>
        <h3>授权提示</h3>
        <p>您访问的页面需要授权，即将前往QQ授权页面，授权后即可访问</p>
        {{--<form class="m-t" role="form" action="index.html">--}}
            {{--<div class="form-group">--}}
                {{--<input type="password" class="form-control" placeholder="******" required="">--}}
            {{--</div>--}}
        {{--</form>--}}
        <button type="submit" class="btn btn-primary block full-width">确认授权</button>
    </div>
</div>

<!-- Mainly scripts -->
<script src="{{asset('style/web/default_template/js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('style/web/default_template/js/bootstrap.min.js')}}"></script>

</body>

</html>
