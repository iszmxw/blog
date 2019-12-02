@extends('admin.app')

@section('title', '空页面')
@section('keywords', '空页面')
@section('description', '空页面')
{{--样式引入--}}
@section('style')

@endsection

{{--内容部分--}}
@section('content')
    <div class="middle-box text-center animated fadeInRightBig">
        <h3 class="font-bold">这是页面内容</h3>
        <div class="error-desc">
            您可以在这里创建所需的任何网格布局。和任何你想象的变化布局:)<br>
            看看主页等网站。它使用许多不同的布局。
            <br/><a href="{{url('/')}}" class="btn btn-primary m-t">返回主页</a>
        </div>
    </div>
@endsection

{{--js引用--}}
@section('script')

@endsection