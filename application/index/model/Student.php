<?php
/**
 * Created by PhpStorm.
 * User: 64889
 * Date: 2017/9/20
 * Time: 10:36
 */

namespace app\index\model;


use think\Model;
use traits\model\SoftDelete;

class Student extends  Model
{
    use SoftDelete;

    protected $dateFormat='Y年m月d日';
    protected $deleteTime="deletetime";
    protected $autoWriteTimestamp=true;
    protected $createTime="createtime";
    protected $updateTime="updatetime";
    protected $type = [
        'hiredate'=>'timestamp'
    ];

    public function getSexAttr($value)
    {
        $sex=[
            0=>"女",
            1=>"男"
        ];
        return $sex[$value];
    }

    public function grade()
    {
        return $this->belongsTo("Grade");
    }
}