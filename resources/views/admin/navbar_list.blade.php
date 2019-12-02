@extends('admin.app')

@section('title', '网站导航列表')
@section('keywords', '网站导航列表')
@section('description', '网站导航列表')
{{--样式引入--}}
@section('style')

@endsection

{{--内容部分--}}
@section('content')
    <div id="app">

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
                <div class="ibox">
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
                    {{--表单--}}
                    {{--                        <el-dialog title="添加导航栏" :visible.sync="dialogFormVisible" width="45%">--}}
                    {{--                            <el-form ref="form" :model="form" label-width="100px">--}}
                    {{--                                <el-form-item label="上级导航栏">--}}
                    {{--                                    <el-select v-model="form.region" placeholder="请选择上级导航栏">--}}
                    {{--                                        <el-option label="区域一" value="shanghai"></el-option>--}}
                    {{--                                        <el-option label="区域二" value="beijing"></el-option>--}}
                    {{--                                    </el-select>--}}
                    {{--                                </el-form-item>--}}
                    {{--                                <el-form-item label="导航栏设置">--}}
                    {{--                                    <el-checkbox-group v-model="form.type">--}}
                    {{--                                        <el-checkbox label="隐藏栏目" name="type"></el-checkbox>--}}
                    {{--                                        <el-checkbox label="新窗口打开" name="type"></el-checkbox>--}}
                    {{--                                        <el-checkbox label="设置根目录" name="type"></el-checkbox>--}}
                    {{--                                    </el-checkbox-group>--}}
                    {{--                                </el-form-item>--}}
                    {{--                                <el-form-item label="导航栏名称">--}}
                    {{--                                    <el-input v-model="form.name"></el-input>--}}
                    {{--                                </el-form-item>--}}
                    {{--                                <el-form-item label="导航栏ICON">--}}
                    {{--                                    <el-input v-model="form.name"></el-input>--}}
                    {{--                                </el-form-item>--}}
                    {{--                                <el-form-item>--}}
                    {{--                                    <el-tabs type="border-card" v-model="activeName" @tab-click="handleSwitch">--}}
                    {{--                                        <el-tab-pane>--}}
                    {{--                                            <span slot="label"><i class="el-icon-s-tools"></i> 系统地址</span>--}}
                    {{--                                            <el-select v-model="form.region" placeholder="请选择上级导航栏" style="width:100%">--}}
                    {{--                                                <el-option label="区域一" value="shanghai"></el-option>--}}
                    {{--                                                <el-option label="区域二" value="beijing"></el-option>--}}
                    {{--                                            </el-select>--}}
                    {{--                                        </el-tab-pane>--}}
                    {{--                                        <el-tab-pane>--}}
                    {{--                                            <span slot="label"><i class="el-icon-link"></i> 手动输入</span>--}}
                    {{--                                            <el-input v-model="form.name" placeholder="请输入地址"></el-input>--}}
                    {{--                                        </el-tab-pane>--}}
                    {{--                                    </el-tabs>--}}
                    {{--                                </el-form-item>--}}
                    {{--                                <el-form-item>--}}
                    {{--                                    <el-button type="primary" @click="onSubmit">立即创建</el-button>--}}
                    {{--                                    <el-button @click="dialogFormVisible = false">取消</el-button>--}}
                    {{--                                </el-form-item>--}}
                    {{--                            </el-form>--}}
                    {{--                        </el-dialog>--}}
                </div>
            </div>
        </div>

        <example-component/>
    </div>
@endsection

{{--js引用--}}
@section('script')

@endsection