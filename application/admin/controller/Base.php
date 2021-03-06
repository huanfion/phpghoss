<?php
/**
 * Created by PhpStorm.
 * User: 64889
 * Date: 2017/9/7
 * Time: 10:57
 */
namespace app\admin\controller;
use com\Auth;
use think\Controller;
use think\Session;

class Base extends Controller
{
    public function index()
    {
        $this->view->fetch();
    }

    protected  function  _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        $controller=request()->controller();
        $action=request()->action();
//        $auth=new Auth();
//        if(!$auth->check($controller.'-'.$action.session('user_id')))
//        {
//            $this->error("您没有访问权限");
//        }
        define("USER_ID",Session::get("user_id"));
    }
    //判断用户是否登陆
    protected  function  isLogin()
    {
        if(empty(USER_ID))
        {
            $this->error("用户未登录，无权访问",url("admin/login"));
        }
    }
    //防止用户重复登陆
    protected  function  alreayLogin()
    {
        if(!empty(USER_ID))
        {
            $this->error("用户已登陆，请勿重复登陆",url("index/index"));
        }
    }
}
