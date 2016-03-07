<?php
namespace Home\Controller;
use Think\Controller;
/**
 * Created by PhpStorm.
 * User: xuexiaofeng
 * Date: 2015-10-30 0030
 * Time: 15:36
 */
class EmptyController extends Controller{
    public function index(){
        redirect(U('/'));
    }

}