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
<link rel="stylesheet" type="text/css" href="/home/theme/css/member.css">
<link rel="stylesheet" href="/bs/css/bootstrap.min.css">
<script src="/home/theme/js/collects1.js"></script>
<!-- 点击换商品收藏、店铺收藏 -->
<script src="/home/theme/js/collects2.js"></script>
<script src="/home/theme/js/collects_del.js"></script>
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


        <!-- 右侧收藏 -->
        <div class="member-right fr">
            <div class="member-head">
                <div class="member-heels fl"><h2 style="margin:5px 0">我的收藏</h2></div>
                <div class="member-backs member-icons fr"><a href="#">搜索</a></div>
                <div class="member-about fr"><input type="text" placeholder="商品名称/商品编号/订单编号"></div>
            </div>
            <div class="member-switch clearfix">
                <ul id="H-table" class="H-table">
                    <li><a href="#">我的收藏的商品</a></li>
                    <li class="cur"><a href="#">我收藏的店铺</a></li>
                </ul>
            </div>
            <div class="member-border">
               <!-- 收藏的商品 -->
               <div class="member-return H-over"  style="display:none;">
                   <div class="member-troll clearfix">
                       <!-- b标签 class="on"被全选中 -->
                       <div class="member-all fl"><b class="" style="cursor: pointer;margin:5px"></b>全选</div>
                       <div class="member-check clearfix fl"> <a href="#">加入购物车</a> <a href="#" class="member-delete">删除商品</a> </div>
                   </div>
                   <div class="time-border-list pc-search-list member-all1 clearfix">
                        
                       <ul class="clearfix">
                          @foreach ($res as $k => $v)
                           <li>
                               <a href="/info/{{ $v->gid }}" style="display:inline-block;width:213px;height:213px"> <img src="{{ $v->pic }}" width="100%"></a>
                                <!-- b标签 class="on"被选中 -->
                               <p class="head-name"><b class="" style="cursor: pointer;margin:5px"></b><a href="/info/{{ $v->gid }}">{{ $v->descr }}</a> </p>
                               <p><span class="price">￥{{ $v->price }}</span></p>
                           </li>
                           @endforeach
                       </ul>
                   </div>
                </div>
                <!-- 收藏的商品 -->

                <!-- 收藏的商店 -->
                <div class="member-return H-over">
                   <div class="member-troll clearfix">
                       <div class="member-all fl"><b class="on"></b>全选</div>
                       <div class="member-check clearfix fl"> <a href="#" class="member-delete">删除商品</a> </div>
                   </div>
                   <div class="member-vessel">
                       <ul>
                           <li class="clearfix">
                               <div class="member-tenant fl clearfix">
                                   <div class="fl member-all1 member-all2"><b class="on"></b></div>
                                   <div class="fr">
                                       <a href="#"><img src="/home/theme/icon/shop-ll.png" width="114" height="114" title=""></a>
                                       <p>秋水伊人官方旗舰店</p>
                                       <p><a href="#" class="member-shops">进入店铺</a> </p>
                                       <p>关注人气：1000+</p>
                                       <p>收藏时间：2014-11-21</p>
                                   </div>
                               </div>

                               <div class="member-volume fl">
                                   <a href="#" class="fl member-btn-fl"></a>
                                   <div class="member-cakes fl">
                                       <ul>
                                           <li>
                                               <a href="#"><img src="/home/theme/img/pd/m3.png" width="125" height="125" title=""></a>
                                               <p>￥78.00</p>
                                           </li>
                                           <li>
                                               <a href="#"><img src="/home/theme/img/pd/m4.png" width="125" height="125" title=""></a>
                                               <p>￥78.00</p>
                                           </li>
                                           <li>
                                               <a href="#"><img src="/home/theme/img/pd/m5.png" width="125" height="125" title=""></a>
                                               <p>￥78.00</p>
                                           </li>
                                           <li>
                                               <a href="#"><img src="/home/theme/img/pd/m3.png" width="125" height="125" title=""></a>
                                               <p>￥78.00</p>
                                           </li>
                                       </ul>
                                   </div>
                                   <a href="#" class="fr member-btn-fr"></a>
                               </div>
                           </li>
                       </ul>
                   </div>
                </div>
                <!-- 收藏的商店 --> 
            <div class="clearfix" style="padding:30px 20px;">
                <div class="fr pc-search-g pc-search-gs">
                </div>
            </div>

            </div>
        </div>
    </div>
</section>

@stop