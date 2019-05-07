<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// 前台首页
Route::get('/', function () {
    return view('welcome');
});

// 后台的登录页面
Route::resource('/admins/login','Admin\LoginController');

// 后台的路由组
Route::group(["middleware"=>'adminlogin'], function(){

	// 后台首页
	Route::get('/admins', 'Admin\IndexController@index');

	// 用户管理
	Route::resource('/admin/user', 'Admin\UserController');

    //订单管理
    Route::resource('/admin/orders', 'Admin\OrdersController');
    Route::get('/admin/fahuo', 'Admin\OrdersController@send');


	Route::get('/admin/orderinfo', 'Admin\OrdersController@orderinfo');


	// 分类管理
	Route::resource('/admin/type', 'Admin\TypeController');

	// 商品管理
	Route::resource('/admin/goods', 'Admin\GoodsController');

	// 商品关联图片
	Route::resource('/admin/imgs', 'Admin\GoodsImgController');
	// 添加商品关联图片
	Route::get('/admin/imgs/add/{id}', 'Admin\GoodsImgController@add');

	// 商品状态
	Route::get('/admin/status/{id}', 'Admin\StatusController@goods');

	// 促销商品
	// 促销商品列表
	Route::get('/admin/sales/index', 'Admin\SalesController@index');
	// 添加促销商品
	Route::get('/admin/sales/create/{id}', 'Admin\SalesController@create');
	// 处理添加促销商品
	Route::post('/admin/sales/store', 'Admin\SalesController@store');
	// 删除促销商品
	Route::post('/admin/sales/delete/{id}', 'Admin\SalesController@delete');



	// 广告管理
	Route::resource('/admin/advert', 'Admin\AdvertController');

	// 友情链接
	Route::resource('/admin/links', 'Admin\LinksController');

	// 文章模块
	Route::resource('/admin/articel', 'Admin\ArticelController');

});

//前台登录页面
Route::resource('/login','Home\LoginController');
//注册页面
Route::resource('/register','Home\RegisterController');
//购物车查看
Route::get('/car','Home\CarController@index');

// Route::get('/car','Home\CarController@car');
// 个人中心
Route::resource('/member', 'Home\MemberController');

// 商品列表
Route::get('/list', 'Home\ListController@list');
// 二级列表
Route::get('/erji/{id}', 'Home\ListController@erji');
// 商品详情
Route::get('/info/{id}', 'Home\InfoController@info');


// 前台的路由组

Route::group(["middleware"=>'homelogin'], function(){  
    // 个人中心页面
    Route::resource('/member','Home\MemberController');
    //购物车确认信息
    Route::resource('/carinfo','Home\CarController');
    //评论
    Route::resource('/comments','Home\CommentsController');
    //我的订单
    Route::resource('/orders','Home\OrdersController');
    //地址管理
    Route::resource('/address','Home\AddressController');

	// 收藏管理
	Route::resource('/collects', 'Home\CollectsController');

	// 文章管理
	Route::get('/articel', 'Home\ArticelController@index');

});
