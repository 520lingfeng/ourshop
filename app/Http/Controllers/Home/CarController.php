<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use URL;
class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 

        //获取购物车商品信息
        $data = DB::table('car')->where('username','=',session('husername'))->get();
        //显示购物车
        return view("Home.Car.car",['title'=>'购物车','data'=>$data]);
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
        //获取用户id
       $username = session('husername');
       $uids = DB::select("select id from homeusers where username='$username'");
        //获取传过来的地址id
            $addid = $request->input('address');
        //判断有没有地址
        if($addid)
        {
            $address = DB::select("select * from address where id='$addid'");
        }else{
            $address=null;
        }

         //获取传过来的商品用户名
        $username = session('husername');
        //获取car表里的数据
        $data = DB::table('car')->where('username','=',$username)->get();
        // dd($uids);
        return view("Home.Car.carinfo",['title'=>'确认订单','data'=>$data,'address'=>$address,'uid'=>$uids]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        //获取传过来的商品id和用户名
        $username = session('husername');
      
        //判断购物车是否有这个商品
        //先获取car表里的数据
        // $data = DB::table('car')->select('gid')->where('username','=',$username and 'gid','=',$id)->first();
        $datas = DB::select("select * from car where username='$username' and gid=$id ");
        // dd($data[0]);
        
        if($datas)
        {
            $data = $datas[0];
            if($data->gid==$id)
            {
             //把购买数量加1
             DB::update("UPDATE car SET snum=snum+1,total=snum*price WHERE gid='$data->gid' and username='$username'");
            }
        }else{

            //获取商品信息
            $goods = DB::table('goods')->select('gid','gname','price','pic')->where('gid','=',$id)->first();

            //把数据写入car表
            DB::insert("INSERT INTO car (gid,gname,price,pic,username,total)VALUE('$goods->gid','$goods->gname', '$goods->price' ,'$goods->pic','$username','$goods->price')");   
        }

        return redirect('/car');
        
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
        echo '1234';
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
    // 点击增加购物车数量
    public function addcarnum(Request $request)
    {
        $username = session('husername');//用户名
        $addnum = $request->input('carnum');//更改的数量
        $gid = $request->input('gid');//商品id
        //关联商品库存,如果大于库存不能更改给与提示
        $data = DB::select("SELECT stock FROM goods WHERE gid='$gid'");
        $stock = $data[0]->stock;
        //判断修改增加的数量是否大于库存
        if($addnum<=$stock)
        {
            //更新car表里的数量
            // $info =DB::table('car')->where('gid', $gid)->where('username',$username)->update(['snum' => $addnum])->updata(['total'=>snum*price]);
            $info =  DB::update("UPDATE car SET snum='$addnum',total=snum*price WHERE gid='$gid' and username='$username'");
            if($info){
                echo 1;//成功
                
            }else{
                echo 0;//失败
            }

        }else{
            echo $stock;//购买的数量大于库存
        }
        
       
        
    }

    // 点击减少购物车数量
    public function jiancarnum(Request $request)
    {
        $addnum = $request->input('carnum');//更改的数量

        $gid = $request->input('gid');//商品id
        $username = session('husername');//用户名
        //更新car表里的数量
        // $info =DB::table('car')->where('gid', $gid)->where('username',$username)->update(['snum' => $addnum])->updata(['total'=>snum*price]);
        $info =  DB::update("UPDATE car SET snum='$addnum',total=snum*price WHERE gid='$gid' and username='$username'");
        if($info){
            echo 1;//成功
            
        }else{
            echo 0;//失败
        }
    }

    //处理商品总价
    public function goodstotalprice(Request $request)
    {
        $username = session('husername');//用户名
        //查询商品总价
        $data = DB::select("SELECT username,SUM(total) as total FROM car GROUP BY username HAVING username='$username'");
        echo $data[0]->total;
    }
}
