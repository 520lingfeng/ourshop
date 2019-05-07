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
	<form class="layui-form" action="/admin/sales/store" method="post">
		<input type="hidden" name="gid" value="{{ $rs->gid }}">
	    <div class="layui-form-item">
	        <label for="L_email" class="layui-form-label wd">
	            <span class="x-red">*</span>折扣
	        </label>
	        <!-- 判断输入的必须是数字 后续记得添加 -->
	        <div class="layui-input-inline">
	            <input type="text" id="L_email" name="discount"  class="layui-input">
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