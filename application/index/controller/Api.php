<?php
/**
 * Created by PhpStorm.
 * User: 64889
 * Date: 2017/10/25
 * Time: 12:21
 */

namespace app\index\controller;


use think\Controller;

class Api extends Controller
{

    //控制器初始化
    public function  _initialize()
    {
        return "init";
    }
    public function json()
    {
        $arr=array(
            "id"=>1,
            "name"=>"liuhuan刘欢"
        );
        $data="输出data数据";
        $newdata=iconv("UTF-8","GBK",$data);//实现字符串编码转换
        return json_encode($data);
    }

    public function  xml()
    {
        header("Content-Type:text/xml");
        $xml="<?xml version='1.0' encoding='UTF-8'?>\n";
        $xml.="<root>\n";
        $xml.="<code>200</code>\n";
        $xml.="<message>返回数据成功</message>\n";
        $xml.="<data>\n";
        $xml.="<id>1</id>\n";
        $xml.="<name>huanfion</name>\n";
        $xml.="</data>\n";
        $xml.="</root>";

        echo $xml;
    }
}