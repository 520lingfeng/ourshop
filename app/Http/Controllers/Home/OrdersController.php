<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入模型类到控制器里
use App\Model\Home\User;
use App\Model\Home\Userinfo;
use DB;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取用户名和头像
        $user = User::where('username','=',session('husername'))->first();

        $userinfo = Userinfo::where('uid','=',$user->id)->first();
        // dd($user->id);
        //获取订单信息
        // $orders = DB::select('select * from orders join  orderinfo on orders.oid = orderinfo.oid where orders.uid=7');
        $orders = DB::select("select * from orders where uid='$user->id'");
        // dd($orders);
        // 获取订单详细信息
        // $oid = $orders[0]->oid;
        $orderinfo = DB::select("SELECT * FROM `orderinfo`");
        // dd($orderinfo);
        // 获取商品信息
        $goods = DB::select("SELECT * FROM `goods`");
        // dd($goods);
        return view("Home.Orders.orders",['title'=>'我的订单','userinfo'=>$userinfo,'user'=>$user,'orders'=>$orders,'orderinfo'=>$orderinfo,'goods'=>$goods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取购物车的地址
        $carid = $request->input('addid');
        if($carid){
            $address = DB::select("select * from address where id=$carid");
        $add = $address[0]->add;
        $oname = $address[0]->name;      
        //获取购物车提交的商品
        $username = session('husername');
        //获取car表里的数据
        $goods = DB::table('car')->where('username','=',$username)->get();
        //获取用户id
        $userid = DB::select("select id from homeusers where username='$username'");

        $uid = $userid[0]->id;
        $a = date('Ymdhis',time())+mt_rand(1111,9999);
        $bid = substr_replace($a, '', -2, 0);
        $total = $request->input('total');
        $otime = date('Y-m-d H:i:s');

        //把数据写入orders表
        DB::insert("INSERT INTO orders (uid,bid,total,otime)VALUES('$uid','$bid','$total','$otime')");
        //获取最后一次插入的id
        $oids = DB::select("select last_insert_id()");
        foreach($oids[0] as $v){
            $oid = $v;
        }
       
        //插入ordersinfo
        foreach($goods as $v){
            $gid = $v->gid;
            $gnum = $v->snum;
            DB::insert("INSERT INTO `orderinfo` (`oid`, `gid`, `gnum`, `add`, `oname`)VALUES('$oid', '$gid', '$gnum', '$add', '$oname')");
        }
    }else{
        return redirect('/carinfo')->with('error','地址未选择');
    }
        //删除car表里的数据
        DB::delete("delete from car where username = '$username'");
        return redirect('/orders');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        // dd($_GET);
        //判断是否有订单状态传过来
        if($_GET)
        {
             //获取传过来的状态
            if($_GET['status']==1){
                $status = 2;
            }elseif($_GET['status']==2){
                $status = 3;
            }elseif($_GET['status']==3){
                echo '写评论了';
            }
            //更改订单状态
            $res = DB::update("UPDATE orders SET status = $status WHERE oid=$id");
            //返回订单页
            return redirect('/orders');
        }else{
               //获取用户名和头像
                $user = User::where('username','=',session('husername'))->first();

                $userinfo = Userinfo::where('uid','=',$user->id)->first();
                // dd($user->id);
                //获取订单信息
                $orders = DB::select("select * from orders where uid='$user->id' and oid='$id'");
                // dd($orders);
                // 获取订单详细信息
                // $oid = $orders[0]->oid;
                $orderinfo = DB::select("SELECT * FROM `orderinfo` WHERE oid='$id'");
                // dd($orderinfo);
                // 获取商品信息
                $gid = $orderinfo[0]->gid;
                $goods = DB::select("SELECT * FROM `goods`");
                // dd($goods);
                //获取联系人手机号
                $addname = $orderinfo[0]->oname;
                $address = DB::select("SELECT * FROM `address` WHERE name='$addname'");
                //显示订单详情页面
               return view("Home.Orders.orderinfo",['title'=>'订单详情','userinfo'=>$userinfo,'user'=>$user,'orders'=>$orders,'orderinfo'=>$orderinfo,'goods'=>$goods,'address'=>$address]);
        }
       
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
