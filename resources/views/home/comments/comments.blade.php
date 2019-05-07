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
    <script type="text/javascript">
         (function(a){
             a.fn.hoverClass=function(b){
                 var a=this;
                 a.each(function(c){
                     a.eq(c).hover(function(){
                         $(this).addClass(b)
                     },function(){
                         $(this).removeClass(b)
                     })
                 });
                 return a
             };
         })(jQuery);

         $(function(){
             $("#pc-nav").hoverClass("current");
         });
     </script>
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
                    <!-- <p>搜悦号：</p>
                    <p>389323080</p> -->
                </div>
            </div>
            <div class="member-lists">
                <dl>
                    <dt>我的商城</dt>
                    <dd><a href="#">我的订单</a></dd>
                    <dd><a href="#">我的收藏</a></dd>
                    <dd><a href="#">账户安全</a></dd>
                    <dd class="cur"><a href="#">我的评价</a></dd>
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
        <div class="m_right">
          


 <div class="member-right fr">
            <div class="member-head">
                <div class="member-heels fl"><h2>我的评价</h2></div>
            </div>
            <div class="member-border">
               <div class="member-column clearfix">
                   <span class="co1">商品信息</span>
                   <span class="co2">购买时间</span>
                   <span class="co3">评价状态</span>
               </div>
               <div class="member-class clearfix">
                   <ul>
                       <li class="clearfix">
                           <div class="sp1">
                               <span class="gr1"><a href="#"><img width="60" height="60" about="" title="" src="theme/img/pd/m1.png"></a></span>
                               <span class="gr2"><a href="#">红米Note2 标准版 白色 移动4G手机 双卡双待</a></span>
                               <span class="gr3">X1</span>
                           </div>
                           <div class="sp2">2015 - 09 -  02</div>
                           <div class="sp3"><a href="#">发表评价</a> </div>
                       </li>
                   </ul>
               </div>
               <div class="member-setup clearfix">
                   <ul>
                       <li class="clearfix">
                           <div class="member-judge fr"><input type="checkbox"> 匿名评价</div>
                       </li>

                       <li class="clearfix">
                           <div class="member-score fl"><i class="reds">*</i>商品评价：</div>
                           <div class="member-star fl">
                               <textarea maxlength="200"></textarea>
                           </div>
                       </li>
                       <li class="clearfix">
                           <div class="member-score fl">晒单：</div>
                           <div class="member-star fl">
                               <a href="#"><img src="theme/img/pd/m2.png"></a>
                               <a href="#"><img src="theme/img/pd/m2.png"></a>
                               <a href="#"><img src="theme/img/pd/m2.png"></a>
                           </div>
                       </li>
                       <li class="clearfix">
                           <div style="padding-left:85px;">最多可以增加<i class="reds">10</i>张</div>
                       </li>
                   </ul>
               </div>

              <!--   <div class="member-pages clearfix">
                    <div class="fr pc-search-g">
                        <a class="fl pc-search-f" href="#">上一页</a>
                        <a href="#" class="current">1</a>
                        <a href="javascript:;">2</a>
                        <a href="javascript:;">3</a>
                        <a href="javascript:;">4</a>
                        <a href="javascript:;">5</a>
                        <a href="javascript:;">6</a>
                        <a href="javascript:;">7</a>
                        <span class="pc-search-di">…</span>
                        <a title="使用方向键右键也可翻到下一页哦！" class="pc-search-n" href="javascript:;" onClick="SEARCH.page(3, true)">下一页</a>
                    <span class="pc-search-y">
                        <em>  共20页    到第</em>
                        <input type="text" class="pc-search-j" placeholder="1">
                        <em>页</em>
                        <a href="#" class="confirm">确定</a>
                    </span>

                    </div>
                </div> -->

            </div>
        </div>

        </div>
    </div>
</section>
<!-- 商城快讯 End -->


@stop