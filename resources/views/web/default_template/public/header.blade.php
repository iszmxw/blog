<header>
	<div id="mnav">
		<h2><span class="navicon"></span></h2>
		<ul>
			@foreach($nav as $value)
			<li><a href="{{$value['url']}}" @if($value['newtab'] == 'y')target="_blank"@endif>{{$value['naviname']}}</a></li>
			@endforeach
		</ul>
	</div>
	<div class="topnav">
		<nav>
			<ul>
				@foreach($nav as $value)
					<li><a href="{{$value['url']}}">{{$value['naviname']}}</a></li>
				@endforeach
			</ul>
		</nav>
	</div>
</header>