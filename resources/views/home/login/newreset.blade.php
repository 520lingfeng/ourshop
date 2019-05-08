
    <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="Generator" content="EditPlus®">
    <meta name="Author" content="">
    <meta name="Keywords" content="">
    <meta name="Description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
    <meta name="renderer" content="webkit">
    <title>密码找回</title>
    <link rel="stylesheet" href="/home/theme/css/base.css">
    <link rel="stylesheet" type="text/css" href="/home/theme/css/login.css">
    <script src="/home/theme/js/jquery-3.1.1.min.js"></script>
    <script src="/home/theme/js/checkcode.js"></script>
</head>
<body>
<div class="w">
    <div id="logo">
        <a href="index.html">
            <img src="/home/theme/icon/logo.png" alt="">
        </a>
        <b></b>
    </div>
</div>
<div id="content">
  <div class="login-wrap">
    <div class="w">
        <div class="login-form">
            <div class="login-tab login-tab-r">
                <a style="margin-left:-90px">重置密码</a>
            </div>

            <div class="login-box" style="visibility: visible; display:block">
              <div class="mt tab-h"></div>
              <div class="msg-wrap"></div>
              <div class="mc">
                <div class="form">

                    <form action="/doreset" id="formlogin" method="post" >
                        <input type="hidden" name="id" value="{{$id}}">
                        <div class="item item-fore1 item-error">
                            <label for="loginname" class="login-label name-label"></label>
                            <input type="password" name="password" id="loginname" class="itxt" tabindex="1" autocomplete="off" placeholder="新密码">
                            <span class="clear-btn" style="display:inline;"></span>
                        </div>
                        <div class="item item-fore1 item-error">
                            <label for="loginname" class="login-label name-label"></label>
                            <input type="password" name="repassword" id="loginname" class="itxt" tabindex="1" autocomplete="off" placeholder="重复新密码">
                            <span class="clear-btn" style="display:inline;"></span>
                        </div>

                
     
                        <!-- 登录按钮开始 -->
                        <div class="item item-fore5">
                        {{csrf_field()}}
                            <div class="login-btn">
                                <button class="btn-img btn-entry" id="loginsubmit" tabindex="6" on11Click="validate()">重置密码</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
              </div>
            </div>

        </div>
    </div>
    <div class="login-banner" style="background-color: #ea4949">
        <div class="w">
            <div id="banner-bg" class="i-inner" style="background: url(/home/theme/login/a1.jpg);"></div>
        </div>
    </div>
  </div>
</div>
<div class="w">
    <div id="footer-2013">
        <div class="links">
            <a href="">关于我们</a>
            |
            <a href="">联系我们</a>
            |
            <a href="">人才招聘</a>
            |
            <a href="">商家入驻</a>
            |
            <a href="">广告服务</a>
            |
            <a href="">手机京东</a>
            |
            <a href="">友情链接</a>
            |
            <a href="">销售联盟</a>
            |
            <a href="">English site</a>
        </div>
        <div style="padding-left:10px">
            <p style="padding-top:10px; padding-bottom:10px; color:#999">网络文化经营许可证：浙网文[2013]0268-027号| 增值电信业务经营许可证：浙B2-20080224-1</p>
            <p style="padding-bottom:10px; color:#999">信息网络传播视听节目许可证：1109364号 | 互联网违法和不良信息举报电话:0571-81683755</p>
        </div>
    </div>
</div>

</body>

<script type="text/javascript">
    //alert($)
    $(".login-tab-r").click(function(){
        $(".login-box").css({"display":"block","visibility":"visible"});
        $(".qrcode-login").css({"display":"none"})
    });
    $(".login-tab-l").click(function(){
        $(".login-box").css({"display":"none"});
        $(".qrcode-login").css({"display":"block","visibility":"visible"})
    });
    //点击微信图片显示帮助
    $(".qrcode-img").hover(function(){
        $(".qrcode-img").css({"left": "0"});
        $(".qrcode-help").css({"display":"block"});
    },function(){
        $(".qrcode-img").css({"left": "64px"});
        $(".qrcode-help").css({"display":"none"});
    });
    //确认输入用户名密码后，显示验证码
    // $("#nloginpwd").blur(function(){
    //     if(($("#loginname").val() !="" )&&($("#nloginpwd").val() !="")){
    //     $("#o-authcode").css({"display":"block"});
    // }
    // })
    // createCode();

</script>
</html>