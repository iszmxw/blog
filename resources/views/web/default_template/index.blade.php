@extends('web.default_template.app')
{{ debug() }}
@section('title', '追梦小窝博客首页')
{{--样式引入--}}
@section('style')

@endsection

@section('header_bar')

@endsection
{{--内容部分--}}
@section('content')
    <div class="col-lg-8">
        @foreach($blog as $key=>$val)
        <div class="ibox">
            <div class="ibox-content">
                <a href="{{url('article')}}/{{$val['gid']}}" class="btn-link">
                    <h2>
                        {{$val['title']}}
                    </h2>
                </a>
                <div class="small m-b-xs">
                    <span class="text-muted">
                        <button class="btn btn-info btn-xs btn-outline" type="button">
                            <i class="fa fa-user-o"></i>&nbsp;&nbsp;
                            {{$val['sortname']}}
                        </button>
                    </span>
                    <span class="text-muted">
                        <button class="btn btn-primary btn-xs btn-outline" type="button">
                            <i class="fa fa-clock-o"></i>&nbsp;&nbsp;
                            {{$val['date']}}
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