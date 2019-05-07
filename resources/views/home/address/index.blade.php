@extends('layout.homes')

@section('title', $title)

@section('file_js')
<style>
    .yHeader{
        display:none;
    }
    .search-text{
        height:36px;
    }
</style>
<meta content="歪秀购物, 购物, 大家电, 手机" name="keywords">
<meta content="歪秀购物，购物商城。" name="description">
<link rel="stylesheet" type="text/css" href="/home/theme/css/member.css">
<link rel="stylesheet" href="/bs/css/bootstrap.min.css">
<script type="text/javascript" src="/home/theme/js/address.js"></script>
@stop

@section('content')
<div class="containers"><div class="pc-nav-item"><a href="/">首页</a> &gt; <a href="/member">会员中心 </a> </div></div>

<section id="member">
    <div class="member-center clearfix">
        <!-- 左侧个人中心栏 begin -->
        <div class="member-left fl">
            <div class="member-apart clearfix">
                <div class="fl"><a href="#"><img src={{$userinfo->head}}></a></div>
                <div class="fl">
                    <p>用户名：</p>
                    <p><a href="#">{{$user->username}}</a></p>
                    <!-- <p>搜悦号：</p>
                    <p>389323080</p> -->
                </div>
            </div>
            <div class="member-lists">
                <dl>
                    <dt>我的商城</dt>
                    <dd><a href="#">我的订单</a></dd>
                    <dd><a href="/collects">我的收藏</a></dd>
                    <dd><a href="#">账户安全</a></dd>
                    <dd><a href="#">我的评价</a></dd>
                    <dd><a href="/address">地址管理</a></dd>
                </dl>
                <dl>
                    <dt>客户服务</dt>
                    <dd><a href="#">退货申请</a></dd>
                    <dd><a href="#">退货/退款记录</a></dd>
                </dl>
                <dl>
                    <dt>我的消息</dt>
                    <dd class="cur"><a href="#">商城快讯</a></dd>
                    <dd><a href="#">帮助中心</a></dd>
                </dl>
            </div>
        </div>
        <!-- 左侧个人中心栏 End -->

        <!-- 地址列表 Begin -->
        <div class="member-right fr">
          <div class="member-head">
              <div class="member-heels fl" ><h2 style="margin:5px 0">地址管理</h2></div>
          </div>
          <div class="member-border">
              <div class="member-newly"><a href="/address/create"><b>新增收货地址</b></a>>您已经创建了<i class="reds">{{ $num }}</i>个收货地址了，最多可创建<i class="reds">10</i>个</div>
              <div class="member-sites">
                  <ul>
                      @foreach ($address as $k => $v)        
                      <li class="clearfix">
                          <!-- 加个判断，只有被选择地址是默认 -->
                          <div class=""><a href="#">默认地址</a> </div>
                          <div class="user-info1 fl clearfix">
                              <div class="user-info">
                                  <span class="info1">收货人：</span>
                                  <span class="info2">{{ $v->name }}</span>
                              </div>
                              <div class="user-info">
                                  <span class="info1">地址：</span>
                                  <span class="info2">{{ $v->add }}</span>
                              </div>
                              <div class="user-info">
                                  <span class="info1">手机：</span>
                                  <span class="info2">{{ $v->phone }}</span>
                              </div>
                          </div>

                          <div class="pc-event" style="width:150px">
                              <a href="#" class="pc-event-d">设为默认地址</a><br><br>

                              <a href="/address/{{ $v->id }}/edit" class="btn btn-primary" style="color:#fff">编辑</a>

                              <form action="/address/{{ $v->id }}" style="display:inline-block;" method="post">

                                  <button class="btn btn-success" method="post" >删除</button>

                                  {{ csrf_field() }}

                                  {{-- 伪造表单 --}}
                                  {{ method_field('DELETE') }}

                              </form>
                          </div>
                      </li>
                      @endforeach
                  </ul>
              </div>
              <div class="member-pages clearfix container">
                  <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-5">{{ $address->links() }}</div>
                  </div>
              </div>  
          </div>
        </div>
        <!-- 地址列表 End -->
    </div>
</section>




@stop