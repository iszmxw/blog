<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>追梦小窝 | 系统</title>
    @include('admin.public.common_css')
</head>
<body class="">
<div id="wrapper">
    {{--侧边栏--}}
    @include('admin.public.nav')
    <div id="page-wrapper" class="gray-bg">
        {{--头部--}}
        @include('admin.public.header')
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>基本设置
                                <small>站点的基本设置。</small>
                            </h5>
                        </div>
                        <div class="ibox-content">
                            <form method="get" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">站点标题：</label>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="站点标题" class="form-control">
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">站点副标题：</label>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="站点副标题" class="form-control">
                                        <span class="help-block m-b-none">__生活 随笔 记录点点滴滴</span>
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">站点地址：</label>
                                    <div class="col-sm-10">
                                        <input type="url" placeholder="站点地址" class="form-control" name="app_url">
                                    </div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ICP备案号：</label>
                                    <div class="col-sm-10">
                                        <input type="text" placeholder="ICP备案号" class="form-control"></div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">首页底部信息：</label>
                                    <div class="col-sm-10">
                                        <textarea name="tongji" rows="10" placeholder="(支持html，可用于添加流量统计代码)" style="width:70%"></textarea>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-primary" type="submit">保存更改</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--底部--}}
        @include('admin.public.footer')
    </div>
</div>
@include('admin.public.common_js')
</body>
</html>
