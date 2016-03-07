<?php
namespace Admin\Controller;
/**
 * Created by PhpStorm.
 * User: xuexiaofeng
 * Date: 2015-11-3 0003
 * Time: 21:00
 */
class NavController extends BaseController {

    public function index(){
        $this->cookie();
        $param['page_size'] = $this->getPage();
        $param['order'] = 'sort DESC';
        $list = D('Nav')->getList($param);
        $this->assign('list',$list['list']);
        $this->assign('page',$list['page']);
        $this->display();
	}

    public function getAddRelation(){}

    public function getUpdateRelation(){}


}