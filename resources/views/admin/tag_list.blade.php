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
<div class="modal inmodal fade" id="myModal" tabindex="-1" role="dialog"  aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<form action="{{url('admin/ajax/tag_edit_data_check')}}" id="currentForm">
				<input type="hidden" name="tid" id="tid">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">编辑标签</h4>
				</div>
				<div class="modal-body">
					<p>
						<input type="text" placeholder="请输入标签名称" name="tagname" id="tag_name" class="form-control">
					</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
					<button type="button" class="btn btn-primary" onclick="SaveData()">保存更改</button>
				</div>
			</form>
		</div>
	</div>
</div>
@include('admin.public.common_js')
<!-- Sweet alert -->
<script src="{{asset('style/admin/inspinia/js/plugins/sweetalert/sweetalert.min.js')}}"></script>
<script>
	//删除标签数据
    function deleted(tid,e){
        stopPropagation(e);
        var url = "{{url('admin/ajax/tag_delete_check')}}";
        var data = {'_token':'{{csrf_token()}}','tid':tid};
        swal({
                title: "你确定？",
                text: "你将无法恢复这个标签！",
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
                            swal("删除", "您的标签已被删除", "success");
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
    //获取标签数据
    function EditData(tid){
        var url = "{{url('admin/ajax/tag_edit_data')}}";
        var data = {'_token':"{{csrf_token()}}",'tid':tid};
        $.post(url,data,function(json){
            if (json.status == '1'){
                console.log(json.data);
                $("#tid").val(json.data.tid);
                $("#tag_name").val(json.data.tagname);
                $("#myModal").modal();
			}else{
                swal("失败", json.data, "error");
                setInterval(function(){
                    window.location.reload();
                },1500);
			}
		});
    }
    //保存数据
    function SaveData(){
        var target = $("#currentForm");
        var url = target.attr("action");
        var data = target.serialize();
        $.post(url, data, function (json) {
            if(json.status == 1) {
                swal({
                    title: "提示信息",
                    text: json.data,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "确定",
                },function(){
                    window.location.reload();
                });
            }else{
                swal({
                    title: "提示信息",
                    text: json.data,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "确定"
                });
            }
        });
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
