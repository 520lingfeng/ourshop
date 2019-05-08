<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 引入type模型
use App\Model\Admin\Type;

// 引入goods模型
use App\Model\Admin\Goods;

class ListController extends Controller
{
    public function list()
    {

    	// 查询所有商品分类 一级分类
    	$type = Type::all();

    	// 二级分类
    	$type2 = $type;

    	// 查询所有商品
    	$goods = Goods::all();

    	return view('home.list.list', [

    		'title' => '商品列表',
    		'type' => $type,
    		'type2' => $type2,
    		'goods' => $goods,
    	]);
    }
}
