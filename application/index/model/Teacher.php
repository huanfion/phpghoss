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

class Teacher extends Model
{
    use SoftDelete;

    protected  $dateFormat="Y年m月d日";
    protected $deleteTime="deletetime";
    protected $autoWriteTimestamp=true;
    protected $createTime="createtime";
    protected $updateTIme="updatetime";

    protected $type=[
        'hiredate'=>'timestamp'
    ];

    protected  $insert=["status"=>1];

    //设置与grade表反关联
    public function grade()
    {
        return $this->belongsTo("Grade");
    }

    public function getDegreeAttr($value)
    {
        $degree=[
            1=>'专科',
            2=>'本科',
            3=>'研究生'
        ];
        return $degree[$value];
    }
}