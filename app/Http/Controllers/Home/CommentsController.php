<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//导入模型类到控制器里
use App\Model\Home\User;
use App\Model\Home\Userinfo;
use App\Model\Home\Comments;
use DB;
class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
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
        //获取评论内容
        $comments = $request->except('_token');

        // 把内容写入评论表
            //获取订单号
            //获取订单信息
            $oid = $comments['oid'];
            // dd($oid);
            $orders = DB::select("select * from orders where oid='$oid'");
            $uid = $orders[0]->uid;
        
            //查询该评论属于哪个商品
            $orderinfo = DB::select("select gid from orderinfo where oid='$oid'");
            //根据商品添加评论到commets表
            $i = 0;

            foreach($orderinfo as $v)
            {   //评论内容            
                $text = $comments['comments'][$i];
                $gid = $v->gid;
                //执行添加语句
                DB::insert("INSERT INTO `comments`(`oid`,`gid`,`uid`,`text`) VALUES ($oid,$gid,$uid,'$text')");
                $i++;
            }

            //更改订单状态，把待评价改成已评价
            $status = $comments['status'];
            //判断传过来的状态是否为待评论
            if($status == 2)
            {
                DB::update("UPDATE orders SET status=status+1 WHERE oid=$oid");
            }
            return redirect('/orders');
        // dd($text);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            //获取订单的状态
            $status = $_GET['status'];
            //获取用户名和头像
            $user = User::where('username','=',session('husername'))->first();

            $userinfo = Userinfo::where('uid','=',$user->id)->first();
            //获取订单信息
            $orders = DB::select("select * from orders where uid='$user->id' and oid='$id'");
            // 获取订单详细信息
            $orderinfo = DB::select("SELECT * FROM `orderinfo` WHERE oid='$id'");
            // 获取商品信息
            $gid = $orderinfo[0]->gid;
            $goods = DB::select("SELECT * FROM `goods`");
            // dd($orderinfo);
       
        return view('Home.Comments.comments',['title'=>'我的评价','userinfo'=>$userinfo,'user'=>$user,'orders'=>$orders,'orderinfo'=>$orderinfo,'goods'=>$goods,'status'=>$status]);

        

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
