<?php
/**
 * Created by PhpStorm.
 * User: 64889
 * Date: 2017/10/23
 * Time: 16:04
 */

// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');
// 绑定到admin模块 手动绑定https://www.kancloud.cn/manual/thinkphp5/118040
//define('BIND_MODULE','admin');
// 开启调试模式
define('APP_DEBUG', true);

// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';
/*$build=include '../build.php';//读取自动生成定义文件
\think\Build::run($build);*/