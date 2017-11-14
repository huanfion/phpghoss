<?php
/**
 * Created by PhpStorm.
 * User: 64889
 * Date: 2017/9/20
 * Time: 10:36
 */

namespace app\admin\model;


use think\Model;
use traits\model\SoftDelete;

class Student extends  Model
{
    use SoftDelete;

    protected  $dateFormat="Y/m/d";
    protected $deleteTime="deletetime";
    protected $autoWriteTimestamp=true;
    protected $createTime="createtime";
    protected $updateTime="updatetime";
    protected $type = [
        'hiredate'=>'timestamp',
        'starttime'=>'timestamp'
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