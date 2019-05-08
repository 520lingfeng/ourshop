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
                 return a;
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
        <div class="m_right">
          
            

            <div class="mem_t">账号信息</div>
            <table border="0" class="mon_tab" style="width:870px; margin-bottom:20px;" cellspacing="0" cellpadding="0">
              <tbody>
              <td width="115"><img src={{$userinfo->head}} width="90" height="90"></td>
                    <td>
                        <div class="m_user">{{$user->username}}</div>
                        <p>
                            等级：注册用户 <br>
                            <!-- <font color="#ff4e00">您还差 270 积分达到 分红100</font><br> -->
                            <!-- 上一次登录时间: 2015-09-28 18:19:47<br> -->
                            <!-- 您还没有通过邮件认证 <a href="#" style="color:#ff4e00;">点此发送认证邮件</a> -->
                        </p>
                        <!-- <div class="m_notice">
                            用户中心公告！
                        </div> -->
                    </td>
                  </tr>
              <tr>
                <td width="40%">用户ID：<span style="color:#555555;">{{$user->id}} </span></td>
                <td width="60%">姓名：<span style="color:#555555;">{{$userinfo->name}} </span></td>
              </tr>
              <tr>
                <td width="40%">性别：<span style="color:#555555;">
                {{$userinfo->sex}}</span></td>
                <td width="60%">年龄：<span style="color:#555555;">{{$userinfo->age}}</span></td>
              </tr>
              <tr>
                <td>电&nbsp; &nbsp; 话：<span style="color:#555555;">{{$userinfo->phone}} </span></td>
                <td>邮&nbsp; &nbsp; 箱：<span style="color:#555555;">{{$userinfo->email}}</span></td>
              </tr>
              <tr>
                <td>地址：<span style="color:#555555;">{{$userinfo->address}}</span></td>
                <td>注册时间：<span style="color:#555555;">{{$user->addtime}}</span></td>
              </tr>
              <tr>
                <td width="70%"><a href="/member/{{$userinfo->id}}/edit"><button class="button">修改信息</button></a>  </td>
              </tr>
            </tbody></table>
             
            <div class="mem_t">资产信息</div>
            <table border="0" class="mon_tab" style="width:870px; margin-bottom:20px;" cellspacing="0" cellpadding="0">
              <tbody><tr>
                <td width="33%">用户等级：<span style="color:#555555;">普通会员</span></td>
                <td width="33%">消费金额：<span>￥200元</span></td>
                <td width="33%">返还积分：<span>99R</span></td>
              </tr>
              <tr>
                <td>账户余额：<span>￥200元</span></td>
                <td>红包个数：<span style="color:#555555;">3个</span></td>
                <td>红包价值：<span>￥50元</span></td>
              </tr>
              <tr>
                <td colspan="3">订单提醒：
                    <font style="font-family:'宋体';">待付款(<span>0</span>) &nbsp; &nbsp; &nbsp; &nbsp; 待收货(<span>2</span>) &nbsp; &nbsp; &nbsp; &nbsp; 待评论(<span>1</span>)</font>
                </td>
              </tr>
            </tbody></table>

        </div>
    </div>
</section>
<!-- 商城快讯 End -->


@stop