<?php
/**
 * Created by PhpStorm.
 * User: 64889
 * Date: 2017/10/13
 * Time: 9:57
 */

namespace app\admin\model;


use think\Model;
use traits\model\SoftDelete;

class AuthGroup extends Model
{

    use SoftDelete;//使用软删除功能
    // 数据表名称
    //protected $table='gs_role';
    protected  $deleteTime='deletetime';
// 保存自动完成列表
    //protected $auto=['isdelete'=>0,'deletetime'=>NULL];
// 新增自动完成列表
   // protected $insert=["isdelete"=>0];
// 更新自动完成列表
    protected $update=[];
    // 是否需要自动写入时间戳 如果设置为字符串 则表示时间字段的类型
    protected $autoWriteTimeStamp=true;
    // 创建时间字段
   protected  $createTime="createtime";
    // 更新时间字段
    protected  $updateTime="updatetime";
    // 时间字段取出后的默认时间格式
    protected  $dateFormat='Y-m-d H:i:s';
    //
    protected  $type=["deletetime"=>"datetime"];
    public function user()
    {
        return $this->hasMany("Admin","roleid");
    }

}