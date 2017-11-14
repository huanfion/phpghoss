<?php
/**
 * Created by PhpStorm.
 * User: 64889
 * Date: 2017/11/14
 * Time: 11:03
 */

namespace app\admin\model;


use think\Model;
use traits\model\SoftDelete;

class Rule  extends Model
{
    use SoftDelete;
    protected $table='auth_rule';

    protected  $deleteTime='deletetime';
    protected  $createTime=[];
    protected $updateTime=[];
}