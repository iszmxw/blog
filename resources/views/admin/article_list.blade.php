<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>追梦小窝 | 博客管理系统-文章列表</title>
    @include('admin.public.common_css')
    <link href="{{asset('style/admin/inspinia/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
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
                        <div class="ibox-content">
                            <h2>
                                文章列表
                            </h2>
                            <div class="alert alert-warning">
                                我的所有文章列表
                                <a href="{{url('admin')}}">返回首页</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>文章信息列表
                                <small>开始你的写作吧。</small>
                            </h5>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-sm-5 m-b-xs"><select class="input-sm form-control input-s-sm inline">
                                        <option value="0">选项 1</option>
                                        <option value="1">选项 2</option>
                                        <option value="2">选项 3</option>
                                        <option value="3">选项 4</option>
                                    </select>
                                </div>
                                <div class="col-sm-4 m-b-xs">
                                    <div data-toggle="buttons" class="btn-group">
                                        <label class="btn btn-sm btn-white"> <input type="radio" id="option1" name="options"> 天 </label>
                                        <label class="btn btn-sm btn-white active"> <input type="radio" id="option2" name="options"> 周 </label>
                                        <label class="btn btn-sm btn-white"> <input type="radio" id="option3" name="options"> 月 </label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="input-group"><input type="text" placeholder="请输入搜索内容" class="input-sm form-control"> <span class="input-group-btn">
                                        <button type="button" class="btn btn-sm btn-primary"> 搜索</button> </span></div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>

                                        <th></th>
                                        <th>项目 </th>
                                        <th>完成度 </th>
                                        <th>任务</th>
                                        <th>数据</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="checkbox"  checked class="i-checks" name="input[]"></td>
                                        <td>乐高玩具<small>例子</small></td>
                                        <td><span class="pie">0.52/1.561</span></td>
                                        <td>20%</td>
                                        <td>2017年12月12日</td>
                                        <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" class="i-checks" name="input[]"></td>
                                        <td>乐高玩具</td>
                                        <td><span class="pie">6,9</span></td>
                                        <td>40%</td>
                                        <td>2017年12月12日</td>
                                        <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" class="i-checks" name="input[]"></td>
                                        <td>乐高玩具</td>
                                        <td><span class="pie">3,1</span></td>
                                        <td>75%</td>
                                        <td>2017年12月12日</td>
                                        <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" class="i-checks" name="input[]"></td>
                                        <td>乐高玩具</td>
                                        <td><span class="pie">4,9</span></td>
                                        <td>18%</td>
                                        <td>2017年12月12日</td>
                                        <td><a href="#"><i class="fa fa-check text-navy"></i></a></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
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
<!-- iCheck -->
<script src="{{asset('style/admin/inspinia/js/plugins/iCheck/icheck.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });
    });
</script>
</body>
</html>
