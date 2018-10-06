<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>追梦小窝 | 后台首页--标签管理</title>
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

			<div class="tag-list">
				<button type="button" class="btn btn-w-m btn-info"><i class="fa fa-tag"></i> 标签&nbsp;&nbsp;
					<span class="close-link">
						<i class="fa fa-times"></i>
					</span>
				</button>
				<button type="button" class="btn btn-w-m btn-info"><i class="fa fa-tag"></i> 标签
					<a class="close-link">
						<i class="fa fa-times"></i>
					</a>
				</button>
				<button type="button" class="btn btn-w-m btn-info"><i class="fa fa-tag"></i> 标签
					<a class="close-link">
						<i class="fa fa-times"></i>
					</a>
				</button>
				<button type="button" class="btn btn-w-m btn-info"><i class="fa fa-tag"></i> 标签
					<a class="close-link">
						<i class="fa fa-times"></i>
					</a>
				</button>
				<button type="button" class="btn btn-w-m btn-info"><i class="fa fa-tag"></i> 标签
					<a class="close-link">
						<i class="fa fa-times"></i>
					</a>
				</button>
				<button type="button" class="btn btn-w-m btn-info"><i class="fa fa-tag"></i> 标签
					<a class="close-link">
						<i class="fa fa-times"></i>
					</a>
				</button>
			</div>
		</div>
		{{--底部--}}
		@include('admin.public.footer')
	</div>
</div>
@include('admin.public.common_js')
</body>
</html>
