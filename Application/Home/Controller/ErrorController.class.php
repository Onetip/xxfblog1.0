<?php
namespace Home\Controller;
use Think\Controller;
/**
 * Created by PhpStorm.
 * User: xuexiaofeng
 * Date: 2015-10-30 0030
 * Time: 15:36
 */
class ErrorController extends Controller{
    public function index(){
        header('Content-type:text/html;charset=utf-8');
        echo '网站正在维护！';
    }

}