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
				@foreach($list as $value)
				<button type="button" class="btn btn-w-m btn-info" onclick="EditData('{{$value['tid']}}')"><i class="fa fa-tag"></i> {{$value['tagname']}}&nbsp;&nbsp;
					<span class="close-link" onclick="deleted('{{$value['tid']}}')">
						<i class="fa fa-times"></i>
					</span>
				</button>
				@endforeach
			</div>
		</div>
		{{--底部--}}
		@include('admin.public.footer')
	</div>
</div>
@include('admin.public.common_js')
<script>
    function EditData(tid){
        alert(tid);
    }
    function deleted(tid){
        alert(tid);
    }
</script>
</body>
</html>
