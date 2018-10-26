<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>追梦小窝 | 评论列表</title>
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
						<h5>评论列表</h5>
						<div class="ibox-tools">
							<span class="label label-warning-light pull-right">10条消息未读</span>
						</div>
					</div>
					<div class="ibox-content">

						<div>
							<div class="feed-activity-list">
								<div class="feed-element">
									<a href="profile.html" class="pull-left">
										<img alt="image" class="img-circle" src="img/a5.jpg">
									</a>
									<div class="media-body ">
										<small class="pull-right">2小时</small>
										<strong>小王</strong> 评论了 <strong>晚上睡觉有必要把路由器关掉么？</strong><br>
										<small class="text-muted">2017.12.12 12:00</small>
										<div class="well">
											人生就好像你搭乘一辆火车，沿途有不同的景色，不同的站台，和不同的人上车，也会过了这个景点到下一个景点，到下一个站台，不同的人上下车，那些都是过客，重要的是自己的旅程。
										</div>
										<div class="actions">
											<a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> 赞 </a>
											<a class="btn btn-xs btn-white"><i class="fa fa-heart"></i> 喜欢</a>
										</div>
									</div>
								</div>
							</div>

							<button class="btn btn-primary btn-block m-t"><i class="fa fa-arrow-down"></i> 加载更多</button>

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
