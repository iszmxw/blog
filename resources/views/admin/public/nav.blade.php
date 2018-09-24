<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="style/admin/inspinia/img/profile_small.jpg"/>
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{$user_data['nickname']}}</strong>
                             </span> <span class="text-muted text-xs block">管理员 <b class="caret"></b></span> </span>
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
            <li class="active">
                <a href="javascript:;">
                    <i class="fa fa-th-large"></i>
                    <span class="nav-label">系统管理</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li class="active"><a href="{{url('admin')}}">系统首页</a></li>
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