<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/admin/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/admin/css/font.css">
	<link rel="stylesheet" href="/admin/css/xadmin.css">
    <link rel="stylesheet" href="/admin/css/swiper.min.css">
    <link rel="stylesheet" href="/bs/css/bootstrap.min.css">

    <script type="text/javascript" src="/admin/js/jquery.min.js"></script>
    <script type="text/javascript" src="/admin/js/swiper.jquery.min.js"></script>
    <script src="/admin/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/admin/js/xadmin.js"></script>
    
</head>
<body>
    <!-- 顶部开始 -->
    <div class="container">
        <div class="logo"><a href="/admin/index.html">商城后台管理</a></div>
        <div class="open-nav"><i class="iconfont">&#xe699;</i></div>
        <ul class="layui-nav right" lay-filter="">
          <li class="layui-nav-item">
            <a href="javascript:;">admin</a>
            <dl class="layui-nav-child"> <!-- 二级菜单 -->
              <dd><a href="">个人信息</a></dd>
              <dd><a href="">切换帐号</a></dd>
              <dd><a href="/admin/login.html">退出</a></dd>
            </dl>
          </li>
          <li class="layui-nav-item"><a href="">前台首页</a></li>
        </ul>
    </div>
    <!-- 顶部结束 -->
    <!-- 中部开始 -->
    <div class="wrapper">
        <!-- 左侧菜单开始 -->
        <div class="left-nav" >
          <div id="side-nav">
            <ul id="nav">
                <li class="list" current>
                    <a href="/admins">
                        <i class="iconfont">&#xe761;</i>
                        欢迎页面
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                </li>
                <!-- 用户管理 -->
                <li class="list">
                    <a href="javascript:;">
                        <i class="iconfont">&#xe70b;</i>
                        用户管理
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="/admin/user">
                                <i class="iconfont">&#xe6a7;</i>
                                用户列表
                            </a>
                        </li>
                        <li>
                            <a href="/admin/user/create">
                                <i class="iconfont">&#xe6a7;</i>
                                添加用户
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- 用户管理 -->
                
                 <!-- 订单管理 -->
                    <li class="list">
                        <a href="javascript:;">
                            <i class="iconfont">&#xe70b;</i>
                            订单管理
                            <i class="iconfont nav_right">&#xe697;</i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="/admin/orders">
                                    <i class="iconfont">&#xe6a7;</i>
                                    订单列表
                                </a>
                            </li>
                        </ul>
                    </li>
                <!-- 分类管理 -->
                <li class="list">
                    <a href="javascript:;">
                        <i class="iconfont">&#xe70b;</i>
                        分类管理
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="/admin/type">
                                <i class="iconfont">&#xe6a7;</i>
                                分类列表
                            </a>
                        </li>
                        <li>
                            <a href="/admin/type/create">
                                <i class="iconfont">&#xe6a7;</i>
                                添加分类
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- 分类管理 -->

                <!-- 商品管理 -->
                <li class="list">
                    <a href="javascript:;">
                        <i class="iconfont">&#xe70b;</i>
                        商品管理
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="/admin/goods">
                                <i class="iconfont">&#xe6a7;</i>
                                商品列表
                            </a>
                        </li>
                        <li>
                            <a href="/admin/goods/create">
                                <i class="iconfont">&#xe6a7;</i>
                                添加商品
                            </a>
                        </li>
                        <li>
                            <a href="/admin/imgs">
                                <i class="iconfont">&#xe6a7;</i>
                                商品关联图片列表
                            </a>
                        </li>
                    </ul>
                </li>               
                <!-- 商品管理 -->

                <!-- 促销管理 -->
                <li class="list">
                    <a href="javascript:;">
                        <i class="iconfont">&#xe70b;</i>
                        促销商品管理
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="/admin/sales/index">
                                <i class="iconfont">&#xe6a7;</i>
                                促销商品列表
                            </a>
                        </li>
                        <li>
                            <a href="/admin/goods">
                                <i class="iconfont">&#xe6a7;</i>
                                添加促销商品
                            </a>
                        </li>
                    </ul>
                </li>                
                <!-- 促销管理 -->

                <!-- 广告管理 -->
                <li class="list">
                    <a href="javascript:;">
                        <i class="iconfont">&#xe70b;</i>
                        广告管理
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="/admin/advert">
                                <i class="iconfont">&#xe6a7;</i>
                                广告列表
                            </a>
                        </li>
                        <li>
                            <a href="/admin/advert/create">
                                <i class="iconfont">&#xe6a7;</i>
                                添加广告
                            </a>
                        </li>
                    </ul>
                </li>                
                <!-- 广告管理 -->

                <!-- 友情链接管理 -->
                <li class="list">
                    <a href="javascript:;">
                        <i class="iconfont">&#xe70b;</i>
                        友情链接管理
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="/admin/links">
                                <i class="iconfont">&#xe6a7;</i>
                                友情链接列表
                            </a>
                        </li>
                        <li>
                            <a href="/admin/links/create">
                                <i class="iconfont">&#xe6a7;</i>
                                添加友情链接
                            </a>
                        </li>
                    </ul>
                </li>                
                <!-- 友情链接管理 --> 
                
                <!-- 文章管理 -->
                <li class="list">
                    <a href="javascript:;">
                        <i class="iconfont">&#xe70b;</i>
                        文章管理
                        <i class="iconfont nav_right">&#xe697;</i>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="/admin/articel">
                                <i class="iconfont">&#xe6a7;</i>
                                文章列表
                            </a>
                        </li>
                        <li>
                            <a href="/admin/articel/create">
                                <i class="iconfont">&#xe6a7;</i>
                                添加文章
                            </a>
                        </li>
                    </ul>
                </li>                
                <!-- 文章管理 -->             
            </ul>
          </div>
        </div>
        <!-- 左侧菜单结束 -->
        <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            
            @section('content')

            @show()

            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>
        <!-- 右侧主体结束 -->
    </div>
    <!-- 中部结束 -->
    <!-- 底部开始 -->
<!--     <div class="footer">
        <div class="copyright">Copyright ©2017 x-admin v2.3 All Rights Reserved. 本后台系统由X前端框架提供前端技术支持</div>  
    </div> -->
    <!-- 底部结束 -->
    <!-- 背景切换开始 -->
	<div class="bg-changer">
        <div class="swiper-container changer-list">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img class="item" src="/admin/images/a.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/admin/images/b.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/admin/images/c.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/admin/images/d.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/admin/images/e.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/admin/images/f.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/admin/images/g.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/admin/images/h.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/admin/images/i.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/admin/images/j.jpg" alt=""></div>
                <div class="swiper-slide"><img class="item" src="/admin/images/k.jpg" alt=""></div>
                <div class="swiper-slide"><span class="reset">初始化</span></div>
            </div>
        </div>
        <div class="bg-out"></div>
        <div id="changer-set"><i class="iconfont">&#xe696;</i></div>   
    </div>
    <!-- 背景切换结束 -->
    <script>
    //百度统计可去掉
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
      var s = document.getElementsByTagName("script")[0]; 
      s.parentNode.insertBefore(hm, s);
    })();
    </script>
</body>

@section('js')

@show()
</html>