<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>追梦小窝 | 后台首页</title>
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
			<div class="middle-box text-center animated fadeInRightBig">
				<h3 class="font-bold">这是页面内容</h3>
				<div class="error-desc">
					您可以在这里创建所需的任何网格布局。和任何你想象的变化布局:)<br>
					看看主页等网站。它使用许多不同的布局。
					<br/><a href="{{url('/')}}" class="btn btn-primary m-t">返回主页</a>
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
