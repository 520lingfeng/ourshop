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
   <!--Begin 第一步：查看购物车 Begin -->
    <div class="content mar_20 youyi">
      <form action="/carinfo"  method="post">
        <table border="0" class="car_tab" style="width:1200px; margin-bottom:50px;" cellspacing="0" cellpadding="0">
            <tr>
              <td class="car_th" width="490">商品名称</td>
              <td class="car_th" width="140">单价</td>
              <td class="car_th" width="150">购买数量</td>
              <!-- <td class="car_th" width="130">小计</td> -->
              <td class="car_th" width="140">小计</td>
              <td class="car_th" width="150">操作</td>
            </tr>
            
          @if($data)
            <?php $total=0 ?>
            @foreach($data as $v)
            <tr>
              <td>
                <div class="c_s_img"><img src={{$v->pic}} width="73" height="73" /></div>
                  {{$v->gname}}
              </td>
              <td align="center">￥{{$v->price}}</td>
              <td align="center">
                <div class="c_num">
                      <input type="button" value="" onclick="jianUpdate1(jq(this));" class="car_btn_1" />
                      <!-- <button class="car_btn_1" onclick="jianUpdate1(jq(this));">-</button> -->
                    <input type="text" value="{{$v->snum}}" name="carnum" class="car_ipt" />  
                      <input type="button" value="" onclick="addUpdate1(jq(this));" class="car_btn_2" />
                      <!-- <button class="car_btn_2" onclick="addUpdate1(jq(this));">+</button> -->

                  </div>
              </td>
              <!-- <td align="center">26R</td> -->
              <td align="center" style="color:#ff4e00;">{{$v->price*$v->snum}}</td>
              <td align="center"><a href="#">删除</a>&nbsp; &nbsp;<a href="#">加入收藏</a></td>
            </tr>
            <?php  $total = $total + $v->price*$v->snum?>
            @endforeach
          @else
           <a href="/">快去购物ba</a>
          @endif
            <tr height="70">
              <td colspan="6" style="font-family:'Microsoft YaHei'; border-bottom:0;">
                <label class="r_rad"><input type="checkbox" name="clear" checked="checked" /></label><label class="r_txt">清空购物车</label>
                  <span class="fr">商品总价：<b style="font-size:22px; color:#ff4e00;">￥{{$total}}</b></span>
              </td>
            </tr>
            <tr valign="top" height="150">
              <td colspan="6" align="right">
                <a href="/"><img src="/home/theme/img/car/buy1.gif" /></a>&nbsp; &nbsp; <button><img src="/home/theme/img/car/buy2.gif" /></button>
              </td>
            </tr>
        </table>
        {{csrf_field()}}
       </form> 
    </div>
  <!--End 第一步：查看购物车 End--> 
    
    
    <!--Begin 弹出层-删除商品 Begin-->
    <div id="fade" class="black_overlay"></div>
    <div id="MyDiv" class="white_content">             
        <div class="white_d">
            <div class="notice_t">
                <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv('MyDiv','fade')"><img src="images/close.gif" /></span>
            </div>
            <div class="notice_c">
              
                <table border="0" align="center" style="font-size:16px;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td>您确定要把该商品移除购物车吗？</td>
                  </tr>
                  <tr height="50" valign="bottom">
                    <td><a href="#" class="b_sure">确定</a><a href="#" class="b_buy">取消</a></td>
                  </tr>
                </table>
                    
            </div>
        </div>
    </div>    
    <!--End 弹出层-删除商品 End-->
    
    


@stop