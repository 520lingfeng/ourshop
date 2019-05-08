@extends('layout.admins')

@section('title',$title)

@section('content')
<!-- 右侧内容框架，更改从这里开始 -->
	<form class="layui-form" action="/admin/user/1" method="post">
		 <div class="layui-form-item">
	        <label for="L_username" class="layui-form-label">
	            <span class="x-red">*</span>管理员：
	        </label>
	        <div class="layui-input-inline">
	            <input type="username" id="L_username" name="username" required="" lay-verify="nikename"
	            autocomplete="off" class="layui-input">
	        </div>
	    </div>
	    <div class="layui-form-item">
	        <label for="L_pass" class="layui-form-label">
	            <span class="x-red">*</span>密码：
	        </label>
	        <div class="layui-input-inline">
	            <input type="password" id="L_pass" name="password" required="" lay-verify="pass"
	            autocomplete="off" class="layui-input">
	        </div>
	       
	    </div>
	     <div class="layui-form-item">
	        <label for="L_pass" class="layui-form-label">
	            <span class="x-red">*</span>权限：
	        </label>
	        <div class="layui-input-inline">
	            <input type="level" id="L_pass" name="level" 
	             class="layui-input">
	        </div>
	        
	    </div>

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