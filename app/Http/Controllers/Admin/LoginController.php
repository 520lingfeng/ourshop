<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;

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
        $request->session()->pull('username');
        return redirect("/admins/login/create");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //加载登录模板
        // var_dump(session)
        return view("Admin.Login.login");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取数据
        $username = $request->username;

        //获取管理员名
        $username=$request->input('username');
        $password=$request->input('password');
        //检测名字
        $res = DB::table("adminusers")->where("username",'=',$username)->first();
        //判断是否正确
        if($res)
        {
            // echo 'ok';
            //检测密码
            if(Hash::check($password,$res->password))
            {
                //把登录信息写入session里
                session(['username'=>$username]);
                return redirect("/admins")->with('success','登录成功');
            }else{
                return back()->with('error','密码有误');
            }
        }else{
            // echo 'error';
            return back()->with('error','管理员名字有误');
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
}
