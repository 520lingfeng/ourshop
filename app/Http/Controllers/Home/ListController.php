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

    // 所有分类列表
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

    // 二级分类列表对应的商品
    public function erji($id)
    {

        // 通过id查询二级分类对应的商品
        $goods = Goods::where('tid', $id)->get();
        // dump($goods);die;
        return view('home.list.erji',[
            'title' => '二级分类商品',
            'goods' => $goods,
        ]);
    }
}
