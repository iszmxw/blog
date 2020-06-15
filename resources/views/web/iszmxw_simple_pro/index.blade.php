@extends('web.iszmxw_simple_pro.app')

@section('keywords','')
@section('description','')

@section('title', '追梦小窝首页')
{{--样式引入--}}
@section('style')
    <style type="text/css">
        .heart {
            width: 10px;
            height: 10px;
            position: fixed;
            background: #f00;
            transform: rotate(45deg);
            -webkit-transform: rotate(45deg);
            -moz-transform: rotate(45deg);
        }

        .heart:after,
        .heart:before {
            content: '';
            width: inherit;
            height: inherit;
            background: inherit;
            border-radius: 50%;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            position: absolute;
        }

        .heart:after {
            top: -5px;
        }

        .heart:before {
            left: -5px;
        }
    </style>
@endsection

{{--内容部分--}}
{{--@section('content')--}}
{{--@endsection--}}

{{--js引用--}}
@section('script')
@endsection