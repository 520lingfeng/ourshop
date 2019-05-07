<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class Userinfo extends Model
{
    //
    //规定属性 模型关联的数据表
    protected $table="homeinfo";
    //主键
    protected $primaryKey="id";
    //该模型是否需要自动维护时间戳  false 否 true 是
    public $timestamps = false;
    //可以被批量赋值属性(字段)
    // protected $fillable=['hobby','sex','users_id'];
    protected $guarded = [];
    //修改器方法 对获取到的数据做处理 sex 状态字段 $value 需要处理的值
    public function getSexAttribute($value){
        //处理字段状态
        $sex=[1=>'男',0=>'女',2=>'保密'];
        //返回处理后的数据
        return $sex[$value];
    }
}
