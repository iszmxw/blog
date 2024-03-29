<ul class="nav metismenu" id="side-menu">
	<li class="nav-header">
		<div class="dropdown profile-element">
			<span>
				<img alt="image" class="img-circle" src="{{ url('/').$user_data['photo'] }}" width="50" height="50" />
			</span>
		</div>
		<div class="logo-element">
			博客
		</div>
	</li>
	@foreach($nav as $key=>$val)
		@if($val['isdefault'] == 'y')
			<li class="menu">
				<a href="{{ $val['url'] }}">
					<i class="{{ $val['navicon'] }}"></i>
					<span class="nav-label">{{ $val['naviname'] }}</span>
					@if($val['sub_menu'])
					<span class="fa arrow"></span>
					@endif
				</a>
				@if($val['sub_menu'])
				<ul class="nav nav-second-level">
					@foreach($val['sub_menu'] as $k=>$v)
					<li @if($v['url'] == url()->current()) class="active" @endif>
						<a href="{{$v['url']}}">{{ $v['naviname'] }}</a>
					</li>
					@endforeach
				</ul>
				@endif
			</li>
		@else
			<li @if($val['url'] == url()->current()) class="active" @endif>
				<a href="{{ $val['url'] }}">
					<i class="{{ $val['navicon'] }}"></i>
					<span class="nav-label">{{ $val['naviname'] }}</span>
				</a>
			</li>
		@endif
	@endforeach
</ul>