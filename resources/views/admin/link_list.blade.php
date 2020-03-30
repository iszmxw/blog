@extends('admin.app')

@section('title', '后台首页--友情链接')
@section('keywords', '后台首页--友情链接')
@section('description', '后台首页--友情链接')
{{--样式引入--}}
@section('style')


@endsection

{{--内容部分--}}
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <h2>
                        友情链接列表
                    </h2>
                    <div class="alert alert-warning">
                        我的所有友情链接列表
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
                    <h5>友情链接列表
                        <small>所有友情链接。</small>
                    </h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-3">
                            <a href="JavaScript:;" class="btn btn-primary" onclick="add_alert()">添加友情链接</a>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group"><input type="text" placeholder="请输入搜索内容"
                                                            class="input-sm form-control"> <span
                                        class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-primary"> 搜索</button> </span></div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>序号</th>
                                <th>标题</th>
                                <th>状态</th>
                                <th>查看</th>
                                <th>描述</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $value)
                                <tr>
                                    <td><input type="text" value="{{$value['taxis']}}" class="form-control">
                                    </td>
                                    <td>{{$value['sitename']}}</td>
                                    <td><span class="label label-primary">@if($value['hide'] == 'n')显示@else
                                                隐藏@endif</span></td>
                                    <td><span class="label label-success">{{$value['siteurl']}}</span></td>
                                    <td>{{$value['description']}}</td>
                                    <td>
                                        <button class="btn btn-info" type="button"
                                                onclick="EditData('{{$value['id']}}')"><i
                                                    class="fa fa-edit"></i>&nbsp;&nbsp;编辑
                                        </button>
                                        <button class="btn btn-danger" type="button"
                                                onclick="deleted('{{$value['id']}}')"><i
                                                    class="fa fa-times"></i>&nbsp;&nbsp;删除
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="7" class="footable-visible">
                                    <ul class="pagination pull-right">
                                        {{$list->links()}}
                                    </ul>
                                </td>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--添加数据框--}}
    <div class="modal inmodal fade" id="add_data" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{url('admin_web/ajax/link_list_add_check')}}" id="post_url">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span
                                    aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">添加友情链接</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>友情链接名称</label>
                            <input type="text" placeholder="友情链接名称" name="sitename" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>友情链接地址</label>
                            <input type="text" placeholder="友情链接地址" name="siteurl" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>友情链接描述</label>
                            <input type="text" placeholder="友情链接描述" name="description" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                        <button type="button" class="btn btn-primary" onclick="add_data()">添加数据</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--编辑数据框--}}
    <div class="modal inmodal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{url('admin_web/ajax/link_list_data_check')}}" id="currentForm">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span
                                    aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">编辑友情链接</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>友情链接名称</label>
                            <input type="text" placeholder="友情链接名称" name="sitename" id="sitename" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>友情链接地址</label>
                            <input type="text" placeholder="友情链接地址" name="siteurl" id="siteurl" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>友情链接描述</label>
                            <input type="text" placeholder="友情链接描述" name="description" id="description"
                                   class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                        <button type="button" class="btn btn-primary" onclick="SaveData()">保存更改</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

{{--js引用--}}
@section('script')
    <script>
        //显示添加数据框
        function add_alert() {
            $("#add_data").modal();
        }

        //添加友情链接
        function add_data() {
            var target = $("#post_url");
            var url = target.attr("action");
            var data = target.serialize();
            $.post(url, data, function (json) {
                if (json.status == 1) {
                    swal({
                        title: "提示信息",
                        text: json.data,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "确定",
                    }, function () {
                        window.location.reload();
                    });
                } else {
                    swal({
                        title: "提示信息",
                        text: json.data,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "确定"
                    });
                }
            });
        }

        //获取标签数据
        function EditData(id) {
            var url = "{{url('admin_web/ajax/link_list_data')}}";
            var data = {'_token': "{{csrf_token()}}", 'id': id};
            $.post(url, data, function (json) {
                if (json.status == '1') {
                    console.log(json.data);
                    $("#id").val(json.data.id);
                    $("#sitename").val(json.data.sitename);
                    $("#siteurl").val(json.data.siteurl);
                    $("#description").val(json.data.description);
                    $("#myModal").modal();
                } else {
                    swal("失败", json.data, "error");
                    setInterval(function () {
                        window.location.reload();
                    }, 1500);
                }
            });
        }

        //保存数据
        function SaveData() {
            var target = $("#currentForm");
            var url = target.attr("action");
            var data = target.serialize();
            $.post(url, data, function (json) {
                if (json.status == 1) {
                    swal({
                        title: "提示信息",
                        text: json.data,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "确定",
                    }, function () {
                        window.location.reload();
                    });
                } else {
                    swal({
                        title: "提示信息",
                        text: json.data,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "确定"
                    });
                }
            });
        }

        //删除友情链接数据
        function deleted(id) {
            var url = "{{url('admin_web/ajax/link_delete_check')}}";
            var data = {'_token': '{{csrf_token()}}', 'id': id};
            swal({
                    title: "你确定？",
                    text: "你将无法恢复这条数据！",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "删除",
                    cancelButtonText: "取消",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (isConfirm) {
                    if (isConfirm) {
                        $.post(url, data, function (json) {
                            if (json.status == '1') {
                                swal("删除", "您的友情链接已被删除", "success");
                                setInterval(function () {
                                    window.location.reload();
                                }, 1500);
                            } else {
                                swal("操作失败", "删除失败请稍后再试！", "error");
                            }
                        });
                    } else {
                        swal("取消", "您已取消了删除", "error");
                        setInterval(function () {
                            window.location.reload();
                        }, 1500);
                    }
                });
        }
    </script>
@endsection