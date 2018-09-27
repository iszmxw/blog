<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>追梦小窝 | 后台首页</title>
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
                                撰写文章
                            </h2>
                            <div class="alert alert-warning">
                                在下面的输入框中开始编写你的文章
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
                                <small>开始你的写作吧。</small>
                            </h5>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" action="{{url('article_add_check')}}">
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">标题</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">选择栏目</label>
                                    <div class="col-sm-8">
                                        <select class="form-control m-b" name="sort_id">
                                            <option value="-1">请选择栏目</option>
                                            @foreach($sort as $value)
                                            <option value="{{$value['sid']}}">{{$value['sortname']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                {{--富文本編輯器--}}
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="summernote">
                                            <h3>超级简单的所见即所得编辑器</h3>
                                            超级简单的所见即所得编辑器超级简单的所见即所得编辑器超级简单的所见即所得编辑器超级简单的所见即所得编辑器超级简单的所见即所得编辑器超级简单的所见即所得编辑器超级简单的所见即所得编辑器超级简单的所见即所得编辑器超级简单的所见即所得编辑器超级简单的所见即所得编辑器超级简单的所见即所得编辑器超级简单的所见即所得编辑器
                                            <br/>
                                            <br/>
                                            <ul>
                                                <li>超级简单的所见即所得编辑器</li>
                                                <li>超级简单的所见即所得编辑器</li>
                                                <li>超级简单的所见即所得编辑器</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                {{--富文本編輯器--}}
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">密码</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white" type="submit">取消</button>
                                        <button class="btn btn-primary" type="submit">保存更改</button>
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
