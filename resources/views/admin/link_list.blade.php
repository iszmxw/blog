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
											<td><input type="number" value="{{$value['taxis']}}" class="form-control"></td>
											<td>{{$value['sitename']}}</td>
											<td><span class="label label-primary">@if($value['hide'] == 'n')显示@else隐藏@endif</span></td>
											<td><span class="label label-success">{{$value['siteurl']}}</span></td>
											<td>{{$value['description']}}</td>
											<td>
												<button class="btn btn-info" type="button" onclick="edit('{{$value['id']}}')"><i class="fa fa-edit"></i>&nbsp;&nbsp;编辑</button>
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
@include('admin.public.common_js')
</body>
</html>
