@extends('layout.homes')

@section('title', $title)

<!-- 引入css文件 -->
<link rel="stylesheet" href="/home/theme/css/info.css">

@section('content')
<!-- 商品详情 begin -->
<section>
    <div class="pc-details" >
        <div class="containers">
            <div class="pc-nav-item"><a class="pc-title" href="#">电脑、办公</a> &gt; <a href="#">外设产品</a> &gt; <a href="#">电玩</a>&gt; <a href="#">爱电玩（IGAME）</a>&gt; <a href="#">任天堂NEW 3DS XL NDSi NDSiLL NEW</a> </div>
            <div class="pc-details-l">
                <div class="pc-product clearfix">
                	<!-- 左侧导图 -->
                    <div class="pc-product-h">
                    	<!-- 商品图片 -->
                    	<!-- 左边小图 -->
                        <div id="small" style="position:relative;" class="pc-product-top">
                        	<img src="{{ $goods['pic'] }}" id="smallimg" width="418" height="418">
                        	<!-- 小图标 -->
                        	<div id="move"></div>
                        </div>
						            <!-- 左下切换小图 -->
                        <div class="pc-product-bop clearfix" id="pro_detail">
                            <ul class="uls">
                                <li>
                                	<a href="javascript:void(0);" class="cur">
                                		<img src="/home/theme/img/pd/product.png" width="58" height="58">
                                	</a> 
                                </li>
                            </ul>
                        </div>
                        <!-- 右边大图 -->
            						<div id="big">
            							<img src="{{ $goods['pic'] }}" alt="" id="bigimg">
            						</div>
                    </div>
                    <!-- 放大镜效果 -->
                    <script>
                    	// 在左边的小图的div身上进行鼠标移动
                    	$('#small').mousemove(function(e){

                    		// 让move显示出来
                    		$('#move').css('display','block');

                    		// 让big显示出来
                    		$('#big').css('display','block');

                    		// 获取鼠标的x和y的坐标
                    		var x = e.pageX;
                    		var y = e.pageY;

                    		// 获取small小图距离左侧的偏移量和顶部的偏移量
                    		var sl = $('#small').offset().left;
                    		var st = $('#small').offset().top;

                    		// 获取move宽度和高度一半的距离
                    		var mw = $('#move').width() / 2;
                    		var mh = $('#move').height() / 2;

                    		// 求move距离small的左偏移量和顶部的偏移量
                    		var ml = x - sl - mw;
                    		var mt = y - st - mh;

                    		// 判断 move 不能超出 small的范围
                    		if (ml < 0) {

                    			ml = 0;
                    		}

                    	 	// 求move横向的最大移动范围
                    	 	var maxl = $('#small').width() - $('#move').width();
                    	 	if (ml > maxl) {

                    	 		ml = maxl;
                    	 	}

                    	 	if (mt < 0) {

                    	 		mt = 0;
                    	 	}

                    	 	// 求move纵向的最大移动范围
                    	 	var maxt = $('#small').height() - $('#move').height();
                    	 	if (mt > maxt) {

                    	 		mt = maxt;
                    	 	}

                    	 	$('#move').css({left : ml + 'px', top : mt + 'px'});

                    	 	// 让大图片动起来
                    	 	// 求得就是大图片距离big 的左偏移量 顶部偏移量
                    	 	// left 和 top
                    	 	var bl = ml / $('#small').width() * $('#bigimg').width();
                    	 	var bt = mt / $('#small').height() * $('#bigimg').height();

                    	 	$('#bigimg').css({left : -bl + 'px', top : -bt + 'px'});
                    	});

                    	// 从small的身上离开 鼠标离开事件
                    	$('#small').mouseout(function(){

                    		// 让鼠标隐藏
                    		$('#move').css('display', 'none');

                    		// 让big 隐藏
                    		$('#big').css('display', 'none');
                    	});

                    	// 给li点击事件
                    	$('.uls li').click(function(){

                    		// 获取img里面的src值
                    		var srcs = $(this).find('img').attr('src');
                    		// 让small里面的img src的值改变
                    		$('#smallimg').attr('src', srcs);

                    		// 让big里面的img  src的值改变
                    		$('#bigimg').attr('src', srcs);
                    	})
                    </script>
                    <!-- 左侧导图 -->
					
          					<!-- 商品详细信息 -->
                              <div class="pc-product-t">
                                  <div class="pc-name-info">
                                  	<!-- 商品描述 -->
                                      <h1>{{ $goods['descr'] }}</h1>
                                      <!-- 商品价格 -->
                                      <p class="clearfix pc-rate"><strong>￥{{ $goods['price'] }}</strong> <span><em>限时抢购</em>抢购将于<b class="reds">18</b>小时<b class="reds">57</b>分<b class="reds">34</b>秒后结束</span></p>
                                      <p>由<a href="#" class="reds">神游官方旗舰店</a> 负责发货，并提供售后服务。</p>
                                  </div>
                                  <div class="pc-dashed clearfix">
                                  	<!-- 销量 -->
                                      <span>累计销量：<em class="reds">{{ $goods['sell'] }}</em> 件</span><b>|</b><span>累计评价：<em class="reds">3888</em></span>
                                  </div>
                                  <div class="pc-size">
                                      <div class="attrdiv pc-telling clearfix">
                                          <div class="pc-version">版本</div>
                                          <div class="pc-adults">
                                              <ul>
                                                  <li><a href="javascript:void(0);" class="cur">32</a> </li>
                                                  <li><a href="javascript:void(0);">32</a> </li>
                                                  <li><a href="javascript:void(0);">32</a> </li>
                                                  <li><a href="javascript:void(0);">32</a> </li>
                                                  <li><a href="javascript:void(0);">32</a> </li>
                                                  <li><a href="javascript:void(0);">32</a> </li>
                                                  <li><a href="javascript:void(0);">32</a> </li>
                                                  <li><a href="javascript:void(0);">32</a> </li>
                                                  <li><a href="javascript:void(0);">32</a> </li>
                                                  <li><a href="javascript:void(0);">32</a> </li>
                                                  <li><a href="javascript:void(0);">32</a> </li>
                                              </ul>
                                          </div>
                                      </div>
                                      <div class="pc-telling clearfix">
                                          <div class="pc-version">颜色分类</div>
                                          <div class="pc-adults">
                                              <ul>
                                                  <li><a href="#" title="黑色" class="cur"><img <img src="/home/theme/img/pd/product.png" width="35" height="35"></a> </li>
                                                  <li><a href="#" title="白色"><img <img src="/home/theme/img/pd/product1.png" width="35" height="35"></a> </li>
                                                  <li><a href="#" title="金色"><img <img src="/home/theme/img/pd/product2.png" width="35" height="35"></a> </li>

                                              </ul>
                                          </div>
                                      </div>
                                      <div class="pc-telling clearfix">
                                          <div class="pc-version">数量</div>
                                          <div class="pc-adults clearfix">
                                              <div class="pc-adults-p clearfix fl">
                                                  <input type="text" id="subnum" value="1">
                                                  <a href="javascript:void(0);" class="amount1"></a>
                                                  <a href="javascript:void(0);" class="amount2"></a>
                                              </div>
                                              <div class="fl pc-letter ">件</div>
                                              <!-- 库存 -->
                                              <div class="fl pc-stock ">库存<em>{{ $goods['stock'] }}</em>件</div>
                                          </div>
                                      </div>
                                      <div class="pc-number clearfix"><span class="fl">商品编号：1654456   </span> <span class="fr">分享 收藏</span></div>
                                  </div>

                                  <!-- 点击购物、加入购物车 -->
                                  <div class="pc-emption">
                                      <a href="">立即购买</a>
                                      <a href="/carinfo/{{ $goods['gid'] }}" class="join">加入购物车</a>
                                  </div>
                              </div>
          					<!-- 商品详细信息 -->

                    <!-- 右侧店铺信息 -->
                    <div class="pc-product-s">
                        <div class="pc-shoplo"><a href="#"><img <img src="/home/theme/icon/shop-logo.png"></a> </div>
                        <div class="pc-shopti">
                            <h2>神游官方旗舰店</h2>
                            <p>公司名称：优购科技有限公司</p>
                            <p>所在地： 广东省   深圳市</p>
                        </div>
                        <div class="pc-custom"><a href="#">联系客服</a> </div>
                        <div class="pc-trigger">
                            <a href="#">进入店铺</a>
                            <a href="#" style="margin:0;">关注店铺</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="containers clearfix" style="margin-top:20px;">
        <div class="fl">
            <div class="pc-menu-in">
                <h2>店内搜索</h2>
                <form>
                    <p>关键词:<input type="text" class="pc-input1"></p>
                    <p>价  格：<input class="pc-input2"> 到 <input class="pc-input2"></p>
                    <p><a href="#">搜索</a> </p>
                </form>
            </div>
            <div class="menu_list" id="firstpane">
                <h2>店内分类</h2>
                <h3 class="menu_head current">电玩</h3>
                <div class="menu_body" style="display: none;">
                    <a href="#">耳机耳麦</a>
                    <a href="#">游戏机</a>
                </div>
                <h3 class="menu_head">手机</h3>
                <div class="menu_body" style="display: none;">
                    <a href="#">手机</a>
                    <a href="#">手机</a>
                    <a href="#">手机</a>
                </div>

                <h3 class="menu_head">耳机耳麦</h3>
                <div class="menu_body" style="display: none;">
                    <a href="#">耳机耳麦</a>
                    <a href="#">耳机耳麦</a>
                    <a href="#">耳机耳麦</a>
                    <a href="#">耳机耳麦</a>
                </div>
            </div>
        </div>
        <div class="pc-info fr">
            <div class="pc-overall">
                <ul id="H-table1" class="brand-tab H-table1 H-table-shop clearfix ">
                    <li class="cur"><a href="javascript:void(0);">商品介绍</a></li>
                    <li><a href="javascript:void(0);">商品评价<em class="reds">(91)</em></a></li>
                    <li><a href="javascript:void(0);">售后保障</a></li>
                </ul>
                <div class="pc-term clearfix">
                   <div class="H-over1 pc-text-word clearfix">
                       <ul class="clearfix">
                           <li>
                               <p>屏幕尺寸：4.8英寸</p>
                               <p>分辨率：1280×720(HD,720P) </p>
                           </li>
                           <li>
                               <p>后置摄像头：800万像素</p>
                               <p>分辨率：1280×720(HD,720P) </p>
                           </li>
                           <li>
                               <p>前置摄像头：190万像素</p>
                               <p>分辨率：1280×720(HD,720P) </p>
                           </li>
                           <li>
                               <p>3G：电信(CDMA2000)</p>
                               <p>2G：移动/联通(GSM)/电信(CDMA </p>
                           </li>
                       </ul>
                       <div class="pc-line"></div>
                       <ul class="clearfix">
                           <li>
                               <p>商品名称：三星I939I</p>
                               <p>商品毛重：360.00g </p>
                           </li>
                           <li>
                               <p>商品编号：1089266</p>
                               <p>商品产地：中国大陆</p>
                           </li>
                           <li>
                               <p>品牌： 三星（SAMSUNG）</p>
                               <p>系统：安卓（Android </p>
                           </li>
                           <li>
                               <p>上架时间：2015-03-30 09:07:18</p>
                               <p>机身颜色：白色</p>
                           </li>
                       </ul>
                       <div>
                           <div><img <img src="/home/theme/pa/ad-4.jpg" width="100%"></div>
                           <div><img <img src="/home/theme/pa/ad-2.jpg" width="100%"></div>
                           <div><img <img src="/home/theme/pa/ad-3.jpg" width="100%"></div>
                           <div><img <img src="/home/theme/pa/ad-4.jpg" width="100%"></div>
                           <div><img <img src="/home/theme/pa/ad-5.jpg" width="100%"></div>
                           <div><img <img src="/home/theme/pa/ad-6.jpg" width="100%"></div>
                           <div><img <img src="/home/theme/pa/ad-7.jpg" width="100%"></div>
                       </div>
                   </div>
                   <div class="H-over1" style="display:none">
                       <div class="pc-comment fl"><strong>86<span>%</span></strong><br> <span>好评度</span></div>
                       <div class="pc-percent fl">
                           <dl>
                               <dt>好评<span>(86%)</span></dt>
                               <dd><div style="width:86px"></div></dd>
                           </dl>
                           <dl>
                               <dt>中评<span>(86%)</span></dt>
                               <dd><div style="width:86px"></div></dd>
                           </dl>
                           <dl>
                               <dt>好评<span>(86%)</span></dt>
                               <dd><div style="width:86px"></div></dd>
                           </dl>
                       </div>
                   </div>
                   <div class="H-over1 pc-text-title" style="display:none">
                       <p>本产品全国联保，享受三包服务，质保期为：一年质保
                           如因质量问题或故障，凭厂商维修中心或特约维修点的质量检测证明，享受7日内退货，15日内换货，15日以上在质保期内享受免费保修等三包服务！
                           (注:如厂家在商品介绍中有售后保障的说明,则此商品按照厂家说明执行售后保障服务。) 您可以查询本品牌在各地售后服务中心的联系方式，请点击这儿查询......</p>
                       <div class="pc-line"></div>
                   </div>
                </div>
            </div>
            <div class="pc-overall">
                <ul class="brand-tab H-table H-table-shop clearfix " id="H-table" style="margin-left:0;">
                    <li class="cur"><a href="javascript:void(0);">全部评价（199）</a></li>
                    <li><a href="javascript:void(0);">好评<em class="reds">（33）</em></a></li>
                    <li><a href="javascript:void(0);">中评<em class="reds">（02）</em></a></li>
                    <li><a href="javascript:void(0);">差评<em class="reds">（01）</em></a></li>
                </ul>
                <div class="pc-term clearfix">
                    <div class="pc-column">
                        <span class="column1">评价心得</span>
                        <span class="column2">顾客满意度</span>
                        <span class="column3">购买信息</span>
                        <span class="column4">评论者</span>
                    </div>
                    <div class="H-over  pc-comments clearfix">
                        <ul class="clearfix">
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="#">回复<em>（90）</em></a> <a href="#">赞<em>（90）</em></a> </p>
                                    <p>一次用三星，不是很顺手，但咨询客服后终于上手了，感觉性价比相当不错，值得购买。但最想说的是京东客服更好，产品信得过，正品行货，买的放心。</p>
                                    <p class="column5">2014-11-25 14:32</p>
                                </div>
                                <div class="column2"><img <img src="/home/theme/icon/star.png"></div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img <img src="/home/theme/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="#">回复<em>（90）</em></a> <a href="#">赞<em>（90）</em></a> </p>
                                    <p>一次用三星，不是很顺手，但咨询客服后终于上手了，感觉性价比相当不错，值得购买。但最想说的是京东客服更好，产品信得过，正品行货，买的放心。</p>
                                    <p class="column5">2014-11-25 14:32</p>
                                </div>
                                <div class="column2"><img <img src="/home/theme/icon/star.png"></div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img <img src="/home/theme/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="#">回复<em>（90）</em></a> <a href="#">赞<em>（90）</em></a> </p>
                                    <p>一次用三星，不是很顺手，但咨询客服后终于上手了，感觉性价比相当不错，值得购买。但最想说的是京东客服更好，产品信得过，正品行货，买的放心。</p>
                                    <p class="column5">2014-11-25 14:32</p>
                                </div>
                                <div class="column2"><img <img src="/home/theme/icon/star.png"></div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img <img src="/home/theme/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="#">回复<em>（90）</em></a> <a href="#">赞<em>（90）</em></a> </p>
                                    <p>一次用三星，不是很顺手，但咨询客服后终于上手了，感觉性价比相当不错，值得购买。但最想说的是京东客服更好，产品信得过，正品行货，买的放心。</p>
                                    <p class="column5">2014-11-25 14:32</p>
                                </div>
                                <div class="column2"><img <img src="/home/theme/icon/star.png"></div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img <img src="/home/theme/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="#">回复<em>（90）</em></a> <a href="#">赞<em>（90）</em></a> </p>
                                    <p>一次用三星，不是很顺手，但咨询客服后终于上手了，感觉性价比相当不错，值得购买。但最想说的是京东客服更好，产品信得过，正品行货，买的放心。</p>
                                    <p class="column5">2014-11-25 14:32</p>
                                </div>
                                <div class="column2"><img <img src="/home/theme/icon/star.png"></div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img <img src="/home/theme/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="#">回复<em>（90）</em></a> <a href="#">赞<em>（90）</em></a> </p>
                                    <p>一次用三星，不是很顺手，但咨询客服后终于上手了，感觉性价比相当不错，值得购买。但最想说的是京东客服更好，产品信得过，正品行货，买的放心。</p>
                                    <p class="column5">2014-11-25 14:32</p>
                                </div>
                                <div class="column2"><img <img src="/home/theme/icon/star.png"></div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img <img src="/home/theme/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div style="display:none" class="H-over pc-comments">
                        <ul class="clearfix">
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="#">回复<em>（90）</em></a> <a href="#">赞<em>（90）</em></a> </p>
                                    <p>一次用三星，不是很顺手，但咨询客服后终于上手了，感觉性价比相当不错，值得购买。但最想说的是京东客服更好，产品信得过，正品行货，买的放心。</p>
                                    <p class="column5">2014-11-25 14:32</p>
                                </div>
                                <div class="column2"><img <img src="/home/theme/icon/star.png"></div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img <img src="/home/theme/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="#">回复<em>（90）</em></a> <a href="#">赞<em>（90）</em></a> </p>
                                    <p>一次用三星，不是很顺手，但咨询客服后终于上手了，感觉性价比相当不错，值得购买。但最想说的是京东客服更好，产品信得过，正品行货，买的放心。</p>
                                    <p class="column5">2014-11-25 14:32</p>
                                </div>
                                <div class="column2"><img <img src="/home/theme/icon/star.png"></div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img <img src="/home/theme/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="#">回复<em>（90）</em></a> <a href="#">赞<em>（90）</em></a> </p>
                                    <p>一次用三星，不是很顺手，但咨询客服后终于上手了，感觉性价比相当不错，值得购买。但最想说的是京东客服更好，产品信得过，正品行货，买的放心。</p>
                                    <p class="column5">2014-11-25 14:32</p>
                                </div>
                                <div class="column2"><img <img src="/home/theme/icon/star.png"></div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img <img src="/home/theme/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="#">回复<em>（90）</em></a> <a href="#">赞<em>（90）</em></a> </p>
                                    <p>一次用三星，不是很顺手，但咨询客服后终于上手了，感觉性价比相当不错，值得购买。但最想说的是京东客服更好，产品信得过，正品行货，买的放心。</p>
                                    <p class="column5">2014-11-25 14:32</p>
                                </div>
                                <div class="column2"><img <img src="/home/theme/icon/star.png"></div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img <img src="/home/theme/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="#">回复<em>（90）</em></a> <a href="#">赞<em>（90）</em></a> </p>
                                    <p>一次用三星，不是很顺手，但咨询客服后终于上手了，感觉性价比相当不错，值得购买。但最想说的是京东客服更好，产品信得过，正品行货，买的放心。</p>
                                    <p class="column5">2014-11-25 14:32</p>
                                </div>
                                <div class="column2"><img <img src="/home/theme/icon/star.png"></div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img <img src="/home/theme/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="#">回复<em>（90）</em></a> <a href="#">赞<em>（90）</em></a> </p>
                                    <p>一次用三星，不是很顺手，但咨询客服后终于上手了，感觉性价比相当不错，值得购买。但最想说的是京东客服更好，产品信得过，正品行货，买的放心。</p>
                                    <p class="column5">2014-11-25 14:32</p>
                                </div>
                                <div class="column2"><img <img src="/home/theme/icon/star.png"></div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img <img src="/home/theme/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div style="display:none" class="H-over pc-comments">
                        <ul class="clearfix">
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="#">回复<em>（90）</em></a> <a href="#">赞<em>（90）</em></a> </p>
                                    <p>一次用三星，不是很顺手，但咨询客服后终于上手了，感觉性价比相当不错，值得购买。但最想说的是京东客服更好，产品信得过，正品行货，买的放心。</p>
                                    <p class="column5">2014-11-25 14:32</p>
                                </div>
                                <div class="column2"><img <img src="/home/theme/icon/star.png"></div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img <img src="/home/theme/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="#">回复<em>（90）</em></a> <a href="#">赞<em>（90）</em></a> </p>
                                    <p>一次用三星，不是很顺手，但咨询客服后终于上手了，感觉性价比相当不错，值得购买。但最想说的是京东客服更好，产品信得过，正品行货，买的放心。</p>
                                    <p class="column5">2014-11-25 14:32</p>
                                </div>
                                <div class="column2"><img <img src="/home/theme/icon/star.png"></div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img <img src="/home/theme/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="#">回复<em>（90）</em></a> <a href="#">赞<em>（90）</em></a> </p>
                                    <p>一次用三星，不是很顺手，但咨询客服后终于上手了，感觉性价比相当不错，值得购买。但最想说的是京东客服更好，产品信得过，正品行货，买的放心。</p>
                                    <p class="column5">2014-11-25 14:32</p>
                                </div>
                                <div class="column2"><img <img src="/home/theme/icon/star.png"></div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img <img src="/home/theme/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="#">回复<em>（90）</em></a> <a href="#">赞<em>（90）</em></a> </p>
                                    <p>一次用三星，不是很顺手，但咨询客服后终于上手了，感觉性价比相当不错，值得购买。但最想说的是京东客服更好，产品信得过，正品行货，买的放心。</p>
                                    <p class="column5">2014-11-25 14:32</p>
                                </div>
                                <div class="column2"><img <img src="/home/theme/icon/star.png"></div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img <img src="/home/theme/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="#">回复<em>（90）</em></a> <a href="#">赞<em>（90）</em></a> </p>
                                    <p>一次用三星，不是很顺手，但咨询客服后终于上手了，感觉性价比相当不错，值得购买。但最想说的是京东客服更好，产品信得过，正品行货，买的放心。</p>
                                    <p class="column5">2014-11-25 14:32</p>
                                </div>
                                <div class="column2"><img <img src="/home/theme/icon/star.png"></div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img <img src="/home/theme/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="#">回复<em>（90）</em></a> <a href="#">赞<em>（90）</em></a> </p>
                                    <p>一次用三星，不是很顺手，但咨询客服后终于上手了，感觉性价比相当不错，值得购买。但最想说的是京东客服更好，产品信得过，正品行货，买的放心。</p>
                                    <p class="column5">2014-11-25 14:32</p>
                                </div>
                                <div class="column2"><img <img src="/home/theme/icon/star.png"></div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img <img src="/home/theme/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div style="display:none" class="H-over pc-comments">
                        <ul class="clearfix">
                            <li class="clearfix">
                                <div class="column1">
                                    <p class="clearfix"><a href="#">回复<em>（90）</em></a> <a href="#">赞<em>（90）</em></a> </p>
                                    <p>一次用三星，不是很顺手，但咨询客服后终于上手了，感觉性价比相当不错，值得购买。但最想说的是京东客服更好，产品信得过，正品行货，买的放心。</p>
                                    <p class="column5">2014-11-25 14:32</p>
                                </div>
                                <div class="column2"><img <img src="/home/theme/icon/star.png"></div>
                                <div class="column3">颜色：云石白</div>
                                <div class="column4">
                                    <p><img <img src="/home/theme/icon/user.png"></p>
                                    <p>2014-11-23 22:37 购买</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix">
                <div class="fr pc-search-g pc-search-gs">
                    <a href="#" class="fl " style="display:none">上一页</a>
                    <a class="current" href="#">1</a>
                    <a href="javascript:;">2</a>
                    <a href="javascript:;">3</a>
                    <a href="javascript:;">4</a>
                    <a href="javascript:;">5</a>
                    <a href="javascript:;">6</a>
                    <a href="javascript:;">7</a>
                    <span class="pc-search-di">…</span>
                    <a href="javascript:;">1088</a>
                    <a href="javascript:;" class="" title="使用方向键右键也可翻到下一页哦！">下一页</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- 商品详情 End -->

@stop