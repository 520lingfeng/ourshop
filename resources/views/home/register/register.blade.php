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
                <form class="demoform" action="/register" method="post">

                    <div class="login-input">
                        <label><i class="heart">*</i>用户名：</label>

                        <input type="text" class="list-input1 required" id="name" name="username" placeholder="">
                    </div>
                    
                    <div class="login-input">
                        <label><i class="heart">*</i>请设置密码：</label>
                        <input type="password" class="list-input required" id="password" name="password" placeholder="">
                    </div>
                    <div class="login-input">
                        <label><i class="heart">*</i>请确认密码：</label>
                        <input type="password" class="list-input required" id="repassword" name="repassword" placeholder="">
                    </div>
                   <!--  <div class="login-input">
                        <label><i class="heart">*</i>手机号：</label>
                        <input type="text" class="list-iphone" id="iphone" name="info[password]" placeholder="">
                        <a href="#" class="obtain">获取短信验证码</a>
                    </div>
                    <div class="login-input">
                        <label><i class="heart">*</i>短信验证码：</label>
                        <input type="text" class="list-notes" id="message" name="info[password]" placeholder="">
                    </div> -->
                    <div class="item-ifo">
                        <input type="checkbox" onClick="agreeonProtocol();" id="readme" checked="checked" class="checkbox">
                        <label for="protocol">我已阅读并同意<a id="protocol" class="blue" href="#">《悦商城用户协议》</a></label>
                        <span class="clr"></span>
                    </div>
                    {{csrf_field()}}
                    <div class="login-button">
                        <button id="send"><a>立即注册</a></button>
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
        //为表单的必填文本框添加提示信息（选择form中的所有后代input元素）
        $("form :input.required").each(function () {
            //通过jquery api：$("HTML字符串") 创建jquery对象
            var $required = $("<strong class='high'>*</strong>");
            //添加到this对象的父级对象下
            $(this).parent().append($required);
        });

        //为表单元素添加失去焦点事件
        $("form :input").blur(function(){
            var $parent = $(this).parent();
            $parent.find(".msg").remove(); //删除以前的提醒元素（find()：查找匹配元素集中元素的所有匹配元素）
            //验证姓名
            if($(this).is("#name")){
                var nameVal = $.trim(this.value); //原生js去空格方式：this.replace(/(^\s*)|(\s*$)/g, "")
                var regName = /[~#^$@%&!*()<>:;'"{}【】  ]/;
                if(nameVal == "" || nameVal.length < 6 || regName.test(nameVal)){
                    var errorMsg = "非空,6位以上,不含特殊字符";
                    //class='msg onError' 中间的空格是层叠样式的格式
                    $parent.append("<span class='msg onError'>" + errorMsg + "</span>");
                }
                else{
                    var okMsg=" 输入正确";
                    $parent.find(".high").remove();
                    $parent.append("<span class='msg onSuccess'>" + okMsg + "</span>");
                }
            }
            if($(this).is("#password")){
                var nameVal = $.trim(this.value); //原生js去空格方式：this.replace(/(^\s*)|(\s*$)/g, "")
                repassword = nameVal;
                var regName = /[*]/;
                if(nameVal == "" || nameVal.length < 6 || regName.test(nameVal)){
                    var errorMsg = "密码要大于6位";
                    //class='msg onError' 中间的空格是层叠样式的格式
                    $parent.append("<span class='msg onError'>" + errorMsg + "</span>");
                }
                else{
                    var okMsg=" 输入正确";
                    $parent.find(".high").remove();
                    $parent.append("<span class='msg onSuccess'>" + okMsg + "</span>");
                }
            }
            if($(this).is("#repassword")){
                var nameVal = $.trim(this.value); //原生js去空格方式：this.replace(/(^\s*)|(\s*$)/g, "")
                // console.log(nameVal);
                // console.log(repassword)
                if(nameVal!== repassword || nameVal == ""){
                    var errorMsg = "两次不一样";
                    //class='msg onError' 中间的空格是层叠样式的格式
                    $parent.append("<span class='msg onError'>" + errorMsg + "</span>");
                }
                else{
                    var okMsg=" 输入正确";
                    $parent.find(".high").remove();
                    $parent.append("<span class='msg onSuccess'>" + okMsg + "</span>");
                }
            }
            // //验证邮箱
            // if($(this).is("#email")){
            //     var emailVal = $.trim(this.value);
            //     var regEmail = /.+@.+\.[a-zA-Z]{2,4}$/;
            //     if(emailVal== "" || (emailVal != "" && !regEmail.test(emailVal))){
            //         var errorMsg = " 请输入正确的E-Mail住址！";
            //         $parent.append("<span class='msg onError'>" + errorMsg + "</span>");
            //     }
            //     else{
            //         var okMsg=" 输入正确";
            //         $parent.find(".high").remove();
            //         $parent.append("<span class='msg onSuccess'>" + okMsg + "</span>");
            //     }
            // }
        }).keyup(function(){
            //triggerHandler 防止事件执行完后，浏览器自动为标签获得焦点
            $(this).triggerHandler("blur"); 
        }).focus(function(){
            $(this).triggerHandler("blur");
        });
        
        //点击重置按钮时，通过trigger()来触发文本框的失去焦点事件
        $("#send").click(function(){
            //trigger 事件执行完后，浏览器会为submit按钮获得焦点
            $("form .required:input").trigger("blur"); 
            var numError = $("form .onError").length;
            if(numError){
                return false;
            }
            alert("注册成功！");
        });
</script>