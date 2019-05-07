@extends('layout.homes')

@section('title',$title)
<style>
    .yHeader{
        display:none;
    }
</style>
 <link rel="stylesheet" type="text/css" href="/home/theme/css/member.css">
    <link type="text/css" rel="stylesheet" href="/home/theme/css/style.css" />
 
    <script type="text/javascript" src="/home/theme/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/home/theme/js/menu.js"></script>    
        
    <script type="text/javascript" src="/home/theme/js/select.js"></script>
    
  
@section('content')
   <div class="containers"><div class="pc-nav-item"><a href="#">首页</a> &gt; <a href="#">会员中心 </a> &gt; <a href="#">商城快讯</a></div></div>

<!-- 商城快讯 begin -->
<section id="member">
    <div class="member-center clearfix">
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
                    <dd class="cur"><a href="#">我的订单</a></dd>
                    <dd><a href="#">我的收藏</a></dd>
                    <dd><a href="#">账户安全</a></dd>
                    <dd><a href="#">我的评价</a></dd>
                    <dd><a href="#">地址管理</a></dd>
                </dl>
                <dl>
                    <dt>客户服务</dt>
                    <dd><a href="#">退货申请</a></dd>
                    <dd><a href="#">退货/退款记录</a></dd>
                </dl>
                <dl>
                    <dt>我的消息</dt>
                    <dd><a href="#">商城快讯</a></dd>
                    <dd><a href="#">帮助中心</a></dd>
                </dl>
            </div>
        </div>
        <div class="member-right fr">
            <div class="member-head">
                <div class="member-heels fl"><h2>订单号：{{$orders[0]->bid}}</h2></div>
                <div class="member-backs fr"><a href="/orders">返回订单首页</a></div>
            </div>
            <div class="member-border">
               <div class="member-order">
                   <dl>
                       <dt>发货信息</dt>
                       <dd class="member-seller">

                        <?php
                                    $favfruit=$orders[0]->status;

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
                        <a href="#">（物流查询）</a> </dd>
                   </dl>
                   <dl class="member-custom clearfix ">
                       <dt>订单信息</dt>
                       <dd>订单编号：{{$orders[0]->bid}}</dd>
                       <dd>订单金额：￥{{$orders[0]->total}}</dd>
                       <dd>付款时间：{{$orders[0]->otime}}</dd>
                       <!-- <dd>发货时间：2015-09-22 08：22</dd> -->
                   </dl>
                   <dl>
                       <dt>配送信息</dt>
                       <dd class="member-seller"><span>收货地址：<em>{{$orderinfo[0]->oname}}</em></span> <span>{{$address[0]->phone}}</span> <span>{{$orderinfo[0]->add}}</span></dd>
                   </dl>
                   <dl class="member-custom clearfix ">
                       <dt>发票信息</dt>
                       <dd>发票类型：电子发票 发票下载</dd>
                       <dd>发票抬头：公司</dd>
                       <dd>发票内容：化妆品</dd>
                   </dl>
                   <dl>
                       <dt>商品信息</dt>
                      <!--  <dd class="member-seller">本订单是由 “以纯甲醇旗舰店” 发货并且提高售后服务，商品在下单后会尽快给您发货。 </dd> -->
                   </dl>
               </div>
               <div class="member-serial">
                   <ul>
                       <li class="clearfix">
                           <div class="No1">商品编号</div>
                           <div class="No2">商品详情</div>
                           <div class="No3">数量</div>
                           <div class="No4">单价</div>
                           <div class="No5">小计</div>
                       </li>

                       @foreach($orderinfo as $v)
                            @foreach($goods as $vv)
                            @if($v->gid == $vv->gid)
                               <li class="clearfix">
                                   <div class="No1">{{$vv->gid}}</div>
                                   <div class="No2"><a href="#">{{$vv->gname}}</a> </div>

                                   <div class="No3">{{$v->gnum}}</div>
                                   <div class="No4">￥{{$vv->price}}</div>
                                   <div class="No5">￥{{$vv->price*$v->gnum}}</div>
                               </li>
                            @endif
                            @endforeach
                       @endforeach
                   </ul>
               </div>
            </div>
            <div class="member-settle clearfix">
                <div class="fr">
                    <div><span>商品金额：</span><em>￥{{$orders[0]->total}}</em></div>
                    <div><span>运费：</span><em>￥15.00</em></div>
                    <div class="member-line"></div>
                    <div><span>共需支付：</span><em>￥{{$orders[0]->total+15.00}}</em></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- 商城快讯 End -->


@stop