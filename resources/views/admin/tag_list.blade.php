<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>追梦小窝 | 后台首页--标签管理</title>
	@include('admin.public.common_css')
	<link href="{{asset('style/admin/inspinia/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
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
				<button type="button" class="btn btn-w-m btn-info" onclick="EditData('{{$value['tid']}}')" style="margin:5px;">
					<i class="fa fa-tag"></i>&nbsp;&nbsp;{{$value['tagname']}}&nbsp;&nbsp;
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
<!-- Sweet alert -->
<script src="{{asset('style/admin/inspinia/js/plugins/sweetalert/sweetalert.min.js')}}"></script>
<script>
    function deleted(tid,e){
        stopPropagation(e);
        var url = "{{url('admin/ajax/tag_delete_check')}}";
        var data = {'_token':'{{csrf_token()}}','tid':tid};
        swal({
                title: "你确定？",
                text: "你将无法恢复这篇文章！",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "删除",
                cancelButtonText: "取消",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.post(url,data,function(json){
                        if (json.status == '1'){
                            swal("删除", "您的文章已被删除", "success");
                            setInterval(function(){
                                window.location.reload();
                            },1500);
                        }else{
                            swal("操作失败", "删除失败请稍后再试！", "error");
                        }
                    });
                } else {
                    swal("取消", "您已取消了删除", "error");
                    setInterval(function(){
                        window.location.reload();
                    },1500);
                }
            });
    }
    function EditData(tid){
        alert(tid);
    }
    //因为冒泡了，会执行到下面的方法。
    function stopPropagation(e) {
        var ev = e || window.event;
        if (ev.stopPropagation) {
            ev.stopPropagation();
        }
        else if (window.event) {
            window.event.cancelBubble = true;//兼容IE
        }
    }
</script>
</body>
</html>
