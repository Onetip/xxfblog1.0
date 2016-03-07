<?php
namespace Home\Controller;

class IndexController extends BaseController {

    public function index(){
        if(!empty($_GET['cate'])){
            $param['where']['art.cate_id'] = $_GET['cate'];
        }
        if(!empty($_GET['tag'])){
            $param['where']['art.tags'] = array('LIKE','%'.$_GET['tag'].'%');
        }
        $param['where']['art.status'] = 1;
        $param['page_size'] = $this->page();
        $param['order'] = 'is_top DESC,create_time DESC';
        $list = D('Article')->getList($param);
        foreach($list['list'] as $k=>$v){
            $list['list'][$k]['create_time'] = smartDate($v['create_time']);
            if(!empty($v['tags'])){
                $list['list'][$k]['tags'] =  explode(',',$v['tags']);
            }
            $brief = extractHtmlData($v['brief'],120);
            if(empty($brief)){
                $list['list'][$k]['brief'] = extractHtmlData($v['content'],120);
            }else{
                $list['list'][$k]['brief'] = extractHtmlData($v['brief'],120);
            }
        }
        $this->assign('list',$list['list']);
        $this->assign('page',$list['page']);
        $this->display();
    }

    /**
     * 文章详情页
     */
    public function single(){
        $param['where']['art.id'] = I('get.id');
        $info = D('Article')->findRow($param);
        $neighborlog = $this->neighborLog($info['create_time']);
        $info['create_time'] = smartDate($info['create_time']);
        if(!empty($info['tags'])){
            $info['tags'] = explode(',',$info['tags']);
        }
        $this->assign('title',$info['title']);
        $this->assign('info',$info);
        $this->assign('neighborlog',$neighborlog);
        $this->display('single');
    }

    /**
     * 获取相邻文章
     * @param $date
     * @return mixed
     */
    private function neighborLog($date){
        $neighborlog = array();
        $neighborlog['next'] = D('Article')->where(array('create_time'=>array('gt',$date),'status'=>1))->field('id,title')->order('create_time')->find();
        $neighborlog['prev'] = D('Article')->where(array('create_time'=>array('lt',$date),'status'=>1))->field('id,title')->order('create_time DESC')->find();
        return $neighborlog;
    }

}