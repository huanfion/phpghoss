<?php
/**
 * Created by PhpStorm.
 * User: 64889
 * Date: 2017/10/23
 * Time: 16:45
 */

namespace app\index\controller;


use think\Config;
use think\Controller;
use think\Request;

class Index extends  Controller
{
    public  function  index()
    {
        return dump(Config::get());
    }
    //方法注入
    public function zhuru($userid=0)
    {
        Request::hook("user",'getUserInfo');//getuserinfo方法要写在common.php里面才有效
        $info=Request::instance()->user($userid);
        return $info;
    }
    public function getRequest()
    {
        $request = Request::instance();
// 获取当前域名
        echo 'domain: ' . $request->domain() . '<br/>';
// 获取当前入口文件
        echo 'file: ' . $request->baseFile() . '<br/>';
// 获取当前URL地址 不含域名
        echo 'url: ' . $request->url() . '<br/>';
// 获取包含域名的完整URL地址
        echo 'url with domain: ' . $request->url(true) . '<br/>';
// 获取当前URL地址 不含QUERY_STRING
        echo 'url without query: ' . $request->baseUrl() . '<br/>';
// 获取URL访问的ROOT地址
        echo 'root:' . $request->root() . '<br/>';
// 获取URL访问的ROOT地址
        echo 'root with domain: ' . $request->root(true) . '<br/>';
// 获取URL地址中的PATH_INFO信息
        echo 'pathinfo: ' . $request->pathinfo() . '<br/>';
// 获取URL地址中的PATH_INFO信息 不含后缀
        echo 'pathinfo: ' . $request->path() . '<br/>';
// 获取URL地址中的后缀信息
        echo 'ext: ' . $request->ext() . '<br/>';
    }
    //对api友好
    public function indexApi()
    {
        $data = ['name'=>'thinkphp','url'=>'thinkphp.cn'];
        return json(['data'=>$data,'code'=>1,'message'=>'操作完成']);
    }


   /* public function  demo()
    {
        return "欢迎学习ThinkPHP5路由机制";
    }*/

    public function  demo($study='kancloud', $name='php')
    {
        $this->assign(["study"=>$study,"name"=>$name]);
        return $this->fetch("index@/demo");
        //return '欢迎来'.$study.'学习'.$name.'开发技术~~';
    }
    public function  demo1($study='kancloud', $name='php')
    {

        return '欢迎来'.$study.'学习'.$name.'开发技术~~';
    }

    //创建动态方法
    public function test($name)
    {
        return "动态方法：欢迎学习".$name."开发技术~~~";
    }

    //创建静态方法
    public  static  function  staticTest($name)
    {
        return '静态方法:欢迎学习'.$name.'开发技术~~';
    }
}