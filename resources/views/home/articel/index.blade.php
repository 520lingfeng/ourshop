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
<script type="text/javascript" src="/home/theme/js/articel.js"></script>
@stop

@section('content')
<div class="containers"><div class="pc-nav-item"><a href="/">首页</a> &gt; <a href="/member">会员中心 </a> </div></div>

<section id="member">
    <div class="member-center clearfix">
        <!-- 左侧个人中心栏 begin -->
        <div class="member-left fl">
            <div class="member-apart clearfix">
                <div class="fl"><img src={{$userinfo->head}}></div>
                <div class="fl">
                    <p>用户名：</p>
                    <p>{{$user->username}}</p>
                    <!-- <p>搜悦号：</p>
                    <p>389323080</p> -->
                </div>
            </div>
            <div class="member-lists">
                <dl>
                    <dt>我的商城</dt>
                    <dd><a href="/orders">我的订单</a></dd>
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
                    <dd class="cur"><a href="/articel">商城快讯</a></dd>
                    <dd><a href="#">帮助中心</a></dd>
                </dl>
            </div>
        </div>
        <!-- 左侧个人中心栏 End -->

        <!-- 文章列表 Begin -->
        <div class="member-right fr">
            <div class="member-head">
                <div class="member-heels fl"><h2 style="margin:5px 0">商城快讯</h2></div>
            </div>
            <div class="member-border">
                <div class="member-form clearfix">
                    <form>
                        <input type=text class="text-news" placeholder="商城快讯关键字">
                        <input type="button" class="button-btn" value="搜索">
                    </form>
                </div>
                <div class="member-entry">
                    <div class="member-issue clearfix">
                        <span>标题</span>
                        <span>图片</span>
                    </div>
                    <ul>
                        @foreach ($articel as $k => $v)
                        <li class="clearfix">
                          <div style="line-height: 70px"><a href="{{ $v->url }}">{{ $v->title }}</a></div>
                          @if ($v->aimg == '')
                            <div style="height:70px;line-height: 70px"><a href="{{ $v->url }}">无图片</a></div>
                          @else                        
                           <div style="height:70px;line-height: 70px"><a href="{{ $v->url }}"><img src="{{ $v->aimg }}" alt="" width="70"></a></div>
                          @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="container">
                      {{ $articel->links() }}
                </div>
            </div>
        </div>
        <!-- 文章列表 End -->
    </div>
</section>

@stop