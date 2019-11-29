<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>追梦小窝 | 后台首页</title>
    @include('admin.public.common_css')
    <link href="{{asset('style/admin/inspinia/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
    <link href="{{asset('style/admin/inspinia/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}"
          rel="stylesheet">
    <!-- 引入element-ui样式 -->
    <link rel="stylesheet" href="{{asset('style/admin/element-ui/css/index.css')}}">
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
                                导航列表
                            </h2>
                            <div class="alert alert-warning">
                                首页导航栏目设置
                                <a href="{{url('admin')}}">返回首页</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div id="app" class="ibox">
                        <div class="ibox-title">
                            <h5>网站导航列表</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-sm-3">
                                    <a href="JavaScript:;" class="btn btn-primary" onclick="add_alert()">添加导航</a>
                                    <el-button type="primary" @click="dialogFormVisible = true">添加导航</el-button>
                                </div>
                            </div>
                            <br>
                            <div class="dd" id="nestable2">
                                <input type="hidden" id="navbar_sort" value="{{ url('admin/ajax/navbar_sort') }}">
                                <input type="hidden" id="_token" value="{{csrf_token()}}">
                                <ol class="dd-list">
                                    @foreach($navi as $key=>$val)
                                        <li class="dd-item" data-id="{{ $val['id'] }}">
                                            <div class="dd-handle">
											<span class="pull-right">
												<button class="dd-nodrag btn btn-xs btn-info" type="button"
                                                        onclick="EditData('{{$val['id']}}')"><i class="fa fa-edit"></i>&nbsp;&nbsp;编辑</button>
												<button class="dd-nodrag btn btn-xs btn-danger" type="button"
                                                        onclick="deleted('{{$val['id']}}')"><i class="fa fa-times"></i>&nbsp;&nbsp;删除</button>
											</span>
                                                <span class="label label-info"><i
                                                            class="fa fa-link"></i></span> {{ $val['nav_name'] }}
                                            </div>

                                            <ol class="dd-list">
                                                @foreach($val['sub_menu'] as $k=>$v)
                                                    <li class="dd-item" data-id="{{$v['id']}}">
                                                        <div class="dd-handle">
													<span class="pull-right">
														<button class="dd-nodrag btn btn-xs btn-info" type="button"
                                                                onclick="EditData('{{$v['id']}}')"><i
                                                                    class="fa fa-edit"></i>&nbsp;&nbsp;编辑</button>
														<button class="dd-nodrag btn btn-xs btn-danger" type="button"
                                                                onclick="deleted('{{$v['id']}}')"><i
                                                                    class="fa fa-times"></i>&nbsp;&nbsp;删除</button>
													</span>
                                                            <span class="label label-info"><i
                                                                        class="fa fa-link"></i></span> {{ $v['nav_name'] }}
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ol>
                                        </li>
                                    @endforeach
                                </ol>
                            </div>
                            {{--<div class="m-t-md">--}}
                            {{--<h5>序列化输出</h5>--}}
                            {{--</div>--}}
                            {{--<textarea id="nestable2-output" class="form-control"></textarea>--}}


                        </div>


                        <el-dialog title="收货地址" :visible.sync="dialogFormVisible">
                            <el-form ref="form" :model="form" label-width="80px">
                                <el-form-item label="活动名称">
                                    <el-input v-model="form.name"></el-input>
                                </el-form-item>
                                <el-form-item label="活动区域">
                                    <el-select v-model="form.region" placeholder="请选择活动区域">
                                        <el-option label="区域一" value="shanghai"></el-option>
                                        <el-option label="区域二" value="beijing"></el-option>
                                    </el-select>
                                </el-form-item>
                                <el-form-item label="活动时间">
                                    <el-col :span="11">
                                        <el-date-picker type="date" placeholder="选择日期" v-model="form.date1"
                                                        style="width: 100%;"></el-date-picker>
                                    </el-col>
                                    <el-col class="line" :span="2">-</el-col>
                                    <el-col :span="11">
                                        <el-time-picker placeholder="选择时间" v-model="form.date2"
                                                        style="width: 100%;"></el-time-picker>
                                    </el-col>
                                </el-form-item>
                                <el-form-item label="即时配送">
                                    <el-switch v-model="form.delivery"></el-switch>
                                </el-form-item>
                                <el-form-item label="活动性质">
                                    <el-checkbox-group v-model="form.type">
                                        <el-checkbox label="美食/餐厅线上活动" name="type"></el-checkbox>
                                        <el-checkbox label="地推活动" name="type"></el-checkbox>
                                        <el-checkbox label="线下主题活动" name="type"></el-checkbox>
                                        <el-checkbox label="单纯品牌曝光" name="type"></el-checkbox>
                                    </el-checkbox-group>
                                </el-form-item>
                                <el-form-item label="特殊资源">
                                    <el-radio-group v-model="form.resource">
                                        <el-radio label="线上品牌商赞助"></el-radio>
                                        <el-radio label="线下场地免费"></el-radio>
                                    </el-radio-group>
                                </el-form-item>
                                <el-form-item label="活动形式">
                                    <el-input type="textarea" v-model="form.desc"></el-input>
                                </el-form-item>
                                <el-form-item>
                                    <el-button type="primary" @click="onSubmit">立即创建</el-button>
                                    <el-button>取消</el-button>
                                </el-form-item>
                            </el-form>
                        </el-dialog>
                    </div>
                </div>
            </div>

        </div>
        {{--底部--}}
        @include('admin.public.footer')
    </div>
</div>
{{--添加数据框--}}
<div class="modal inmodal fade" id="add_data" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{url('admin/ajax/navbar_add_check')}}" id="post_url">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="url_type" class="url_type" value="1">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">添加导航栏</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-lg-6">
                            <h3>是否隐藏</h3>
                            <input type="checkbox" name="hide" value="0" class="js-switch"/>
                        </div>
                        <div class="col-lg-6">
                            <h3>是否新窗口打开</h3>
                            <input type="checkbox" name="new_tab" value="1" class="js-switch_2" checked/>
                        </div>
                    </div>
                    <div style="clear: both;  padding-top: 15px;"></div>
                    <div class="form-group">
                        <label class="control-label">是否根目录</label>
                        <select class="form-control m-b" name="is_root">
                            <option value="0" selected="selected">否</option>
                            <option value="1">是</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">上级导航栏</label>
                        <select class="form-control m-b" name="pid">
                            <option value="0" selected="selected">无</option>
                            @foreach($navi as $val)
                                <option value="{{ $val['id'] }}">{{ $val['nav_name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">导航栏名称</label>
                        <input type="text" placeholder="导航栏名称" name="nav_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label">导航栏ICON</label>
                        <input type="text" placeholder="导航栏ICON" name="navicon" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="tabs-container">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#tab-1" onclick="SetType(1)"><i
                                                class="fa fa-cog"></i>&nbsp;系统地址</a>
                                </li>
                                <li class=""><a data-toggle="tab" href="#tab-2" onclick="SetType(2)"><i
                                                class="fa fa-link"></i>&nbsp;手动输入</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="panel-body">
                                        <label class="control-label">系统地址</label>
                                        <select class="form-control m-b" name="system_url" onchange="SetType(1)">
                                            <option value="0" selected="selected">请选择</option>
                                            @foreach($category as $val)
                                                <option value="{{ $val['id'] }}">{{ $val['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div id="tab-2" class="tab-pane">
                                    <div class="panel-body">
                                        <label class="control-label">地址</label>
                                        <input type="text" placeholder="地址" name="url" class="form-control"
                                               onblur="SetType(2)">
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-primary" onclick="add_data()">添加数据</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--编辑数据框--}}
<div class="modal inmodal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{url('admin/ajax/navbar_data_edit_check')}}" id="currentForm">
                <input type="hidden" name="id" id="id">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="url_type" class="url_type" value="1">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                                aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">编辑导航栏是</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">是否根目录</label>
                        <select class="form-control m-b" name="is_root" id="is_root">
                            <option value="0">否</option>
                            <option value="1">是</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">上级导航栏</label>
                        <select class="form-control m-b" name="pid" id="nav_pid">
                            <option value="0" selected="selected">无</option>
                            @foreach($navi as $val)
                                <option value="{{ $val['id'] }}">{{ $val['nav_name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label">导航栏名称</label>
                        <input type="text" placeholder="导航栏名称" name="nav_name" id="nav_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label">导航栏ICON</label>
                        <input type="text" placeholder="导航栏ICON" name="navicon" id="navicon" class="form-control">
                    </div>
                    <div class="form-group">
                        <div class="tabs-container">
                            <ul class="nav nav-tabs">
                                <li class="active" id="switch-1"><a data-toggle="tab" href="#tabs-1"><i
                                                class="fa fa-cog"></i>&nbsp;系统地址</a></li>
                                <li class="" id="switch-2"><a data-toggle="tab" href="#tabs-2"><i
                                                class="fa fa-link"></i>&nbsp;手动输入</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tabs-1" class="tab-pane active">
                                    <div class="panel-body">
                                        <label class="control-label">系统地址</label>
                                        <select class="form-control m-b" name="system_url" id="system_url"
                                                onchange="SetType(1)">
                                            <option value="0" selected="selected">请选择</option>
                                            @foreach($category as $val)
                                                <option value="{{ $val['id'] }}">{{ $val['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div id="tabs-2" class="tab-pane">
                                    <div class="panel-body">
                                        <label class="control-label">地址</label>
                                        <input type="text" placeholder="地址" name="url" id="url" class="form-control"
                                               onblur="SetType(2)">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">更多选项</label>
                        <div class="col-sm-10">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="new_tab" value="1" id="inlineCheckbox1">新窗口
                            </label>
                            <label class="checkbox-inline">
                                <input type="checkbox" name="hide" value="1" id="inlineCheckbox2">隐藏
                            </label>
                        </div>
                    </div>
                    <div style="clear: both;  padding-top: 15px;"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                    <button type="button" class="btn btn-primary" onclick="SaveData()">保存更改</button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('admin.public.common_js')
<!-- 引入Vuejs -->
<script src="{{asset('style/admin/element-ui/js/vue.js')}}"></script>
<!-- 引入element-ui组件库 -->
<script src="{{asset('style/admin/element-ui/js/index.js')}}"></script>
<!-- Switchery -->
<script src="{{asset('style/admin/inspinia/js/plugins/switchery/switchery.js')}}"></script>
<!-- Nestable List -->
<script src="{{asset('style/admin/inspinia/js/plugins/nestable/jquery.nestable.js')}}"></script>
<script>
    let elem = document.querySelector('.js-switch');
    let elem_2 = document.querySelector('.js-switch_2');
    new Switchery(elem, {color: '#1AB394'});
    new Switchery(elem_2, {color: '#1AB394'});
    let updateOutput = function (e) {
        let list = e.length ? e : $(e.target);
        if (window.JSON) {
            let url = $("#navbar_sort").val();
            let _token = $("#_token").val();
            let json = eval("(" + window.JSON.stringify(list.nestable('serialize')) + ")");
            let data = {'_token': _token, 'data': json};
            $.post(url, data, function (json) {
                toastr.success(json.msg);
            });
        } else {
            toastr.success('这个演示需要JSON浏览器支持。');
        }
    };
    // 对嵌套的表2
    $('#nestable2').nestable({
        group: 1
    }).on('change', updateOutput);

    // 利用element-ui的表单组件
    var vm = new Vue({
        el: '#app',
        data: function () {
            return {
                dialogFormVisible: false,
                form: {
                    name: '',
                    region: '',
                    date1: '',
                    date2: '',
                    delivery: false,
                    type: [],
                    resource: '',
                    desc: ''
                }
            }
        },
        onSubmit() {
            console.log(this.data)
        }
    });
</script>
<script>
    //显示添加数据框
    function add_alert() {
        $("#add_data").modal();
    }

    // 修改导航栏链接类型
    function SetType(type) {
        $(".url_type").val(type);
    }

    // 添加分类
    function add_data() {
        let target = $("#post_url");
        let url = target.attr("action");
        let data = target.serialize();
        $.post(url, data, function (json) {
            if (json.code === 200) {
                swal({
                    title: "提示信息",
                    text: json.msg,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "确定",
                }, function () {
                    window.location.reload();
                });
            } else {
                swal({
                    title: "提示信息",
                    text: json.msg,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "确定"
                });
            }
        });
    }

    //因为冒泡了，会执行到下面的方法。
    function stopPropagation(e) {
        let ev = e || window.event;
        if (ev.stopPropagation) {
            ev.stopPropagation();
        } else if (window.event) {
            window.event.cancelBubble = true;//兼容IE
        }
    }

    // 获取分类数据
    function EditData(id, e) {
        stopPropagation(e);
        let url = "{{url('admin/ajax/navbar_data')}}";
        let data = {'_token': "{{csrf_token()}}", 'id': id};
        $.post(url, data, function (json) {
            if (json.code === 200) {
                // 移除多余样式
                $(".switchery").remove();
                $("#id").val(json.data.id);
                $(".url_type").val(json.data.type);
                $("#nav_name").val(json.data.nav_name);
                $("#navicon").val(json.data.navicon);
                $("#is_root option[value='" + json.data.is_root + "']").attr("selected", "selected");
                $("#nav_pid option[value='" + json.data.pid + "']").attr("selected", "selected");
                if (json.data.type === 1) {
                    // 先移除所有样式
                    $("#switch-2").removeClass("active");
                    $("#tabs-2").removeClass("active");
                    // 在做修改动作
                    $("#switch-1").addClass("active");
                    $("#tabs-1").addClass("active");
                    $("#system_url option[value='" + json.data.type_id + "']").attr("selected", "selected");
                } else {
                    // 先移除所有样式
                    $("#switch-1").removeClass("active");
                    $("#tabs-1").removeClass("active");
                    // 在做修改动作
                    $("#switch-2").addClass("active");
                    $("#tabs-2").addClass("active");
                    $("#url").val(json.data.url);
                }
                if (json.data.new_tab === 1) {
                    $("#inlineCheckbox1").attr("checked", 'checked');
                } else {
                    $("#inlineCheckbox1").attr("checked", false);
                }
                if (json.data.hide === 1) {
                    $("#inlineCheckbox2").attr("checked", 'checked');
                } else {
                    $("#inlineCheckbox2").attr("checked", false);
                }
                $("#myModal").modal();
            } else {
                swal("失败", json.msg, "error");
                setInterval(function () {
                    window.location.reload();
                }, 3000);
            }
        });
    }

    //保存数据
    function SaveData() {
        let target = $("#currentForm");
        let url = target.attr("action");
        let data = target.serialize();
        $.post(url, data, function (json) {
            if (json.code === 200) {
                swal({
                    title: "提示信息",
                    text: json.msg,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "确定",
                }, function () {
                    window.location.reload();
                });
            } else {
                swal({
                    title: "提示信息",
                    text: json.msg,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "确定"
                });
            }
        });
    }

    //删除友情链接数据
    function deleted(id) {
        let url = "{{url('admin/ajax/navbar_delete_check')}}";
        let data = {'_token': '{{csrf_token()}}', 'id': id};
        swal({
                title: "你确定？",
                text: "你将无法恢复这条数据！",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "删除",
                cancelButtonText: "取消",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.post(url, data, function (json) {
                        if (json.code === 200) {
                            swal("删除", json.msg, "success");
                            setInterval(function () {
                                window.location.reload();
                            }, 1500);
                        } else {
                            swal("操作失败", json.msg, "error");
                        }
                    });
                } else {
                    swal("取消", "您已取消了删除", "error");
                    setInterval(function () {
                        window.location.reload();
                    }, 1500);
                }
            });
    }
</script>
</body>
</html>
