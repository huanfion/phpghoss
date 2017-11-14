<?php
/**
 * Created by PhpStorm.
 * User: 64889
 * Date: 2017/9/20
 * Time: 14:02
 */

namespace app\admin\controller;
use app\admin\model\Grade as GradeModel;
use phpDocumentor\Reflection\Types\Null_;
use think\Request;

class Grade extends Base
{
    //班级列表
    public function gradeList()
    {
        $list=GradeModel::all();
        $count=GradeModel::count();
        $gradeList=array();

        foreach ($list as $item) {
            $data=[
                "id"=>$item->id,
                "name"=>$item->name,
                "length"=>$item->length,
                "price"=>$item->price,
                "status"=>$item->status,
                "createtime"=>$item->createtime,
                "teacher"=>isset($item->teacher->name)?$item->teacher->name:'<span style="color:red;">未分配</span>'
            ];
            $gradeList[]=$data;
        }
        $this->view->assign("gradeList",$gradeList);
        $this->view->assign("count",$count);
        return view();
    }

    public function setStatus(Request $request)
    {
        $id=$_GET["id"];
        $result=GradeModel::get($id);

        if($result->getData("status")==1)
        {
            GradeModel::update(["status"=>0],["id"=>$id]);
        }
        else
        {
            GradeModel::update(["status"=>1],["id"=>$id]);
        }
    }

    public function gradeAdd()
    {
        $this->view->assign("title","添加班级");
        $this->view->assign("keywords","php.cn");
        $this->view->assign("desc","PHP中文网ThinkPHP5开发实战课程");
        return $this->view->fetch();
    }

    public function doAdd(Request $request)
    {
        $data=$request->param();
        $status=1;
        $message="添加成功";

        $rule=[
            "name|班级"=>"require|min:3|max:15",
            "length"=>"require",
            "price"=>"require"
        ];
        $result=$this->validate($data,$rule);

        if($result==true)
        {
            $grade=GradeModel::create($data);
            if($grade==null)
            {
                $status=0;
                $message="添加失败！";
            }

        }
        return ["status"=>$status,"message"=>$message];
    }

    public function gradeEdit(Request $request)
    {
        $grade_id=$request->param("id");
        $grade_info=GradeModel::get(["id"=>$grade_id]);

        //关联查询，获取当前班级对应的授课老师
        if($grade_info->teacher==null){
            $grade_info->teacher="未分配";
        }else {
            $grade_info->teacher = $grade_info->teacher->name;
        }
        $this->view->assign("title","编辑班级");
        $this->view->assign("keywords",'php.cn');
        $this->view->assign("desc","PHP中文网ThinkPHP5开发实战课程");
        $this->view->assign("grade_info",$grade_info);
        return view();
    }

    public function  doEdit(Request $request)
    {
        $status=0;
        $message="更新失败！";
        $data=$request->except("teacher");
        $result=GradeModel::update($data,["id"=>$data["id"]]);

        if($result==true)
        {
            $status=1;
            $message="更新成功！";
        }
        return ["status"=>$status,"message"=>$message];
    }
    public function deleteGrade(Request $request)
    {
        $id=$_GET["id"];
        GradeModel::update(["is_delete"=>1],["id"=>$id]);
        GradeModel::destroy($id);
    }

    public function unDelete()
    {
        GradeModel::update(["deletetime"=>Null],["is_delete"=>1]);
    }
}