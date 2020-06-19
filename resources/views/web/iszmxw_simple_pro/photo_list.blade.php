@extends('web.iszmxw_simple_pro.app')

@section('keywords','追梦小窝博客归档')
@section('description','追梦小窝博客归档')

@section('title', '追梦小窝-时间轴')
{{--样式引入--}}
@section('style')

@endsection

{{--内容部分--}}
@section('content')
    <div class="p-content-box">
        <div class="p-content-box-lwlhitokoto">
            <h1>相册</h1>
        </div>
        <div class="p-photoList-box layui-clear">
            <a class="p-photo-box p-shadow pjax" href="/photo.html">
                <div class="p-photoList-img-box">
                    <img src="{{asset('style/web/iszmxw_simple_pro/images')}}/1.jpg"
                         alt="" class="p-photoList-thumb">
                </div>
                <div class="p-photoList-title-box">
                    <span class="p-photoList-desc">旅游散心</span>
                </div>
                <span class="p-hover-bg"><i class="layui-icon" style="font-size: 30px;"></i></span>
            </a>
            <a class="p-photo-box p-shadow pjax" href="/photo.html">
                <div class="p-photoList-img-box">
                    <img src="{{asset('style/web/iszmxw_simple_pro/images')}}/2.jpg"
                         alt="" class="p-photoList-thumb">
                </div>
                <div class="p-photoList-title-box">
                    <span class="p-photoList-desc">杂七杂八</span>
                </div>
                <span class="p-hover-bg"><i class="layui-icon" style="font-size: 30px;"></i></span>
            </a>
            <a class="p-photo-box p-shadow pjax" href="/photo.html">
                <div class="p-photoList-img-box">
                    <img src="{{asset('style/web/iszmxw_simple_pro/images')}}/3.jpg"
                         alt="" class="p-photoList-thumb">
                </div>
                <div class="p-photoList-title-box">
                    <span class="p-photoList-desc">那时你我</span>
                </div>
                <span class="p-hover-bg"><i class="layui-icon" style="font-size: 30px;"></i></span>
            </a>
            <a class="p-photo-box p-shadow pjax" href="/photo-2.html">
                <div class="p-photoList-img-box">
                    <img src="{{asset('style/web/iszmxw_simple_pro/images')}}/4.jpg"
                         alt="" class="p-photoList-thumb">
                </div>
                <div class="p-photoList-title-box">
                    <span class="p-photoList-desc"><i class="layui-icon" style="font-size: 15px;"></i> 四月你好</span>
                </div>
                <span class="p-hover-bg p-enc-bg"><i class="layui-icon" style="font-size: 20px;"></i> 相册已加密</span>
            </a>
            <a class="p-photo-box p-shadow pjax" href="/photo-3.html">
                <div class="p-photoList-img-box">
                    <img src="{{asset('style/web/iszmxw_simple_pro/images')}}/5.jpg"
                         alt="" class="p-photoList-thumb">
                </div>
                <div class="p-photoList-title-box">
                    <span class="p-photoList-desc"><i class="layui-icon" style="font-size: 15px;"></i> 记录点点滴滴</span>
                </div>
                <span class="p-hover-bg p-enc-bg"><i class="layui-icon" style="font-size: 20px;"></i> 相册已加密</span>
            </a>
            <a class="p-photo-box p-shadow pjax" href="/photo.html">
                <div class="p-photoList-img-box">
                    <img src="{{asset('style/web/iszmxw_simple_pro/images')}}/6.jpg"
                         alt="" class="p-photoList-thumb">
                </div>
                <div class="p-photoList-title-box">
                    <span class="p-photoList-desc">时光不老,我们不散</span>
                </div>
                <span class="p-hover-bg"><i class="layui-icon" style="font-size: 30px;"></i></span>
            </a>
        </div>
        <script>
            $('.p-photoList-box').on('mouseenter', '.p-photo-box', function () {
                $(this).children('.p-hover-bg').show();
            });
            $('.p-photoList-box').on('mouseleave', '.p-photo-box', function () {
                $(this).children('.p-hover-bg').hide();
            });
        </script>
    </div>
@endsection

{{--js引用--}}
@section('script')

@endsection