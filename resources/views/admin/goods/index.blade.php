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
    	<a href="/admin/goods/create" class="layui-btn"><i class="layui-icon">&#xe608;</i>添加</a>
    	<!-- <span class="x-right" style="line-height:40px">这一页共有{{-- $num --}}条数据</span> -->
    </xblock>
    <table class="layui-table">
        <thead>
            <tr>
                <!-- <th><input type="checkbox" name="" value=""></th> -->
                <th>ID</th>
                <th>分类名称</th>
                <th>商品名称</th>
                <th>商品图片</th>
                <th>商品描述</th>
                <th>库存</th>
                <th>状态</th>
                <th>厂家</th>
                <th>商品价格</th>
                <th>已售</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
        	{{-- 遍历商品表 --}}
            @foreach ($goods as $k => $v)
            <tr>
                <!-- <td>
                    <input type="checkbox" value="1" name="">
                </td> -->
                <td>
                    {{ $v->gid }}
                </td>
                {{-- 遍历分类表 拿tname --}}
                @foreach ($type as $t_k => $t_v)
                    @if ($v->tid == $t_v->tid)
                <td>
                    <u style="cursor:pointer;text-decoration: none" onclick="member_show('张三','member-show.html','10001','360','400')">   
                            {{ $t_v->tname }}  
                    </u>
                </td> 
                    @endif
                @endforeach
                <td >
                    {{ $v->gname }}
                </td>
                <td >
                   	<img src="{{ $v->pic }}" width="80" alt="">
                </td>
                <td >
                    {{ $v->descr }}
                </td>
                <td >
                   	{{ $v->stock }}
                </td>
                <td id="btn">
                    <a href="/admin/status/{{ $v->gid }}" style="color:#fff;text-decoration:underline">
                        {{ $v->status == 0 ? '上架' : '下架' }}
                    </a>
                </td>
                <td >
                   	{{ $v->company }}
                </td>
                <td >
                    {{ $v->price }}
                </td>
                <td >
                   	{{ $v->sell }}
                </td>                
                <td class="td-manage">
                    <a title="编辑" href="/admin/goods/{{ $v->gid }}/edit"
                    class="ml-5 btn btn-warning" style="text-decoration:none">
                        编辑
                    </a>
                    
                    <form action="/admin/goods/{{ $v->gid }}" method="post" style="display:inline">
                        {{-- 令牌post方法必加 --}}
                        {{ csrf_field() }}

                        {{-- 伪造表单 --}}
                        {{ method_field('DELETE') }}

                        <button class="shan btn btn-danger ml-5">删除</button>
                    </form>

                    <!-- 当商品上架时可促销 -->
                    @if ($v->status == 0)
                    <a title="促销" href="/admin/sales/create/{{ $v->gid }}"
                    class="ml-5 btn btn-info" style="text-decoration:none">
                        促销
                    </a> 
                    @endif 

                    <a title="关联图" href="/admin/imgs/add/{{ $v->gid }}"
                    class="ml-5 btn btn-success" style="text-decoration:none">
                        关联图
                    </a>                 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- 分页 --> 
    <div class="text-center">{{ $goods->links() }}</div>
   
    
<!-- 右侧内容框架，更改从这里结束 -->

@stop