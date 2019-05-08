<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FormRequest;
use Intervention\Image\ImageManagerStatic as Image;
//导入模型类到控制器里
use App\Model\Home\User;
use App\Model\Home\Userinfo;
class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        //查询相关信息
        $user = User::where('username','=',session('husername'))->first();
        //判断是否新用户
        $res = User::find($user->id)->userinfo;
        if(!$res)
        {
            return view("Home.Member.memberadd",['title'=>'完善个人信息','user'=>$user]);
        }else{
             //查询详情表的信息
            $userinfo = Userinfo::where('uid','=',$user->id)->first();
            // 显示页面
            return view("Home.Member.member",['title'=>'个人中心','userinfo'=>$userinfo,'user'=>$user]);
        }
       
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
       //获取表单传过来的数据
        $res = $request->except('_token','head');
       //文件上传
        if($request->hasFile('head')){
            //获取文件信息
            $file = $request->file('head');

            //修改名字
            $name = rand(1111,9999).time();

            //获取文件的后缀
            $suffix = $file->getClientOriginalExtension();

            $names = $name.'.'.$suffix;



            $file->move('./upload/home',$names);

            //服务器里面需要有裁剪的图片
            $img = Image::make("upload/home/{$names}");

            //等比缩放
            $width = $img->width() / 5;
            $height = $img->height() / 5;
            $img->resize($width, $height);

            $imgs = str_random(10).'.'.$suffix;

            $img->save("upload/home/{$imgs}");

            //把图片保存到数据库中
            $res['head'] = "/upload/home/{$imgs}";
            // dd($res);
        }
        //往数据库中添加数据
        $data = Userinfo::create($res);
        if($data){

            return redirect('/member')->with('success','添加成功'); 
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
        //查询用户表
        $user = User::where('username','=',session('husername'))->first();
        //查询详情表的信息
        $userinfo = Userinfo::where('id','=',$id)->first();
        
        // 显示页面
        return view("Home.Member.memberedit",['title'=>'修改个人信息','userinfo'=>$userinfo,'user'=>$user]);
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
       //获取请求的信息
        $data = $request->except('_token','_method','head');
       //文件上传
        if($request->hasFile('head')){
            //获取文件信息
            $file = $request->file('head');

            //修改名字
            $name = rand(1111,9999).time();

            //获取文件的后缀
            $suffix = $file->getClientOriginalExtension();

            $names = $name.'.'.$suffix;



            $file->move('./upload/home',$names);

            //服务器里面需要有裁剪的图片
            $img = Image::make("upload/home/{$names}");

            //等比缩放
            $width = $img->width() / 5;
            $height = $img->height() / 5;
            $img->resize($width, $height);

            $imgs = str_random(10).'.'.$suffix;

            $img->save("upload/home/{$imgs}");

            //把图片保存到数据库中
            $data['head'] = "/upload/home/{$imgs}";

        }
         //修改数据
        $re = Userinfo::where('id', $id)->update($data);
        if($re){

            return redirect('/member')->with('success','修改成功');
        } else {

            return back();

        }
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
