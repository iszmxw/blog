<!DOCTYPE html>
<html>
<head>
    <title>3D签到墙</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="{{asset('wall/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('wall/css/animate.min.css')}}">
</head>
<body style="background: url('{{asset('wall/images/background.jpg')}}') no-repeat;">


<div id="container"></div>
<!--<div id="info">3D签到墙（使用官方demo源元素周期表修改）</div>-->
<!--点击切换图形状态-->
<!--<div id="menu">-->
<!--<button id="table">表格</button>-->
<!--<button id="sphere">球球</button>-->
<!--<button id="helix">螺旋</button>-->
<!--<button id="grid">格子</button>-->
<!--</div>-->
<div class="show_info animated" style="display:none;">
    <div class="info_my">
        <img src="{{asset('wall/img/1.jpg')}}"/>
        <div class="info_mem">
            <div class="nickname">smile的微笑</div>
            <div class="id">ID:123</div>
            <div class="vote">票数：123</div>
        </div>
    </div>
    <div class="intro">我想说的那些事你想听吗？曾经，在一个很远很远的地方，那里绿水长青，没有现在都市的喧哗，犹如室外桃园。。。想知道更多精彩内容吗?</div>
</div>

<audio autoplay="autoplay">
    <source src="./mp3/bgm.mp3"/>
</audio>
<script src="{{asset('wall/js/jquery.min.js')}}"></script>
<script src="{{asset('wall/js/three.js')}}"></script>
<script src="{{asset('wall/js/tween.min.js')}}"></script>
<script src="{{asset('wall/js/TrackballControls.js')}}"></script>
<script src="{{asset('wall/js/CSS3DRenderer.js')}}"></script>
<script src="{{asset('wall/js/register.js')}}"></script>
</body>
</html>
