<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use DB;
use Mail;
class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         return redirect("/register/create");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         //加载模板
        return view("Home.Register.register");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //执行注册
        //判断两次密码是否一致
        // $password=$request->only(['password']);
        // dd($data);
        // // if()
         $data=$request->except(['_token','repassword','phone','code']);
         // dd($data);
         $data['password']=Hash::make($data['password']);
         $data['addtime'] = time();
        //入库
         $res=DB::table("homeusers")->insert($data);
         if($res){
            return redirect("/login");
         }else{
            return back()->with("error",'校验码有误');
         }
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

    // 验证用户名是重复
     public function checkusername(Request $request)
     {
        $username = $request->input('username');
        //获取homeuser表数据一行数据
        $info = DB::table('homeusers')->pluck('username');
        // 把数据转换成数组
        $users = array();
        foreach($info as $key => $v)
        {
            $users[$key]=$v;
        }
        //对比
        if(in_array($username,$users))
        {
            echo 1;//用户名已经存在
        }else{
            echo 0;//用户名可以注册
        }
     }



    // 手机号验证
    public function checkphone(Request $request){
        $phone = $request->input('phone');
        //获取homeinfo表数据一行数据
        $info = DB::table('homeinfo')->pluck('phone');
        //把数据对象转换成数组
        $arr = array();
        foreach($info as $key => $v){
            $arr[$key]=$v;
        }
        //对比
        if(in_array($phone,$arr)){
            echo 1;//手机号已经注册
        }else{
            echo 0;//手机号可以注册
        }
    }
    // 获取手机验证码
    public function sendphone(Request $request){
        $phone = $request->input('phone');
        //调用短信接口
        sendphone($phone);
    }


     public function checkcode(Request $request){
        //获取输入的校验码
        $code=$request->input('code');
        if(isset($_COOKIE['fcode']) && !empty($code)){
            //获取手机号接收到验证码
            $fcode=$request->cookie('fcode');
            if($fcode==$code){
                echo 1;//校验码一致
            }else{
                echo 2;//校验码不一致
            }
        }elseif(empty($code)){
            echo 3;//输入的校验码为空
        }else{
            echo 4;//校验码过期
        }

    }
}
