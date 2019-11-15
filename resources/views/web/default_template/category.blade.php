@extends('web.default_template.app')

@section('title', '追梦小窝首页')
{{--样式引入--}}
@section('style')

@endsection

@section('header_bar')

@endsection
{{--内容部分--}}
@section('content')
    <div class="col-lg-8">
        @if($blog->total() == 0)
            <div class="wrapper wrapper-content" style="height:1200px;">
                <div class="middle-box text-center">
                    <h3 class="font-bold">暂无内容</h3>
                    <div class="error-desc">
                        该栏目下暂时没有发布文章哦:)<br>
                        看看其他栏目吧或者返回首页看看吧。
                        <br><a href="{{ url('/') }}" class="btn btn-primary m-t">返回主页</a>
                    </div>
                </div>
            </div>
        @else
        @foreach($blog as $key=>$val)
        <div class="ibox">
            <div class="ibox-content">
                <a href="{{url('article')}}/{{$val['id']}}" class="btn-link">
                    <h2>
                        {{$val['title']}}
                    </h2>
                </a>
                <div class="small m-b-xs">
                    <span class="text-muted">
                        <button class="btn btn-info btn-xs btn-outline" type="button">
                            <i class="fa fa-user-o"></i>&nbsp;&nbsp;
                            {{$val['name']}}
                        </button>
                    </span>
                    <span class="text-muted">
                        <button class="btn btn-primary btn-xs btn-outline" type="button">
                            <i class="fa fa-clock-o"></i>&nbsp;&nbsp;
                            {{$val['created_at']}}
                        </button>
                    </span>
                </div>
                <br>
                <div class="row">
                    @if($val['thumb'])
                    <div class="col-md-4">
                        <img src="http://blog.54zm.com/{{$val['thumb']}}" style="width:100%;max-height:150px;">
                    </div>
                    @endif
                    <p @if($val['thumb']) class="col-md-8" @else class="col-md-12" @endif>
                        {{$val['content']}}
                    </p>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="small text-right">
                            <button class="btn btn-primary btn-xs" type="button"><i class="fa fa-comments-o"> </i> {{$val['comments']}} 评论 </button>
                            <button class="btn btn-white btn-xs" type="button"><i class="fa fa-eye"> </i> {{$val['views']}} 浏览</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif

        <!--分页-->
        <div class="btn-group pull-right">
            {{$blog->links()}}
        </div>
        <div class="clearfix"></div>
    </div>
    <!--右侧侧边栏-->
    @include('web.default_template.public.slidebar')
@endsection

{{--js引用--}}
@section('script')

@endsection