<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>追梦小窝 | 系统</title>
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
			<div class="col-lg-12">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<h5>基本设置 <small>站点的基本设置。</small></h5>
					</div>
					<div class="ibox-content">
						<form method="get" class="form-horizontal">
							<div class="form-group"><label class="col-sm-2 control-label">正常</label>

								<div class="col-sm-10"><input type="text" class="form-control"></div>
							</div>
							<div class="hr-line-dashed"></div>
							<div class="form-group"><label class="col-sm-2 control-label">辅助文本</label>
								<div class="col-sm-10"><input type="text" class="form-control"> <span class="help-block m-b-none">这里可以显示说明、帮助、描述等信息</span>
								</div>
							</div>
							<div class="hr-line-dashed"></div>
							<div class="form-group"><label class="col-sm-2 control-label">密码</label>

								<div class="col-sm-10"><input type="password" class="form-control" name="password"></div>
							</div>
							<div class="hr-line-dashed"></div>
							<div class="form-group"><label class="col-sm-2 control-label">占位符</label>

								<div class="col-sm-10"><input type="text" placeholder="占位符" class="form-control"></div>
							</div>
							<div class="hr-line-dashed"></div>
							<div class="form-group"><label class="col-lg-2 control-label">禁用</label>

								<div class="col-lg-10"><input type="text" disabled="" placeholder="禁用输入..." class="form-control"></div>
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

			<form class="form-horizontal" method="get">
				<div class="form-group"><label class="col-sm-2 control-label">发送人:</label>

					<div class="col-sm-10"><input type="text" class="form-control" value="abc@admin.com"></div>
				</div>
				<div class="form-group"><label class="col-sm-2 control-label">标题:</label>

					<div class="col-sm-10"><input type="text" class="form-control" value=""></div>
				</div>
			</form>
		</div>
		{{--底部--}}
		@include('admin.public.footer')
	</div>
</div>
@include('admin.public.common_js')
</body>
</html>
