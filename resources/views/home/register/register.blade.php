<!doctype html>
<html>
 <head>
    <meta charset="UTF-8">
    <meta name="Generator" content="EditPlus®">
    <meta name="Author" content="">
    <meta name="Keywords" content="">
    <meta name="Description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE"> 
    <meta name="renderer" content="webkit">
    <title>用户注册</title>
    <style>
     .int{ height: 30px; text-align: left; width: 600px; }
     label{ width: 200px; margin-left: 20px; }
     .high{ color: red; margin-left: 15px; line-height:40px;}
     .msg{ font-size: 13px; }
     .onError{ color: red; margin-left: 15px; line-height:40px;}
     .onSuccess{ color: green; margin-left: 15px; line-height:40px;}
     .subbtn{
        width: 270px;
        height: 45px;
        line-height: 45px;
        text-align: center;
        background: #ea4949;
        border-radius: 2px;
        display: block;
        color: #ffffff;
        font-size: 16px;
     }
    </style>
    <link rel="shortcut icon" type="image/x-icon" href="/home/theme/icon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/home/theme/css/base.css">
    <link rel="stylesheet" type="text/css" href="/home/theme/css/login.css">
    <script type="text/javascript" src="/home/theme/js/jquery-3.1.1.min.js"></script
    
    
 </head>
 <body>

<!--- header begin-->
<header id="pc-header">
    <div class="login-header" style="padding-bottom:0">
        <div><h1><a href="index.html"><img src="/home/theme/icon/logo.png"></a></h1></div>
    </div>
</header>
<!-- header End -->




    <div class="login-centre">
        <div class="login-switch clearfix">
            <p class="fr">我已经注册，现在就 <a href="/login">登录</a></p>
        </div>
        <div class="login-back">
            <div class="H-over">
            <script type="text/javascript" src="/home/theme/js/Validform_v5.1_min.js"></script>
                <form class="demoform" action="/register" id="form" method="post">

                    <div class="login-input">
                        <label><i class="heart">*</i>用户名：</label>

                        <input type="text" class="list-input1" id="name" name="username" placeholder=""><span id="tags"></span>
                    </div>
                    
                    <div class="login-input">
                        <label><i class="heart">*</i>请设置密码：</label>
                        <input type="password" class="list-input required" id="password" name="password" placeholder=""><span id="tags"></span>
                    </div>
                    <div class="login-input">
                        <label><i class="heart">*</i>请确认密码：</label>
                        <input type="password" class="list-input required" id="repassword" name="repassword" placeholder=""><span id="tags"></span>
                    </div>
                    <div class="login-input">
                        <label><i class="heart">*</i>手机号：</label>
                        <input type="text" class="list-iphone" id="iphone" name="phone" placeholder="" reminder="请输入正确的手机号"><span id="tags"></span>
                        <a href="javascript:void(0)" class="obtain" id="huoqu">获取短信验证码</a>
                    </div>
                    <div class="login-input">
                        <label><i class="heart">*</i>输入验证码：</label>
                        <input type="text" class="list-notes" id="message" name="code" placeholder="" reminder="请输入正确的验证码"><span id="tags"></span>
                    </div>
                    <div class="item-ifo">
                        <input type="checkbox" onClick="agreeonProtocol();" id="readme" checked="checked" class="checkbox">
                        <label for="protocol">我已阅读并同意<a id="protocol" class="blue" href="#">《悦商城用户协议》</a></label>
                        <span class="clr"></span>
                    </div>
                    {{csrf_field()}}
                    <div class="login-button">
                        <input type="submit" value="立即注册" class="subbtn" data-loading-text="Loading..." />
                    </div>

                </form>
               
            </div>
        </div>
    </div>


<!--- footer begin-->
<footer id="footer">
    <div class="containers">
        <div class="w" style="padding-top:30px">
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

    </div>
</footer>

<!-- footer End -->
</body>
</html>
<script>
        
        $("input").focus(function(){
            reminder = $(this).attr('reminder');
            $(this).next("span").css('color','red').html(reminder);
        });

        //获取密码，绑定失去焦点事件
        $("input[name='password']").blur(function(){
            //获取密码
            pass = $(this).val();
            password=$.trim(pass);
            returnpass = password 
            //匹配正则
            if(password.match(/^[\w_]{6,16}$/)==null || password == ""){
                $(this).next("span").css("color",'red').html('密码6-16位')
                PASS=false;
            }else{
                $(this).next("span").css("color",'green').html('密码格式正确')
                PASS=true
            }

        })
        // 判断两次密码是否一致
        $("input[name='repassword']").blur(function(){
            //获取确认密码
            repass = $(this).val();
             repassword=$.trim(repass);
            //开始判断
            if(repassword !== returnpass || repassword == ""){
                $(this).next("span").css("color",'red').html('两次密码不一致')
                REPASS=false
            }else{
                $(this).next("span").css("color",'green').html('输入正确')
                REPASS=true
            }
        })

        //获取用户名，绑定失去焦点事件
        $("input[name='username']").blur(function(){
            //获取用户名
            username = $(this).val();
            //ajax不解析$(this) 赋值给一个变量
            user=$(this);
            //匹配正则
            if(username.match(/^[a-zA-Z0-9_-]{4,16}$/)==null || username ==""){
                $(this).next("span").css("color",'red').html('4到16位(字母，数字，下划线，减号)');
                USER=false;
            }else{
                //判断用户名是否已注册
                $.get("/checkusername",{username:username},function(data){
                    if(data==1)
                    {
                        //用户名已经存在
                        user.next("span").css("color",'red').html('用户名已存在');
                        USER=false;
                    }else{
                        //用户名可以用
                        user.next("span").css("color",'green').html('用户名可用');
                        USER=true;
                    }
                });
            }
        });

        // 获取手机号，绑定失去焦点事件
        $("input[name='phone']").blur(function(){
            //获取手机号
            phone = $(this).val();
            //ajax不解析$(this) 赋值给一个变量
            o=$(this);
            //匹配正则
            if(phone.match(/^1[3456789][0-9]{9}$/)==null || phone == ""){
                $(this).next("span").css("color",'red').html('手机号码不合法');
                PHONE=false;
            }else{
                //判断手机号是否重复
                $.get("/checkphone",{phone:phone},function(data){
                    if(data==1){
                        //手机号码已经注册
                        o.next("span").css("color",'red').html('手机号已经注册');
                        //把获取校验码按钮 设置禁用
                        $("#huoqu").attr("disabled",true).css("pointer-events","none"); 
                        PHONE=false;
                    }else{
                        //手机号码可以使用
                        o.next("span").css("color",'green').html('手机号可用');
                        //把获取校验码按钮 设置激活
                        $("#huoqu").attr("disabled",false).removeAttr("style","");
                        PHONE=true;
                    }
                })
            
            }
        });
        //获取发送短信校验码按钮 绑定单击事件
             $("#huoqu").click(function(){
                s=$(this);
                //获取注册的手机号
                phone=$("input[name='phone']").val();
                //Ajax
                $.get("/sendphone",{phone:phone},function(data){
                    // console.log(data.code);
                  if(data.code==000000){
                    m=60;
                    //定时器
                    mytime=setInterval(function(){
                      m--;
                      //m赋值按钮
                      s.html(m+"秒后重新发送");
                      s.attr('disabled',true).css("pointer-events","none");
                      //判断
                      if(m==0){
                        //清除定时器
                        clearInterval(mytime);
                        s.html("重新发送");
                        s.attr('disabled',false).removeAttr("style","");
                      }
                    },1000);
                  }
                },'json');
             });
            //获取输入验证码input
             $("input[name='code']").blur(function(){
              c=$(this);
              //获取输入的校验码
              code=$(this).val();
              //Ajax
              $.get("/checkcode",{code:code},function(data){
                if(data==1){
                  //校验码一致
                  c.next("span").css('color','green').html('校验码一致');
                  CODE=true;
                }else if(data==2){
                  //校验码不一致
                  c.next("span").css('color','red').html('校验码有误');
                  CODE=false;
                }else if(data==3){
                  //输入校验码为空
                  c.next("span").css('color','red').html('校验码为空');
                  CODE=false;
                }else if(data==4){
                  //验证码过期
                  c.next("span").css('color','red').html('校验码已经过期');
                  CODE=false;
                }
              });
             });
         //表单提交
         $("#form").submit(function(){
          //trigger 某个元素触发某个事件
          $("input").trigger("blur");
          if(PHONE && CODE && USER && PASS && REPASS){
            return true;//成功提交
          }else{
            return false;
          }
          
         });
</script>