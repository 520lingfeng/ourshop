<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// 引入type模型
use App\Model\Admin\Type;

// 引入DB类 -- 主要用于分页方法使用
use DB;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     * 分类列表
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // 查询所有数据
        // $type = Type::all(); //没有自带分页方法
        $type = DB::table('type')->paginate(6);

        @$num = count($type);
        return view('admin.type.index',[
            'title' => '分类列表',
            'type' => $type,
            'num' => $num
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * 添加分类
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        // 遍历数据库数据 
        // 用于一级分类
        $res = Type::all();
        // 用于二级分类
        $res2 = $res;
        return view('admin.type.create', [
            'title' => '添加分类',
            'res' => $res,
            'res2' => $res2,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * 处理添加分类
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 处理添加分类方法
        $res = $request->except('_token');

        // 添加path字段信息 二级菜单
        if ($res['pid'] == '0') {

            $res['path'] = '0,';
        } else {

            // 根据id查询单条数据
            $rs = Type::where('tid', $res['pid'])->first();
            $res['path'] = $rs['path'].$rs['tid'].',';
            $res['tname'] = $res['tname'];
        }

        // 添加到数据库中
        Type::create($res);

        // 跳转到分类列表
        return redirect('/admin/type');
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

        // 查询所有数据
        $res = Type::all();

        // 通过id查询单条数据
        $rs = Type::where('tid', $id)->first();


        // 跳转到修改页面
        return view('admin.type.edit', [
            'title' => '编辑分类',
            'res' => $res,
            'rs' => $rs
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

        // 查询所有数据
        $res = $request->except('_token','_method');

        // 判断是否是一级菜单
        if (count($res) == 1) {

            // 通过id查询单条数据
            $rs = Type::where('tid', $id)->first();
            // 把查到的数据放进$rs中
            $res['pid'] = 0;
            $res['path'] = $rs->path;
            // 修改数据
            Type::where('tid', $id)->update($res);
        } else {
            // 二级菜单 
            $res['path'] = '0,'.$res['pid'].',';
            // 修改数据
            Type::where('tid', $id)->update($res);
        }

        // 跳转到分类列表
        return redirect('/admin/type');
    }

    /**
     * Remove the specified resource from storage.
     * 删除分类
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 若是一级分类有子类则不能删除
        // 通过id查询是否有子类
        $rs = Type::where('pid', $id)->get();
        @$num = count($rs[0]);
        // dump($num);die;
        if($num) {

            echo '<script>alert("有子分类，不可删除！");location.href="/admin/type"</script>';
        } else {

            Type::where('tid', $id)->delete();
            echo '<script>alert("删除成功！");location.href="/admin/type"</script>';  
        }
    }
}
