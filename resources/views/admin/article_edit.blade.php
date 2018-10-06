<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>追梦小窝 | 文章管理-编辑文章</title>
    @include('admin.public.common_css')
    <link href="{{asset('style/admin/inspinia/css/plugins/summernote/summernote.css')}}" rel="stylesheet">
    <link href="{{asset('style/admin/inspinia/css/plugins/summernote/summernote-bs3.css')}}" rel="stylesheet">
</head>
<body class="">
<div id="wrapper">
    {{--侧边栏--}}
    @include('admin.public.nav')
    <div id="page-wrapper" class="gray-bg">
        {{--头部--}}
        @include('admin.public.header')
        <div class="wrapper wrapper-content">

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-content">
                            <h2>
                                编辑文章
                            </h2>
                            <div class="alert alert-warning">
                                编辑修改文章内容
                                <a href="{{url('admin')}}">返回首页</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>文章基本信息
                                <small>修改文章内容。{{pathinfo()}}</small>
                            </h5>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" id="post_url" action="{{url('admin/ajax/article_edit_check')}}">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="gid" value="{{$blog['gid']}}">
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">标题</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="title" class="form-control" value="{{$blog['title']}}">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">选择栏目</label>
                                    <div class="col-sm-8">
                                        <select class="form-control m-b" name="sortid">
                                            <option value="-1">请选择栏目</option>
                                            @foreach($sort as $value)
                                            <option value="{{$value['sid']}}" @if($blog['sortid'] == $value['sid']) selected @endif>{{$value['sortname']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{--富文本編輯器--}}
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="summernote">
                                            {!! $blog['content'] !!}
                                        </div>
                                    </div>
                                </div>
                                {{--富文本編輯器--}}
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">密码</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="password" value="{{$blog['password']}}">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" type="button" onclick="add_data()">保存更改</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        {{--底部--}}
        @include('admin.public.footer')
    </div>
</div>
@include('admin.public.common_js')
<!-- SUMMERNOTE -->
<script src="{{asset('style/admin/inspinia/js/plugins/summernote/summernote.min.js?v='.time())}}"></script>
<script src="{{asset('style/admin/js/article_add.js?v='.time())}}"></script>
</body>
</html>
