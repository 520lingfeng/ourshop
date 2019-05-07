<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 引入Userinfo个人详情的模型
use App\Model\Home\Userinfo;

// 引入user的模型
use App\Model\Home\User;

// 引入Articel模型
use App\Model\Home\Articel;

// 引入DB
use DB;

class ArticelController extends Controller
{
    
    // 文章列表
    public function index()
    {

        // 查询相关信息
        $user = User::where('username','=',session('husername'))->first();
        
         //查询详情表的信息
        $userinfo = Userinfo::where('uid','=',$user->id)->first();

        // 查询所有文章
        $articel = DB::table('articel')->paginate(5);

        $num = count(Articel::all());

    	return view('home.articel.index', [
    		'title' => '资讯列表',
            'userinfo' => $userinfo,
            'user' => $user,
            'num' => $num,
            'articel' => $articel,
    	]);
    }
}
