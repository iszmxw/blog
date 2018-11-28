<div class="row border-bottom">
	<nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
		<div class="navbar-header">
			<a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
			<form role="search" class="navbar-form-custom" action="">
				<div class="form-group">
					<input type="text" placeholder="请输入搜索内容" class="form-control" name="top-search" id="top-search">
				</div>
			</form>
		</div>
		<ul class="nav navbar-top-links navbar-right">
			<li>
				<span class="m-r-sm text-muted welcome-message">欢迎来到{{$user_data['nickname']}}博客管理后台</span>
			</li>
			<li class="dropdown">
				<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
					<i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
				</a>
				<ul class="dropdown-menu dropdown-messages">
					<li>
						<div class="dropdown-messages-box">
							<a href="{{ url('profile') }}" class="pull-left">
								<img alt="image" class="img-circle" src="{{url('/').$user_data['photo']}}">
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
							<a href="{{ url('profile') }}" class="pull-left">
								<img alt="image" class="img-circle" src="{{url('style/admin/inspinia/img/a4.jpg')}}">
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
								<img alt="image" class="img-circle" src="{{url('style/admin/inspinia/img/profile.jpg')}}">
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
				<a href="{{url('admin/quit')}}">
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
				<a href="{{url('admin')}}">主页</a>
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