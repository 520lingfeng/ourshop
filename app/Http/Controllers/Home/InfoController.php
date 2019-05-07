<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 引入type模型
use App\Model\Admin\Type;

// 引入goods模型
use App\Model\Admin\Goods;

class InfoController extends Controller
{
    // 商品详情
    public function info($id)
    {


        // 通过gid查询商品信息
        $goods = Goods::where('gid', $id)->first();
        // 通过id查询二级分类单条数据
        $second = Type::where('tid', $goods->tid)->first();

        // 通过pid查询一级分类单条数据
        $first = Type::where('tid', $second->pid)->first();

    	return view('home.list.info',[
    		'title' => '商品详情',
    		'goods' => $goods,
            'second' => $second,
            'first' => $first,
    	]);
    }
}
