@extends('admin.app')

@section('title', '博客管理系统-访客列表')
@section('keywords', '博客管理系统-访客列表')
@section('description', '博客管理系统-访客列表')
{{--样式引入--}}
@section('style')
    <link href="{{asset('style/admin/inspinia/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
@endsection

{{--内容部分--}}
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <h2>
                        访客列表
                    </h2>
                    <div class="alert alert-warning">
                        我的所有访客
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
                    <h5>访客列表
                        <small>所有访客。</small>
                    </h5>
                </div>
                <div class="ibox-content">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>IP</th>
                                <th>地址</th>
                                <th>浏览量</th>
                                <th>第一次访问时间</th>
                                <th>来源地址</th>
                                <th>最后访问时间</th>
                                <th>最后访问地址</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($view_log as $value)
                                <tr>
                                    <td>{{$value['id']}}</td>
                                    <td>{{$value['ip']}}</td>
                                    <td><span class="label label-primary">{{$value['ip_position']}}</span></td>
                                    <td><span class="label label-success">{{$value['num']}}</span></td>
                                    <td>{{$value['created_at']->diffForHumans()}}</td>
                                    <td>
                                        @if($value['previous'])
                                            <a href="{{$value['previous']}}" title="{{$value['previous']}}"
                                               target="_blank" class="btn btn-default">新窗口打开查看</a>
                                        @else
                                            暂无
                                        @endif
                                    </td>
                                    <td>{{$value['updated_at']->diffForHumans()}}</td>
                                    <td>
                                        @if($value['full'])
                                            <a href="{{$value['full']}}" title="{{$value['full']}}"
                                               target="_blank" class="btn btn-danger">新窗口打开查看</a>
                                        @else
                                            暂无
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="8" class="footable-visible">
                                    <ul class="pagination pull-right">
                                        {{$view_log->links()}}
                                    </ul>
                                </td>
                            </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--js引用--}}
@section('script')

@endsection