<?php
namespace Home\Controller;
use Think\Controller;
/**
 * Created by PhpStorm.
 * User: xuexiaofeng
 * Date: 2015-10-30 0030
 * Time: 15:36
 */
class TwitterController extends BaseController{

    public function index(){
        $param['where']['t.status'] = 1;
        $param['page_size'] = 20;
        $param['order'] = 't.create_time DESC';
        $list = D('Twitter')->getList($param);
        $this->assign('list',$list['list']);
        $this->display();
    }

}