@extends('layout.homes')

@section('title', $title)

@section('file_js')
        <meta content="歪秀购物, 购物, 大家电, 手机" name="keywords">
        <meta content="歪秀购物，购物商城。" name="description">
        <link rel="stylesheet" type="text/css" href="/home/theme/css/member.css">
        <link rel="stylesheet" href="/bs/css/bootstrap.min.css">
        <script type="text/javascript" src="/home/theme/js/address.js"></script>
        <style>
            .yHeader{
                display:none;
            }
            .search-text{
                height:36px;
            }
        </style>
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

        @php
            // 引入user的模型
            use App\Model\Home\User;

            // 通过session的husername 查询单条user数据
            $user = User::where('username', '=', session('husername'))->first();

        @endphp
        <!-- 右侧添加地址 Begin-->
        <div class="member-right fr">
            <div class="member-head" style="margin-bottom:20px">
                <div class="member-heels fl"><h2 style="margin:10px 0 0;font-size: 24px">添加地址</h2></div>
            </div>
            <div class="member-border">
                <form class="layui-form" action="/address" method="post" style="overflow: hidden">
                    <input type="hidden" name="uid" value="{{ $user['id'] }}">
                    <div style="width:100%;overflow: hidden;">
                        <span style="float:left;margin:10px 25px 0 20px;">*收货人</span><input type="text" name="name" style="float:left;margin:6px 10px 0 0px;">
                    </div>
                    <div style="width:100%;overflow: hidden;">
                        <span style="float:left;margin:10px 25px 0 20px;">*手机号</span><input type="text" name="phone" style="float:left;margin:6px 10px 0 0px;">
                    </div>                                       
                    <div style="width:100%;overflow: hidden;">
                        <span style="float:left;margin:10px 10px 0 20px;">*收货地址</span><input type="text" name="add" style="float:left;margin:6px 10px 0 0px;">
                    </div>
                    <div class="container">
                        <button class="btn btn-primary">添加</button>
                    </div>

                    {{ csrf_field() }}

                </form>
            </div>
        </div>
        <!-- 右侧添加地址 End-->
    </div>
</section>




@stop