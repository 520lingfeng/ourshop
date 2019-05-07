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
   

<div class="containers"><div class="pc-nav-item"><a href="/">首页</a> &gt; <a href="/member">会员中心 </a> </div></div>

<!-- 商城快讯 begin -->
<section id="member">
    <div class="member-center clearfix">
        <div class="member-left fl">
            <div class="member-apart clearfix">
                <div class="fl"><a href="#"><img src={{$userinfo->head}}></a></div>
                <div class="fl">
                    <p>用户名：</p>
                    <p><a href="#">{{$user->username}}</a></p>
                </div>
            </div>
            <div class="member-lists">
                <dl>
                    <dt>我的商城</dt>
                    <dd class="cur"><a href="/orders">我的订单</a></dd>
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
                    <dd class="cur"><a href="#">商城快讯</a></dd>
                    <dd><a href="#">帮助中心</a></dd>
                </dl>
            </div>
        </div>
        <div class="member-right fr">
            <div class="member-head">
                <div class="member-heels fl"><h2>我的订单</h2></div>
                <!-- <div class="member-backs member-icons fr"><a href="#">搜索</a></div>
                <div class="member-about fr"><input type="text" placeholder="商品名称/商品编号/订单编号"></div> -->
            </div>
            <div class="member-whole clearfix">
                <ul id="H-table" class="H-table">
                    <li class="cur"><a href="#">我的订单</a></li>
                    <li><a href="#">待付款<em></em></a></li>
                    <li><a href="#">待发货</a></li>
                    <li><a href="#">待收货</a></li>
                    <li><a href="#">待评价</a></li>
                    <li><a href="#">交易完成</a></li>
                </ul>
            </div>
            <div class="member-border">
            <!-- 全部订单 -->
               <div class="member-return H-over">
                   <div class="member-cancel clearfix">
                       <span class="be1">订单信息</span>
                       <span class="be2">收货人</span>
                       <span class="be2">订单金额</span>
                       <span class="be2">订单时间</span>
                       <span class="be2">订单状态</span>
                       <span class="be2">订单操作</span>
                   </div>
                   <div class="member-sheet clearfix">
                       <ul>
                          @foreach($orders as $v)
                           <li>
                           
                               <div class="member-minute clearfix">
                                   <span></span>
                                   <span>订单号：<em>{{$v->bid}}</em></span>
                                   
                                   <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
                               </div>

                              
                               <div class="member-circle clearfix">

                                   <div class="ci1">
                                  @foreach($orderinfo as $vv)
                                      @if($v->oid == $vv->oid)
                                        @foreach($goods as $vg)
                                          @if($vv->gid == $vg->gid) 
                                             <div class="ci7 clearfix">
                                                 <span class="gr1"><a href="#"><img src={{$vg->pic}} width="60" height="60" title="" about=""></a></span>
                                                 <span class="gr2"><a href="#">{{$vg->gname}}</a></span>
                                                 <span class="gr3">X{{$vv->gnum}}</span>
                                             </div>
                                          @endif
                                         @endforeach
                                          <!-- 收货人赋值给变量 -->
                                         <?php $contacts = $vv->oname ?>
                                      @endif
                                  @endforeach  
                                   </div>
                  
                                   <div class="ci2" >{{$contacts}}</div>

                                   <div class="ci3"><b>￥{{$v->total}}</b
                                   >
                               <!--     <p>货到付款</p>
                                   <p class="iphone">手机订单</p> -->
                                   </div>
                                   <div class="ci4"><p>{{$v->otime}}</p></div>
                                   <div class="ci5">

                                   <p>
                                   <?php
                                    $favfruit=$v->status;

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
                                   </p> 

                                   <p><a href="#">物流跟踪</a></p> 
                                   <p><a href="/orders/{{$v->oid}}">订单详情</a></p>
                                   </div>
                                   <div class="ci5 ci8">
                                   <!-- <p>剩余15时20分</p>  -->
                                   <p>
                                     <?php
                                    $favfruit=$v->status;

                                    switch ($favfruit) {
                                       case "0":
                                         echo "等待发货";
                                         break;
                                       case "1":
                                         echo "<a href='/orders/{$v->oid}?status=1' class='member-touch'>确认收货 </a>" ;
                                         break;
                                       case "2":
                                         echo "<a href='/comments/{$v->oid}?status=2' class='member-touch'>待评价 </a>";
                                         break;
                                       case "3":
                                         echo "<a href='' class='member-touch'>已评价</a>";
                                         break;
                                    }
                                    ?>

                                   </p> 

                                   <p><a href="#">取消订单</a> </p></div>
                               </div>
                              

                           </li>
                           @endforeach
                       </ul>
                   </div>
               </div>
               <!-- 代付款订单 -->
               <div class="member-return H-over" style="display:none;">
                   <div class="member-cancel clearfix">
                       <span class="be1">订单信息</span>
                       <span class="be2">收货人</span>
                       <span class="be2">订单金额</span>
                       <span class="be2">订单时间</span>
                       <span class="be2">订单状态</span>
                       <span class="be2">订单操作</span>
                   </div>
                   暂无未付款订单
               </div>
              <!-- 待发货订单 -->
               <div class="member-return H-over" style="display:none;">
                    <div class="member-cancel clearfix">
                       <span class="be1">订单信息</span>
                       <span class="be2">收货人</span>
                       <span class="be2">订单金额</span>
                       <span class="be2">订单时间</span>
                       <span class="be2">订单状态</span>
                       <span class="be2">订单操作</span>
                   </div>
                   <div class="member-sheet clearfix">
                       <ul>
                          @foreach($orders as $v)
                            @if($v->status == 0)
                             <li>
                             
                                 <div class="member-minute clearfix">
                                     <span></span>
                                     <span>订单号：<em>{{$v->bid}}</em></span>
                                     
                                     <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
                                 </div>

                                
                                 <div class="member-circle clearfix">

                                     <div class="ci1">
                                    @foreach($orderinfo as $vv)
                                        @if($v->oid == $vv->oid)
                                          @foreach($goods as $vg)
                                            @if($vv->gid == $vg->gid) 
                                               <div class="ci7 clearfix">
                                                   <span class="gr1"><a href="#"><img src={{$vg->pic}} width="60" height="60" title="" about=""></a></span>
                                                   <span class="gr2"><a href="#">{{$vg->gname}}</a></span>
                                                   <span class="gr3">X{{$vv->gnum}}</span>
                                               </div>
                                            @endif
                                           @endforeach
                                            <!-- 收货人赋值给变量 -->
                                           <?php $contacts = $vv->oname ?>
                                        @endif
                                    @endforeach  
                                     </div>
                    
                                     <div class="ci2" >{{$contacts}}</div>

                                     <div class="ci3"><b>￥{{$v->total}}</b
                                     >
                                 <!--     <p>货到付款</p>
                                     <p class="iphone">手机订单</p> -->
                                     </div>
                                     <div class="ci4"><p>{{$v->otime}}</p></div>
                                     <div class="ci5">

                                     <p>
                                     <?php
                                      $favfruit=$v->status;

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
                                     </p> 

                                     <p><a href="#">物流跟踪</a></p> 
                                     <p><a href="/orders/{{$v->oid}}">订单详情</a></p>
                                     </div>
                                     <div class="ci5 ci8">
                                     <!-- <p>剩余15时20分</p>  -->
                                     <p>
                                       <?php
                                      $favfruit=$v->status;

                                      switch ($favfruit) {
                                         case "0":
                                           echo "等待发货";
                                           break;
                                         case "1":
                                           echo "<a href='/orders/{$v->oid}?status=1' class='member-touch'>确认收货 </a>" ;
                                           break;
                                         case "2":
                                           echo "<a href='comments' class='member-touch'>待评价 </a>";
                                           break;
                                         case "3":
                                           echo "<a href='' class='member-touch'>已评价</a>";
                                           break;
                                      }
                                      ?>

                                     </p> 

                                     <p><a href="#">取消订单</a> </p></div>
                                 </div>
                                

                             </li>
              
                             @endif
                           @endforeach

                       </ul>
                   </div>
               </div>
               <!-- 待收货订单 -->
               <div class="member-return H-over" style="display:none;">
                 
                  <div class="member-cancel clearfix">
                       <span class="be1">订单信息</span>
                       <span class="be2">收货人</span>
                       <span class="be2">订单金额</span>
                       <span class="be2">订单时间</span>
                       <span class="be2">订单状态</span>
                       <span class="be2">订单操作</span>
                   </div>
                   <div class="member-sheet clearfix">
                       <ul>
                          @foreach($orders as $v)
                            @if($v->status == 1)
                             <li>
                             
                                 <div class="member-minute clearfix">
                                     <span></span>
                                     <span>订单号：<em>{{$v->bid}}</em></span>
                                     
                                     <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
                                 </div>

                                
                                 <div class="member-circle clearfix">

                                     <div class="ci1">
                                    @foreach($orderinfo as $vv)
                                        @if($v->oid == $vv->oid)
                                          @foreach($goods as $vg)
                                            @if($vv->gid == $vg->gid) 
                                               <div class="ci7 clearfix">
                                                   <span class="gr1"><a href="#"><img src={{$vg->pic}} width="60" height="60" title="" about=""></a></span>
                                                   <span class="gr2"><a href="#">{{$vg->gname}}</a></span>
                                                   <span class="gr3">X{{$vv->gnum}}</span>
                                               </div>
                                            @endif
                                           @endforeach
                                            <!-- 收货人赋值给变量 -->
                                           <?php $contacts = $vv->oname ?>
                                        @endif
                                    @endforeach  
                                     </div>
                    
                                     <div class="ci2" >{{$contacts}}</div>

                                     <div class="ci3"><b>￥{{$v->total}}</b
                                     >
                                 <!--     <p>货到付款</p>
                                     <p class="iphone">手机订单</p> -->
                                     </div>
                                     <div class="ci4"><p>{{$v->otime}}</p></div>
                                     <div class="ci5">

                                     <p>
                                     <?php
                                      $favfruit=$v->status;

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
                                     </p> 

                                     <p><a href="#">物流跟踪</a></p> 
                                     <p><a href="/orders/{{$v->oid}}">订单详情</a></p>
                                     </div>
                                     <div class="ci5 ci8">
                                     <!-- <p>剩余15时20分</p>  -->
                                     <p>
                                       <?php
                                      $favfruit=$v->status;

                                      switch ($favfruit) {
                                         case "0":
                                           echo "等待发货";
                                           break;
                                         case "1":
                                           echo "<a href='/orders/{$v->oid}?status=1' class='member-touch'>确认收货 </a>" ;
                                           break;
                                         case "2":
                                           echo "<a href='/comments/{$v->oid}?status=2' class='member-touch'>待评价 </a>";
                                           break;
                                         case "3":
                                           echo "<a href='' class='member-touch'>已评价</a>";
                                           break;
                                      }
                                      ?>

                                     </p> 

                                     <p><a href="#">取消订单</a> </p></div>
                                 </div>
                                

                             </li>
              
                             @endif
                           @endforeach

                       </ul>
                   </div>
               </div>
               <!-- 待评价 -->
               <div class="member-return H-over" style="display:none;">
                  <div class="member-cancel clearfix">
                       <span class="be1">订单信息</span>
                       <span class="be2">收货人</span>
                       <span class="be2">订单金额</span>
                       <span class="be2">订单时间</span>
                       <span class="be2">订单状态</span>
                       <span class="be2">订单操作</span>
                   </div>
                   <div class="member-sheet clearfix">
                      <ul>
                          @foreach($orders as $v)
                            @if($v->status == 2)
                             <li>
                             
                                 <div class="member-minute clearfix">
                                     <span></span>
                                     <span>订单号：<em>{{$v->bid}}</em></span>
                                     
                                     <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
                                 </div>

                                
                                 <div class="member-circle clearfix">

                                     <div class="ci1">
                                    @foreach($orderinfo as $vv)
                                        @if($v->oid == $vv->oid)
                                          @foreach($goods as $vg)
                                            @if($vv->gid == $vg->gid) 
                                               <div class="ci7 clearfix">
                                                   <span class="gr1"><a href="#"><img src={{$vg->pic}} width="60" height="60" title="" about=""></a></span>
                                                   <span class="gr2"><a href="#">{{$vg->gname}}</a></span>
                                                   <span class="gr3">X{{$vv->gnum}}</span>
                                               </div>
                                            @endif
                                           @endforeach
                                            <!-- 收货人赋值给变量 -->
                                           <?php $contacts = $vv->oname ?>
                                        @endif
                                    @endforeach  
                                     </div>
                    
                                     <div class="ci2" >{{$contacts}}</div>

                                     <div class="ci3"><b>￥{{$v->total}}</b
                                     >
                                 <!--     <p>货到付款</p>
                                     <p class="iphone">手机订单</p> -->
                                     </div>
                                     <div class="ci4"><p>{{$v->otime}}</p></div>
                                     <div class="ci5">

                                     <p>
                                     <?php
                                      $favfruit=$v->status;

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
                                     </p> 

                                     <p><a href="#">物流跟踪</a></p> 
                                     <p><a href="/orders/{{$v->oid}}">订单详情</a></p>
                                     </div>
                                     <div class="ci5 ci8">
                                     <!-- <p>剩余15时20分</p>  -->
                                     <p>
                                       <?php
                                      $favfruit=$v->status;

                                      switch ($favfruit) {
                                         case "0":
                                           echo "等待发货";
                                           break;
                                         case "1":
                                           echo "<a href='/orders/{$v->oid}?status=1' class='member-touch'>确认收货 </a>" ;
                                           break;
                                         case "2":
                                           echo "<a href='/comments/{$v->oid}?status=2' class='member-touch'>待评价 </a>";
                                           break;
                                         case "3":
                                           echo "<a href='' class='member-touch'>已评价</a>";
                                           break;
                                      }
                                      ?>

                                     </p> 

                                     <p><a href="#">取消订单</a> </p></div>
                                 </div>
                                

                             </li>
              
                             @endif
                           @endforeach

                       </ul>
                   </div>
               </div>
               <!-- 交易完成 -->
               <div class="member-return H-over" style="display:none;">
                  <div class="member-cancel clearfix">
                       <span class="be1">订单信息</span>
                       <span class="be2">收货人</span>
                       <span class="be2">订单金额</span>
                       <span class="be2">订单时间</span>
                       <span class="be2">订单状态</span>
                       <span class="be2">订单操作</span>
                   </div>
                   <div class="member-sheet clearfix">
                       <ul>
                          @foreach($orders as $v)
                            @if($v->status == 3)
                             <li>
                             
                                 <div class="member-minute clearfix">
                                     <span></span>
                                     <span>订单号：<em>{{$v->bid}}</em></span>
                                     
                                     <span class="member-custom">客服电话：<em>010-6544-0986</em></span>
                                 </div>

                                
                                 <div class="member-circle clearfix">

                                     <div class="ci1">
                                    @foreach($orderinfo as $vv)
                                        @if($v->oid == $vv->oid)
                                          @foreach($goods as $vg)
                                            @if($vv->gid == $vg->gid) 
                                               <div class="ci7 clearfix">
                                                   <span class="gr1"><a href="#"><img src={{$vg->pic}} width="60" height="60" title="" about=""></a></span>
                                                   <span class="gr2"><a href="#">{{$vg->gname}}</a></span>
                                                   <span class="gr3">X{{$vv->gnum}}</span>
                                               </div>
                                            @endif
                                           @endforeach
                                            <!-- 收货人赋值给变量 -->
                                           <?php $contacts = $vv->oname ?>
                                        @endif
                                    @endforeach  
                                     </div>
                    
                                     <div class="ci2" >{{$contacts}}</div>

                                     <div class="ci3"><b>￥{{$v->total}}</b
                                     >
                                 <!--     <p>货到付款</p>
                                     <p class="iphone">手机订单</p> -->
                                     </div>
                                     <div class="ci4"><p>{{$v->otime}}</p></div>
                                     <div class="ci5">

                                     <p>
                                     <?php
                                      $favfruit=$v->status;

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
                                     </p> 

                                     <p><a href="#">物流跟踪</a></p> 
                                     <p><a href="/orders/{{$v->oid}}">订单详情</a></p>
                                     </div>
                                     <div class="ci5 ci8">
                                     <!-- <p>剩余15时20分</p>  -->
                                     <p>
                                       <?php
                                      $favfruit=$v->status;

                                      switch ($favfruit) {
                                         case "0":
                                           echo "等待发货";
                                           break;
                                         case "1":
                                           echo "<a href='/orders/{$v->oid}?status=1' class='member-touch'>确认收货 </a>" ;
                                           break;
                                         case "2":
                                           echo "<a href='/comments/{$v->oid}?status=2' class='member-touch'>待评价 </a>";
                                           break;
                                         case "3":
                                           echo "<a href='' class='member-touch'>已评价</a>";
                                           break;
                                      }
                                      ?>

                                     </p> 

                                     <p><a href="#">取消订单</a> </p></div>
                                 </div>
                                

                             </li>
              
                             @endif
                           @endforeach

                       </ul>
                       
                   </div>
               </div>

                <div class="clearfix" style="padding:30px 20px;">
                    <div class="fr pc-search-g pc-search-gs">
                        <a style="display:none" class="fl " href="#">上一页</a>
                        <a href="#" class="current">1</a>
                        <a href="javascript:;">2</a>
                        <a href="javascript:;">3</a>
                        <a href="javascript:;">4</a>
                        <a href="javascript:;">5</a>
                        <a href="javascript:;">6</a>
                        <a href="javascript:;">7</a>
                        <span class="pc-search-di">…</span>
                        <a href="javascript:;">1088</a>
                        <a title="使用方向键右键也可翻到下一页哦！" class="" href="javascript:;">下一页</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- 商城快讯 End -->


@stop