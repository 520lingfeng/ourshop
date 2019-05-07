@extends('layout.homes')

@section('title','歪秀购物')

@section('file_js')
    <script type="text/javascript" src="/home/theme/js/top.js"></script>
@stop

@section('content')

    @php

        // 引入Advert的模型
        use App\Model\admin\Advert;
        
        // 获取所有广告
        $advert = Advert::all();
            
        // 小图的张数
        $num = 0;
    @endphp

<!--- banner begin-->
<section id="pc-banner">
    <div class="yBanner">
        <div class="banner" id="banner">
            <!-- 遍历轮播图 -->
            @foreach ($advert as $k => $v)
            @if($v->level == 0 && $v->status == 0)
            <a href="javascript:;" class="d1" style="background:url({{ $v->pic }}) center no-repeat ;background-color: #fff; background-size:1000px 480px;padding-left:180px;"></a>
            @endif
            @endforeach

            <div class="d2" id="banner_id">
                <ul>
                    @foreach ($advert as $k => $v)
                    @if($v->level == 0)                    
                    <li></li>
                    @endif
                    @endforeach
                </ul>
            </div>
        </div>
        <div style="text-align:center;clear:both"></div>
    </div>
</section>
<!-- 轮播图 -->
<script type="text/javascript">banner()</script>
<!-- banner End -->

<!--- 4张广告 begin-->
<section id="pc-advert">
    <div class="container-c clearfix">
        <!-- 遍历前面4张小图 -->
        @foreach ($advert as $k => $v)
        @if($v->level == 1 && $v->status == 0) 
            @php
                $num++;   
            @endphp
            @if($num < 5) 
                <a href="{{ $v->url }}" target="_blank"><img src="{{ $v->pic }}" width="100%" height="100%"></a>
            @endif
        @endif
        @endforeach
    </div>
</section>
<!-- 4张广告 End -->

    @php
        // 引入文章模型
        use App\Model\Admin\Articel;

        // 遍历文章列表
        $articel = Articel::all();
            
    @endphp


<!-- 限时抢购 begin -->
    @php

        // 引入Goods模型
        use App\Model\Admin\Goods;

        // 引入Salse模型
        use App\Model\Admin\Sales;

        // 遍历文章列表
        $sales = Sales::all();

    @endphp

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
                    <div class="yScrollListInList yScrollListInList1 jCarouselLite" style="display:block;margin-left: 20px;" id="demo-01">
                        <ul>
                            @foreach ($sales as $k => $v)
                                @php
                                    $goods = Goods::where('gid',$v->gid)->first();
                                @endphp
                            <li>
                                <a href="/info/{{ $goods['gid'] }}">
                                    <img src="{{ $goods['pic'] }}">
                                    <p class="head-name">{{ $goods['descr'] }}</p>
                                    <p><span class="price">￥{{ $v->price}}</span><span class="discount">￥{{ $goods['price'] }}</span></p>
                                    <p class="label-default">{{ $v->discount }}折</p>
                                </a>
                            </li>
                            @endforeach
                        </ul>    
                    </div>

                    <div class="yScrollListInList yScrollListInList2">
                        <ul>
                            @foreach ($sales as $k => $v)
                                @php
                                    $goods = Goods::where('gid', $v->gid)->first();
                                @endphp
                            <li>
                                <a href="/info/{{ $goods['gid'] }}">
                                    <img src="{{ $goods['pic'] }}">
                                    <p class="head-name">{{ $goods['descr'] }}</p>
                                    <p><span class="price">￥{{ $v->price }}</span><span class="discount">￥{{ $goods['price'] }}</span></p>
                                    <p class="label-default">{{ $v->discount }}折</p>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        <div class="yScrollListbtn yScrollListbtnl"></div>
                        <div class="yScrollListbtn yScrollListbtnr"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="news-list fr">
        <div class="time-title time-clear"><h2>商城快讯</h2><a href="/articel" class="fr"> 更多资讯</a> </div>
        <div class="time-border" style="border-left:none;">
            <ul class="news" style="height:145px">
                <!-- 遍历  显示5条文章内容 -->
                @php
                    $num = 0;
                @endphp
                @foreach ($articel as $k => $v)
                @if ($num < 5 && $v->status == 0)
                    <li><a href="{{ $v->url }}">{{ $v->title }}</a> </li>
                    @php
                        $num++;
                    @endphp
                @else
                    @break
                @endif
                @endforeach
            </ul>

            <!-- 第五张小图 -->
            <!-- 初始化小图数量 -->
            @php
                $num = 0;
            @endphp            
            <div class="time-poduse">
                @foreach ($advert as $k1 => $v1)
                    @if($v1->level == 1 && $v1->status == 0)                 
                        @php
                            $num++;
                        @endphp
                        @if ($num == 5)
                        <a href="{{ $v1->url }}" style="display: inline-block;width:306px;height:131px">
                        <img src="{{ $v1->pic }}" width="100%" height="100%">
                        </a>
                        @break
                        @endif
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- 限时抢购 End -->

<!-- 长图2 -->
@foreach($advert as $k => $v)
@if($v->level == 2)
<div class="containers main-banner"><a href="{{ $v->url }}"><img src="{{ $v->pic }}" width="1200" height="105"></a> </div>
@endif
@endforeach


    @php
        // 引入type模型
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

    @foreach ($type as $k => $v)
        @if ($v->path == '0,')
        <div class="time-lists  clearfix">
            <div class="time-list time-list-w fl">
                <div class="time-title time-clear-f"><h2>{{ $v->tname }}</h2>
                    <ul class="brand-tab H-table clearfix fr" >
                        <!-- 二级分类 -->
                        @php
                            // 定义一个变量识别第一个二级分类
                            $one = 0;
                            $n = 2;
                        @endphp
                        @foreach ($type2 as $k2 => $v2)
                            @if ($v->tid == $v2->pid)
                                @if ($one == 0)
                                    <li class="cur" value="1"><a href="javascript:void(0);" class="cur">{{ $v2->tname }}</a></li>
                                    @php 
                                        $one = 1;
                                    @endphp                   
                                @else
                                    <li value="{{ $n }}"><a href="javascript:void(0);">{{ $v2->tname }}</a></li>
                                    @php
                                        $n++;
                                    @endphp
                                @endif
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="time-border time-border-h clearfix">
                    <!-- 品牌 -->
                    <div class="brand-img fl">
                        <ul>
                            <li><a href="#"><img src="/home/theme/img/ad/p1.png" width="125" height="47"></a></li>
                            <li><a href="#"><img src="/home/theme/img/ad/p2.png" width="125" height="47"></a></li>
                            <li><a href="#"><img src="/home/theme/img/ad/p3.png" width="125" height="47"></a></li>
                            <li><a href="#"><img src="/home/theme/img/ad/p4.png" width="125" height="47"></a></li>
                            <li><a href="#"><img src="/home/theme/img/ad/p5.png" width="125" height="47"></a></li>
                            <li><a href="#"><img src="/home/theme/img/ad/p6.png" width="125" height="47"></a></li>
                        </ul>
                    </div>

                    <!-- 浏览商品的左边第二张大竖图 -->
                    <div class="brand-bar fl" style="width:300px;height:476px"><a href="#"><img src="/home/theme/img/ad/bar.jpg" width="100%" height="100%"></a> </div>

                    <!-- 商品编列 -->
                    <div class="brand-poa fl">
                        @php
                            // 定义一个变量识别第一个二级分类
                            $one = 0;
                            $six = 0;
                        @endphp
                        @foreach ($type2 as $k2 => $v2)
                        @if ($v->tid == $v2->pid)
                            @if ($one == 0)
                                @php
                                    $one = 1;
                                    $goodes1 = Goods::where('tid', $v2->tid)->get();
                                @endphp
                                <div class="brand-poa H-over clearfix">
                                    <ul>
                                        @foreach ($goodes1 as $ges1_k => $ges1_v)
                                        @if ($six < 6)
                                            <li>
                                                <div class="brand-imgss" style="width:220px;height:175px"><a href="/info/{{ $ges1_v->gid }}"><img src="{{ $ges1_v->pic }}" height="100%"></a></div>
                                                <div class="brand-title"><a href="/info/{{ $ges1_v->gid }}">{{ $ges1_v->descr }}</a> </div>
                                                <div class="brand-price">￥{{ $ges1_v->price }}</div>
                                            </li>
                                            @php
                                                $six++;
                                            @endphp
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @else
                                @php
                                    $six = 0;
                                    $goodes2 = Goods::where('tid', $v2->tid)->get();
                                @endphp
                                <div class="brand-poa H-over clearfix" style="display:none;">
                                    <ul>
                                        @foreach ($goodes2 as $ges2_k => $ges2_v)
                                        @if ($six < 6)
                                        <li>
                                            <div class="brand-imgss"><a href="/info/{{ $ges2_v->gid }}"><img src="{{ $ges2_v->pic }}"></a></div>
                                            <div class="brand-title"><a href="/info/{{ $ges2_v->gid }}">{{ $ges2->descr }}</a> </div>
                                            <div class="brand-price">￥{{ $ges2_v->price }} </div>
                                        </li>
                                            @php
                                                $six++;
                                            @endphp
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif
    @endforeach


    <!-- 切换二级分类对应的商品 -->
    <script>
        
        $('.cur').siblings('li').click(function(){

            // 获取在二级分类上设置的value
            var n = $(this).val();

            // 初始化要与n比较的值
            var num = 1;

            $(this).addClass('cur');
            $(this).siblings('li').removeClass();
            
            $(this).parents('.time-title').next().find('.H-over').css('display','none');


            $(this).parents('.time-title').next().find('.H-over').each(function(){

                if (num == n) {

                    $(this).css('display','block');
                    return;
                }
                num++;
            });
        });

        $('.fr li:nth-child(1)').click(function(){

            var n = $(this).val();

            var num = 1;
            $(this).addClass('cur');
            $(this).siblings('li').removeClass();
            
            $(this).parents('.time-title').next().find('.H-over').css('display','none');


            $(this).parents('.time-title').next().find('.H-over').each(function(){

                if (num == n) {

                    $(this).css('display','block');
                    return;
                }
            });
        });
    </script>

<!-- 好店推荐 -->
<section>
    <div class="time-lists clearfix">
        <div class="time-list time-list-w fl">
            <div class="time-title time-clear"><h2>悦帮派</h2></div>
            <div class="time-border time-border-h clearfix" style="border-bottom:none">
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

                    <!-- 第六张小图 -->
                    @php
                        $num = 0;
                    @endphp            
                    <div class="shop-re" style="width:230px;height:129px">
                        @foreach ($advert as $k1 => $v1)
                            @if($v1->level == 1 && $v1->status == 0)                 
                                @php
                                    $num++;
                                @endphp
                                @if ($num == 6)
                                <a href="{{ $v1->url }}">
                                <img src="{{ $v1->pic }}" width="100%" height="100%">
                                </a>
                                @break
                                @endif
                            @endif
                        @endforeach
                     </div>

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