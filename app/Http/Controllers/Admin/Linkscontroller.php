<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 引入链接模型
use App\Model\admin\Links;

// 引入DB
use DB;

class Linkscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     * 友情链接列表
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // 查询所有友情链接
        $links = DB::table('links')->paginate(5);
        return view('admin.links.index',[
            'title' => '链接列表',
            'links' => $links,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * 添加友情链接
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.links.create',['title' => '添加友情链接']);
    }

    /**
     * Store a newly created resource in storage.
     * 处理添加友情链接
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $res = $request->except('_token','icon');
        // dump($res);die;
        // 判断是否有文件上传成功
        if ($request->hasFile('icon')) {

            // 获取文件
            $files = $request->file('icon');

            // 重设文件名
            $name = rand(1111,9999).date('Ymd', time());

            // 获取文件后缀
            $suffix = $files->getClientOriginalExtension();

            // 拼接新文件
            $names = $name.'.'.$suffix;

            // 把新文件传到服务器上
            $files->move('./admin/links_icon', $names);

            // 添加不存在的字段
            $res['icon'] = '/admin/links_icon/'.$names;

        } 
        // 添加链接
        Links::create($res);

        // 返回链接列表
        return redirect('/admin/links');
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
     * 修改友情链接
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        // 通过id查询单条数据
        $rs = Links::where('lid', $id)->first();

        return view('admin.links.edit',[
            'title' => '修改链接',
            'rs' => $rs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * 处理修改友情链接
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $res = $request->except('_token','_method');

        // 通过gid查询单条数据
        $rs = Links::where('lid', $id)->first();
        
        // 判断是否有文件上传
        if ($request->hasFile('icon')) {

            // 1.修改文件
            // 文件数据
            $files = $request->file('icon');

            // 新建文件名
            $name = rand(1111,9999).date('Ymd',time());

            // 文件后缀名
            $suffix = $files->getClientOriginalExtension();

            // 合并新文件
            $names = $name.'.'.$suffix;

            // 删除原来文件
            unlink('.'.$rs->icon);

            // 把新文件传到服务器上
            $files->move('./admin/links_icon', $names);

            $res['icon'] = '/admin/links_icon/'.$names;

        } 

        Links::where('lid', $id)->update($res);

        return redirect('/admin/links');
    }

    /**
     * Remove the specified resource from storage.
     * 删除友情链接
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // 通过id查询单条数据
        $rs = Links::where('lid', $id)->first();
        
        if ($rs->icon != '') {

            // 删除文件
            unlink('.'.$rs->icon);
        }

        Links::where('lid', $id)->delete();

        return back();
    }
}
