<?php
/**
 * Created by PhpStorm.
 * User: 64889
 * Date: 2017/9/22
 * Time: 10:31
 */

namespace app\admin\controller;
use think\Request;
use app\admin\model\Teacher as TeacherModel;

class Teacher extends  Base
{
    //教师列表
    public function teacherList()
    {
        $list=TeacherModel::all();
        $count=TeacherModel::count();
        $teacherList=array();
        foreach ($list as $value)
        {
            $data=[
                "id"=>$value->id,
                "name"=>$value->name,
                'degree'=>$value->degree,
                'school'=>$value->school,
                'mobile'=>$value->mobile,
                'hiredate'=>$value->hiredate,
                'status'=>$value->status,
                'grade'=>isset($value->grade->name)?$value->grade->name:'<span style="color:red;">未分配</span>'
            ];

            $teacherList[]=$data;
        }

        $this->view->assign('teacherList',$teacherList);
        $this->view->assign('count',$count);
        //设置当前页面的seo模板变量
        $this->view->assign('title','编辑班级');
        $this->view->assign('keywords','php.cn');
        $this->view->assign('desc','PHP中文网ThinkPHP5开发实战课程');

        return view();
    }

    public function teacherAdd()
    {
        $this->view->assign("title",'添加教师');
        $this->view->assign("keywords",'php.cn');
        $this->view->assign("des",'PHP中文网ThinkPHP5开发实战课程');
        $this->view->assign("gradeList",\app\index\model\Grade::all());
        return view();
    }

    public function doAdd(Request $request)
    {
        $status=1;
        $message="添加成功";
        $data=$request->param();

        $teacher=TeacherModel::create($data);
        if($teacher==null)
        {
            $status=0;
            $message="添加失败";
        }

        return ["status"=>$status,"message"=>$message];
    }


    public function teacherEdit(Request $request)
    {
        $id=$request->param("id");
        $teacher_info=TeacherModel::get(["id"=>$id]);
        $this->view->assign("title",'编辑教师');
        $this->view->assign("keywords",'php.cn');
        $this->view->assign("des",'PHP中文网ThinkPHP5开发实战课程');
        $this->view->assign("teacher_info",$teacher_info);
        $this->view->assign("gradeList",\app\index\model\Grade::all());
        return view();
    }

    public function doEdit(Request $request)
    {
        $status=0;
        $message="更新失败！";
        $data=$request->except("grade");

        $condition=['id'=>$data["id"]];
        $result=TeacherModel::update($data,$condition);
        if($result==true)
        {
            $status=1;
            $message="更新成功！";
        }
        return ["status"=>$status,"message"=>$message];
    }
}