<?php
/**
 * Created by PhpStorm.
 * User: 64889
 * Date: 2017/9/28
 * Time: 16:42
 */

namespace app\admin\controller;


use Prophecy\Util\StringUtil;
use think\Request;
use traits\model\SoftDelete;
use app\admin\model\Student as StudentModel;
class Student extends Base
{
    public function studentList()
    {
        $studentList=StudentModel::paginate(5);
        $count=StudentModel::count();

        foreach($studentList as $value)
        {
            $value->grade=$value->grade->name;
        }
        $this->view->assign("studentList",$studentList);
        $this->view->assign("count",$count);
        return view();
    }

    public function setStatus(Request $request)
    {
        $student_id=$request->param("id");

        $student=StudentModel::get(["id"=>$student_id]);

        if($student->getData("status")==1)
        {
            StudentModel::update(["status"=>0],["id"=>$student_id]);
        }
        else
        {
            StudentModel::update(["status"=>1],["id"=>$student_id]);
        }
    }


    public function studentEdit(Request $request)
    {
        $studentid=$request->param("id");
        $student_info=StudentModel::get(["id"=>$studentid]);
        $this->view->assign("title","编辑学生信息页面");
        $this->view->assign("key","教学管理系统，学生编辑");
        $this->view->assign("desc","教学管理系统");
        $this->view->assign("student_info",$student_info);
        $this->view->assign("gradeList",\app\index\model\Grade::all());
        return view();
    }

    public function doEdit(Request $request)
    {
        $data=$request->param();

        $condition=["id"=>$data["id"]];

        $result=StudentModel::update($data,$condition);

        $status=0;
        $message="更新失败~~~";

        if(true==$result)
        {
            $status=1;
            $message="更新成功~~~~";
        }
        return ["status"=>$status,"message"=>$message];
    }

    public function studentAdd()
    {
        $this->view->assign('title','添加学生');
        $this->view->assign('keywords','php.cn');
        $this->view->assign('desc','PHP中文网ThinkPHP5开发实战课程');

        $this->view->assign("gradeList",\app\index\model\Grade::all());
        return view();
    }

    public function doAdd(Request $request)
    {
        $status=0;
        $message="添加失败~~~";

        $data=$request->param();

        $result=StudentModel::create($data);
        if(true==$result)
        {
            $status=1;
            $message="添加成功~~~";
        }
        return ["status"=>$status,"message"=>$message];
    }
    public function deleteStudent(Request $request)
    {
        $student_id=$request->param("id");
        StudentModel::update(["is_delete"=>1],['id'=>$student_id]);
        StudentModel::destroy($student_id);
    }

    public function unDelete()
    {
        StudentModel::update(["deletetime"=>NULL],['is_delete'=>1]);
    }
}