<?php
/**
 * Created by PhpStorm.
 * User: 64889
 * Date: 2017/9/8
 * Time: 16:53
 */
namespace app\index\model;
use think\Model;
use traits\model\SoftDelete;

class admin extends  Model
{
    use SoftDelete;//使用软删除功能

    protected  $deleteTime="deletetime";
    // 保存自动完成列表
    protected $auto=['isdelete'=>0,'deletetime'=>null];

    //新增自动完成列表
    protected  $insert=['logintime'=>null,'logincount'=>0];
    //定义时间戳字段名
    protected  $createTime='createtime';
    protected  $updateTime='updatetime';
    // 更新自动完成列表
    protected $update = [];
    // 时间字段取出后的默认时间格式
    protected $dateFormat = 'Y年m月d日';
    public function  getRoleAttr($value)
    {
        $role=[
            0=>"管理员",
            1=>"超级管理员"
        ];
        return $role[$value];
    }

    public function getStatusAttr($value)
    {
        $status=[
            0=>"已停用",
            1=>"已启用"
        ];
        return $status[$value];
    }

    //密码修改
    public function setPasswordAttr($value)
    {
        return md5($value);
    }
    //
    public function getLoginTimeAttr($value)
    {
        return date("Y/m/d H:i",$value);
    }
}