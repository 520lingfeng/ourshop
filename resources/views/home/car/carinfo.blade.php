@extends('layout.homes')

@section('title',$title)
<style>
    .yHeader{
        display:none;
    }
    
    .youyi{
        margin-left:35px;
    }
</style>
 <link type="text/css" rel="stylesheet" href="/home/theme/css/style.css" />
    <!--[if IE 6]>
    <script src="/home/theme/js/iepng.js" type="text/javascript"></script>
        <script type="text/javascript">
           EvPNG.fix('div, ul, img, li, input, a'); 
        </script>
    <![endif]-->
    
    <script type="text/javascript" src="/home/theme/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="/home/theme/js/menu.js"></script>    
                
  <script type="text/javascript" src="/home/theme/js/n_nav.js"></script>   
    
    <script type="text/javascript" src="/home/theme/js/num.js">
      var jq = jQuery.noConflict();
    </script>     
    
    <script type="text/javascript" src="/home/theme/js/shade.js"></script>
@section('content')
   <!--Begin 第二步：确认订单信息 Begin -->
    <div class="content mar_20 youyi">
        <div class="two_bg">
            <div class="two_t">
                购买商品列表
            </div>
        <form action="/orders" method="post">    
            <table border="0" class="car_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
              <tr>
                <td class="car_th" width="550">商品名称</td>
                <td class="car_th" width="140">单价</td>
                <td class="car_th" width="150">购买数量</td>
                <td class="car_th" width="130">小计</td>
                
              </tr>
               <?php $total=0 ?>
              @foreach($data as $v)

              <tr>
              <input type="hidden" name="carid" value="{{$v->id}}">
                <td>
                    <div class="c_s_img"><img src={{$v->pic}} width="73" height="73" /></div>
                   {{$v->gname}}
                </td>
                <td align="center">{{$v->price}}</td>
                <td align="center">{{$v->snum}}</td>
                <td align="center" style="color:#ff4e00;">{{$v->price*$v->snum}}</td>
              </tr>
              <?php  $total = $total + $v->price*$v->snum?>
              @endforeach
              <tr>
                <td colspan="5" align="right" style="font-family:'Microsoft YaHei';">
                    商品总价：￥{{$total}}
                    <input type="hidden" name="total" value="{{$total}}">  
                </td>
              </tr>
            </table>
            
            <div class="two_t">
                <span class="fr"><a href="/address/{{$uid[0]->id}}">修改</a></span>收货人信息
            </div>
            @if(session('error'))
                {{session('error')}}
            @endif
            <table border="0" class="peo_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
            @if($address)
              <input type="hidden" name='addid' value="{{$address[0]->id}}">
              <tr>
                <td class="p_td">收货人</td>
                <td>{{$address[0]->name}}</td>
                <td class="p_td">详细信息</td>
                <td>{{$address[0]->add}}</td>
                <td class="p_td">手机</td>
                <td>{{$address[0]->phone}}</td>
              </tr>
            @else
              <button><a href="/address/{{$uid[0]->id}}">选择收货地址</a></button>
            @endif
            </table>

            
           <!--  <div class="two_t">
                配送方式
            </div>
            <table border="0" class="car_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
              <tr>
                <td class="car_th" width="80"></td>
                <td class="car_th" width="200">名称</td>
                <td class="car_th" width="370">订购描述</td>
                <td class="car_th" width="150">费用</td>
                <td class="car_th" width="135">免费额度</td>
                <td class="car_th" width="175">保价费用</td>
              </tr>
              <tr>
                <td align="center"><input type="checkbox" name="ch" checked="checked" /></td>
                <td align="center" style="font-size:14px;"><b>申通快递</b></td>
                <td>江、浙、沪地区首重为15元/KG，其他地区18元/KG，续重均为5-6元/KG， 云南地区为8元</td>
                <td align="center">￥15.00</td>
                <td align="center">￥0.00</td>
                <td align="center">不支持保价</td>
              </tr>
              <tr>
                <td align="center"><input type="checkbox" name="ch" /></td>
                <td align="center" style="font-size:14px;"><b>城际快递</b></td>
                <td>运费固定</td>
                <td align="center">￥15.00</td>
                <td align="center">￥0.00</td>
                <td align="center">不支持保价</td>
              </tr>
              <tr>
                <td align="center"><input type="checkbox" name="ch" /></td>
                <td align="center" style="font-size:14px;"><b>邮局平邮</b></td>
                <td>运费固定</td>
                <td align="center">￥15.00</td>
                <td align="center">￥0.00</td>
                <td align="center">不支持保价</td>
              </tr>
              <tr>
                <td colspan="6">
                    <span class="fr"><label class="r_rad"><input type="checkbox" name="baojia" /></label><label class="r_txt">配送是否需要保价</label></span>
                </td>
              </tr>
            </table>  -->
            
            <div class="two_t">
                支付方式
            </div>
            <ul class="pay">
                <li >余额支付<div class="ch_img"></div></li>
                <li>银行亏款/转账<div class="ch_img"></div></li>
                <li>货到付款<div class="ch_img"></div></li>
                <li class="checked">支付宝<div class="ch_img"></div></li>
            </ul>
            
            <table border="0" style="width:900px; margin-top:20px;" cellspacing="0" cellpadding="0">
              <tr>
                <td align="right">
                    <!-- 该订单完成后，您将获得 <font color="#ff4e00">1815</font> 积分 ，以及价值 <font color="#ff4e00">￥0.00</font> 的红包 <br /> -->
                    商品总价: <font color="#ff4e00">￥{{$total}}</font>  + 配送费用: <font color="#ff4e00">￥15.00</font>
                </td>
              </tr>
              <tr height="70">
                <td align="right">
                    <b style="font-size:14px;">应付款金额：<span style="font-size:22px; color:#ff4e00;">￥{{$total+15}}</span></b>
                </td>
              </tr>
              <tr height="70">
                <td align="right"><button><img src="/home/theme/images/btn_sure.gif" /></button></td>
              </tr>
            </table>
            {{csrf_field()}}
      </form>
            
            
        </div>
    </div>
    <!--End 第二步：确认订单信息 End-->


@stop