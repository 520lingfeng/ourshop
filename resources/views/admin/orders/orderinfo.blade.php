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
                    订单号
                </th>
                <th>
                    商品名
                </th>
                <th>
                    单价
                </th>
                <th>
                    购买数量
                </th>
                <th>
                    小计
                </th>
                <th>
                    收货地址
                </th>
                <th>
                    当前状态
                </th>
                <th>
                    下单时间
                </th>
                <th>
                    金额
                </th>
                <th>
                  操作
                </th>
            </tr>
        </thead>
        <tbody>
            <tbody>
            @foreach($orderinfo as $v)
            <tr>

                <td>
                    {{$v->bid}}
                </td>
                <td>
                     小耐破
                </td>
                <td >
                    {{2134}}元
                </td>
                <td>
                    23
                </td>
                <td>
                  2133元
                   
                </td>
                <td>
                    {{$v->add}}
                </td>
               

                <td >

                     <span class="layui-btn  layui-btn-mini">
                        新订单
                    </span>

                </td>
                
                 <td>
                    下单时间
                </td>
                
                <td>
                    金额
                </td>

                <td class="td-status">
                    <span class="layui-btn layui-btn-normal layui-btn-mini">
                        <a href="/admin/fahuo?id">点击发货</a>
                    </span>
                    
                </td>
               
            </tr>
            @endforeach
        </tbody>
    </table>
<!-- 右侧内容框架，更改从这里结束 -->
@stop