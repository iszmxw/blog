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
													显示
												@else
													隐藏
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
				<input type="hidden" name="url_type" class="url_type" value="1">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">添加导航栏</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label">导航栏名称</label>
						<input type="text" placeholder="导航栏名称" name="naviname" class="form-control">
					</div>
					<div class="form-group">
						<div class="tabs-container">
							<ul class="nav nav-tabs">
								<li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-cog"></i>&nbsp;系统地址</a></li>
								<li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-link"></i>&nbsp;手动输入</a></li>
							</ul>
							<div class="tab-content">
								<div id="tab-1" class="tab-pane active">
									<div class="panel-body">
										<label class="control-label">系统地址</label>
										<select class="form-control m-b" name="system_url" onchange="SetType(1)">
											<option value="0" selected="selected">请选择</option>
											@foreach($category as $val)
												<option value="{{ $val['sid'] }}">{{ $val['sortname'] }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div id="tab-2" class="tab-pane">
									<div class="panel-body">
										<label class="control-label">地址</label>
										<input type="text" placeholder="地址" name="url" class="form-control" onblur="SetType(2)">
									</div>
								</div>
							</div>


						</div>
					</div>
					<div class="form-group">
						<label class="control-label">是否显示</label>
						<div style="clear: both"></div>
						<div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="n" name="hide"> <i></i> 显示 </label></div>
						<div class="col-sm-2 i-checks"><label> <input type="radio" value="y" name="hide"> <i></i> 隐藏 </label></div>
					</div>
					<br>
                    <div class="form-group">
						<label class="control-label">是否新窗口打开</label>
						<div style="clear: both"></div>
						<div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="y" name="newtab"> <i></i> 是 </label></div>
						<div class="col-sm-2 i-checks"><label> <input type="radio" value="n" name="newtab"> <i></i> 否 </label></div>
					</div>
					<br>
					<div style="clear: both"></div>
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
			<form action="{{url('admin/ajax/navbar_data_edit_check')}}" id="currentForm">
				<input type="hidden" name="id" id="id">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<input type="hidden" name="url_type" class="url_type" value="1">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">编辑导航栏是</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label class="control-label">导航栏名称</label>
						<input type="text" placeholder="导航栏名称" name="naviname"  id="naviname" class="form-control">
					</div>
					<div class="form-group">
						<div class="tabs-container">
							<ul class="nav nav-tabs">
								<li class="active" id="switch-1"><a data-toggle="tab" href="#tabs-1"><i class="fa fa-cog"></i>&nbsp;系统地址</a></li>
								<li class="" id="switch-2"><a data-toggle="tab" href="#tabs-2"><i class="fa fa-link"></i>&nbsp;手动输入</a></li>
							</ul>
							<div class="tab-content">
								<div id="tabs-1" class="tab-pane active">
									<div class="panel-body">
										<label class="control-label">系统地址</label>
										<select class="form-control m-b" name="system_url" id="system_url" onchange="SetType(1)">
											<option value="0" selected="selected">请选择</option>
											@foreach($category as $val)
												<option value="{{ $val['sid'] }}">{{ $val['sortname'] }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div id="tabs-2" class="tab-pane">
									<div class="panel-body">
										<label class="control-label">地址</label>
										<input type="text" placeholder="地址" name="url" id="url" class="form-control" onblur="SetType(2)">
									</div>
								</div>
							</div>

						</div>
					</div>
					<div class="form-group">
						<label class="control-label">是否显示</label>
						<div style="clear: both"></div>
						<div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="n" id="show" name="hide"> <i></i> 显示 </label></div>
						<div class="col-sm-2 i-checks"><label> <input type="radio" value="y" id="hide" name="hide"> <i></i> 隐藏 </label></div>
					</div>
					<br>
					<div class="form-group">
						<label class="control-label">是否新窗口打开</label>
						<div style="clear: both"></div>
						<div class="col-sm-2 i-checks"><label> <input type="radio" checked="" value="y" id="newtab_ok" name="newtab"> <i></i> 是 </label></div>
						<div class="col-sm-2 i-checks"><label> <input type="radio" value="n" id="newtab_no" name="newtab"> <i></i> 否 </label></div>
					</div>
					<br>
					<div style="clear: both"></div>
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

    function SetType(type){
        $(".url_type").val(type);
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
        var url = "{{url('admin/ajax/navbar_data')}}";
        var data = {'_token':"{{csrf_token()}}",'id':id};
        $.post(url,data,function(json){
            if (json.status == '1'){
                $("#id").val(json.data.id);
                $(".url_type").val(json.data.type);
                if(json.data.type == 1){
                    $("#switch-1").addClass("active");
                    $("#tabs-1").addClass("active");
                    $("#switch-2").removeClass("active");
                    $("#tabs-2").removeClass("active");
                    $("#system_url option[value='"+json.data.type_id+"']").attr("selected", "selected");
				}else{
                    $("#switch-1").removeClass("active");
                    $("#tabs-1").removeClass("active");
                    $("#switch-2").addClass("active");
                    $("#tabs-2").addClass("active");
                    $("#url").val(json.data.url);
				}
                $("#naviname").val(json.data.naviname);
                if (json.data.hide == 'y'){
                    $("#hide").attr("selected",true);
                    $("#hide").parent().addClass("checked");
                    $("#show").attr("selected",false);
                    $("#show").parent().removeClass("checked");
                }else{
                    $("#hide").attr("selected",false);
                    $("#hide").parent().removeClass("checked");
                    $("#show").attr("selected",true);
                    $("#show").parent().addClass("checked");
                }
                if (json.data.newtab == 'y'){
                    $("#newtab_ok").attr("selected",true);
                    $("#newtab_ok").parent().addClass("checked");
                    $("#newtab_no").attr("selected",false);
                    $("#newtab_no").parent().removeClass("checked");
                }else{
                    $("#newtab_ok").attr("selected",false);
                    $("#newtab_ok").parent().removeClass("checked");
                    $("#newtab_no").attr("selected",true);
                    $("#newtab_no").parent().addClass("checked");
                }
                $("#myModal").modal();
            }else{
                swal("失败", json.data, "error");
                setInterval(function(){
                    window.location.reload();
                },3000);
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
        var url = "{{url('admin/ajax/navbar_delete_check')}}";
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
                            swal("删除", json.data, "success");
                            setInterval(function(){
                                window.location.reload();
                            },1500);
                        }else{
                            swal("操作失败", json.data, "error");
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
