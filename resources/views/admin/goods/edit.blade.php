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
	<form class="layui-form" action="/admin/goods/{{ $rs->gid }}" method="post" enctype="multipart/form-data">
	    <div class="layui-form-item">
	        <label for="L_email" class="layui-form-label wd">
	            <span class="x-red">*</span>选择分类
	        </label>
	        <div class="layui-input-inline">
				<select name="tid">
					<!-- 遍历type表 -->
					@foreach ($res as $k => $v)
						{{-- 二级分类 --}}
						@if ($v->path != '0,')
							<option value="{{ $v->tid }}">{{ $v->tname }}</option>
						@endif
					@endforeach
				</select>
	        </div>
	    </div>
		<div class="layui-form-item">
	        <label for="L_email" class="layui-form-label wd">
	            <span class="x-red">*</span>商品名称
	        </label>
	        <div class="layui-input-inline">
	            <input type="text" id="L_email" name="gname" value="{{ $rs->gname }}" class="layui-input">
	        </div>
	    </div>
		<div class="layui-form-item">
	        <label for="L_email" class="layui-form-label wd">
	            <span class="x-red">*</span>商品图片
	        </label><img src="{{ $rs->pic }}" width="60" alt="">
	        <div class="layui-input-inline">
	            <input type="file" id="L_email" name="pic" class="layui-input">
	        </div>
	    </div>
		<div class="layui-form-item">
	        <label for="L_email" class="layui-form-label wd">
	            <span class="x-red">*</span>商品描述
	        </label>
	        <div class="layui-input-inline">
	            <input type="text" id="L_email" name="descr" value="{{ $rs->descr }}" class="layui-input">
	        </div>
	    </div>
		<div class="layui-form-item">
	        <label for="L_email" class="layui-form-label wd">
	            <span class="x-red">*</span>库存
	        </label>
	        <div class="layui-input-inline">
	            <input type="text" id="L_email" name="stock" value="{{ $rs->stock }}" class="layui-input">
	        </div>
	    </div>
		<div class="layui-form-item">
	        <label for="L_email" class="layui-form-label wd">
	            <span class="x-red">*</span>状态
	        </label>
	        <div class="layui-input-inline">
				<select name="status">
					<option value="0" {{$v->status == 0 ? 'selected' : ''}}>上架</option>
					<option value="1" {{$v->status == 1 ? 'selected' : ''}}>下架</option>
				</select>
	        </div>
	    </div>
		<div class="layui-form-item">
	        <label for="L_email" class="layui-form-label wd">
	            <span class="x-red">*</span>厂家
	        </label>
	        <div class="layui-input-inline">
	            <input type="text" id="L_email" name="company" value="{{ $rs->company }}" class="layui-input">
	        </div>
	    </div>
		<div class="layui-form-item">
	        <label for="L_email" class="layui-form-label wd">
	            <span class="x-red">*</span>商品价格
	        </label>
	        <div class="layui-input-inline">
	            <input type="text" id="L_email" name="price" value="{{ $rs->price }}" class="layui-input">
	        </div>
	    </div>
		<div class="layui-form-item">
	        <label for="L_email" class="layui-form-label wd">
	            <span class="x-red">*</span>已售
	        </label>
	        <div class="layui-input-inline">
	            <input type="text" id="L_email" value="{{ $rs->sell }}" name="sell" class="layui-input">
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