<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>追梦小窝 | 后台首页--友情链接</title>
	@include('admin.public.common_css')
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
									<div class="input-group"><input type="text" placeholder="请输入搜索内容" class="input-sm form-control"> <span class="input-group-btn">
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
											<td><input type="text" value="{{$value['taxis']}}" class="form-control"></td>
											<td>{{$value['sitename']}}</td>
											<td><span class="label label-primary">@if($value['hide'] == 'n')显示@else隐藏@endif</span></td>
											<td><span class="label label-success">{{$value['siteurl']}}</span></td>
											<td>{{$value['description']}}</td>
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

<div class="modal inmodal fade" id="myModal" tabindex="-1" role="dialog"  aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{url('admin/ajax/link_list_data_check')}}" id="currentForm">
				<input type="hidden" name="id" id="id">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
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
						<input type="text" placeholder="友情链接描述" name="description" id="description" class="form-control">
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

<script>
    //获取标签数据
    function EditData(id){
        var url = "{{url('admin/ajax/link_list_data')}}";
        var data = {'_token':"{{csrf_token()}}",'id':id};
        $.post(url,data,function(json){
            if (json.status == '1'){
                console.log(json.data);
                $("#id").val(json.data.id);
                $("#sitename").val(json.data.sitename);
                $("#siteurl").val(json.data.siteurl);
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
</script>
</body>
</html>
