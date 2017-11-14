<?php
/**
 * Created by PhpStorm.
 * User: 64889
 * Date: 2017/11/6
 * Time: 11:41
 */

namespace app\admin\model;


use think\Loader;
use think\Model;
use traits\model\SoftDelete;
use Org\Nx\Data;
class Menu extends  Model
{
    use SoftDelete;
    protected  $deleteTime='deletetime';
    protected  $createTime=[];
    protected $updateTime=[];

    public function getTreeData($type='tree',$order='')
    {
        // 判断是否需要排序
        if(empty($order))
        {
            $data=$this->select();
        }
        else
        {
            $data=$this->order($order)->select();
        }

        // 获取树形或者结构数据
        if($type=="tree")
        {
            \think\Loader::import('Org.Nx.Data',EXTEND_PATH, '.class.php');
            //\think\Loader::addClassMap('Org\Nx\Data',LIB_PATH.'Org\Nx\Data.class.php');
            $data=Data::tree($data,"name","id","pid");
        }
        return $data;
    }
}