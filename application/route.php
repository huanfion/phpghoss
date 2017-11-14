<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
use \think\Route;
// +----------------------------------------------------------------------
\think\Route::rule('demo1/[:study]/[:name]','index/demo1');//创建路由规则
//\think\Route::rule('demo/[:study]/[:name]','@index/demo');//创建路由规则
//直接执行类中动态方法
\think\Route::get('test/:name','\app\index\controller\Index@test');
//直接执行类中的静态方法
\think\Route::get('staticTest/:name',"\app\index\controller\Index::staticTest");

//重定向到外部地址：baidu.com
Route::get('baidu','http://www.baidu.com');

//重定向到内部地址：/admin/grade/gradelist
//????如何重定向到内部其他模块地址
Route::get('gradelist','/admin/grade/gradelist');

//路由到闭包
//创建一个匿名函数,用作:闭包
$clouser=function ($study,$name="thinkphp")
{
    return '欢迎您选择'.$study.'学习'.$name.'开发技术~~';
};
Route::get("demo/:study/[:name]",$clouser);
return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],

];
