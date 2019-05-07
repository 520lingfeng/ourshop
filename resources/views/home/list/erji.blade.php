@extends('layout.homes')

@section('title', $title)

@section('file_js')
<style>
    .yHeader{
        display:none;
    }
    .search-text{
        height:36px;
    }

</style>
<link rel="stylesheet" type="text/css" href="/home/theme/css/member.css">
<link rel="stylesheet" href="/bs/css/bootstrap.min.css">
@stop

@section('content')
<div class="containers"><div class="pc-nav-item"><a href="/list">货架</a> &gt; <span>二级货架</span></div></div>

<div class="containers clearfix">
    <div class="fl">
        <div class="pc-sisters">
            <div class="pc-s-title"><h2>商品TOP排行</h2></div>
            <div>
                <ul>
                    <li>
                        <div class="pc-s-line"><a href="#"><img src="/home/theme/img/pd/hot2.png" width="188"></a> </div>
                        <div class="pc-s-link"><a href="#">小米 4 2GB内存版 白色 移动4G手机不锈钢金属边框、 5英</a> </div>
                        <div class="pc-s-lins"><p class="reds">￥1000.00</p><p class="blue">已售出：3000+</p></div>
                    </li>
                    <li>
                        <div class="pc-s-line"><a href="#"><img src="/home/theme/img/pd/hot2.png" width="188"></a> </div>
                        <div class="pc-s-link"><a href="#">小米 4 2GB内存版 白色 移动4G手机不锈钢金属边框、 5英</a> </div>
                        <div class="pc-s-lins"><p class="reds">￥1000.00</p><p class="blue">已售出：3000+</p></div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="pc-info fr">
        <div class="pc-term">
            <dl class="pc-term-dl clearfix">
                <dt>品牌：</dt>
                <dd><a href="#">三星（SAMSUNG）</a></dd>
                <dd><a href="#">华为（HUAWEI）</a></dd>
                <dd><a href="#">联想（lenovo）</a></dd>
                <dd><a href="#">索尼（SONY）</a></dd>
                <dd><a href="#">飞利浦（Philips）</a></dd>
                <dd><a href="#">Apple</a></dd>
                <dd><a href="#">小米（MI）</a></dd>
                <dd><a href="#">HTC</a></dd>
                <dd><a href="#">酷派（Coolpad）</a></dd>
                <dd><a href="#">诺基亚（NOKIA）</a></dd>
                <dd><a href="#">中兴（ZTE）</a></dd>
            </dl>
            <dl class="pc-term-dl clearfix">
                <dt>品牌：</dt>
                <dd><a href="#">三星（SAMSUNG）</a></dd>
                <dd><a href="#">华为（HUAWEI）</a></dd>
                <dd><a href="#">联想（lenovo）</a></dd>
                <dd><a href="#">索尼（SONY）</a></dd>
                <dd><a href="#">飞利浦（Philips）</a></dd>
                <dd><a href="#">Apple</a></dd>
                <dd><a href="#">小米（MI）</a></dd>
                <dd><a href="#">HTC</a></dd>
                <dd><a href="#">酷派（Coolpad）</a></dd>
                <dd><a href="#">诺基亚（NOKIA）</a></dd>
                <dd><a href="#">中兴（ZTE）</a></dd>
            </dl>

            <div class="pc-line"></div>
            <div class="pc-search clearfix">
                <div class="fl pc-search-in">
                    <input type="text" class="pc-search-w">
                    <input type="text" class="pc-search-s" placeholder="￥">
                    <input type="text" class="pc-search-s" placeholder="￥">
                    <a href="#" class="pc-search-a">搜索</a>
                </div>
                <div class="fr pc-with">
                    相关搜索： <a href="#">黑糖</a><em>|</em><a href="#">姜茶</a><em>|</em><a href="#">红印黑糖</a><em>|</em><a href="#">黑糖话梅</a><em>|</em><a href="#">黑糖姜母</a><em>|</em><a href="#">茶黑糖饼</a><em>|</em><a href="#">干黑糖</a><em>|</em><a href="#">沙琪玛</a>
                </div>
            </div>
        </div>
        <div class="pc-term">
            <div class="clearfix pc-search-p">
                <div class="fl pc-search-e"><a href="#" class="cur">销量</a><a href="#">价格</a><a href="#">评价</a><a href="#">上架时间</a></div>
                <div class="fr pc-search-v">
                    <ul>
                        <li><input type="checkbox"><a href="#">有货</a> </li>
                        <li><input type="checkbox"><a href="#">限时抢购</a> </li>
                        <li><input type="checkbox"><a href="#">满减大促</a> </li>
                    </ul>
                </div>
            </div>
            <div class="pc-search-i">
                <div class="fr">
                    <span class="pc-search-t"><b>1</b><em>/</em><i>32</i></span>
                    <a href="#" class="pc-search-d">上一页</a>
                    <a href="#">下一页</a>
                </div>
            </div>
        </div>

        <!-- 二级商品列表 -->
        <div class="time-border-list pc-search-list clearfix">
            <ul class="clearfix">
                @if ($goods == '')
                    暂无商品！！！
                @else
                  @foreach ($goods as $g_k => $g_v)
                  <li>
                      <a href="/info/{{ $g_v->gid }}"> <img src="{{ $g_v->pic }}" width="100%"></a>
                      <p class="head-name"><a href="/info/{{ $g_v->gid }}">{{ $g_v->descr }}</a> </p>
                      <p><span class="price">￥{{ $g_v->price }}</span></p>
                      <p class="head-futi clearfix"><span class="fl">好评度：95% </span> <span class="fr">100人购买</span></p>
                  </li>
                  @endforeach
                @endif
            </ul>
        </div>


        <!-- 快速搜索 未完成 -->
        <div class="pc-search-re clearfix">
            <dl>
                <dt>重新搜索</dt>
                <dd>
                    <input type="text" value="三星"  id="key-re-search" class="text">
                    <input type="button" value="搜&nbsp;索" id="btn-re-search" class="button">
                </dd>
            </dl>
        </div>
    </div>
</div>
@stop