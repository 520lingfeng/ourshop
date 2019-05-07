<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 引入Goods模型
use App\Model\Admin\Goods;

// 引入Salse模型
use App\Model\Admin\Sales;

// 引入type模型
use App\Model\Admin\Type;

class SalesController extends Controller
{
// 促销商品列表
	public function index()
	{

		// 查询所有促销商品
		$sales = Sales::all();
		// dump($sales);die;
		
		// 查询所有商品分类
        $type = Type::all();

		// 定义数组，用于存储商品的数据
		$goods = [];

		foreach ($sales as $k => $v) {

			// 通过gid查询单条数据
			$rs = Goods::where('gid' ,$v->gid)->first();
			$goods[] = $rs;
		}

		return view('admin.sales.index', [
			'title' => '促销商品列表',
			'goods' => $goods,
			'type' => $type,
			'sales' => $sales,
		]);
	}

    // 添加促销商品
    public function create($id)
    {

    	// 通过gid查询单条数据
    	$rs = Goods::where('gid', $id)->first();

	    return view('/admin/sales/create',[
	    	'title' => '添加促销商品',
	    	'rs' => $rs,
	    ]);
    }

    // 处理添加促销商品
    public function store(Request $Request)
    {

    	$res = $Request->except('_token');
    	
    	// 通过gid查询单条数据
    	$rs = Goods::where('gid', $res['gid'])->first();
		
		$res['price'] = $rs->price * $res['discount'];

		// 添加数据
		Sales::create($res);

		// 返回促销列表
		return redirect('/admin/sales/index');
    }

    // 删除促销商品
    public function delete($id)
    {

    	Sales::where('id' ,$id)->delete();

    	// 返回促销列表
    	return redirect('/admin/sales/index');
    }
}
