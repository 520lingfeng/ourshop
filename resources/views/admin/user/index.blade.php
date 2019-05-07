@extends('layout.admins')

@section('title', $title)

@section('content')

<!-- 删除按钮的样式 -->
<style>
    .shan:hover{color: #777;}
</style>
</style>
    
<!-- 右侧内容框架，更改从这里开始 -->
    <!-- 搜索 -->
    <form class="layui-form xbs" action="" >
        <div class="layui-form-pane" style="text-align: center;">
          <div class="layui-form-item" style="display: inline-block;">
            <div class="layui-input-inline">
              <input type="text" name="username"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-input-inline" style="width:80px">
                <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
            </div>
          </div>
        </div> 
    </form>

    
    <xblock>
        <!-- <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button> -->
        <a href="/admin/user/create" class="layui-btn"><i class="layui-icon">&#xe608;</i>添加</a>
        <!-- <span class="x-right" style="line-height:40px">这一页共有{{-- $num --}}条数据</span> -->
    </xblock>
    <table class="layui-table">
        <thead>
            <tr>
                <!-- <th><input type="checkbox" name="" value=""></th> -->
                <th>ID</th>
                <th>用户名</th>
                <th>密码</th>
                <th>等级</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            {{-- 遍历商品表 --}}
            @foreach ($adminusers as $k => $v)
            <tr>
                <!-- <td>
                    <input type="checkbox" value="1" name="">
                </td> -->
                <td>
                    {{ $v->uid }}
                </td>
                <td>
                    {{ $v->username }}
                </td> 
                <td >
                    {{ $v->password }}
                </td>
                <td >
                    {{ $v->level == 0 ? '超级管理员' : '管理员' }}
                </td>
                <td >
                    {{ $v->status == 0 ? '开启' : '禁用' }}
                </td>               
                <td class="td-manage">

                    <a title="编辑" href="/admin/user/{{ $v->uid }}/edit"
                    class="ml-5 btn btn-warning" style="text-decoration:none">
                        编辑
                    </a>
                    
                    <form action="/admin/user/{{ $v->uid }}" method="post" style="display:inline">
                        {{-- 令牌post方法必加 --}}
                        {{ csrf_field() }}

                        {{-- 伪造表单 --}}
                        {{ method_field('DELETE') }}

                        <button class="shan btn btn-danger ml-5">删除</button>
                    </form>
                    
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- 分页 --> 
    <div class="text-center">{{ $adminusers->links() }}</div>
   

<!-- 右侧内容框架，更改从这里结束 -->

@stop