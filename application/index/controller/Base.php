<?php
/**
 * Created by PhpStorm.
 * User: 64889
 * Date: 2017/9/7
 * Time: 10:57
 */
namespace app\index\controller;
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
        define("USER_ID",Session::get("user_id"));
    }
    //判断用户是否登陆
    protected  function  isLogin()
    {
        if(empty(USER_ID))
        {
            $this->error("用户未登录，无权访问",url("user/login"));
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