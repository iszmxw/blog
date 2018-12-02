<!--右侧侧边栏-->
<div class="row">
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
        <div class="contact-box">
            <ul class="tag-list" style="padding: 0">
                @foreach($sort as $key=>$val)
                    <li>
                        <a href="{{ url('category').'/'.$val['sid'] }}" target="_blank">{{ $val['sortname'] }}</a>
                    </li>
                @endforeach
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
    <!--分类-->
    <div class="col-lg-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>分组列表</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#">选项 1</a>
                        </li>
                        <li><a href="#">选项 2</a>
                        </li>
                    </ul>
                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content no-padding">
                <ul class="list-group">
                    <li class="list-group-item">
                        <span class="badge badge-primary">16</span>
                        分组列表
                    </li>
                    <li class="list-group-item ">
                        <span class="badge badge-info">12</span>
                        分组列表
                    </li>
                    <li class="list-group-item">
                        <span class="badge badge-danger">10</span>
                        分组列表
                    </li>
                    <li class="list-group-item">
                        <span class="badge badge-success">10</span>
                        分组列表
                    </li>
                    <li class="list-group-item">
                        <span class="badge badge-warning">7</span>
                        分组列表
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
