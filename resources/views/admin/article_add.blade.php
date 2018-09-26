<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>追梦小窝 | 后台首页</title>
    @include('admin.public.common_css')
    <link href="{{asset('style/admin/inspinia/css/plugins/summernote/summernote.css')}}" rel="stylesheet">
    <link href="{{asset('style/admin/inspinia/css/plugins/summernote/summernote-bs3.css')}}" rel="stylesheet">
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
                                撰写文章
                            </h2>
                            <div class="alert alert-warning">
                                在下面的输入框中开始编写你的文章
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
                            <h5>文章基本信息
                                <small>开始你的写作吧。</small>
                            </h5>
                        </div>
                        <div class="ibox-content">
                            <form method="get" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-2 control-label">标题</label>

                                    <div class="col-sm-10"><input type="text" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">选择栏目</label>
                                    <div class="col-sm-10">
                                        <select class="form-control m-b" name="account">
                                            <option>选项 1</option>
                                            <option>选项 2</option>
                                            <option>选项 3</option>
                                            <option>选项 4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">辅助文本</label>
                                    <div class="col-sm-10"><input type="text" class="form-control"> <span
                                                class="help-block m-b-none">这里可以显示说明、帮助、描述等信息</span>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">密码</label>

                                    <div class="col-sm-10"><input type="password" class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">占位符</label>

                                    <div class="col-sm-10"><input type="text" placeholder="占位符" class="form-control">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-lg-2 control-label">禁用</label>

                                    <div class="col-lg-10"><input type="text" disabled="" placeholder="禁用输入..."
                                                                  class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-lg-2 control-label">静态控制</label>

                                    <div class="col-lg-10"><p class="form-control-static">email@example.com</p></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">复选框和radios <br/>
                                        <small class="text-navy">正常引导元素</small>
                                    </label>

                                    <div class="col-sm-10">
                                        <div><label> <input type="checkbox" value=""> 必选项 </label></div>
                                        <div><label> <input type="radio" checked="" value="option1" id="optionsRadios1"
                                                            name="optionsRadios"> 未选中 </label></div>
                                        <div><label> <input type="radio" value="option2" id="optionsRadios2"
                                                            name="optionsRadios"> 选中 </label></div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">内联复选框</label>

                                    <div class="col-sm-10"><label class="checkbox-inline"> <input type="checkbox"
                                                                                                  value="option1"
                                                                                                  id="inlineCheckbox1">
                                            a </label> <label class="checkbox-inline">
                                            <input type="checkbox" value="option2" id="inlineCheckbox2"> b </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" value="option3" id="inlineCheckbox3"> c </label>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">复选框 &amp; radios <br/>
                                        <small class="text-navy">自定义元素</small>
                                    </label>

                                    <div class="col-sm-10">
                                        <div class="i-checks"><label> <input type="checkbox" value=""> <i></i> 选项一
                                            </label></div>
                                        <div class="i-checks"><label> <input type="checkbox" value="" checked="">
                                                <i></i> 选项二 </label></div>
                                        <div class="i-checks"><label> <input type="checkbox" value="" disabled=""
                                                                             checked=""> <i></i> 选项三检查和禁用 </label></div>
                                        <div class="i-checks"><label> <input type="checkbox" value="" disabled="">
                                                <i></i> 选项四禁用 </label></div>
                                        <div class="i-checks"><label> <input type="radio" value="option1" name="a">
                                                <i></i> 选项一 </label></div>
                                        <div class="i-checks"><label> <input type="radio" checked="" value="option2"
                                                                             name="a"> <i></i> 选项二 </label></div>
                                        <div class="i-checks"><label> <input type="radio" disabled="" checked=""
                                                                             value="option2"> <i></i> 选项三检查和禁用 </label>
                                        </div>
                                        <div class="i-checks"><label> <input type="radio" disabled="" name="a"> <i></i>
                                                选项四禁用 </label></div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">内联复选框</label>

                                    <div class="col-sm-10"><label class="checkbox-inline i-checks"> <input
                                                    type="checkbox" value="option1">a </label>
                                        <label class="checkbox-inline i-checks"> <input type="checkbox" value="option2">
                                            b </label>
                                        <label class="checkbox-inline i-checks"> <input type="checkbox" value="option3">
                                            c </label></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group has-success"><label class="col-sm-2 control-label">输入成功</label>

                                    <div class="col-sm-10"><input type="text" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group has-warning"><label class="col-sm-2 control-label">输入警告</label>

                                    <div class="col-sm-10"><input type="text" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group has-error"><label class="col-sm-2 control-label">输入错误</label>

                                    <div class="col-sm-10"><input type="text" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">控制大小</label>

                                    <div class="col-sm-10"><input type="text" placeholder=".input-lg"
                                                                  class="form-control input-lg m-b">
                                        <input type="text" placeholder="Default input" class="form-control m-b"> <input
                                                type="text" placeholder=".input-sm" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">列尺寸</label>

                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-md-2"><input type="text" placeholder=".col-md-2"
                                                                         class="form-control"></div>
                                            <div class="col-md-3"><input type="text" placeholder=".col-md-3"
                                                                         class="form-control"></div>
                                            <div class="col-md-4"><input type="text" placeholder=".col-md-4"
                                                                         class="form-control"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">输入组</label>

                                    <div class="col-sm-10">
                                        <div class="input-group m-b"><span class="input-group-addon">@</span> <input
                                                    type="text" placeholder="用户名" class="form-control"></div>
                                        <div class="input-group m-b"><input type="text" class="form-control"> <span
                                                    class="input-group-addon">.00</span></div>
                                        <div class="input-group m-b"><span class="input-group-addon">$</span> <input
                                                    type="text" class="form-control"> <span class="input-group-addon">.00</span>
                                        </div>
                                        <div class="input-group m-b"><span class="input-group-addon"> <input
                                                        type="checkbox"> </span> <input type="text"
                                                                                        class="form-control"></div>
                                        <div class="input-group"><span class="input-group-addon"> <input type="radio"> </span>
                                            <input type="text" class="form-control"></div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">按钮插件</label>

                                    <div class="col-sm-10">
                                        <div class="input-group m-b"><span class="input-group-btn">
                                            <button type="button" class="btn btn-primary">搜索</button> </span> <input
                                                    type="text" class="form-control">
                                        </div>
                                        <div class="input-group"><input type="text" class="form-control"> <span
                                                    class="input-group-btn"> <button type="button"
                                                                                     class="btn btn-primary">搜索
                                        </button> </span></div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">下拉菜单</label>

                                    <div class="col-sm-10">
                                        <div class="input-group m-b">
                                            <div class="input-group-btn">
                                                <button data-toggle="dropdown" class="btn btn-white dropdown-toggle"
                                                        type="button">操作 <span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">操作</a></li>
                                                    <li><a href="#">复制</a></li>
                                                    <li><a href="#">粘贴</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#">收藏</a></li>
                                                </ul>
                                            </div>
                                            <input type="text" class="form-control"></div>
                                        <div class="input-group"><input type="text" class="form-control">

                                            <div class="input-group-btn">
                                                <button data-toggle="dropdown" class="btn btn-white dropdown-toggle"
                                                        type="button">操作 <span class="caret"></span></button>
                                                <ul class="dropdown-menu pull-right">
                                                    <li><a href="#">操作</a></li>
                                                    <li><a href="#">复制</a></li>
                                                    <li><a href="#">粘贴</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#">收藏</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">分段</label>

                                    <div class="col-sm-10">
                                        <div class="input-group m-b">
                                            <div class="input-group-btn">
                                                <button tabindex="-1" class="btn btn-white" type="button">操作</button>
                                                <button data-toggle="dropdown" class="btn btn-white dropdown-toggle"
                                                        type="button"><span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">操作</a></li>
                                                    <li><a href="#">复制</a></li>
                                                    <li><a href="#">粘贴</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#">收藏</a></li>
                                                </ul>
                                            </div>
                                            <input type="text" class="form-control"></div>
                                        <div class="input-group"><input type="text" class="form-control">

                                            <div class="input-group-btn">
                                                <button tabindex="-1" class="btn btn-white" type="button">操作</button>
                                                <button data-toggle="dropdown" class="btn btn-white dropdown-toggle"
                                                        type="button"><span class="caret"></span></button>
                                                <ul class="dropdown-menu pull-right">
                                                    <li><a href="#">操作</a></li>
                                                    <li><a href="#">复制</a></li>
                                                    <li><a href="#">粘贴</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#">收藏</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white" type="submit">取消</button>
                                        <button class="btn btn-primary" type="submit">保存更改</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    {{--富文本編輯器--}}
                    <div class="ibox float-e-margins">
                        <div class="ibox-content no-padding">
                            <div class="summernote">
                                <h3>超级简单的所见即所得编辑器</h3>
                                超级简单的所见即所得编辑器超级简单的所见即所得编辑器超级简单的所见即所得编辑器超级简单的所见即所得编辑器超级简单的所见即所得编辑器超级简单的所见即所得编辑器超级简单的所见即所得编辑器超级简单的所见即所得编辑器超级简单的所见即所得编辑器超级简单的所见即所得编辑器超级简单的所见即所得编辑器超级简单的所见即所得编辑器
                                <br/>
                                <br/>
                                <ul>
                                    <li>超级简单的所见即所得编辑器</li>
                                    <li>超级简单的所见即所得编辑器</li>
                                    <li>超级简单的所见即所得编辑器</li>
                                </ul>
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
<!-- SUMMERNOTE -->
<script src="{{asset('style/admin/inspinia/js/plugins/summernote/summernote.min.js?v='.time())}}"></script>
<script>

    $(document).ready(function () {
        $('.summernote').summernote({
            height: 600,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true                  // set focus to editable area after initializing summernote
        });
    });
</script>
</body>
</html>
