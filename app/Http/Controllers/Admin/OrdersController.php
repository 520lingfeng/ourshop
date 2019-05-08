<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        //获取
       $orders=DB::table('orders')->get();
       // dd($orders);
       $user = DB::table('homeusers')->get();
        // dd($user);
        return view("Admin.Orders.orders",['title'=>'订单列表','orders'=>$orders,'user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //发货处理
    public function send(){
       DB::table('orders')->where('oid', $_GET['id'])->update(['status' => 1]);
       return redirect('/admin/orders');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //订单详情
    public function orderinfo(){
        //获取订单详情数据
        $orderinfo = DB::table('orderinfo')->where('oid',$_GET['id'])->get();
        // dd($res);
        return view("Admin.Orders.orderinfo",['title'=>'订单详情页','orderinfo'=>$orderinfo]);
        
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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

        //获取订单详情数据
        $orderinfo = DB::select("select * from orders join  orderinfo on orders.oid = orderinfo.oid where orders.oid='$id'");
        // dd($orderinfo);
        return view("Admin.Orders.orderinfo",['title'=>'订单详情页','orderinfo'=>$orderinfo]);
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
