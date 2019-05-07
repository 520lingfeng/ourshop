@extends('layout.admins')

@section('title', $title)

@section('content')

<!-- 右侧内容框架，更改从这里开始 -->
	<form class="layui-form" action="/admin/type/{{ $rs['tid'] }}" method="post">
	    <div class="layui-form-item">
	        <label for="L_email" class="layui-form-label">
	            <span class="x-red">*</span>分类名
	        </label>
	        <div class="layui-input-inline">
	            <input type="text" id="L_email" name="tname" value="{{ $rs['tname'] }}" class="layui-input">
	        </div>
	    </div>
		
		<!-- 判断是否是二级菜单 -->
		@if ($rs['path'] != '0,')
		    <div class="layui-form-item">
		        <label for="L_email" class="layui-form-label">
		            <span class="x-red">*</span>选择分类
		        </label>
		        <div class="layui-input-inline">
					<select name="pid">
						<option value="{{ $rs['pid'] }}">请选择</option>
						<!-- 遍历type表中的一级分类 -->
						@foreach ($res as $k => $v)
							{{-- 一级分类 --}}
							@if ($v->path == '0,')
								<option value="{{ $v->tid }}">{{ $v->tname }}</option>
							@endif
						@endforeach
					</select>
		        </div>
		    </div>
	    @endif


		{{-- 令牌csrf保护 --}}
		{{ csrf_field() }}


		{{-- 伪造表单 --}}
		{{ method_field('PUT') }}
	    <div class="layui-form-item">
	        <label for="L_repass" class="layui-form-label">
	        </label>
	        <button  class="layui-btn" lay-filter="add" lay-submit="">
	            修改
	        </button>
	    </div>
	</form>
<!-- 右侧内容框架，更改从这里结束 -->

@stop