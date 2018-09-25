<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>追梦小窝 | 后台首页</title>
	@include('admin.public.common_css')
	<link href="{{asset('style/admin/inspinia/css/plugins/summernote/summernote.css')}}" rel="stylesheet">
	<link href="{{asset('style/admin/inspinia/css/plugins/summernote/summernote-bs3.css')}}" rel="stylesheet">
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
							<h5>Wyswig Summernote 编辑器</h5>
							<div class="ibox-tools">
								<a class="collapse-link">
									<i class="fa fa-chevron-up"></i>
								</a>
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
									<i class="fa fa-wrench"></i>
								</a>
								<ul class="dropdown-menu dropdown-user">
									<li><a href="#">Config option 1</a>
									</li>
									<li><a href="#">Config option 2</a>
									</li>
								</ul>
								<a class="close-link">
									<i class="fa fa-times"></i>
								</a>
							</div>
						</div>
						<div class="ibox-content no-padding">

							<div class="summernote">
								<h3>超级简单的所见即所得编辑器</h3>
								超级简单的所见即所得编辑器超级简单的所见即所得编辑器超级简单的所见即所得编辑器超级简单的所见即所得编辑器超级简单的所见即所得编辑器超级简单的所见即所得编辑器超级简单的所见即所得编辑器超级简单的所见即所得编辑器超级简单的所见即所得编辑器超级简单的所见即所得编辑器超级简单的所见即所得编辑器超级简单的所见即所得编辑器
								<br/>
								<br/>
								<ul>
									<li>超级简单的所见即所得编辑器</li>
									<li>超级简单的所见即所得编辑器</li>
									<li>超级简单的所见即所得编辑器</li>
								</ul>
							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="ibox float-e-margins">

						<div class="ibox-content">

							<h2>
								Summernote
							</h2>
							<p>
								超级简单的所见即所得编辑器
							</p>

							<div class="alert alert-warning">
								Summernote.js的完整文档，包括示例和API调用，关键点快捷方式，PHP示例，Django安装和Rails（gem）集成可以在以下网址找到:
								<a href="http://summernote.org/deep-dive/">http://summernote.org/deep-dive/</a>

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
<!-- SUMMERNOTE -->
<script src="{{asset('style/admin/inspinia/js/plugins/summernote/summernote.min.js')}}"></script>
<script>
    $(document).ready(function(){

        $('.summernote').summernote();

    });
</script>
</body>
</html>
