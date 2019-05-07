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
    <title>@yield('title')</title>
    <link rel="shortcut icon" type="image/x-icon" href="/home/theme/icon/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/home/theme/css/base.css">
    <link rel="stylesheet" type="text/css" href="/home/theme/css/home.css">
    
    <script type="text/javascript" src="/home/theme/js/jquery.js"></script>
    <script type="text/javascript" src="/home/theme/js/index.js"></script>
    <script type="text/javascript" src="/home/theme/js/js-tab.js"></script>
    <script type="text/javascript" src="/home/theme/js/MSClass.js"></script>
    <script type="text/javascript" src="/home/theme/js/jcarousellite.js"></script>

    <!-- js文件 -->
    @section('file_js')

    @show()
    <script type="text/javascript" src="/home/theme/js/top2.js"></script>

    <style>
        /*二级菜单的样式*/
        .erji:hover {

            cursor:pointer;
        }
    </style>

 </head>
 <body>

<div class="moq">
    <div id="moquu_wxin" class="moquu_wxin"><a href="javascript:void(0)"><div class="moquu_wxinh"></div></a></div>
    <div id="moquu_wshare" class="moquu_wshare"><a href="javascript:void(0)" style="text-indent:0"><div class="moquu_wshareh"><img src="/home/theme/icon/moquu_wshare.png" width="100%"></div></a></div>
    <div id="moquu_wmaps"><a href="javascript:void(0)" class='moquu_wmaps'></a></div>
    <a id="moquu_top" href="javascript:void(0)"></a>
</div>

<!--- header begin-->
<header id="pc-header">
    <div class="BHeader">
        <div class="yNavIndex">
            <ul class="BHeaderl">
                @if (session('husername'))
                
                    <li><a href="/member" style="float:left;" >{{session('husername')}}</a> <a href="/login" style="float:left;">退出</a> </li>
                @else
                    <li><a href="/login" style="color:#ea4949;">请登录</a> </li>
                    <li class="headerul">|</li>
                    <li><a href="/register">免费注册</a> </li>
                @endif
                <li class="headerul">|</li>
                <li><a href="/orders">订单查询</a> </li>
                <li class="headerul">|</li>
                <li><a href="/collects">我的收藏</a> </li>
                <li class="headerul">|</li>
                <li id="pc-nav" class="menu"><a href="/" class="tit">我的商城</a>
                    <div class="subnav">
                        <a href="/orders">我的订单</a>
                        <a href="/collects">我的收藏</a>
                        <a href="my-user.html">账户安全</a>
                        <a href="/address">地址管理</a>
                        <a href="my-p.html">我要评价</a>
                    </div>
                </li>
                <li class="headerul">|</li>
                <li id="pc-nav1" class="menu"><a href="/" class="tit M-iphone">手机悦商城</a>
                   <div class="subnav">
                       <a href="#"><img src="/home/theme/icon/ewm.png" width="115" height="115" title="扫一扫，有惊喜！"></a>
                   </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="container clearfix">
        <div class="header-logo fl"><h1><a href="/"><img src="/home/theme/icon/logo.png"></a> </h1></div>
        <div class="head-form fl">
            <form class="clearfix">
                <input type="text" class="search-text" accesskey="" id="key" autocomplete="off"  placeholder="洗衣机">
                <button class="button" onClick="search('key');return false;">搜索</button>
            </form>
            <div class="words-text clearfix">
                <a href="#" class="red">1元秒爆</a>
                <a href="#">低至五折</a>
                <a href="#">农用物资</a>
                <a href="#">买一赠一</a>
                <a href="#">佳能相机</a>
                <a href="#">稻香村月饼</a>
                <a href="#">服装城</a>
            </div>
        </div>
        <div class="header-cart fr"><a href="/car"><img src="/home/theme/icon/car.png"></a> <i class="head-amount">99</i></div>
        <div class="head-mountain"></div>
    </div>

    @php

        // 引入分类模型
        use App\Model\Admin\Type;

        // 判断缓存中是否有type值
        if (Cache::get('type')) {
            
            $type = Cache::get('type');

        } else {

            // 获取所有分类 一级
            $type = Type::all();
            
            // 将值放进缓存
            Cache::forever('type', $type);
        }
    
        // 二级分类
        $type2 = $type;
    @endphp

    <!-- 左边导航条 -->
    <!-- 遍历分类 -->
    <div class="yHeader">
        <div class="yNavIndex">
            <div class="pullDown">
                <h2 class="pullDownTitle" style="margin:0">
                    <a href="/list" style="color:#fff;">全部商品分类</a>
                </h2>
                <ul class="pullDownList" style="background-color:#444">

                @foreach ($type as $k => $v)
                    {{-- 一级分类 --}}
                    @if ($v->path == '0,' && $v->status == 0)
                    <li class="menulihover">
                        <i class="listi1"></i>
                        <a href="/list" target="_blank">{{ $v->tname }}</a>
                        <span></span>
                    </li>
                    @endif
                 @endforeach
                </ul>

                <div class="yMenuListCon">
                @foreach ($type as $k => $v)
                    <div class="yMenuListConin">
                        <div class="yMenuLCinList fl">
                        {{-- 二级分类 --}}
                        @foreach ($type2 as $k2 => $v2)
                            @if ($v->tid == $v2->pid && $v2->status == 0)
                                <p>
                                    <a href="/erji/{{ $v2->tid }}" class="ecolor610" >{{ $v2->tname }}</a>
                                </p>
                            @endif
                        @endforeach
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
           
            <!-- 全部商品分类 右边的导航条 -->
            <ul class="yMenuIndex">
                <li><a href="" target="_blank">服装城</a></li>
                <li><a href="" target="_blank">美妆馆</a></li>
                <li><a href="" target="_blank">美食</a></li>
                <li><a href="" target="_blank">全球购</a></li>
                <li><a href="" target="_blank">闪购</a></li>
                <li><a href="" target="_blank">团购</a></li>
                <li><a href="" target="_blank">拍卖</a></li>
                <li><a href="" target="_blank">金融</a></li>
                <li><a href="" target="_blank">智能</a></li>
            </ul>
            <!-- 全部商品分类 右边的导航条 -->
        </div>
    </div>
    <!-- 左边导航条 -->
</header>
<!-- header End -->

@section('content')

@show()


<!-- foot -->
<div class="aui-footer-bot">
    <div class="time-lists aui-footer-pd clearfix">
        <div class="aui-footer-list clearfix">
            <h4>
                <span><img src="/home/theme/icon/icon-d1.png"></span>
                <em>消费者权益</em>
            </h4>
            <ul>
                <li><a href="#">保障范围 </a> </li>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>
                <span><img src="/home/theme/icon/icon-d2.png"></span>
                <em>新手上路</em>
            </h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>
                <span><img src="/home/theme/icon/icon-d3.png"></span>
                <em>保障正品</em>
            </h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>
                <span><img src="/home/theme/icon/icon-d1.png"></span>
                <em>消费者权益</em>
            </h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
    </div>
    <div style="border-bottom:1px solid #dedede"></div>
    <div class="time-lists aui-footer-pd time-lists-ls clearfix">
        <div class="aui-footer-list clearfix">
            <h4>购物指南</h4>
            <ul>
                <li><a href="#">保障范围 </a> </li>
                <li><a href="#">购物流程</a> </li>
                <li><a href="#">会员介绍 </a> </li>
                <li><a href="#">生活旅行</a> </li>
                <li><a href="#"> 常见问题 </a> </li>
                <li><a href="#"> 联系客服购物指南 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>特色服务</h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>帮助中心</h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
        <div class="aui-footer-list clearfix">
            <h4>新手指导</h4>
            <ul>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">退货退款流程</a> </li>
                <li><a href="#">服务中心 </a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#">服务中心</a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
                <li><a href="#"> 更多特色服务 </a> </li>
            </ul>
        </div>
    </div>
</div>
    @section('js')

    @show()
</body>


</html>