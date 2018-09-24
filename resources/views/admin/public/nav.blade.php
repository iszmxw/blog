<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="style/admin/inspinia/img/profile_small.jpg"/>
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">王宇</strong>
                             </span> <span class="text-muted text-xs block">管理员 <b class="caret"></b></span> </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="profile.html">个人信息</a></li>
                        <li><a href="contacts.html">好友</a></li>
                        <li><a href="mailbox.html">信箱</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">登出</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li>
                <a href="javascript:;">
                    <i class="fa fa-th-large"></i>
                    <span class="nav-label">系统管理</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level">
                    <li><a href="{{url('admin')}}">系统首页</a></li>
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