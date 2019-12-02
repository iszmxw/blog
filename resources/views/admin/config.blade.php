@extends('admin.app')

@section('title', '系统')
@section('keywords', '系统')
@section('description', '系统')
{{--样式引入--}}
@section('style')

@endsection

{{--内容部分--}}
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>基本设置
                        <small>站点的基本设置。</small>
                    </h5>
                </div>
                <div class="ibox-content">
                    <form method="post" action="{{url('admin/ajax/config_edit_check')}}" id="currentForm"
                          class="form-horizontal">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">站点标题：</label>
                            <div class="col-sm-10">
                                <input type="text" placeholder="站点标题" class="form-control" name="blogname"
                                       value="{{$config['blogname']}}">
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">站点副标题：</label>
                            <div class="col-sm-10">
                                <input type="text" placeholder="站点副标题" class="form-control" name="bloginfo"
                                       value="{{$config['bloginfo']}}">
                                <span class="help-block m-b-none">__生活 随笔 记录点点滴滴</span>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">站点地址：</label>
                            <div class="col-sm-10">
                                <input type="url" placeholder="站点地址" class="form-control" name="blogurl"
                                       value="{{$config['blogurl']}}">
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">ICP备案号：</label>
                            <div class="col-sm-10">
                                <input type="text" placeholder="ICP备案号" class="form-control" name="icp"
                                       value="{{$config['icp']}}">
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">首页底部信息：</label>
                            <div class="col-sm-10">
                                        <textarea class="ext-highlight-code form-control" name="footer_info" rows="10"
                                                  placeholder="(支持html，可用于添加流量统计代码)">{{$config['footer_info']}}</textarea>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary" type="button" onclick="edit_data()">保存更改
                                </button>
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
    <script>
        function edit_data() {
            let target = $("#currentForm");
            let url = target.attr("action");
            let data = target.serialize();
            $.post(url, data, function (json) {
                if (json.code === 200) {
                    swal({
                        title: "提示信息",
                        text: json.msg,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "确定",
                    }, function () {
                        window.location.reload();
                    });
                } else {
                    swal({
                        title: "提示信息",
                        text: json.msg,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "确定"
                    });
                }
            });
        }
    </script>
@endsection