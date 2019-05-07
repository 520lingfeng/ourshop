<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 引入Userinfo个人详情的模型
use App\Model\Home\Userinfo;

// 引入user的模型
use App\Model\Home\User;

// 引入Address模型
use App\Model\Home\Address;

// 引入DB
use DB;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     * 地址列表
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // 查询相关信息
        $user = User::where('username','=',session('husername'))->first();
        
         //查询详情表的信息
        $userinfo = Userinfo::where('uid','=',$user->id)->first();

        // 查询所有地址
        $address = DB::table('address')->paginate(3);

        $num = count(Address::all());

        return view('home.address.index', [
            'title' => '地址列表',
            'userinfo' => $userinfo,
            'user' => $user,
            'address' => $address,
            'num' => $num,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * 添加地址
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        //查询相关信息
        $user = User::where('username','=',session('husername'))->first();
        
         //查询详情表的信息
        $userinfo = Userinfo::where('uid','=',$user->id)->first();
        return view('home.address.create',[
            'title' => '添加地址',
            'userinfo' => $userinfo,
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * 处理添加地址
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $res = $request->except('_token');

        $sum = count(Address::all());
        if ($sum == 10) {

            echo '<script>alert("最多添加10个地址，请删除之前的再填添加！");location.href="/address";</script>';
        } else {

            Address::create($res);
            return redirect('/address');
        } 
    }

    /**
     * Display the specified resource.
     *
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
     * 修改地址
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
  
        // 通过id查询单条数据
        $rs = Address::where('id', $id)->first();

        //查询相关信息
        $user = User::where('username','=',session('husername'))->first();
        
         //查询详情表的信息
        $userinfo = Userinfo::where('uid','=',$user->id)->first();

        return view('home.address.edit', [
            'title' => '修改地址',
            'rs' => $rs,
            'userinfo' => $userinfo,
            'user' => $user,            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * 处理修改地址
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $res = $request->except('_token','_method');

        Address::where('id', $id)->update($res);

        return redirect('/address');

    }

    /**
     * Remove the specified resource from storage.
     *
     * 删除地址
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Address::where('id', $id)->delete();

        return back();
    }
}
