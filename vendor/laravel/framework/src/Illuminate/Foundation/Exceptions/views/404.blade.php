@extends('errors::illustrated-layout')

@section('code', '404')
@section('title', __('页面未找到'))

@section('image')
<div style="background-image: url('/svg/404.svg');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
</div>
@endsection

@section('message', __('抱歉，找不到您要查找的页面。'))
