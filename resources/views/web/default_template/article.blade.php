@extends('web.default_template.app')

@section('title', $blog['title'].'_追梦小窝的博客 - 努力霍城自己想要的样子')
{{--样式引入--}}
@section('style')
    <link href="{{asset('style/admin/inspinia/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
@endsection


@section('header_bar')
    <div class="col-sm-4">
        <h2>{{$blog['sortname']}}</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{url('/')}}">主页</a>
            </li>
            <li class="active">
                <strong>{{$blog['sortname']}}</strong>
            </li>
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            <a href="{{url()->previous()}}" class="btn btn-primary">返回上一级</a>
        </div>
    </div>
@endsection

{{--内容部分--}}
@section('content')
    <div class="ibox">
        <div class="ibox-content">
            <div class="pull-right">
                <button class="btn btn-white btn-xs" type="button">{{$blog['author']}}</button>
            </div>
            <div class="text-center article-title">
                <h1>
                    {{$blog['title']}}
                </h1>
                <span class="text-muted"><i class="fa fa-clock-o"></i> {{$blog['date']}}</span>
            </div>
            <p>
                {!! $blog['content'] !!}
            </p>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    @foreach($blog['tags'] as $value)
                        <h5>标签:</h5>
                        <button class="btn btn-primary btn-xs" type="button" onclick="window.location.href='{{url('tag').'/'.$value['tid']}}'">{{$value['tagname']}}</button>
                    @endforeach
                </div>
                <div class="col-md-6">
                    <div class="small text-right">
                        <h5>统计:</h5>
                        <div> <i class="fa fa-comments-o"> </i> {{$blog['comment']}} 评论 </div>
                        <i class="fa fa-eye"> </i> {{$blog['views']}} 查看
                    </div>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-lg-12">

                    @if($blog['comment'] > 0)
                    <div class="col-lg-6">
                    @endif
                        <div class="ibox">
                        <div class="ibox-content">
                            <h3>马上批阅</h3>
                            <p class="small">
                                评论该篇文章
                            </p>
                            <form  action="{{url('blog/api/comment')}}" id="currentForm">
                                <input type="hidden" name="gid" value="{{ $blog['gid'] }}">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label>您的QQ</label>
                                    <input type="number" class="form-control" name="qq" id="qq" placeholder="留下你的QQ号，方便联系！" onblur="check_user()">
                                </div>
                                <div class="form-group">
                                    <label>您的主页地址</label>
                                    <input type="url" class="form-control" name="url" placeholder="您的主页地址！">
                                </div>
                                <div class="form-group">
                                    <label>内容</label>
                                    <textarea class="form-control" name="comment" placeholder="发表意见" rows="5"></textarea>
                                </div>
                                <div class="text-right">
                                    <button type="button" class="btn btn-sm btn-primary m-t-n-xs" onclick="postForm()"><strong>发表评论</strong></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @if($blog['comment'] > 0)
                    </div>
                    @endif



                    @if($blog['comment'] > 0)
                    <div class="col-lg-6">
                    @endif
                    @foreach($comment as $val)
                        <div class="social-feed-box">
                        <div class="social-avatar">
                            <a href="{{$val['url']}}" class="pull-left">
                                @if($val['mail'])
                                    <img alt="image" src="http://q1.qlogo.cn/g?b=qq&nk={{$val['mail']}}&s=640">
                                @else
                                    <img alt="image" src="http://q1.qlogo.cn/g?b=qq&nk=10000&s=640">
                                @endif
                            </a>
                            <div class="media-body">
                                <a href="#">
                                    {{$val['poster']}}
                                </a>
                                <small class="text-muted">{{date('Y-m-d H:i:s',$val['date'])}}</small>
                            </div>
                        </div>
                        <div class="social-body">
                            <p>
                                {{$val['comment']}}
                            </p>
                        </div>
                    </div>
                    @endforeach
                    @if($blog['comment'] > 0)
                    </div>
                    @endif

                </div>
            </div>


        </div>
    </div>
@endsection

{{--js引用--}}
@section('script')
    <script src="{{asset('style/admin/inspinia/js/plugins/sweetalert/sweetalert.min.js')}}"></script>
    <script>

        function check_user() {
            var qq = $("#qq").val();
            var url = 'http://users.qzone.qq.com/fcg-bin/cgi_get_portrait.fcg';
            $.post(url,{'uins':qq},function (json) {
                console.log(json);
            });
        }
        function postForm(){
            var url = $("#currentForm").attr('action');
            var data = $("#currentForm").serialize();
            $.post(url,data,function(json){
                if(json.status==0){
                    swal({
                        title: "提示信息",
                        text: json.data,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "确定",
                    },function(){
                        window.location.href='{{url('admin/qq_login_auth')}}';
                    });
                }else{
                    swal({
                        title: "提示信息",
                        text: json.data,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "确定",
                    },function(){
                        window.location.reload();
                    });
                }
            });
        }
    </script>
@endsection