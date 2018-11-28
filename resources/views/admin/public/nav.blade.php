<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span>
                        @if($user_data['photo'])
                            <img alt="image" class="img-circle" src="{{ url('/').$user_data['photo'] }}"/>
                        @else
                            <img alt="image" class="img-circle" src="{{url('style/admin/inspinia/img/profile_small.jpg')}}"/>
                        @endif
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear">
                                <span class="block m-t-xs">
                                    <strong class="font-bold">{{$user_data['nickname']}}</strong>
                                </span>
                                <span class="text-muted text-xs block">
                                    管理员
                                    <b class="caret"></b>
                                </span>
                            </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="{{url('admin/profile')}}l">个人信息</a></li>
                        <li class="divider"></li>
                        <li><a href="{{url('admin/quit')}}">登出</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    小窝
                </div>
            </li>
            <li @if(Request::path() == 'admin' || Request::path() == 'admin/config' || Request::path() == 'admin/view_log') class="active" @endif>
                <a href="javascript:;">
                    <i class="fa fa-desktop"></i>
                    <span class="nav-label">系统管理</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li @if(Request::path() == 'admin') class="active" @endif>
                        <a href="{{url('admin')}}">系统首页</a>
                    </li>
                    <li @if(Request::path() == 'admin/config') class="active" @endif>
                        <a href="{{url('admin/config')}}">系统设置</a>
                    </li>
                    <li @if(Request::path() == 'admin/view_log') class="active" @endif>
                        <a href="{{url('admin/view_log')}}">访客记录</a>
                    </li>
                </ul>
            </li>
            <li @if(Request::path() == 'admin/category/category_list' || Request::path() == 'admin/category/navbar_list') class="active" @endif>
                <a href="javascript:;">
                    <i class="fa fa-th-large"></i>
                    <span class="nav-label">栏目管理</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li @if(Request::path() == 'admin/category/category_list') class="active" @endif>
                        <a href="{{url('admin/category/category_list')}}">栏目列表</a>
                    </li>
                    <li @if(Request::path() == 'admin/category/navbar_list') class="active" @endif>
                        <a href="{{url('admin/category/navbar_list')}}">导航列表</a>
                    </li>
                </ul>
            </li>

            <li @if(Request::path() == 'admin/article/article_add' || Request::path() == 'admin/article/article_list' || Request::path() == 'admin/article/article_edit') class="active" @endif>
                <a href="javascript:;">
                    <i class="fa fa-building"></i>
                    <span class="nav-label">文章管理</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li @if(Request::path() == 'admin/article/article_add') class="active" @endif>
                        <a href="{{url('admin/article/article_add')}}">撰写文章</a>
                    </li>
                    <li @if(Request::path() == 'admin/article/article_list') class="active" @endif>
                        <a href="{{url('admin/article/article_list')}}">文章列表</a>
                    </li>
                </ul>
            </li>

            <li @if(Request::path() == 'admin/plugins/twitter_list' || Request::path() == 'admin/plugins/tag_list' || Request::path() == 'admin/plugins/comment_list' || Request::path() == 'admin/plugins/link_list') class="active" @endif>
                <a href="javascript:;">
                    <i class="fa fa-cloud"></i>
                    <span class="nav-label">云拓展</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li @if(Request::path() == 'admin/plugins/twitter_list') class="active" @endif>
                        <a href="{{url('admin/plugins/twitter_list')}}">说说列表</a>
                    </li>
                    <li @if(Request::path() == 'admin/plugins/tag_list') class="active" @endif>
                        <a href="{{url('admin/plugins/tag_list')}}">标签列表</a>
                    </li>
                    <li @if(Request::path() == 'admin/plugins/comment_list') class="active" @endif>
                        <a href="{{url('admin/plugins/comment_list')}}">评论列表</a>
                    </li>
                    <li @if(Request::path() == 'admin/plugins/link_list') class="active" @endif>
                        <a href="{{url('admin/plugins/link_list')}}">友情链接</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{url('admin/quit')}}">
                    <i class="fa fa-star"></i>
                    <span class="nav-label">退出</span>
                </a>
            </li>
        </ul>

    </div>
</nav>