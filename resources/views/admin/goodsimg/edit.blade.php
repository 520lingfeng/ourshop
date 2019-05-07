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
	<form class="layui-form" action="/admin/imgs/{{ $rs->id }}" method="post" enctype="multipart/form-data">
		
		<div class="layui-form-item">
	        <label for="L_email" class="layui-form-label wd">
	            <span class="x-red">*</span>关联图片
	        </label><img src="{{ $rs->pic }}" alt="" width="80">
	        <div class="layui-input-inline">
	           <input type="file" name="pic">
	        </div>
	    </div>

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
