<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>追梦小窝 | 后台首页</title>

	<link href="style/admin/inspinia/css/bootstrap.min.css" rel="stylesheet">
	<link href="style/admin/inspinia/font-awesome/css/font-awesome.css" rel="stylesheet">

	<link href="style/admin/inspinia/css/animate.css" rel="stylesheet">
	<link href="style/admin/inspinia/css/style.css" rel="stylesheet">

</head>

<body class="">

<div id="wrapper">

	{{--侧边栏--}}
	@include('admin.public.nav')

	<div id="page-wrapper" class="gray-bg">
		@include('admin.public.header')
		<div class="wrapper wrapper-content">
			<div class="middle-box text-center animated fadeInRightBig">
				<h3 class="font-bold">这是页面内容</h3>
				<div class="error-desc">
					您可以在这里创建所需的任何网格布局。和任何你想象的变化布局:)<br>
					看看主页等网站。它使用许多不同的布局。
					<br/><a href="index.html" class="btn btn-primary m-t">返回主页</a>
				</div>
			</div>
		</div>
		@include('admin.public.footer')
	</div>
</div>

<!-- Mainly scripts -->
<script src="style/admin/inspinia/js/jquery-3.1.1.min.js"></script>
<script src="style/admin/inspinia/js/bootstrap.min.js"></script>
<script src="style/admin/inspinia/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="style/admin/inspinia/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="style/admin/inspinia/js/inspinia.js"></script>
<script src="style/admin/inspinia/js/plugins/pace/pace.min.js"></script>


</body>

</html>
