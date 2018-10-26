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
			<div class="row">
				<div class="col-lg-12">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
						<h5>评论列表</h5>
						<div class="ibox-tools">
							<span class="label label-warning-light pull-right">{{$list->total()}} 条评论</span>
						</div>
					</div>
					<div class="ibox-content">

						<div>
							<div class="feed-activity-list">
								@foreach($list as $value)
								<div class="feed-element">
									<a href="JavaScript:;" class="pull-left">
										<img alt="image" class="img-circle" src="http://q1.qlogo.cn/g?b=qq&nk={{$value['mail']}}&s=640">
									</a>
									<div class="media-body">
										<small class="pull-right">{{date('Y-m-d H:i:s',$value['date'])}}</small>
										<strong>{{$value['poster']}}</strong> 评论了 <strong>{{$value['blog_title']}}</strong><br>
										<small class="text-muted">来自：{{$value['ip']}}</small>
										<div class="well">
											{{$value['comment']}}
										</div>
										<div class="actions">
											<a class="btn btn-xs btn-danger" onclick="delete_fn()"><i class="fa fa-times"></i> 删除 </a>
											<a class="btn btn-xs btn-warning" onclick="show_fn()"><i class="fa fa-eye-slash"></i> 隐藏</a>
											<a class="btn btn-xs btn-primary" onclick="comment_fn()"><i class="fa fa-comments"></i> 回复</a>
											<a class="btn btn-xs btn-info" onclick="edit_fn()"><i class="fa fa-edit"></i> 编辑</a>
										</div>
									</div>
								</div>
								@endforeach
								<div class="pagination pull-right">
									{{$list->links()}}
								</div>
							</div>
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
<script>

	//删除方法
	function delete_fn(){
	    alert('删除');
	}

	// 显示、隐藏方法
	function show_fn(){
	    alert("显示方法");
	}

	//回复方法
	function comment_fn(){
	    alert("回复方法");
	}

	//编辑方法
	function edit_fn(){
	    alert("编辑方法");
	}
</script>
</body>
</html>
