<ul class="nav metismenu" id="side-menu">
	<li class="nav-header">
		<div class="dropdown profile-element">
			<span>
				<img alt="image" class="img-circle" src="img/profile_small.jpg" />
			</span>
		</div>
		<div class="logo-element">
			博客
		</div>
	</li>
	@foreach($nav as $val)
	<li>
		<a href="{{ $val['url'] }}">
			<i class="fa fa-th-large"></i>
			<span class="nav-label">{{ $val['naviname'] }}</span>
			@if($val['sub_menu'])
			<span class="fa arrow"></span>
			@endif
		</a>
		@if($val['sub_menu'])
		<ul class="nav nav-second-level">
			@foreach($val['sub_menu'] as $k=>$v)
			<li><a href="{{$v['url']}}">{{ $v['naviname'] }}</a></li>
			@endforeach
		</ul>
		@endif
	</li>
	@endforeach
</ul>