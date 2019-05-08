<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use Mail;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //退出
        $request->session()->pull('husername');
        return redirect("/login/create");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载登录模板
        return view("Home.Login.login");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取登录名和密码
          $username = $request->input('username');
          $password = $request->input('password');
        //检测名字
          $res = DB::table("homeusers")->where("username",'=',$username)->first();
            //判断是否正确
            if($res)
            {
               //检测密码
               if(Hash::check($password,$res->password))
               {
                    //把登录信息些人session
                    session(['husername'=>$username]);
                    return redirect('/')->with('success','登录成功');
               }else{
                    return back()->with('error','密码有误');
               }
            }else{
                 return back()->with('error0','用户名错误');   
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

     //邮件发送测试  发送视图
    public function sendMails($email,$id){
        // Mail laravel 框架封装的发送邮件类 this is o2o30 发送内容 $message 消息生成器 内部封装了很多方法
        //在闭包函数内部引入闭包函数外部变量 use 引入
        Mail::send("Home.Login.reset",['id'=>$id],function($message)use($email){
             //接收方
            $message->to($email);
            //发送邮件主题
            $message->subject('密码重置');
        });

        return true;
    }

    //忘记密码
    public function forget()
    {
        return view("Home.Login.forget");
    }

    // 处理忘记密码
    public function doforget(Request $request)
    {
        $email=$request->input("email");
        $info=DB::table("homeinfo")->where("email",'=',$email)->first();
        //发送邮件 重置密码
        $res=$this->sendMails($email,$info->uid);
        if($res){
            echo "重置密码邮件已经发送,请登录邮箱重置密码";
        }
    }

    //重置密码
    public function reset(Request $request){
        $id=$request->input("id");
        $info=DB::table("homeusers")->where("id",'=',$id)->first();
        //对比下邮件的token和数据表的token
        if($info){
             //加载重置密码模板
            return view("Home.Login.newreset",['id'=>$id]);
        }
       
    }
    //执行密码重置
    public function doreset(Request $request){
        $password=$request->input("password");
        $id=$request->input("id");
        //执行修改
        $data['password']=Hash::make($password);
        if(DB::table("homeusers")->where("id",'=',$id)->update($data)){
            return redirect("/login");
        }
    }
}
