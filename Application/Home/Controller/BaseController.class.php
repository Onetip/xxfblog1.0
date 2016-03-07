<?php
namespace Home\Controller;
use \Think\Controller;
/**
 * Created by PhpStorm.
 * User: xuexiaofeng
 * Date: 2015-10-30 0030
 * Time: 10:35
 */
class BaseController extends Controller{

    protected function _initialize(){
        $this->siteStatus();
        $background = D('Background')->randFind();
        $bg = array();
        foreach($background as $k=>$v){
            $bg['img'] = $v['img'];
        }
        $nav = M('Nav')->where(array('status'=>1))->order('sort DESC')->select();
        $this->assign('web',M('Config')->find());
        $this->assign('bg',$bg);
        $this->assign('cate_list',$this->getCate());
        $this->assign('tags',$this->getTags());
        $this->assign('new_list',$this->newArticle());
        $this->assign('friendly_link',$this->getFriendly());
        $this->assign('nav_list',$nav);
        $this->assign('active',CONTROLLER_NAME);
    }

    /**
     * 网站是否关闭
     */
    private function siteStatus(){
        $status = M('Config')->getField('status');
        if($status != 1){
            redirect(U('Error/index'));
        }
    }

    /**
     * 获取标签
     * @return mixed
     */
    private function getTags(){
        $tags = M('Tag')->select();
        return $tags;
    }

    /**
     * 获取分类
     * @return mixed
     */
    private function getCate(){
        $cate = M('ArticleCategory')->where(array('status'=>1))->order('sort DESC')->select();
        return $cate;
    }

    /**
     * 最新文章
     * @return mixed
     */
    private function newArticle(){
        $param['where']['art.status'] = 1;
        $param['page_size'] = 3;
        $param['order'] = 'create_time DESC';
        $list = D('Article')->getList($param);
        foreach($list['list'] as $k=>$v){
            $list['list'][$k]['create_time'] = smartDate($v['create_time']);
        }
        return $list['list'];
    }

    /**
     * 获取友情链接
     * @return mixed
     */
    private function getFriendly(){
        $where['status'] = 1;
        $list = M('FriendlyLink')->where($where)->select();
        return $list;
    }

    /**
     * 获取分页数
     * @return mixed
     */
    public function page(){
        $page = M('Config')->getField('index_page');
        return $page;
    }
}
