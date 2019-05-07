@extends('layout.admins')

@section('title',$title)

@section('content')
<!-- 右侧内容框架，更改从这里开始 -->
    <form class="layui-form xbs" action="" >
        <div class="layui-form-pane" style="text-align: center;">
          <div class="layui-form-item" style="display: inline-block;">
            <label class="layui-form-label xbs768">日期范围</label>
            <div class="layui-input-inline xbs768">
              <input class="layui-input" placeholder="开始日" id="LAY_demorange_s">
            </div>
            <div class="layui-input-inline xbs768">
              <input class="layui-input" placeholder="截止日" id="LAY_demorange_e">
            </div>
            <div class="layui-input-inline">
              <input type="text" name="username"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
            </div>
            <div class="layui-input-inline" style="width:80px">
                <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
            </div>
          </div>
        </div> 
    </form>
    <xblock><!-- <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button><button class="layui-btn" onclick='location.href="{{url('/admin/user/create')}}"' ><i class="layui-icon">&#xe608;</i>添加</button> --><span class="x-right" style="line-height:40px">共有数据：88 条</span></xblock>
    <table class="layui-table">
        <thead>
            <tr>
                
                <th>
                    ID
                </th>
                <th>
                    用户名
                </th>
                <th>
                    订单号
                </th>
                <th>
                    金额
                </th>
                <th>
                    下单时间
                </th>
                <th>
                    当前状态
                </th>
                <th>
                  操作
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $row)
            <tr>

                <td>
                    {{$row->oid}}
                </td>
                <td>
                    <u>
                     {{$row->uid}}
                    </u>
                </td>
                <td >
                    {{$row->bid}}
                </td>
                <td>
                   {{$row->total}} 元
                </td>
                <td>
                   {{$row->otime}}
                   
                </td>
                <td >
                   <?php
                        $favfruit=$row->status;

                        switch ($favfruit) {
                           case "0":
                             echo "新订单";
                             break;
                           case "1":
                             echo "已发货";
                             break;
                           case "2":
                             echo "已收货";
                             break;
                           case "3":
                             echo "评论";
                             break;
                        }
                    ?>
                </td>
                
                <td class="td-status">
                    <span class="layui-btn layui-btn-normal layui-btn-mini">

                    @if($favfruit==0)
                        <a href="/admin/fahuo?id={{$row->oid}}">点击发货</a>
                    @else
                        点击发货
                    @endif   
                    </span>
                    <span class="layui-btn layui-btn-normal layui-btn-mini">
                        <a href="/admin/orders/{{$row->oid}}">订单详情</a>

                    </span>
                </td>
               
            </tr>
            @endforeach
            
        </tbody>
    </table>
<!-- 右侧内容框架，更改从这里结束 -->
@stop