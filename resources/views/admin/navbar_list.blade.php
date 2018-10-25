<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>追梦小窝 | 后台首页</title>
	@include('admin.public.common_css')
	<link href="{{asset('style/admin/inspinia/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
	<link href="{{asset('style/admin/inspinia/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet">
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
								导航列表
							</h2>
							<div class="alert alert-warning">
								首页导航栏目设置
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
									<a href="JavaScript:;" class="btn btn-primary" onclick="add_alert()">添加导航</a>
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
										<th>序号</th>
										<th>导航名称</th>
										<th>导航地址</th>
										<th>是否新窗口打开</th>
										<th>当前状态</th>
										<th>操作</th>
									</tr>
									</thead>
									<tbody>
									@foreach($list as $value)
										<tr>
											<td><input type="text" value="{{$value['taxis']}}" class="form-control"></td>
											<td>{{$value['naviname']}}</td>
											<td>{{$value['url']}}</td>
											<td>
												@if($value['newtab'] == 'n')
													否
												@else
													是
												@endif
											</td>
											<td>
												@if($value['hide'] == 'n')
													隐藏
												@else
													显示
												@endif</td>
											<td>
												<button class="btn btn-info" type="button" onclick="EditData('{{$value['id']}}')"><i class="fa fa-edit"></i>&nbsp;&nbsp;编辑</button>
												<button class="btn btn-danger" type="button" onclick="deleted('{{$value['id']}}')"><i class="fa fa-times"></i>&nbsp;&nbsp;删除</button>
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
{{--添加数据框--}}
<div class="modal inmodal fade" id="add_data" tabindex="-1" role="dialog"  aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{url('admin/ajax/navbar_add_check')}}" id="post_url">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">添加导航栏</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>导航栏名称</label>
						<input type="text" placeholder="导航栏名称" name="naviname" class="form-control">
					</div>
					<div class="form-group">
						<label>地址</label>
						<input type="text" placeholder="地址" name="url" class="form-control">
					</div>

					<div class="form-group">
						<label>是否显示</label>
						<div class="col-sm-10">
							<div class="i-checks"><label> <input type="radio" checked="" value="option2" name="a"> <i></i> 显示 </label></div>
							<div class="i-checks"><label> <input type="radio" value="option1" name="a"> <i></i> 隐藏 </label></div>
						</div>
					</div>

					<div class="form-group">
						<label>是否新窗口打开</label>
						<select class="input-sm form-control input-s-sm inline" name="newtab">
							<option value="n">否</option>
							<option value="y">是</option>
						</select>
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
<div class="modal inmodal fade" id="myModal" tabindex="-1" role="dialog"  aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{url('admin/ajax/category_data_edit_check')}}" id="currentForm">
				<input type="hidden" name="sid" id="sid">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">编辑分类</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>分类名称</label>
						<input type="text" placeholder="分类名称" name="sortname" id="sortname" class="form-control">
					</div>
					<div class="form-group">
						<label>别名</label>
						<input type="text" placeholder="别名" name="alias" id="alias" class="form-control">
					</div>
					<div class="form-group">
						<label>上级分类</label>
						<select class="input-sm form-control input-s-sm inline" name="pid" id="pid">
							<option value="0">无父级</option>
						</select>
					</div>
					<div class="form-group">
						<label>分类描述</label>
						<input type="text" placeholder="分类描述" name="description" id="description" class="form-control">
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
@include('admin.public.common_js')
<!-- Sweet alert -->
<script src="{{asset('style/admin/inspinia/js/plugins/sweetalert/sweetalert.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('style/admin/inspinia/js/plugins/iCheck/icheck.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
</script>
<script>
    //显示添加数据框
    function add_alert(){
        $("#add_data").modal();
    }
    //添加分类
    function add_data(){
        var target = $("#post_url");
        var url = target.attr("action");
        var data = target.serialize();
        $.post(url, data, function (json) {
            if(json.status == 1) {
                swal({
                    title: "提示信息",
                    text: json.data,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "确定",
                },function(){
                    window.location.reload();
                });
            }else{
                swal({
                    title: "提示信息",
                    text: json.data,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "确定"
                });
            }
        });
    }

    //获取分类数据
    function EditData(id){
        var url = "{{url('admin/ajax/category_data')}}";
        var data = {'_token':"{{csrf_token()}}",'id':id};
        $.post(url,data,function(json){
            if (json.status == '1'){
                console.log(json.data);
                $("#sid").val(json.data.sid);
                $("#sortname").val(json.data.sortname);
                $("#alias").val(json.data.alias);
                $("#pid").find("option[value="+json.data.pid+"]").attr("selected",true);
                $("#description").val(json.data.description);
                $("#myModal").modal();
            }else{
                swal("失败", json.data, "error");
                setInterval(function(){
                    window.location.reload();
                },1500);
            }
        });
    }
    //保存数据
    function SaveData(){
        var target = $("#currentForm");
        var url = target.attr("action");
        var data = target.serialize();
        $.post(url, data, function (json) {
            if(json.status == 1) {
                swal({
                    title: "提示信息",
                    text: json.data,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "确定",
                },function(){
                    window.location.reload();
                });
            }else{
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
    function deleted(id){
        var url = "{{url('admin/ajax/category_delete_check')}}";
        var data = {'_token':'{{csrf_token()}}','id':id};
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
                    $.post(url,data,function(json){
                        if (json.status == '1'){
                            swal("删除", "您的分类已被删除", "success");
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
</script>
</body>
</html>
