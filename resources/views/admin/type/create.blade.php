@extends('layout.admins')

@section('title', $title)

@section('content')

<!-- 设置编辑框左边文字样式 -->
<style>
	.wd{
		width:100px;
	}
</style>

<!-- 右侧内容框架，更改从这里开始 -->
	<form class="layui-form" action="/admin/type" method="post">
	    <div class="layui-form-item">
	        <label for="L_email" class="layui-form-label wd">
	            <span class="x-red">*</span>分类名
	        </label>
	        <div class="layui-input-inline">
	            <input type="text" id="L_email" name="tname"  class="layui-input">
	        </div>
	    </div>

	    <div class="layui-form-item">
	        <label for="L_email" class="layui-form-label wd">
	            <span class="x-red">*</span>选择分类
	        </label>
	        <div class="layui-input-inline">
				<select name="pid">
					<option value="0">请选择</option>
					<!-- 遍历type表 -->
					@foreach ($res as $k => $v)
						{{-- 一级分类 --}}
						@if ($v->path == '0,')
							<option value="{{ $v->tid }}">{{ $v->tname }}</option>
							{{-- 二级分类 --}}
							@foreach ($res2 as $k2 => $v2)
								@if ($v->tid == $v2->pid)
									<option value="{{ $v2->tid }}">---{{ $v2->tname }}</option>
								@endif
							@endforeach
						@endif
					@endforeach
				</select>
	        </div>
	    </div>


		{{-- 令牌csrf保护 --}}
		{{ csrf_field() }}

	    <div class="layui-form-item">
	        <label for="L_repass" class="layui-form-label">
	        </label>
	        <button  class="layui-btn" lay-filter="add" lay-submit="">
	            增加
	        </button>
	    </div>
	</form>
<!-- 右侧内容框架，更改从这里结束 -->

@stop