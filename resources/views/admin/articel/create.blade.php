@extends('layout.admins')

@section('title',$title)

@section('content')

<!-- 设置编辑框左边文字样式 -->
<style>
	.wd{
		width:120px;
	}
</style>
<!-- 右侧内容框架，更改从这里开始 -->
	<form class="layui-form" action="/admin/articel" method="post" enctype="multipart/form-data">
	    <div class="layui-form-item">
	        <label for="L_pass" class="layui-form-label wd">
	            <span class="x-red">*</span>标题
	        </label>
	        <div class="layui-input-inline">
	            <input type="text" id="L_pass" name="title" required="" lay-verify="pass"
	            autocomplete="off" class="layui-input">
	        </div>
	    </div>
	    <div class="layui-form-item">
	        <label for="L_pass" class="layui-form-label wd">
	            <span class="x-red">*</span>链接图标
	        </label>
	        <div class="layui-input-inline">
	            <input type="file" id="L_pass" name="aimg" class="layui-input">
	        </div>
	        <div class="layui-form-mid layui-word-aux">
	            * 可为空
	        </div>
	    </div>
	    <div class="layui-form-item">
	        <label for="L_pass" class="layui-form-label wd">
	            <span class="x-red">*</span>url链接
	        </label>
	        <div class="layui-input-inline">
	            <input type="text" id="L_pass" name="url" required="" lay-verify="pass"
	            autocomplete="off" class="layui-input">
	        </div>
	    </div>
	    <div class="layui-form-item">
	        <label for="L_pass" class="layui-form-label wd">
	            <span class="x-red">*</span>内容
	        </label>
	        <div class="layui-input-inline">
				<textarea name="content" id="" cols="30" rows="10" class="layui-input" style="height:100px;line-height:20px"></textarea>
	        </div>
	    </div>
	     <div class="layui-form-item">
	        <label for="L_pass" class="layui-form-label wd">
	            <span class="x-red">*</span>状态
	        </label>
	        <div class="layui-input-inline">
	            <select name="status">
					<option value="0"  selected>开启</option>
					<option value="1">禁用</option>
				</select>
	        </div>
	    </div>

	    <div class="layui-form-item">
	        <label for="L_repass" class="layui-form-label">
	        </label>
	        <button  class="layui-btn" lay-filter="add" lay-submit="">
	            增加
	        </button>
	    </div>

	     {{ csrf_field()}}
	     
	</form>
<!-- 右侧内容框架，更改从这里结束 -->
@stop