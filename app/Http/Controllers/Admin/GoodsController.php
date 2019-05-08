<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 引入type模型
use App\Model\Admin\Type;

// 引入goods模型
use App\Model\Admin\Goods;

// 引入DB -- 用于分页
use DB;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     * 商品列表
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // 查询所有数据并分页
        $goods = DB::table('goods')->paginate(6);

        // 查询所有商品分类
        $type = Type::all();

        return view('admin.goods.index', [
            'title' => '商品列表',
            'goods' => $goods,
            'type' =>$type,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * 添加商品
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        // 查询所有商品分类
        $res = Type::all();
        // dump($res);die;
        return view('admin.goods.create',[
            'title' => '添加商品',
            'res' => $res,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * 处理添加商品
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $res = $request->except('_token');
        // dump($res);die;
        // 判断文件是否上传
        if ($request->hasFile('pic')) {

            // 获取文件
            $files = $request->file('pic');

            // 新建文件名
            $name = rand(1111,9999).date('Ymd',time());

            // 获取文件后缀
            $suffix = $files->getClientOriginalExtension();

            // 新文件名
            $names = $name.'.'.$suffix;

            // 将文件移动到服务器里面
            $files->move('./admin/goods_pic', $names);
            
            // 添加不存在的字段
            $res['pic'] = '/admin/goods_pic/'.$names;
        } else {

            echo '<script>alert("文件上传失败！请重新上传！");location.href="/admin/goods/create"</script>';
        }

        // 添加商品
        Goods::create($res);

        // 返回商品列表
        return redirect('/admin/goods');
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
     * 修改商品
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        // 查询所有商品分类
        $res = Type::all();

        // 通过gid查询单条数据
        $rs = Goods::where('gid', $id)->first();
        return view('admin.goods.edit',[
            'title' => '修改商品',
            'res' => $res,
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

        // 通过gid查询单条数据
        $rs = Goods::where('gid', $id)->first();
        
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
            unlink('.'.$rs->pic);

            // 把新文件传到服务器上
            $files->move('./admin/goods_pic', $names);

            $res['pic'] = '/admin/goods_pic/'.$names;

        } else {

            // 2.不修改文件
            $res['pic'] = $rs->pic;
        }

        Goods::where('gid', $id)->update($res);
        return redirect('/admin/goods');
        
    }

    /**
     * Remove the specified resource from storage.
     * 删除商品
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        // 通过gid查询单条数据
        $res = Goods::where('gid', $id)->first();

        // 删除商品
        Goods::where('gid', $id)->delete();

        // 删除文件
        unlink('.'.$res->pic);

        return redirect('/admin/goods');
    }
}
