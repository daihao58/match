<?php

namespace app\admin\model\kc;

use think\Model;


class Kccat extends Model
{

    

    

    // 表名
    protected $name = 'class_cat';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = 'int';

    // 定义时间戳字段名
    protected $createTime = 'createtime';
    protected $updateTime = false;
    protected $deleteTime = false;

    // 追加属性
    protected $append = [

    ];
    

    







}
