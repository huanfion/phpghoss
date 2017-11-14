<?php
/**
 * Created by PhpStorm.
 * User: 64889
 * Date: 2017/10/26
 * Time: 14:20
 */

//单例模式
class Sington
{
    static  private $_instance;
    private function __construct()
    {
        $_instance= new Sington();
        return $_instance;
    }
    static public  function createInstance()
    {
        if(!(self::$_instance instanceof self)) {
            self::$_instance = new Sington();
        }
        return self::$_instance;
    }
}