<?php
/**
 * Created by PhpStorm.
 * User: 64889
 * Date: 2017/9/8
 * Time: 16:53
 */
namespace app\index\model;
use think\Model;

class admin extends  Model
{

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
}