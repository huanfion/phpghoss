<?php
/**
 * Created by PhpStorm.
 * User: 64889
 * Date: 2017/11/6
 * Time: 11:40
 */

namespace app\admin\controller;
use \app\admin\model\Menu as MenuModel;
use think\Request;

class Menu extends Base
{

    public  function menulist()
    {

        //$list=model('menu')->order("id","asc")->select();
        $list=model('Menu')->getTreeData('tree',"ordernumber,id");
        $count=MenuModel::count();
        $this->assign("title","菜单管理");
        $this->view->assign('keywords','php.cn');
        $this->view->assign('desc','PHP中文网ThinkPHP5开发实战课程');

        $this->assign("menuList",$list);
        $this->assign("count",$count);
        return view();
    }

    public function menuAdd()
    {
        $this->view->assign("title","添加菜单");
        $this->view->assign("keywords","php.cn");
        $this->view->assign("desc","PHP中文网ThinkPHP5开发实战课程");
        $pmenulist=[];
        $pmenulist=MenuModel::get(["pid"=>0]);
        $this->assign("menuList",MenuModel::all(["pid"=>0]));
        $this->assign("pmenulist",$pmenulist);
        return view();
    }


    public function doAdd(Request $request)
    {
        $status=1;
        $message="添加成功";

        $data=$request->param();
        $menu=MenuModel::create($data);
        if($menu==null)
        {
            $status=0;
            $message="添加失败";
        }
        return ["status"=>$status,"message"=>$message];
    }

    public function menuEdit(Request $request)
    {
        $menuid=$request->param("id");
        $menu=MenuModel::get(["id"=>$menuid]);

        $this->assign("menuList",MenuModel::all(["pid"=>0]));
        $this->assign("menu",$menu);
        return view();
    }

    public function doEdit(Request $request)
    {
        $status=0;
        $message="更新失败！";

        $data=$request->param();
        $condition=["id"=>$data["id"]];
        $result=MenuModel::update($data,$condition);
        if($result==true)
        {
            $status=1;
            $message="更新成功~~~";
        }
        return ["status"=>$status,"message"=>$message];

    }

    public function deleteMenu(Request $request)
    {
        $menuid=$request->param("id");
        MenuModel::update(["isdelete"=>1],['id'=>$menuid]);
        MenuModel::destroy($menuid);
    }
    public function unDelete()
    {
        MenuModel::update(["deletetime"=>NULL],["isdelete"=>1]);
    }
}