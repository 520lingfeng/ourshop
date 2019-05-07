<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
     //
    //规定属性 模型关联的数据表
    protected $table="address";
    //主键
    protected $primaryKey="id";
    //该模型是否需要自动维护时间戳  false 否 true 是
    public $timestamps = false;
    //可以被批量赋值属性(字段)
    // protected $fillable=['hobby','sex','users_id'];
    protected $guarded = [];
}
