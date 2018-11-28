@extends('web.default_template.app')

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
        <br>
    </div>

    <!--右侧侧边栏-->
    <div class="row">
        <!--关于我==自我介绍-->
        <div class="col-lg-4">
            <div class="contact-box">
                <a href="{{ url('profile') }}">
                    <div class="col-sm-4">
                        <div class="text-center">
                            <img alt="image" class="img-circle m-t-xs img-responsive" src="{{ url('/').$user_info['photo'] }}">
                            <div class="m-t-xs font-bold">{{ $user_info['role'] }}</div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <h3><strong>{{ $user_info['nickname'] }}</strong></h3>
                        <p><i class="fa fa-map-marker"></i> {{ $user_info['email'] }}</p>
                        <address>
                            <strong>签名：</strong><br>
                            {{ $user_info['description'] }}
                        </address>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </div>
        </div>
        <!--系统统计-->
        <div class="col-md-4">
            <div class="contact-box">
                <table class="table small m-b-xs">
                    <tbody>
                    <tr>
                        <td>
                            <strong>142</strong> 项目
                        </td>
                        <td>
                            <strong>22</strong> 关注
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <strong>61</strong> 评论
                        </td>
                        <td>
                            <strong>54</strong> 文章
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <strong>154</strong> 标签
                        </td>
                        <td>
                            <strong>32</strong> 好友
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!--分类-->
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>分组列表</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#">选项 1</a>
                            </li>
                            <li><a href="#">选项 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content no-padding">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span class="badge badge-primary">16</span>
                            分组列表
                        </li>
                        <li class="list-group-item ">
                            <span class="badge badge-info">12</span>
                            分组列表
                        </li>
                        <li class="list-group-item">
                            <span class="badge badge-danger">10</span>
                            分组列表
                        </li>
                        <li class="list-group-item">
                            <span class="badge badge-success">10</span>
                            分组列表
                        </li>
                        <li class="list-group-item">
                            <span class="badge badge-warning">7</span>
                            分组列表
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--js引用--}}
@section('script')
@endsection