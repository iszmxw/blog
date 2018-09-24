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
		<div class="row border-bottom">
			<nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
				<div class="navbar-header">
					<a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
					<form role="search" class="navbar-form-custom" action="search_results.html">
						<div class="form-group">
							<input type="text" placeholder="请输入搜索内容" class="form-control" name="top-search" id="top-search">
						</div>
					</form>
				</div>
				<ul class="nav navbar-top-links navbar-right">
					<li>
						<span class="m-r-sm text-muted welcome-message">欢迎来到网豫游戏管理后台</span>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
							<i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
						</a>
						<ul class="dropdown-menu dropdown-messages">
							<li>
								<div class="dropdown-messages-box">
									<a href="profile.html" class="pull-left">
										<img alt="image" class="img-circle" src="style/admin/inspinia/img/a7.jpg">
									</a>
									<div class="media-body">
										<small class="pull-right">46小时前</small>
										<strong>小明</strong> 评论了 <strong>小红</strong>. <br>
										<small class="text-muted">2017.10.06 7:58</small>
									</div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box">
									<a href="profile.html" class="pull-left">
										<img alt="image" class="img-circle" src="style/admin/inspinia/img/a4.jpg">
									</a>
									<div class="media-body ">
										<small class="pull-right text-navy">5小时前</small>
										<strong>小红</strong> 打电话给了 <strong>小黑</strong>. <br>
										<small class="text-muted">2017.10.06 7:58</small>
									</div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box">
									<a href="profile.html" class="pull-left">
										<img alt="image" class="img-circle" src="style/admin/inspinia/img/profile.jpg">
									</a>
									<div class="media-body ">
										<small class="pull-right">23小时前</small>
										<strong>小黑</strong> 点赞了 <strong>小红</strong>. <br>
										<small class="text-muted">2017.10.06 7:58</small>
									</div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="text-center link-block">
									<a href="mailbox.html">
										<i class="fa fa-envelope"></i> <strong>阅读所有消息</strong>
									</a>
								</div>
							</li>
						</ul>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
							<i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
						</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li>
								<a href="mailbox.html">
									<div>
										<i class="fa fa-envelope fa-fw"></i> 你有16条消息
										<span class="pull-right text-muted small">4 分钟前</span>
									</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="profile.html">
									<div>
										<i class="fa fa-twitter fa-fw"></i> 3 个新的关注者
										<span class="pull-right text-muted small">12 分钟前</span>
									</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="grid_options.html">
									<div>
										<i class="fa fa-upload fa-fw"></i> 重启服务器
										<span class="pull-right text-muted small">4 分钟前</span>
									</div>
								</a>
							</li>
							<li class="divider"></li>
							<li>
								<div class="text-center link-block">
									<a href="notifications.html">
										<strong>查看所有信息</strong>
										<i class="fa fa-angle-right"></i>
									</a>
								</div>
							</li>
						</ul>
					</li>


					<li>
						<a href="login.html">
							<i class="fa fa-sign-out"></i> 注销
						</a>
					</li>
				</ul>

			</nav>
		</div>
		<div class="row wrapper border-bottom white-bg page-heading">
			<div class="col-sm-4">
				<h2>空白页面</h2>
				<ol class="breadcrumb">
					<li>
						<a href="index.html">主页</a>
					</li>
					<li class="active">
						<strong>面包屑</strong>
					</li>
				</ol>
			</div>
			<div class="col-sm-8">
				<div class="title-action">
					<a href="" class="btn btn-primary">这是行动区</a>
				</div>
			</div>
		</div>

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
		<div class="footer">
			<div class="pull-right">
				<strong>www.108wan.com</strong>
			</div>
			<div>
				<strong>Copyright</strong> 网豫游戏 &copy; 2017-2018
			</div>
		</div>

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
