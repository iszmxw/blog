<!--右侧侧边栏-->
<div class="row">
    {{--关于我==自我介绍--}}
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
    {{--微语说说--}}
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                站长动态
            </div>
            <div class="panel-body">
                <p>欢迎来到追梦小窝的博客，有什么值得收藏的就拿去用吧，不客气，大部分内容来自互联网，如有侵犯版权请您注明来信，我将会第一时间妥善处理</p>
            </div>
        </div>
    </div>
    {{--评论--}}
    <div class="col-lg-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>最新评论</h5>
                <div class="ibox-tools">
                    <span class="label label-warning-light pull-right">共10条评论</span>
                </div>
            </div>
            <div class="ibox-content">
                    <div class="feed-activity-list">

                        <div class="feed-element">
                            <a href="profile.html" class="pull-left">
                                <img alt="image" class="img-circle" src="img/profile.jpg">
                            </a>
                            <div class="media-body ">
                                <small class="pull-right">5分钟</small>
                                <strong>小王</strong> 晚上要一起去吃饭吗 <br>
                                <small class="text-muted">2017.12.12 12:00</small>

                            </div>
                        </div>

                        <div class="feed-element">
                            <a href="profile.html" class="pull-left">
                                <img alt="image" class="img-circle" src="img/a2.jpg">
                            </a>
                            <div class="media-body ">
                                <small class="pull-right">2个月</small>
                                <strong>小王</strong> 查看了 <strong>晚上睡觉有必要把路由器关掉么？</strong><br>
                                <small class="text-muted">2017.12.12 12:00</small>
                            </div>
                        </div>
                        <div class="feed-element">
                            <a href="profile.html" class="pull-left">
                                <img alt="image" class="img-circle" src="img/a3.jpg">
                            </a>
                            <div class="media-body ">
                                <small class="pull-right">2小时</small>
                                <strong>小王</strong> 查看了 <strong>晚上睡觉有必要把路由器关掉么？</strong>.<br>
                                <small class="text-muted">2017.12.12 12:00</small>
                            </div>
                        </div>
                        <div class="feed-element">
                            <a href="profile.html" class="pull-left">
                                <img alt="image" class="img-circle" src="img/a4.jpg">
                            </a>
                            <div class="media-body ">
                                <small class="pull-right text-navy">5小时</small>
                                <strong>小王</strong> 查看了 <strong>晚上睡觉有必要把路由器关掉么？</strong><br>
                                <small class="text-muted">2017.12.12 12:00</small>
                                <div class="actions">
                                    <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> 赞 </a>
                                    <a class="btn btn-xs btn-white"><i class="fa fa-heart"></i> 喜欢</a>
                                </div>
                            </div>
                        </div>
                        <div class="feed-element">
                            <a href="profile.html" class="pull-left">
                                <img alt="image" class="img-circle" src="img/a5.jpg">
                            </a>
                            <div class="media-body ">
                                <small class="pull-right">2小时</small>
                                <strong>小王</strong> 评论了 <strong>晚上睡觉有必要把路由器关掉么？</strong><br>
                                <small class="text-muted">2017.12.12 12:00</small>
                                <div class="well">
                                    人生就好像你搭乘一辆火车，沿途有不同的景色，不同的站台，和不同的人上车，也会过了这个景点到下一个景点，到下一个站台，不同的人上下车，那些都是过客，重要的是自己的旅程。
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> 赞 </a>
                                </div>
                            </div>
                        </div>
                        <div class="feed-element">
                            <a href="profile.html" class="pull-left">
                                <img alt="image" class="img-circle" src="img/profile.jpg">
                            </a>
                            <div class="media-body ">
                                <small class="pull-right">23h ago</small>
                                <strong>小王</strong> 评论了 <strong>晚上睡觉有必要把路由器关掉么？</strong><br>
                                <small class="text-muted">2017.12.12 12:00</small>
                            </div>
                        </div>
                        <div class="feed-element">
                            <a href="profile.html" class="pull-left">
                                <img alt="image" class="img-circle" src="img/a7.jpg">
                            </a>
                            <div class="media-body ">
                                <small class="pull-right">46h ago</small>
                                <strong>小王</strong> 评论了 <strong>晚上睡觉有必要把路由器关掉么？</strong><br>
                                <small class="text-muted">2017.12.12 12:00</small>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block m-t"><i class="fa fa-arrow-down"></i> 加载更多</button>
            </div>
        </div>

    </div>
    {{--友情链接--}}
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
    {{--分类统计--}}
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
