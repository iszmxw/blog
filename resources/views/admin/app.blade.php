<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>追梦小窝 | @yield('title')</title>
    <meta name="keywords" content="@yield('keywords')">
    <meta name="description" content="@yield('description')">
    @include('admin.public.common_css')
    @yield('style')
</head>
<body class="">
<div id="wrapper">
    {{--侧边栏--}}
    @include('admin.public.nav')
    <div id="page-wrapper" class="gray-bg">
        {{--头部--}}
        @include('admin.public.header')

        <div class="wrapper wrapper-content">
            @yield('content')
        </div>
        {{--底部--}}
        @include('admin.public.footer')
    </div>
</div>

@include('admin.public.common_js')
@yield('script')
</body>
</html>