@extends('layout.homes')

@section('title','歪秀购物')

@section('content')
<script type="text/javascript">banner()</script>

<!--- banner begin-->
<section id="pc-banner">
    <div class="yBanner">
        <div class="banner" id="banner" >
            <a href="javascript:;" class="d1" style="background:url(/home/theme/img/ad/banner1.jpg) center no-repeat;background-color: #f01a38; padding-left:180px;"></a>
            <a href="javascript:;" class="d1" style="background:url(/home/theme/img/ad/banner2.jpg) center no-repeat;background-color: #a96ae3; padding-left:180px;"></a>
            <a href="javascript:;" class="d1" style="background:url(/home/theme/img/ad/banner3.jpg) center no-repeat;background-color: #081f3c; padding-left:180px;"></a>
            <a href="javascript:;" class="d1" style="background:url(/home/theme/img/ad/banner4.jpg) center no-repeat;background-color: #4684ff; padding-left:180px;"></a>
            <a href="javascript:;" class="d1" style="background:url(/home/theme/img/ad/banner5.jpg) center no-repeat;background-color: #a89d9f; padding-left:180px;"></a>
            <div class="d2" id="banner_id">
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </div>
        <div style="text-align:center;clear:both"></div>
    </div>
</section>
<!-- banner End -->

<!--- advert begin-->
<section id="pc-advert">
    <div class="container-c clearfix">
        <a href="page.html" target="_blank"><img src="/home/theme/img/pd/pd1.png"></a>
        <a href="page.html" target="_blank"><img src="/home/theme/img/pd/pd2.png"></a>
        <a href="page.html" target="_blank"><img src="/home/theme/img/pd/pd3.png"></a>
        <a href="page.html" target="_blank"><img src="/home/theme/img/pd/pd4.png"></a>
    </div>
</section>
<!-- advert End -->

<!-- 商城资讯 begin -->
<section id="pc-information">
    <div class="containers">
        <div class="pc-info-mess  clearfix" style="position: relative;">
            <h2 class="fl" style="margin-right:20px;">商城快讯</h2>
            <div id="MarqueeDiv" class="MarqueeDiv">
                <a href="new.html">[特惠]新一代Moto 360智能手表登陆</a>
                <a href="new.html">[特惠]洗护节 跨品牌满199减100</a>
                <a href="new.html">[特惠]仁怀政府开启“仁怀酱香酒馆”</a>
                <a href="new.html">[特惠]洗护节 跨品牌满199减100</a>
                <a href="new.html">逛商城赚话费，商城通信51城全线抢购 </a>
                <a href="new.html">文艺蓝牙音箱 火热众筹中 </a>
                <a href="new.html">[公告]第1000家商城帮服务店落户遵义</a>
                <a href="new.html">[特惠]新一代Moto 360智能手表登陆</a>
                <a href="new.html">[特惠]新一代Moto 360智能手表登陆</a>
                <a href="new.html">[特惠]新一代Moto 360智能手表登陆</a>
            </div>
            <a href="new.html" style="position: absolute;right: 15px;top: 0;"> 更多资讯</a>
        </div>
    </div>
</section>
<!-- 商城资讯 End -->

<!-- 限时抢购 begin -->
<div class="time-lists clearfix">
    <div class="time-list fl">
        <div class="time-title">
            <h2>限时抢购</h2>
            <div class="time-item clearfix fl" style="padding-left:10px;">
                <strong id="hour_show">00</strong>
                <strong class="pc-clear-sr">:</strong>
                <strong id="minute_show">00</strong>
                <strong class="pc-clear-sr">:</strong>
                <strong id="second_show">00</strong>
            </div><!--倒计时模块-->
            <a href="sale-begin.html" class="fr">更多抢购商品</a>
        </div>
        <div class="time-border">
            <div class="yScrollList">
                <div class="yScrollListIn">
                    <a class="yScrollListbtn yScrollListbtnl" id="prev-01"></a>
                    <div class="yScrollListInList yScrollListInList1 jCarouselLite" style="display:block;margin-left: 20px;" id="demo-01">
                        <ul>
                            <li>
                                <a href="page.html" target="_blank">
                                    <img src="/home/theme/img/pd/p1.png">
                                    <p class="head-name">TP-LINK TL-WN725N 微型150M无线USB网卡</p>
                                    <p><span class="price">￥138.00</span><span class="discount">￥1000</span></p>
                                    <p class="label-default">3.45折</p>
                                </a>
                            </li>
                            <li>
                                <a href="page.html" target="_blank">
                                    <img src="/home/theme/img/pd/p2.png">
                                    <p class="head-name">TP-LINK TL-WN725N 微型150M无线USB网卡</p>
                                    <p><span class="price">￥138.00</span><span class="discount">￥1000</span></p>
                                    <p class="label-default">3.45折</p>
                                </a>
                            </li>
                            <li>
                                <a href="page.html" target="_blank">
                                    <img src="/home/theme/img/pd/p3.png">
                                    <p class="head-name">TP-LINK TL-WN725N 微型150M无线USB网卡</p>
                                    <p><span class="price">￥138.00</span><span class="discount">￥1000</span></p>
                                    <p class="label-default">3.45折</p>
                                </a>
                            </li>
                            <li>
                                <a href="page.html" target="_blank">
                                    <img src="/home/theme/img/pd/p4.png">
                                    <p class="head-name">TP-LINK TL-WN725N 微型150M无线USB网卡</p>
                                    <p><span class="price">￥138.00</span><span class="discount">￥1000</span></p>
                                    <p class="label-default">3.45折</p>
                                </a>
                            </li>
                        </ul>
                        
                        
                    </div>
                    <a class="yScrollListbtn yScrollListbtnr" id="next-01"></a>
                    <div class="yScrollListInList yScrollListInList2">
                        <ul>
                            <li>
                                <a href="">
                                    <img src="/home/theme/img/pd/p3.png">
                                    <p class="head-name">TP-LINK TL-WN725N 微型150M无线USB网卡</p>
                                    <p><span class="price">￥138.00</span><span class="discount">￥1000</span></p>
                                    <p class="label-default">3.45折</p>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/home/theme/img/pd/p3.png">
                                    <p class="head-name">TP-LINK TL-WN725N 微型150M无线USB网卡</p>
                                    <p><span class="price">￥138.00</span><span class="discount">￥1000</span></p>
                                    <p class="label-default">3.45折</p>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/home/theme/img/pd/p3.png">
                                    <p class="head-name">TP-LINK TL-WN725N 微型150M无线USB网卡</p>
                                    <p><span class="price">￥138.00</span><span class="discount">￥1000</span></p>
                                    <p class="label-default">3.45折</p>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/home/theme/img/pd/p3.png">
                                    <p class="head-name">TP-LINK TL-WN725N 微型150M无线USB网卡</p>
                                    <p><span class="price">￥138.00</span><span class="discount">￥1000</span></p>
                                    <p class="label-default">3.45折</p>
                                </a>
                            </li>
                        </ul>
                        <div class="yScrollListbtn yScrollListbtnl"></div>
                        <div class="yScrollListbtn yScrollListbtnr"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="news-list fr">
        <div class="time-title time-clear"><h2>商城快讯</h2><a href="#" class="fr"> 更多资讯</a> </div>
        <div class="time-border" style="border-left:none;">
            <ul class="news">
                <li><a href="#">[特惠]洗护节 跨品牌满199减100</a> </li>
                <li><a href="#">[特惠]新一代Moto 360智能手表登陆</a> </li>
                <li><a href="#">[特惠]惠氏品牌日 两件立享85折</a> </li>
                <li><a href="#">[特惠]洗护节 跨品牌满199减100</a> </li>
                <li><a href="#">[特惠]仁怀政府开启“仁怀酱香酒馆”</a> </li>
            </ul>
            <div class="time-poduse"><img src="/home/theme/img/pd/pj1.png"></div>
        </div>
    </div>
</div>
<!-- 限时抢购 End -->



<div class="containers main-banner"><a href="#"><img src="/home/theme/img/ad/br1.jpg" width="1200" height="105"></a> </div>





<div class="time-lists clearfix">
    <div class="time-list fl">
        <div class="time-title time-clear"><h2>好店推荐 </h2></div>
        <div class="time-border time-border-h clearfix">
            <div class="fl shop-img">
                <div class="shop-title"><a href="#"><img src="/home/theme/img/ad/shop1.png"></a></div>
                <div class="shop-text"><h2>熊太子坚果炒货金冠店铺...</h2> <p>[正品 有赠品 如实描述]</p></div>
                <div class="shop-work clearfix"><a href="#"><img src="/home/theme/img/ad/shop2.png"></a><a href="#"><img src="/home/theme/img/ad/shop3.png"></a> </div>
            </div>
            <div class="shop-bar clearfix fl">
                <ul>
                    <li>
                        <div class="shop-icn"><a href="#"><img src="/home/theme/img/ad/shop4.png"></a></div>
                        <div class="shop-tex"><a href="#">阿迪王品牌店铺</a> </div>
                    </li>
                    <li>
                        <div class="shop-icn"><a href="#"><img src="/home/theme/img/ad/shop4.png"></a></div>
                        <div class="shop-tex"><a href="#">阿迪王品牌店铺</a> </div>
                    </li>
                    <li>
                        <div class="shop-icn"><a href="#"><img src="/home/theme/img/ad/shop4.png"></a></div>
                        <div class="shop-tex"><a href="#">阿迪王品牌店铺</a> </div>
                    </li>
                    <li>
                        <div class="shop-icn"><a href="#"><img src="/home/theme/img/ad/shop4.png"></a></div>
                        <div class="shop-tex"><a href="#">阿迪王品牌店铺</a> </div>
                    </li>
                    <li>
                        <div class="shop-icn"><a href="#"><img src="/home/theme/img/ad/shop4.png"></a></div>
                        <div class="shop-tex"><a href="#">阿迪王品牌店铺</a> </div>
                    </li>
                    <li>
                        <div class="shop-icn"><a href="#"><img src="/home/theme/img/ad/shop4.png"></a></div>
                        <div class="shop-tex"><a href="#">阿迪王品牌店铺</a> </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="news-list fr">
        <div class="time-title time-clear"><h2>店铺销量top排行</h2></div>
        <div style="border-left:none;" class="time-border time-border-h">
            <ul class="shop-top">
                <li class="clearfix">
                    <div class="shop-name fl"><a href="#"><img src="/home/theme/img/ad/top1.png"></a></div>
                    <div class="shop-titl fl"><p><b>NO.1 阿卡官方旗舰店</b></p> <p>梦想会喜欢 <span class="fr red">已售出：3000+</span></p> </div>
                </li>
                <li class="clearfix">
                    <div class="shop-name fl"><a href="#"><img src="/home/theme/img/ad/top1.png"></a></div>
                    <div class="shop-titl fl"><p><b>NO.1 阿卡官方旗舰店</b></p> <p>梦想会喜欢 <span class="fr red">已售出：3000+</span></p> </div>
                </li>
                <li class="clearfix">
                    <div class="shop-name fl"><a href="#"><img src="/home/theme/img/ad/top1.png"></a></div>
                    <div class="shop-titl fl"><p><b>NO.1 阿卡官方旗舰店</b></p> <p>梦想会喜欢 <span class="fr red">已售出：3000+</span></p> </div>
                </li>
                <li class="clearfix">
                    <div class="shop-name fl"><a href="#"><img src="/home/theme/img/ad/top1.png"></a></div>
                    <div class="shop-titl fl"><p><b>NO.1 阿卡官方旗舰店</b></p> <p>梦想会喜欢 <span class="fr red">已售出：3000+</span></p> </div>
                </li>
                <li class="clearfix">
                    <div class="shop-name fl"><a href="#"><img src="/home/theme/img/ad/top1.png"></a></div>
                    <div class="shop-titl fl"><p><b>NO.1 阿卡官方旗舰店</b></p> <p>梦想会喜欢 <span class="fr red">已售出：3000+</span></p> </div>
                </li>
            </ul>
        </div>
    </div>
</div>




<section>
    <div class="time-lists clearfix">
        <div class="time-list time-list-w fl">
            <div class="time-title time-clear"><h2>悦帮派</h2></div>
            <div class="time-border time-border-h clearfix">
                <div class="fl shop-img">
                    <div class="shop-hgou"><h3>新手上路</h3></div>
                    <div class="shop-help clearfix">
                        <ul>
                            <li><a href="#">开店指南</a> </li>
                            <li><a href="#">购物流程</a> </li>
                            <li><a href="#">交易安全</a> </li>
                            <li><a href="#">常见问题</a> </li>
                            <li><a href="#">联系客服</a> </li>
                            <li><a href="#">用户协议</a> </li>
                        </ul>
                    </div>
                    <div class="shop-re"><a href="#"><img src="/home/theme/img/ad/shop5.png"></a> </div>
                </div>
                <div class="shop-bar shop-bar-w clearfix fl">
                    <div class="shop-dan clearfix"><h3 class="fl">悦用户晒单</h3> <a href="#" class="fr">更多晒单</a> </div>
                    <div class="clearfix" style="width:980px;">
                        <div class="shop-fl fl">
                            <div class="shop-work clearfix"><a href="#"><img src="/home/theme/img/ad/shop2.png"></a><a href="#"><img src="/home/theme/img/ad/shop3.png"></a> </div>
                            <div class="clearfix"><div class="shop-name fl"><a href="#"><img src="/home/theme/icon/shop-user.png"></a></div><div class=" fl"><p>搜悦用户</p> <p>2015-5-24 <em>11:25</em></p> </div></div>
                            <div class="shop-sun"><p>晒单内容:</p> <p>物美价廉，挺好的，物流超快.很不错，下次继续来</p> <p class="shop-see"><a href="#">查看商品</a> </p> </div>
                        </div>
                        <div class="shop-fl fl">
                            <div class="shop-work clearfix"><a href="#"><img src="/home/theme/img/ad/shop2.png"></a><a href="#"><img src="/home/theme/img/ad/shop3.png"></a> </div>
                            <div class="clearfix"><div class="shop-name fl"><a href="#"><img src="/home/theme/icon/shop-user.png"></a></div><div class=" fl"><p>搜悦用户</p> <p>2015-5-24 <em>11:25</em></p> </div></div>
                            <div class="shop-sun"><p>晒单内容:</p> <p>物美价廉，挺好的，物流超快.很不错，下次继续来</p> <p class="shop-see"><a href="#">查看商品</a> </p> </div>
                        </div>
                        <div class="shop-fl fl">
                            <div class="shop-work clearfix"><a href="#"><img src="/home/theme/img/ad/shop2.png"></a><a href="#"><img src="/home/theme/img/ad/shop3.png"></a> </div>
                            <div class="clearfix"><div class="shop-name fl"><a href="#"><img src="/home/theme/icon/shop-user.png"></a></div><div class=" fl"><p>搜悦用户</p> <p>2015-5-24 <em>11:25</em></p> </div></div>
                            <div class="shop-sun"><p>晒单内容:</p> <p>物美价廉，挺好的，物流超快.很不错，下次继续来</p> <p class="shop-see"><a href="#">查看商品</a> </p> </div>
                        </div>
                        <div class="shop-fl fl">
                            <div class="shop-work clearfix"><a href="#"><img src="/home/theme/img/ad/shop2.png"></a><a href="#"><img src="/home/theme/img/ad/shop3.png"></a> </div>
                            <div class="clearfix"><div class="shop-name fl"><a href="#"><img src="/home/theme/icon/shop-user.png"></a></div><div class=" fl"><p>搜悦用户</p> <p>2015-5-24 <em>11:25</em></p> </div></div>
                            <div class="shop-sun"><p>晒单内容:</p> <p>物美价廉，挺好的，物流超快.很不错，下次继续来</p> <p class="shop-see"><a href="#">查看商品</a> </p> </div>
                        </div>
                        <div class="shop-fl fl">
                            <div class="shop-work clearfix"><a href="#"><img src="/home/theme/img/ad/shop2.png"></a><a href="#"><img src="/home/theme/img/ad/shop3.png"></a> </div>
                            <div class="clearfix"><div class="shop-name fl"><a href="#"><img src="/home/theme/icon/shop-user.png"></a></div><div class=" fl"><p>搜悦用户</p> <p>2015-5-24 <em>11:25</em></p> </div></div>
                            <div class="shop-sun"><p>晒单内容:</p> <p>物美价廉，挺好的，物流超快.很不错，下次继续来</p> <p class="shop-see"><a href="#">查看商品</a> </p> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop