<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 引入Collects的模型
use App\Model\Home\Collects;

// 引入Userinfo个人详情的模型
use App\Model\Home\Userinfo;

// 引入user的模型
use App\Model\Home\User;

// 引入商品模型
use App\Model\Admin\Goods;

// 引入DB
use DB;

class CollectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // 查询相关信息
        $user = User::where('username','=',session('husername'))->first();
        
         //查询详情表的信息
        $userinfo = Userinfo::where('uid','=',$user->id)->first();

        // 查询所有收藏
        $collects = DB::table('collects')->paginate(2);
        
        $res = [];

        foreach ($collects as $k => $v) {

            $rs = Goods::where('gid', $v->gid)->first();

            // 把关联的商品信息放进数组
            $res[] = $rs;

        }

        $num = count(Collects::all());

        return view('home.collects.index',[
            'title' => '收藏列表',
            'user' => $user,
            'userinfo' => $userinfo,
            'collects' => $collects,
            'num' => $num,
            'res' => $res,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $rs = $request->all();

        $res = [];
        $res['gid'] = $rs['id'];

        // 判断通过gid是否可以查询数据
        if (Collects::where('gid', $rs['id'])->first()) {

            // 已收藏
            echo '0';
        } else {

            Collects::create($res);

            echo '1';
        }

    }

    // 添加收藏
    public function add($id)
    {

        $res['gid'] = $id;
        // 判断通过gid是否可以查询数据
        if (Collects::where('gid', $id)->first()) {

            echo "<script>alert('已收藏！');location.href='/info/{$id}';</script>";
        } else {

            Collects::create($res);

            return redirect("/info/{$id}");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
