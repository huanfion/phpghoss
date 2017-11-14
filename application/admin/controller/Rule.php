<?php
/**
 * Created by PhpStorm.
 * User: 64889
 * Date: 2017/11/14
 * Time: 10:48
 */

namespace app\admin\controller;


use think\Controller;
use app\admin\model\Rule as RuleModel;

//权限控制器
class Rule extends Controller
{
    //权限列表
    public function ruleList()
    {
        $rulelist=RuleModel::all();

        $this->view->assign('title','权限列表');
        $this->view->assign('keywords','ghoss.com');
        $this->view->assign('desc','国美智慧城高斯系统');
        $this->assign("rulelist",$rulelist);
        $this->assign('count',RuleModel::count());
        return view();
    }
    public function Group()
    {

    }
}