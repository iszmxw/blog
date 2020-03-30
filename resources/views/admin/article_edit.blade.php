@extends('admin.app')
@section('title', '文章管理-编辑文章')
@section('keywords', '文章管理-编辑文章')
@section('description', '文章管理-编辑文章')
{{--样式引入--}}
@section('style')
    <link href="{{asset('style/admin/inspinia/css/plugins/summernote/summernote.css')}}" rel="stylesheet">
    <link href="{{asset('style/admin/inspinia/css/plugins/summernote/summernote-bs3.css')}}" rel="stylesheet">
@endsection

{{--内容部分--}}
@section('content')
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
                        <small>修改文章内容。</small>
                    </h5>
                </div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal" id="post_url"
                          action="{{url('admin_web/ajax/article_edit_check')}}">
                        <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="id" value="{{$blog['id']}}">
                        <input type="hidden" id="filedata" name="filedata" value="{{ $attachment }}">
                        <input type="hidden" name="attachment_id" value="{{ $attachment_id }}">
                        <input type="hidden" id="article_image_upload"
                               value="{{ url('admin_web/ajax/article_image_upload') }}">
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
                                <select class="form-control m-b" name="sort_id">
                                    <option value="-1">请选择栏目</option>
                                    @foreach($sort as $value)
                                        <option value="{{$value['id']}}"
                                                @if($blog['sort_id'] == $value['id']) selected @endif>{{$value['name']}}</option>
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
                                <input type="text" class="form-control" name="password"
                                       value="{{$blog['password']}}">
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
@endsection

{{--js引用--}}
@section('script')
    <!-- SUMMERNOTE -->
    <script src="{{asset('style/admin/inspinia/js/plugins/summernote/summernote.min.js?v='.time())}}"></script>
    <script src="{{asset('style/admin/inspinia/js/plugins/summernote/summernote-ext-highlight.js?v='.time())}}"></script>
    <script src="{{asset('style/admin/js/article_add.js?v='.time())}}"></script>
@endsection
