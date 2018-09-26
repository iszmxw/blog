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
						<div class="ibox-content">
							<h2>
								撰写文章
							</h2>
							<div class="alert alert-warning">
								在下面的输入框中开始编写你的文章
								<a href="{{url('admin')}}">返回首页</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="ibox float-e-margins">
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


		</div>
		{{--底部--}}
		@include('admin.public.footer')
	</div>
</div>
@include('admin.public.common_js')
<!-- SUMMERNOTE -->
<script src="{{asset('style/admin/inspinia/js/plugins/summernote/summernote.min.js?v='.time())}}"></script>
<script>

    $(document).ready(function(){
        $('.summernote').summernote({
            height: 300,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true                  // set focus to editable area after initializing summernote
        });
    });
</script>
</body>
</html>
