<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 引入DB -- 用于分页
use DB;

// 引入GoodsImg模型
use App\Model\Admin\GoodsImg;

class GoodsImgController extends Controller
{
    /**
     * Display a listing of the resource.
     * 商品关联图片列表
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // 查询所有数据并分页
        $goodsimg = DB::table('gimgs')->paginate(5);

        return view('admin.goodsimg.index',[
            'title' => '商品关联图片列表',
            'goodsimg' => $goodsimg,
        ]);
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

    public function add($id)
    {

        // 添加商品关联图片
        return view('admin.goodsimg.add',[
            'title' => '添加商品关联图片',
            'id' => $id,
        ]);        
    }

    /**
     * Store a newly created resource in storage.
     * 处理添加商品关联图片
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $res = $request->except('_token');

        if ($request->hasFile('pic')) {

            $files = $request->file('pic');

            foreach($files as $k => $v) {

                $name = rand(1111,9999).date('Ymd',time());

                // 文件后缀名
                $suffix = $v->getClientOriginalExtension();

                $names = $name.'.'.$suffix;

                // 将文件移动到服务器里面
                $v->move('./admin/goods_pic/links', $names);

                // 将pic字段添加进来
                $res['pic'] = '/admin/goods_pic/links/'.$names;

                // 添加商品关联图片
                GoodsImg::create($res);
            }
        } else {

            echo "<script>alert('文件上传失败！请重新上传！'');location.href='/admin/imgs/add/{$res['gid']}'</script>";
        }

        // 返回商品关联图片列表
        return redirect('/admin/imgs');
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
        
        // 通过gid查询单条数据
        $rs = Goodsimg::where('id', $id)->first();

        return view('admin.goodsimg.edit',[
            'title' => '修改商品关联图片',
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
        
        // 接受传过来的数据
        $res = $request->except('_token','_method');

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
            $files->move('./admin/goods_pic/links', $names);

            $res['pic'] = '/admin/goods_pic/links/'.$names;

        } 

        Goodsimg::where('id', $id)->update($res);

        return redirect('/admin/imgs');
    }

    /**
     * Remove the specified resource from storage.
     * 删除关联图片
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        // 通过id查询单条数据
        $rs = GoodsImg::where('id', $id)->first();

        // 删除关联图片
        @unlink('.'.$rs->pic);

        GoodsImg::where('id', $id)->delete();

        // 返回上一级 商品关联图片列表
        return back();
    }
}
