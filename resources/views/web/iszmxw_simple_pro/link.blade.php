@extends('web.iszmxw_simple_pro.app')

@section('keywords','五四战盟博客归档')
@section('description','五四战盟博客归档')

@section('title', '五四战盟-时间轴')
{{--样式引入--}}
@section('style')

@endsection

{{--内容部分--}}
@section('content')
    <div class="p-content-box">
        <div class="p-content-box-lwlhitokoto">
            <h3>朋友</h3>
        </div>
        <div class="p-link-list-box layui-clear">
            @foreach($link as $key=>$val)
                <a class="p-link-box layui-clear" href="{{$val['siteurl']}}" target="_blank">
                    <div class="p-link-img">
                        <img src="{{$val['siteurl']}}/favicon.ico"
                             onerror='this.src="{{asset('style/web/iszmxw_simple_pro/static/images')}}/{{rand(1,5)}}.png"'>
                    </div>
                    <div class="p-link-msg">
                        <h2 class="p-link-title">{{$val['sitename']}}</h2>
                        <span>{{$val['description']}}</span>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="p-article-content-box link-msg">
            <p><strong>申请友链须知</strong></p>
            <blockquote>
                <ol>
                    <li>优先于技术、生活分享类博客站点友链，坚决不和论坛、导航、含有暴力等不健康信息内容站点做任何交换。</li>
                    <li>站点时间不超过3个月且文章数量不超过20篇，暂不与进行链接交换，请谅解</li>
                    <li>目前只提供内页链接的申请</li>
                    <li>申请链接前请先添加本博链接</li>
                    <li>申请请提供：站点名称、链接和一句话描述和一张Logo图片</li>
                    <li>联系QQ:543619552,添加时请备注来源博客</li>
                </ol>
            </blockquote>
        </div>
    </div>
@endsection

{{--js引用--}}
@section('script')

@endsection