<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 引入goods模型
use App\Model\Admin\Goods;

class InfoController extends Controller
{
    // 商品详情
    public function info($id)
    {

    	// 通过gid查询商品信息
    	$goods = Goods::where('gid', $id)->first();
    	// dump($goods['descr']);die;
    	return view('home.list.info',[
    		'title' => '商品详情',
    		'goods' => $goods,
    	]);
    }
}
