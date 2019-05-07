<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 引入Goods模型
use App\Model\Admin\Goods;

class StatusController extends Controller
{
    // 商品状态
    public function goods($id)
    {

    	// 通过gid查询单条数据
    	$rs = Goods::where('gid', $id)->first();

    	// 判断status的值
    	if ($rs->status == 0) {

    		// 修改status的数据
    		Goods::where('gid', $id)->update(['status' => 1]); 
    	} else {

    		Goods::where('gid', $id)->update(['status' => 0]); 
    	}

    	// 返回商品列表页
    	return redirect('/admin/goods');
    }

}
