<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>追梦小窝 | 博客管理系统-文章列表</title>
    @include('admin.public.common_css')
    <link href="{{asset('style/admin/inspinia/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
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
                                文章列表
                            </h2>
                            <div class="alert alert-warning">
                                我的所有文章列表
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
                            <h5>文章信息列表
                                <small>所有文章。</small>
                            </h5>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-sm-5 m-b-xs">
                                    <select class="input-sm form-control input-s-sm inline">
                                        <option value="0">选项 1</option>
                                        <option value="1">选项 2</option>
                                        <option value="2">选项 3</option>
                                        <option value="3">选项 4</option>
                                    </select>
                                </div>
                                <div class="col-sm-4 m-b-xs">
                                    <div data-toggle="buttons" class="btn-group">
                                        <label class="btn btn-sm btn-white"> <input type="radio" id="option1" name="options"> 天 </label>
                                        <label class="btn btn-sm btn-white active"> <input type="radio" id="option2" name="options"> 周 </label>
                                        <label class="btn btn-sm btn-white"> <input type="radio" id="option3" name="options"> 月 </label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group"><input type="text" placeholder="请输入搜索内容" class="input-sm form-control"> <span class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-primary"> 搜索</button> </span></div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>

                                        <th></th>
                                        <th>ID </th>
                                        <th>标题</th>
                                        <th>栏目</th>
                                        <th>浏览量</th>
                                        <th>时间</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($list as $value)
                                    <tr>
                                        <td><input type="checkbox"  checked class="i-checks" name="input[]"></td>
                                        <td>{{$value['gid']}}</td>
                                        <td>{{$value['title']}}</td>
                                        <td><span class="label label-primary">{{$value['sortname']}}</span></td>
                                        <td><span class="label label-success">{{$value['views']}}</span></td>
                                        <td>{{date('Y-m-d H:i:s',$value['date'])}}</td>
                                        <td>
                                            <button class="btn btn-info" type="button" onclick="edit('{{$value['gid']}}')"><i class="fa fa-edit"></i>&nbsp;&nbsp;编辑</button>
                                            <button class="btn btn-danger" type="button" onclick="deleted('{{$value['gid']}}')"><i class="fa fa-times"></i>&nbsp;&nbsp;删除</button>
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


        </div>
        {{--底部--}}
        @include('admin.public.footer')
    </div>
</div>
@include('admin.public.common_js')
<!-- iCheck -->
<script src="{{asset('style/admin/inspinia/js/plugins/iCheck/icheck.min.js')}}"></script>
<!-- Sweet alert -->
<script src="{{asset('style/admin/inspinia/js/plugins/sweetalert/sweetalert.min.js')}}"></script>
<script>
    function edit(id){
        window.location.href="{{url('admin/article/article_edit?id=')}}"+id;
    }
    function deleted(id){
        var url = "{{url('admin/ajax/article_delete_check')}}";
        var data = {'_token':'{{csrf_token()}}','id':id};
        swal({
                title: "你确定？",
                text: "你将无法恢复这篇文章！",
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
                    $.post(url,data,function(json){
                        if (json.status == '1'){
                            swal("删除", "您的文章已被删除", "success");
                            setInterval(function(){
                                window.location.reload();
                            },1500);
                        }else{
                            swal("操作失败", "删除失败请稍后再试！", "error");
                        }
                    });
                } else {
                    swal("取消", "您已取消了删除", "error");
                    setInterval(function(){
                        window.location.reload();
                    },1500);
                }
            });
    }
    $(document).ready(function(){
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });
    });
</script>
</body>
</html>
