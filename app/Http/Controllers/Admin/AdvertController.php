<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 引入广告模型
use App\Model\admin\Advert;

// 引入DB
use DB;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     * 广告列表
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // 查询所有广告
        $advert = DB::table('advert')->paginate(5);
        return view('admin.advert.index',[
            'title' => '广告列表',
            'advert' => $advert,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * 添加广告
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.advert.create',['title' => '添加广告']);
    }

    /**
     * Store a newly created resource in storage.
     * 处理添加广告
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $res = $request->except('_token','pic');

        // 判断文件是否上传成功
        if ($request->hasFile('pic')) {

            // 获取文件
            $files = $request->file('pic');

            // 重设文件名
            $name = rand(1111,9999).date('Ymd', time());

            // 获取文件后缀
            $suffix = $files->getClientOriginalExtension();

            // 拼接新文件
            $names = $name.'.'.$suffix;

            // 把新文件传到服务器上
            $files->move('./admin/advert_pic', $names);

            // 添加不存在的字段
            $res['pic'] = '/admin/advert_pic/'.$names;

            // // 判断链接是否含 http://
            // if (slice($res['url'],0,7) != 'http://') {
            //     $res['url'] = 'http://'.$res['url'];
            // }
        } else {

            echo '<script>alert("文件上传失败！请重新上传！");location.href="/admin/advert/create"</script>';
        }

        // 添加广告
        Advert::create($res);

        // 返回广告列表
        return redirect('/admin/advert');
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
     * 修改广告
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        // 通过id查询单条数据
        $rs = Advert::where('id', $id)->first();

        return view('admin.advert.edit',[
            'title' => '修改广告',
            'rs' => $rs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * 处理修改广告
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $res = $request->except('_token','_method');

        // 通过gid查询单条数据
        $rs = Advert::where('id', $id)->first();
        
        // 判断文件是否上传
        if ($request->hasFile('pic')) {

            // 1.修改文件
            // 文件数据
            $files = $request->file('pic');

            // 新建文件名
            $name = rand(1111,9999).date('Ymd',time());

            // 文件后缀名
            $suffix = $files->getClientOriginalExtension();

            // 合并新文件
            $names = $name.'.'.$suffix;

            // 删除原来文件
            @unlink('.'.$rs->pic);

            // 把新文件传到服务器上
            $files->move('./admin/advert_pic', $names);

            $res['pic'] = '/admin/advert_pic/'.$names;

        } else {

            // 2.不修改文件
            $res['pic'] = $rs->pic;
        }

        Advert::where('id', $id)->update($res);
        return redirect('/admin/advert');
    }

    /**
     * Remove the specified resource from storage.
     * 删除广告
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        // 通过id查询单条数据
        $rs = Advert::where('id', $id)->first();
        
        // 删除文件
        unlink('.'.$rs->pic);

        Advert::where('id', $id)->delete();

        return back();
    }
}
