<!--右侧侧边栏-->
<div class="row">
    <div class="col-lg-4">
        <div class="panel panel-primary">
            <div class="panel-heading">
                欢迎光临
            </div>
            <div class="panel-body">
                <p>欢迎来到追梦小窝的博客，有什么值得收藏的就拿去用吧，不客气，大部分内容来自互联网，如有侵犯版权请您注明来信，我将会第一时间妥善处理</p>
            </div>
        </div>
    </div>
    <!--关于我==自我介绍-->
    <div class="col-lg-4">
        <div class="contact-box">
            <a href="{{ url('profile') }}">
                <div class="col-sm-4">
                    <div class="text-center">
                        <img alt="image" class="img-circle m-t-xs img-responsive" src="{{ url('/').$user_data['photo'] }}">
                        <div class="m-t-xs font-bold">{{ $user_data['role'] }}</div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <h3><strong>{{ $user_data['nickname'] }}</strong></h3>
                    <p><i class="fa fa-envelope"></i> {{ $user_data['email'] }}</p>
                    <address>
                        <strong>签名：</strong><br>
                        {{ $user_data['description'] }}
                    </address>
                </div>
                <div class="clearfix"></div>
            </a>
        </div>
    </div>
    <!--系统统计-->
    <div class="col-md-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>友情链接</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        @foreach($link as $key=>$val)
                            <li>
                                <a href="{{ $val['siteurl'] }}" target="_blank" title="{{ $val['description'] }}">{{ $val['sitename'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content no-padding">
                <div class="contact-box">
                    <ul class="tag-list" style="padding: 0">
                        @foreach($link as $key=>$val)
                            <li>
                                <a href="{{ $val['siteurl'] }}" target="_blank" title="{{ $val['description'] }}">{{ $val['sitename'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!--分类-->
    <div class="col-lg-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>分类统计</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>

            <div class="ibox-content no-padding">
                <ul class="list-group">
                    @foreach($sort as $key=>$val)
                        <li class="list-group-item">
                            <span class="badge badge-primary">{{ $val['count'] }}</span>
                            <a href="{{ url('category').'/'.$val['sid'] }}" target="_blank" style="color:#000;">
                                {{ $val['sortname'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
