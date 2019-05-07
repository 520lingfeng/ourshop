<?php

namespace App\Http\Controllers\Admin;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 引入用户模型
use App\Model\Admin\User;

// 引入DB
use DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取
        $adminusers = DB::table('adminusers')->paginate(5);
        
        return view('admin.user.index',[
            'title' => '用户列表',
            'adminusers' => $adminusers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {      
        
        //显示页面
        return view('admin.user.create',['title'=>'管理员添加页面']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        //密码加密
        $data['password']=Hash::make($data['password']);
        // dd($data);
        // 添加进入数据库
        if (DB::table('adminusers')->insert($data)) {
            return  redirect("/admin/user")->with('success','添加成功');
        }else{ 
            return  back()->with('success','error'); 
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
        //根据id获取数据
        $rs = User::where('uid', $id)->first();
        // dump($rs->username);die;

        // //把获取的数据 分配到页面中
        return view('admin.user.edit',[
            'title' => '修改用户',
            'rs' => $rs,
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     * 修改用户
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          $rs = $request->except(['_token','_method']);

          //密码加密
          $rs['password']=Hash::make($rs['password']);

          User::where('uid', $id)->update($rs);

          return redirect('/admin/user');

    }

    /**
     * Remove the specified resource from storage.
     * 删除用户
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   

        $res = DB::table('adminusers')->where('uid',$id)->delete();

        return back();

    }
}
