@extends('admin.app')

@section('title', '后台首页--分类列表')
@section('keywords', '后台首页--分类列表')
@section('description', '后台首页--分类列表')
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
                        分类列表
                    </h2>
                    <div class="alert alert-warning">
                        我的所有分类列表
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
                    <h5>分类列表
                        <small>所有分类。</small>
                    </h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-3">
                            <a href="JavaScript:;" class="btn btn-primary" onclick="add_alert()">添加分类</a>
                        </div>
                        <form>
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <input type="text" placeholder="请输入搜索内容" name="name"
                                           value="{{$search_data['name']}}"
                                           class="input-sm form-control">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-sm btn-primary"> 搜索</button> </span></div>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>序号</th>
                                <th>分类名称</th>
                                <th>描述</th>
                                <th>别名</th>
                                <th>模板</th>
                                <th>链接</th>
                                <th>文章</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($list as $value)
                                <tr>
                                    <td>{{$value['id']}}</td>
                                    <td><input type="text" value="{{$value['sort']}}" class="form-control">
                                    </td>
                                    <td>{{$value['name']}}</td>
                                    <td>{{$value['description']}}</td>
                                    <td>{{$value['alias']}}</td>
                                    <td>{{$value['template']}}</td>
                                    <td>链接地址</td>
                                    <td><span class="label label-success">{{$value['blogs']}}</span></td>
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
                <form action="{{url('admin_web/ajax/category_add_check')}}" id="post_url">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span
                                    aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">添加分类</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>分类名称</label>
                            <input type="text" placeholder="分类名称" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>别名</label>
                            <input type="text" placeholder="别名" name="alias" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>上级分类</label>
                            <select class="input-sm form-control input-s-sm inline" name="pid">
                                <option value="0">无父级</option>
                                @foreach($sort as $value)
                                    <option value="{{$value['id']}}">{{$value['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>分类描述</label>
                            <input type="text" placeholder="分类描述" name="description" class="form-control">
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
                <form action="{{url('admin_web/ajax/category_data_edit_check')}}" id="currentForm">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span
                                    aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">编辑分类</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>分类名称</label>
                            <input type="text" placeholder="分类名称" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>别名</label>
                            <input type="text" placeholder="别名" name="alias" id="alias" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>上级分类</label>
                            <select class="input-sm form-control input-s-sm inline" name="pid" id="pid">
                                <option value="0">无父级</option>
                                @foreach($sort as $value)
                                    <option value="{{$value['id']}}">{{$value['name']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>分类描述</label>
                            <input type="text" placeholder="分类描述" name="description" id="description"
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

        //添加分类
        function add_data() {
            let target = $("#post_url");
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

        //获取分类数据
        function EditData(id) {
            let url = "{{url('admin_web/ajax/category_data')}}";
            let data = {'_token': "{{csrf_token()}}", 'id': id};
            $.post(url, data, function (json) {
                if (json.code === 200) {
                    $("#id").val(json.data.id);
                    $("#name").val(json.data.name);
                    $("#alias").val(json.data.alias);
                    $("#pid").find("option[value=" + json.data.pid + "]").attr("selected", true);
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

        //删除友情链接数据
        function deleted(id) {
            let url = "{{url('admin_web/ajax/category_delete_check')}}";
            let data = {'_token': '{{csrf_token()}}', 'id': id};
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
                            if (json.code === 200) {
                                swal("删除", "您的分类已被删除", "success");
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
