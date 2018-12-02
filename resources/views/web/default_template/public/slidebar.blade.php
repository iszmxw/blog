<!--右侧侧边栏-->
<div class="col-lg-4">
            {{--关于我==自我介绍--}}
            <div class="col-lg-12">
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
            {{--微语说说--}}
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        站长最新说说动态
                    </div>
                    <div class="panel-body">
                        <br>
                        <p>欢迎来到追梦小窝的博客，有什么值得收藏的就拿去用吧，不客气，大部分内容来自互联网，如有侵犯版权请您注明来信，我将会第一时间妥善处理</p>
                        <br>
                        <button class="btn btn-primary btn-block m-t"><i class="fa fa-arrow-down"></i> 查看更多</button>
                    </div>
                </div>
            </div>
            {{--分类统计--}}
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>分类统计</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
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
            {{--评论--}}
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>最新评论</h5>
                        <div class="ibox-tools">
                            <span class="label label-warning-light pull-right">共{{ $site_info['comments'] }}条评论</span>
                        </div>
                    </div>
                    <div class="ibox-content">
                            <div class="feed-activity-list">
                                @foreach($comment as $key=>$val)
                                <div class="feed-element">
                                    <a href="javascript:;" class="pull-left">
                                        <img alt="image" class="img-circle" src="http://q1.qlogo.cn/g?b=qq&nk={{ $val['mail'] }}&s=640">
                                    </a>
                                    <div class="media-body ">
                                        <small class="pull-right">{{ date('Y-m-m H:i:s',$val['date']) }}</small>
                                        <strong>{{ $val['poster'] }}</strong> 评论了 <strong>{{ $val['blog_title'] }}</strong><br>
                                        <small class="text-muted">来自：{{ $val['ip'] }}</small>
                                        <div class="well">
                                            {{ $val['comment'] }}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                    </div>
                </div>

            </div>
            {{--友情链接--}}
            <div class="col-md-12">
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
            {{--站点统计--}}
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>站点统计</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content no-padding">
                        <ul class="list-group">
                            <li class="list-group-item">
                                文章总数：
                                <span class="label label-info">{{ $site_info['blogs'] }}篇</span>
                            </li>
                            <li class="list-group-item">
                                微语总数：
                                <span class="label label-primary">{{ $site_info['twitters'] }}条</span>
                            </li>
                            <li class="list-group-item">
                                评论总数：
                                <span class="label label-success">{{ $site_info['comments'] }}条</span>
                            </li>
                            <li class="list-group-item">
                                运行天数:
                                <span class="label label-danger">{{ $site_info['naissance'] }}天</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
</div>
