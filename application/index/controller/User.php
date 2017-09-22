<?php
/**
 * Created by PhpStorm.
 * User: 64889
 * Date: 2017/9/7
 * Time: 14:48
 */

namespace app\index\controller;

use \think\Db;
use think\db\Query;
use think\Request;
use app\index\model\admin;
use \think\Session;
class User extends Base
{
    public function  login()
    {
        $this->alreayLogin();
        return $this->view->fetch();
    }

    public function checkLogin(Request $request)
    {
        //初始化参数
       $status=0;
       $result="验证失败";
       $data=$request->param();

       //创建验证规则
        $rule=[
            "name|用户名"=>"require",
            "password|密码"=>"require",
            "verify|验证码"=>"require|captcha",
        ];

        $msg=[
            'name'=>["require"=>"用户名不能为空，请检查"],
            'password'=>["require"=>"密码不能为空，请检查"],
             'verify'=>["require"=>"验证码不能为空，请检查"]
        ];

        //进行验证
        $result=$this->validate($data,$rule);

        if($result===true)
        {
            //构造查询条件
            $map=[
                "name"=>$data['name'],
                "password"=>md5($data['password'])
            ];
            //查询用户信息
            $admin=admin::get($map);
            if($admin==null)
            {
                $result="没有找到该用户";
            }
            else
            {
                $status=1;
                $result="验证通过,点击【确定】进入";
                //设置用户登录信息
                Session::set("user_id",$admin->id);
                Session::set("user_info",$admin->getData());

                $admin->setInc("logincount");
            }
        }
        return ["status"=>$status,"message"=>$result,"data"=>$data];
    }

    public function logout()
    {
//        Session::delete("user_id");
//        Session::delete("user_info");
        //Session::set("good",1);
        admin::update(['logintime'=>time()],['id'=>Session::get("user_id")]);
        Session::delete("user_id");
        Session::delete("user_info");
        $this->success('注销成功', 'user/login');
    }
    //管理员列表
    public function  adminList()
    {
        $this->assign("title","管理员列表");
        $this->assign("desc","教学案例");
        $this->assign("keywords","教学管理系统管理员列表");
        $s=Db::table("admin")->where("id",1)->find();
        $s2=Db::getTableInfo('admin');
        $query=new Query();
        $query->table('admin')->where("status",1);
       $s1= Db::find($query);
        $this->view->count=admin::count();

        //先判断用户是不是admin用户
        $username=Session::get("user_info.name");
        if($username=='admin')
        {
            $list=admin::all(["isdelete"=>0]);//admin用户可以查看所有记录,数据要经过模型获取器处理
        }
        else
        {
            $list=admin::all(['name'=>$username]);
        }
        $this->view->assign("list",$list);
        //$this->display();
        return view();
    }
    public function adminAdd(Request $request)
    {

        $this->view->assign('title','添加管理员');
        $this->view->assign('keywords','php.cn');
        $this->view->assign('desc','PHP中文网ThinkPHP5开发实战课程');
        return view();
    }
    public function  addAdmin(Request $request)
    {
        $data=$request->param();
        $status=1;
        $message="添加成功！";

        $rule=[
            "name|用户名"=>"require|min:3|max:10",
            "password|密码"=>"require|min:6|max:10",
            "email|邮箱"=>"require|email"
        ];
        $result=$this->validate($data,$rule);

        if($result==true)
        {
            $admin=admin::create($data);
//            $user=new admin();
//            $user->name="liuhuan";
//            $user->save();
            if($admin==null)
            {
                $status=0;
                $message="添加失败！";
            }
        }
        return ["status"=>$status,"message"=>$message];
    }
    //编辑管理员
    public function adminEdit(Request $request)
    {
        $user_id=$request->param("id");
        $admin=admin::get(["id"=>$user_id]);


        $this->assign("title","编辑管理员信息");
        $this->assign("keywords","编辑管理员信息");
        $this->assign("desc","教学管理系统管理员");
        $this->assign("user_info",$admin->getData());
        return view();
    }
    //更新管理员信息
    public function editAdmin(Request $request)
    {
        //返回表单的数据
        $param=$request->param();
        $condition = ['id'=>$param['id']] ;
        $result=admin::update($param,$condition);

        //如果是admin用户,更新当前session中用户信息user_info中的角色role,供页面调用
        if(Session::get("user_info.name")=="admin")
        {
            Session::set("user_info.role",$param['role']);
        }
        if (true == $result) {
            return ['status'=>1, 'message'=>'更新成功'];
        } else {
            return ['status'=>0, 'message'=>'更新失败,请检查'];
        }
    }
//删除管理员
public function deleteAdmin(Request $request)
{
    $user_id=$request->param("id");
    admin::update(["isdelete"=>1,"id"=>$user_id]);//伪删除
    //admin::destroy($user_id);//物理删除
}
//变更用户状态
    public function  setStatus(Request $request)
    {
        $user_id=$request->param("id");
        $result=admin::get(["id"=>$user_id]);
        if($result->getData("status")==1)
        {
            admin::update(['status'=>0,'id'=>$user_id]);
        }
        else
        {
            admin::update(['status'=>1,'id'=>$user_id]);
        }
    }


    //检测用户名是否有效
    public function checkUserName(Request $request)
    {
        $userName=$request->param("name");
        $status=1;
        $message="用户名可用!";
        if(admin::get(['name'=>$userName]))
        {
            $status=0;
            $message='用户名重复，请重新输入~~';
        }
        return ["status"=>$status,"message"=>$message];

    }

    public function checkUserEmail(Request $request)
    {
        $email=$request->param("email");
        $status=1;
        $message="邮箱可用！";
        if(admin::get(['email'=>$email]))
        {
            $status=0;
            $message="邮箱重复，请重新输入~~~";
        }
        return ["status"=>$status,"message"=>$message];
    }
}