<?php
namespace Home\Controller;
/**
 * Created by PhpStorm.
 * User: xuexiaofeng
 * Date: 2016-3-7 0007
 * Time: 17:02
 */
class FriendController extends BaseController {

    public function index(){
        $list = M('Bind')->where(array('status'=>1))->field('nickname,head')->order('id desc')->select();
        $count = M('Bind')->where(array('status'=>1))->count();
        $this->assign('count',$count);
        $this->assign('list',$list);
        $this->display();
    }

}