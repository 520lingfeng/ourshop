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
        <a href="/admin/links/create" class="layui-btn"><i class="layui-icon">&#xe608;</i>添加</a>
        <!-- <span class="x-right" style="line-height:40px">这一页共有{{-- $num --}}条数据</span> -->
    </xblock>
    <table class="layui-table">
        <thead>
            <tr>
                <!-- <th><input type="checkbox" name="" value=""></th> -->
                <th>ID</th>
                <th>链接名称</th>
                <th>url地址</th>
                <th>链接图标</th>
                <th>状态</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            {{-- 遍历商品表 --}}
            @foreach ($links as $k => $v)
            <tr>
                <!-- <td>
                    <input type="checkbox" value="1" name="">
                </td> -->
                <td>
                    {{ $v->lid }}
                </td>
                <td>
                    {{ $v->lname }}
                </td>               
                <td >
                    <a href="{{ $v->url }}" style="color:#fff">{{ $v->url }}</a>
                </td>
                <td >
                    @if ($v->icon == '')
                        <span>无图标</span>
                    @else 
                        <img src="{{ $v->icon }}" width="80" alt="">
                    @endif
                </td> 
                <td >
                    {{ $v->status == 0 ? '开启' : '禁用' }}
                </td>               
                <td class="td-manage">
                    <a title="编辑" href="/admin/links/{{ $v->lid }}/edit"
                    class="ml-5 btn btn-warning" style="text-decoration:none">
                        编辑
                    </a>
                    
                    <form action="/admin/links/{{ $v->lid }}" method="post" style="display:inline">
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
    <div class="text-center">{{ $links->links() }}</div>
   
    
<!-- 右侧内容框架，更改从这里结束 -->

@stop