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
    <xblock><button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button><button class="layui-btn" onclick='location.href="{{url('/admin/user/create')}}"' ><i class="layui-icon">&#xe608;</i>添加</button><span class="x-right" style="line-height:40px">共有数据：88 条</span></xblock>
    <table class="layui-table">
        <thead>
            <tr>
                <th>
                    <input type="checkbox" name="" value="">
                </th>
                <th>
                    ID
                </th>
                <th>
                    用户名
                </th>
                <th>
                    密码
                </th>
                <th colspan="2">
                    权限
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
            @foreach($adminusers as $row)
            <tr>
                <td>
                    <input type="checkbox" value="1" name="">
                </td>
                <td>
                    {{$row->uid}}
                </td>
                <td>
                    <u>
                     {{$row->username}}
                    </u>
                </td>
                <td >
                    {{$row->password}}
                </td>
                <td>
                   {{$row->level}}
                </td>
              
                <td >
                   {{$row->status}}
                </td>
                </td>
                 </td>
                  <td class="td-status">
                    <span class="layui-btn layui-btn-normal layui-btn-mini">
                        已启用
                    </span>
                </td>
                <td class="td-manage">
                    <a style="text-decoration:none" onclick="member_stop(this,'10001')" href="javascript:;" title="停用">
                        <i class="layui-icon">&#xe601;</i>
                    </a>
                    <form action="">
                    <a title="编辑" href="{{url('admin/user/$row->uid/edit')}}"
                    class="ml-5" style="text-decoration:none">
                        <i class="layui-icon">&#xe642;</i>
 </form>
                    <form id="searchForm"  action="{{url('/admin/user/'.$row->uid)}}" method="post">
                        {{csrf_field()}}
                        {{method_field('delete')}}
                    <button title="删除" class="layui-btn layui-btn-danger
                    style="text-decoration:none" onclick="alert('确定删除此用户?')">
                      <!--   <i class="layui-icon">&#xe640;</i> -->
                      删除
                    </button>
                </form>

            </tr>
            @endforeach
            
        </tbody>
    </table>
    <script type="text/javascript">
    function sabc(obj){
            submit();
    }
    </script>
<!-- 右侧内容框架，更改从这里结束 -->
@stop