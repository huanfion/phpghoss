<?php
/**
 * Created by PhpStorm.
 * User: 64889
 * Date: 2017/9/20
 * Time: 10:21
 */

namespace app\index\model;


use think\Model;
use traits\model\SoftDelete;

class Grade extends  Model
{
    //启用软删除
    use SoftDelete;

    //设置当前时间默认显示格式
    protected  $dateFormat="Y年m月d日";
    //定义表中删除字段，来记录删除时间
    protected  $deleteTime='deletetime';

    //开启自动写入时间戳
    protected  $autoWriteTimestamp=true;

    protected $createTime="createtime";
    protected $updateTime="updatetime";

    //定义自动完成的属性
    protected  $insert=["status"=>1,"is_delete"=>1];

    public function teacher()
    {
        return $this->hasOne("Teacher");
    }
    public function student()
    {
        return $this->hasMany("Student");
    }
}