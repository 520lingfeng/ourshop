@extends('layout.admins')

@section('title', $title)

@section('content')

<style>
    /*删除按钮的样式*/
    .shan:hover{color: #777;}

    /*修改discount折扣的样式*/
    .discount:hover{cursor:pointer;}
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
    	<a href="/admin/goods" class="layui-btn"><i class="layui-icon">&#xe608;</i>添加</a>
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
                <th>促销价格</th>
                <th>折扣</th>
                <th>已售</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
        	{{-- 遍历商品表 --}}
            @foreach ($goods as $k => $v)
                @foreach ($sales as $s_k => $s_v)
                    @if ($v['gid'] == $s_v->gid)
                        <tr>
                            <!-- <td>
                                <input type="checkbox" value="1" name="">
                            </td> -->
                            {{-- 遍历促销表 拿id --}}
                            <td id="ids">
                                {{ $s_v['id'] }}
                            </td>

                            {{-- 遍历分类表 拿tname --}}
                            @foreach ($type as $t_k => $t_v)
                                @if ($v['tid'] == $t_v->tid)
                            <td>
                                <u style="cursor:pointer;text-decoration: none" onclick="member_show('张三','member-show.html','10001','360','400')">   
                                        {{ $t_v->tname }}  
                                </u>
                            </td> 
                                @endif
                            @endforeach
                            <td >
                                {{ $v['gname'] }}
                            </td>
                            <td >
                               	<img src="{{ $v['pic'] }}" width="80" alt="">
                            </td>
                            <td >
                                {{ $v['descr'] }}
                            </td>
                            <td >
                               	{{ $v['stock'] }}
                            </td>
                            <td id="btn">
                                <a href="/admin/status/{{ $v['gid'] }}" style="color:#fff;text-decoration:underline">
                                    {{ $v['status'] == 0 ? '上架' : '下架' }}
                                </a>
                            </td>
                            <td >
                               	{{ $v['company'] }}
                            </td>
                            {{-- 遍历促销表 拿price discount --}}
                            <td >  
                                {{ $s_v->price }} 
                            </td>
                            <td class="discount" style="text-decoration: underline;">
                                {{ $s_v->discount }}
                            </td>
                            <td >
                               	{{ $v['sell'] }}
                            </td>

                            {{-- 遍历促销表 拿id --}}
                            <td class="td-manage">
                                <form action="/admin/sales/delete/{{ $s_v->id }}" method="post" style="display:inline">
                                    
                                    {{-- 令牌post方法必加 --}}
                                    {{ csrf_field() }}

                                    <button class="shan btn btn-danger ml-5">删除</button>
                                </form>
                            </td>
                        </tr>

                        {{-- 加快循环速度 --}}
                        @break

                    @endif
                @endforeach
            @endforeach
        </tbody>
    </table>

    <!-- 修改折扣 -->
    <script>
        // 绑定双击事件
        $('.discount').dblclick(function(){
            
            // 获取this的值
            $vals = $(this).html().trim();

            // 清空this值
            $(this).html('');

            // 新建input标签
            $inp = $('<input type="text" class="inp layui-input" name="discount" />');

            // 把新标签放进this的里面
            $(this).append($inp);

            // 把原折扣值放进.inp
            $('.inp').val($vals).focus().select();

            // .inp标签失去焦点
            $('.inp').blur(function(){

                $th = $(this);

                // 获取.inp的值
                $inps = $(this).val();

                // 获取id
                $id = $(this).parents('tr').find('#ids').html().trim();

                $.get('/ajaxs/sales.php', {id:$id,inps:$inps}, function($data){

                    if ($data != '0') {

                        $th.parent().html($data);
                    } else {

                        $th.text($inps);
                    }
                });
            });
        });

        
    </script>
    <!-- 修改折扣 -->

<!-- 右侧内容框架，更改从这里结束 -->

@stop