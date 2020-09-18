@extends('admin.admin')
@section('content-header')
<h1>
    用户管理
</h1>
<ol class="breadcrumb">
    <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> 主页</a></li>
    <li class="active">用户管理</li>
</ol>
@stop

@section('content')
<h2 class="page-header"></h2>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">会员列表</h3>
        <div class="box-tools">
            <form action="" method="get">
                <div class="input-group">
                    <input type="text" class="form-control input-sm pull-right" name="key"
                           style="width: 150px;" placeholder="搜索会员" value="<?=$key?>">
                    <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="box-body table-responsive">
        <table class="table table-hover table-bordered">
            <tbody>
            <!--tr-th start-->
            <tr>
                <th>操作</th>
                <th>编号</th>
                <th>昵称</th>
                <th>性别</th>
                <th>年龄</th>
                <th>手机号</th>
                <th>住址</th>
                <th>店铺名称</th>
                <th>身份证号</th>
                <th>身份证照片</th>
                <th>备注</th>
                <th>注册时间</th>
                <th>是否删除</th>
            </tr>
            <!--tr-th end-->
            @foreach($list as $v)
            <tr>
                <td>
                    <a style="font-size: 16px" href="#"><i class="fa fa-fw fa-pencil" title="修改"></i></a>
                    <a style="font-size: 16px" href="#"><i class="fa fa-fw fa-trash-o" title="删除"></i></a>
                </td>
                <td class="text-muted">{{$v->MEMBER_ID}}</td>
                <td class="text-muted">{{$v->MEMBER_NAME}}</td>
                <td class="text-muted">{{$v->MEMBER_GENDER == 1 ? '男' : $v->MEMBER_GENDER == 2 ? '女' : '未知'}}</td>
                <td class="text-muted">{{$v->MEMBER_AGE}}</td>
                <td class="text-muted">{{$v->REGISTER_MOBILE}}</td>
                <td class="text-muted">{{$v->MEMBER_ADRESS}}</td>
                <td class="text-muted">{{$v->STORE_ID}}</td>
                <td class="text-muted">{{$v->MEMBER_IDCARD}}</td>
                <td class="text-muted">{{$v->MEMBER_IDCARD_IMAGE}}</td>
                <td class="text-muted">{{$v->MEMBER_DESC}}</td>
                <td class="text-muted">{{date('Y-m-d H:i:s', $v->REGISTER_TIME)}}</td>
                <td class="text-muted">{{$v->IS_DEL == 1 ? '是' : '否'}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop




