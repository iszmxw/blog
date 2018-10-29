<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>追梦小窝 | 后台首页--说说管理</title>
	@include('admin.public.common_css')
	<link href="{{asset('style/admin/inspinia/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
</head>
<body class="">
<div id="wrapper">
	{{--侧边栏--}}
	@include('admin.public.nav')
	<div id="page-wrapper" class="gray-bg">
		{{--头部--}}
		@include('admin.public.header')
		<div class="wrapper wrapper-content">
			<div class="row animated fadeInRight">
				<div class="col-lg-12">
					<div class="ibox float-e-margins">
						<div class="text-center float-e-margins p-md">
							<span>打开/关闭颜色/背景或方向版本: </span>
							<a href="javascript:;" class="btn btn-xs btn-primary" id="lightVersion">轻型版本 </a>
							<a href="javascript:;" class="btn btn-xs btn-primary" id="darkVersion">黑色版本 </a>
							<a href="javascript:;" class="btn btn-xs btn-primary" id="leftVersion">左侧版本 </a>
						</div>
						<div class="ibox-content" id="ibox-content">

							<div id="vertical-timeline" class="vertical-container dark-timeline center-orientation">
								@foreach($list as $value)
								<div class="vertical-timeline-block">
									<div class="vertical-timeline-icon navy-bg">
										{{--<i class="fa fa-briefcase"></i>--}}
										<img src="{{asset('/').$value['photo']}}" alt="">
									</div>

									<div class="vertical-timeline-content">
										<h2>追梦小窝</h2>
										<p>{{$value['content']}}</p>
										<a href="JavaScript:;" class="btn btn-sm btn-primary"> 更多信息</a>
										<span class="vertical-date">
                                        时间 <br/>
                                        <small>{{date('Y-m-d H:i:s',$value['date'])}}</small>
                                    </span>
									</div>
								</div>
								@endforeach
								{{--<div class="vertical-timeline-block">--}}
									{{--<div class="vertical-timeline-icon blue-bg">--}}
										{{--<i class="fa fa-file-text"></i>--}}
									{{--</div>--}}

									{{--<div class="vertical-timeline-content">--}}
										{{--<h2>欧文</h2>--}}
										{{--<p>真理惟一可靠的标准就是永远自相符合</p>--}}
										{{--<a href="#" class="btn btn-sm btn-success"> 下载文件 </a>--}}
										{{--<span class="vertical-date">--}}
                                        {{--今天 <br/>--}}
                                        {{--<small>12月24日</small>--}}
                                    {{--</span>--}}
									{{--</div>--}}
								{{--</div>--}}

								{{--<div class="vertical-timeline-block">--}}
									{{--<div class="vertical-timeline-icon lazur-bg">--}}
										{{--<i class="fa fa-coffee"></i>--}}
									{{--</div>--}}

									{{--<div class="vertical-timeline-content">--}}
										{{--<h2>欧文</h2>--}}
										{{--<p>真理惟一可靠的标准就是永远自相符合</p>--}}
										{{--<a href="#" class="btn btn-sm btn-info">阅读更多</a>--}}
										{{--<span class="vertical-date"> 昨天 <br/><small>12月23日</small></span>--}}
									{{--</div>--}}
								{{--</div>--}}

								{{--<div class="vertical-timeline-block">--}}
									{{--<div class="vertical-timeline-icon yellow-bg">--}}
										{{--<i class="fa fa-phone"></i>--}}
									{{--</div>--}}

									{{--<div class="vertical-timeline-content">--}}
										{{--<h2>欧文</h2>--}}
										{{--<p>真理惟一可靠的标准就是永远自相符合</p>--}}
										{{--<span class="vertical-date">昨天 <br/><small>12月23日</small></span>--}}
									{{--</div>--}}
								{{--</div>--}}

								{{--<div class="vertical-timeline-block">--}}
									{{--<div class="vertical-timeline-icon lazur-bg">--}}
										{{--<i class="fa fa-user-md"></i>--}}
									{{--</div>--}}

									{{--<div class="vertical-timeline-content">--}}
										{{--<h2>欧文</h2>--}}
										{{--<p>真理惟一可靠的标准就是永远自相符合</p>--}}
										{{--<span class="vertical-date">昨天 <br/><small>12月23日</small></span>--}}
									{{--</div>--}}
								{{--</div>--}}

								{{--<div class="vertical-timeline-block">--}}
									{{--<div class="vertical-timeline-icon navy-bg">--}}
										{{--<i class="fa fa-comments"></i>--}}
									{{--</div>--}}

									{{--<div class="vertical-timeline-content">--}}
										{{--<h2>欧文</h2>--}}
										{{--<p>真理惟一可靠的标准就是永远自相符合</p>--}}
										{{--<span class="vertical-date">昨天 <br/><small>12月23日</small></span>--}}
									{{--</div>--}}
								{{--</div>--}}
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
<!-- Peity -->
<script src="{{asset('style/admin/inspinia/js/plugins/peity/jquery.peity.min.js')}}"></script>
<!-- Peity -->
<script src="{{asset('style/admin/inspinia/js/demo/peity-demo.js')}}"></script>
<script>
    $(document).ready(function(){

        // Local script for demo purpose only
        $('#lightVersion').click(function(event) {
            event.preventDefault();
            $('#ibox-content').removeClass('ibox-content');
            $('#vertical-timeline').removeClass('dark-timeline');
            $('#vertical-timeline').addClass('light-timeline');
        });

        $('#darkVersion').click(function(event) {
            event.preventDefault();
            $('#ibox-content').addClass('ibox-content');
            $('#vertical-timeline').removeClass('light-timeline');
            $('#vertical-timeline').addClass('dark-timeline');
        });

        $('#leftVersion').click(function(event) {
            event.preventDefault();
            $('#vertical-timeline').toggleClass('center-orientation');
        });


    });
</script>
</body>
</html>
