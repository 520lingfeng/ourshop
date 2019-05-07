@extends('layout.admins')

@section('title', $title)

@section('content')

<!-- 设置编辑框左边文字样式 -->
<style>
	.wd{
		width:120px;
	}
</style>

<!-- 右侧内容框架，更改从这里开始 -->
	<form class="layui-form" action="/admin/user/{{ $rs->uid }}" method="post">
		 <div class="layui-form-item">
	        <label for="L_username" class="layui-form-label wd">
	            <span class="x-red">*</span>管理员账号：
	        </label>
	        <div class="layui-input-inline">
	            <input type="username" id="L_username" name="username" value="{{ $rs->username }}" required="" lay-verify="nikename"

	            autocomplete="off" class="layui-input">
	        </div>
	    </div>
	    <div class="layui-form-item">

	        <label for="L_pass" class="layui-form-label wd">

	            <span class="x-red">*</span>密码：
	        </label>
	        <div class="layui-input-inline">
	            <input type="password" id="L_pass" name="password" required="" lay-verify="pass"
	            autocomplete="off" class="layui-input">
	        </div>
	       
	    </div>
	     <div class="layui-form-item">

	        <label for="L_pass" class="layui-form-label wd">
	            <span class="x-red">*</span>权限：
	        </label>
	        <div class="layui-input-inline">
	            <select name="level">
					<option value="0" {{ $rs->level == 0 ? 'selected' : '' }}>超级管理员</option>
					<option value="1" {{ $rs->level == 1 ? 'selected' : '' }}>管理员</option>
				</select>
	        </div>
	    </div>

	     <div class="layui-form-item">
	        <label for="L_pass" class="layui-form-label wd">
	            <span class="x-red">*</span>状态：
	        </label>
	        <div class="layui-input-inline">
	            <select name="status">
					<option value="0" {{ $rs->status == 0 ? 'selected' : '' }}>开启</option>
					<option value="1" {{ $rs->status == 1 ? 'selected' : '' }}>禁用</option>
				</select>
	        </div>
	    </div>

		{{-- 伪造表单 --}}
		{{ method_field('PUT') }}

	    <div class="layui-form-item">
	        <label for="L_repass" class="layui-form-label">
	        </label>
	        <button  class="layui-btn" lay-filter="add" lay-submit="">
	           修改
	        </button>
	    </div>

	     {{ method_field('PUT')}}
	     {{ csrf_field()}}

	</form>
<!-- 右侧内容框架，更改从这里结束 -->
@stop