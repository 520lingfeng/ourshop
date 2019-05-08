@extends('layout.homes')

@section('title', $title)

@section('file_js')
	<link rel="stylesheet" href="/bs/css/bootstrap.min.css">	
	<style>
		/*隐藏左侧导航条*/
		.pullDownList{

			display: none;
		}
		.containers{
			overflow: auto;
		}
	</style>
@stop

@section('content')
	<div class="containers clearfix"><div class="pc-nav-item fl"><a href="/" class="pc-title">首页</a> &gt;<a href="#"> 所有货架</a></div> <div class="fr" style="padding-top:20px;">所有品牌></div></div>
	<div class="containers">
<!-- 	    <div class="pc-nav-rack clearfix">
	        <ul>
	        	@foreach ($type as $k => $v) 
	        		@if ($v->path == '0,')
		            	<li class="all">{{ $v->tname }}</li>
	            	@endif
	            @endforeach
	        </ul>
	    </div> -->
		
		<!-- 一级分类 -->
		@foreach ($type as $k => $v)
			@if ($v->path == '0,')
		    <div class="parent">
		        <div class="pc-nav-title up_down" style="display:block;cursor:pointer;color:red"><h3>{{ $v->tname }}</h3></div>
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
	</div>
	<div class="pc-buying clearfix"></div>

	<script>
		
		// 打开收起一级分类
		$('.up_down').next().hide();
		var flag = false;
		$('.up_down').click(function(){

			if (flag) {

				$(this).next().slideUp();
				flag = false;
			} else {

				$(this).next().slideDown();
				flag = true;
			}
			});

		// 选中对应一级分类
		$('.all').click(function(){

			
		});
	</script>
@stop