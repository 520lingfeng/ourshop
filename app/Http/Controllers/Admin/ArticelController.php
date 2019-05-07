<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 引入文章模型
use App\Model\admin\Articel;

// 引入DB
use DB;


class ArticelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // 查询所有友情链接
        $articel = DB::table('articel')->paginate(5);
        return view('admin.articel.index',[
            'title' => '链接列表',
            'articel' => $articel,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.articel.create',['title' => '添加文章']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $res = $request->except('_token','aimg');

        // 判断是否有文件上传成功
        if ($request->hasFile('aimg')) {

            // 获取文件
            $files = $request->file('aimg');

            // 重设文件名
            $name = rand(1111,9999).date('Ymd', time());

            // 获取文件后缀
            $suffix = $files->getClientOriginalExtension();

            // 拼接新文件
            $names = $name.'.'.$suffix;

            // 把新文件传到服务器上
            $files->move('./admin/articel_aimg', $names);

            // 添加不存在的字段
            $res['aimg'] = '/admin/articel_aimg/'.$names;

        } 
        // 添加广告
        Articel::create($res);

        // 返回广告列表
        return redirect('/admin/articel');
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

        // 通过id查询单条数据
        $rs = Articel::where('id', $id)->first();

        return view('admin.articel.edit',[
            'title' => '修改文章',
            'rs' => $rs,
        ]);
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

        $res = $request->except('_token','_method');

        // 通过gid查询单条数据
        $rs = Articel::where('id', $id)->first();
        
        // 判断是否有文件上传
        if ($request->hasFile('aimg')) {

            // 1.修改文件
            // 文件数据
            $files = $request->file('aimg');

            // 新建文件名
            $name = rand(1111,9999).date('Ymd',time());

            // 文件后缀名
            $suffix = $files->getClientOriginalExtension();

            // 合并新文件
            $names = $name.'.'.$suffix;

            // 删除原来文件
            unlink('.'.$rs->aimg);

            // 把新文件传到服务器上
            $files->move('./admin/articel_aimg', $names);

            $res['aimg'] = '/admin/articel_aimg/'.$names;

        } 

        Articel::where('id', $id)->update($res);

        return redirect('/admin/articel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // 通过id查询单条数据
        $rs = Articel::where('id', $id)->first();
        
        if ($rs->aimg != '') {

            // 删除文件
            unlink('.'.$rs->aimg);
        }

        Articel::where('id', $id)->delete();

        return back();
    }
}
