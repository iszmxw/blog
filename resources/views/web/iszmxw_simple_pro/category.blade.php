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
            <h3>分类</h3>
        </div>
        <div class="p-category-list-box layui-clear">
            <a class="p-category-box layui-clear pjax" title="共2篇文章" href="/article/category/jpress">
                <div class="p-category-img"></div>
                <div class="p-category-msg">
                    <h2 class="p-category-title">jpress</h2>
                    <span>别看了,只是一个测试分类</span>
                </div>
                <div class="p-category-count">
                    2
                </div>
            </a>
        </div>
    </div>
@endsection

{{--js引用--}}
@section('script')
    <script type="text/javascript">
        //截取分类首字母
        $(".p-category-title").each(function () {
            var title = $(this).text();
            $(this).parent().siblings(".p-category-img").text(title.substring(0, 1));
            $(this).parent().siblings(".p-category-img").css({"background-color": common.getRandomColor()});
        });
    </script>
@endsection