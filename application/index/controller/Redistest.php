<?php
/**
 * Created by PhpStorm.
 * User: 64889
 * Date: 2017/10/26
 * Time: 11:34
 */

namespace app\index\controller;


use think\Controller;
use think\cache\driver;

//控制器命名注意，采用驼峰法命名（首字母大写）
class Redistest extends  Controller
{
    public function index()
    {
        $config=[
            'host'=>"localhost",
            'port'=>"6379",
            'password'=>'',
            'select'     => 0,
            'timeout'    => 0,
            'expire'     => 0,
            'persistent' => false,
            'prefix'     => '',
        ];
        $Redis=new driver\Redis($config);
        echo $Redis->get('key');

    }
}