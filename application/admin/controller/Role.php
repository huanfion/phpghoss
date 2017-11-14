<?php
/**
 * Created by PhpStorm.
 * User: 64889
 * Date: 2017/10/13
 * Time: 9:54
 */

namespace app\admin\controller;

use \app\admin\model\AuthGroup as AuthGroupModel;
use think\Request;

class Role extends Base
{
    public function roleList()
    {
        $list=AuthGroupModel::paginate(10);
        $count=AuthGroupModel::count();
        $this->view->assign('title','角色列表');
        $this->view->assign('keywords','php.cn');
        $this->view->assign('desc','PHP中文网ThinkPHP5开发实战课程');

        $this->view->assign("roleList",$list);
        $this->view->assign("count",$count);
        return view();
    }

    public function setStatus(Request $request)
    {
        $roleid=$request->param("id");
        $role=AuthGroupModel::get(["id"=>$roleid]);

        if($role->getData("status")==1)
        {
            AuthGroupModel::update(["status"=>0],["id"=>$roleid]);
        }
        else
        {
            AuthGroupModel::update(["status"=>1],["id"=>$roleid]);
        }
    }


    public function roleEdit(Request $request)
    {
        $roleid=$request->param("id");
        $role_info=AuthGroupModel::get(["id"=>$roleid]);

        $this->view->assign("role_info",$role_info);
        return view();
    }

    public function doEdit(Request $request)
    {
        $status=0;
        $message="编辑失败~~~";

        $data=$request->param();
//        $data["updatetime"]=date("Y-m-d H:i:s");
        $condition=["id"=>$data["id"]];
        $result=AuthGroupModel::update($data,$condition);
        if($result==true)
        {
            $status=1;
            $message="编辑成功~~~";
        }
        return ["status"=>$status,"message"=>$message];
    }

    public function roleAdd()
    {
        return view();
    }

    public function doAdd(Request $request)
    {
        $status=0;
        $message="添加失败~~~";

        $data=$request->param();
//        $data["createtime"]=date("Y-m-d H:i:s");
        $result=AuthGroupModel::create($data);
        if(true==$result)
        {
            $status=1;
            $message="添加成功~~~";
        }
        return ["status"=>$status,"message"=>$message];

    }

    public function deleteRole(Request $request)
    {
        $roleid=$request->param("id");
        AuthGroupModel::update(["isdelete"=>1],['id'=>$roleid]);
        AuthGroupModel::destroy($roleid);
    }


    public function unDelete()
    {
        AuthGroupModel::update(["deletetime"=>NULL],["isdelete"=>1]);
    }
}