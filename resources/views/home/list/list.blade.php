@extends('layout.homes')

@section('title', $title)

<style>
	/*隐藏左侧导航条*/
	.pullDownList{

		display: none;
	}
</style>

@section('content')
	<div class="containers clearfix"><div class="pc-nav-item fl"><a href="#" class="pc-title">首页</a> &gt;<a href="#"> 所有货架</a></div> <div class="fr" style="padding-top:20px;"><a href="#" class="reds">所有品牌></a></div></div>
	<div class="containers">
	    <div class="pc-nav-rack clearfix">
	        <ul>
	        	<!-- 一级分类 -->
	        	@foreach ($type as $k => $v) 
	        		@if ($v->path == '0,')
		            	<li><a href="#">{{ $v->tname }}</a></li>
	            	@endif
	            @endforeach
	        </ul>
	    </div>
		
		<!-- 一级分类 -->
		@foreach ($type as $k => $v)
			@if ($v->path == '0,')
		    <div>
		        <div class="pc-nav-title"><h3>{{ $v->tname }}</h3></div>
		        <div class="pc-nav-digit clearfix">
		            <ul>
		            	<!-- 二级分类 -->
		            	@foreach ($type2 as $k2 => $v2)
		            		@if ($v->tid == $v2->pid)
		            			<!-- 对应得商品 -->
			            		@foreach ($goods as $g_k => $g_v)
			            		@if ($v2->tid == $g_v->tid)
				                <li>
				                    <div class="digit1"><a href="/info/{{ $g_v->gid }}"><img src="{{ $g_v->pic }}" width="100%"></a></div>
				                    <div class="digit2"><a href="/info/{{ $g_v->gid }}">{{ $g_v->gname }}</a></div>
				                </li>
				                @endif
				                @endforeach
			                @endif
		                @endforeach
		            </ul>
		        </div>
		    </div>
		    @endif
		@endforeach
	    <div style="padding-top:30px;">
	        <div class="member-pages clearfix">
	            <div class="fr pc-search-g">
	                <a href="#" class="fl pc-search-f">上一页</a>
	                <a class="current" href="#">1</a>
	                <a href="javascript:;">2</a>
	                <a href="javascript:;">3</a>
	                <a href="javascript:;">4</a>
	                <a href="javascript:;">5</a>
	                <a href="javascript:;">6</a>
	                <a href="javascript:;">7</a>
	                <span class="pc-search-di">…</span>
	                <a onClick="SEARCH.page(3, true)" href="javascript:;" class="pc-search-n" title="使用方向键右键也可翻到下一页哦！">下一页</a>
	                    <span class="pc-search-y">
	                        <em>  共20页    到第</em>
	                        <input type="text" placeholder="1" class="pc-search-j">
	                        <em>页</em>
	                        <a class="confirm" href="#">确定</a>
	                    </span>

	            </div>
	        </div>
	    </div>
	</div>
	<div class="pc-buying clearfix"></div>
@stop