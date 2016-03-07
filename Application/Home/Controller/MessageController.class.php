<?php
namespace Home\Controller;

class MessageController extends BaseController {

    public function index(){
        $param['where']['parent_id'] = 0;
        $param['where']['is_show'] = 1;
        $param['page_size'] = $this->page();
        $param['order'] = 'm.create_time DESC';
        $list = D('Message')->getList($param);
        foreach($list['list'] as $k=>$v){
            $list['list'][$k]['create_time'] = smartDate($v['create_time']);
            $reply = D('Message')->where(array('parent_id'=>$v['id']))->find();
            if(!empty($reply)){
                $reply['create_time'] = smartDate($reply['create_time']);
                $reply['p_name'] = D('Message')->where(array('id'=>$reply['parent_id']))->getField('nickname');
                $list['list'][$k]['reply'] = $reply;
            }
        }

        $this->assign('list',$list['list']);
        $this->assign('page',$list['page']);
        $this->display();
    }

    /**
     * 发布留言
     */
    public function post(){
        if(empty($_POST['nickname'])){
			$this->error('昵称不能为空！');
		}if(empty($_POST['email'])){
			$this->error('邮箱不能为空！');
		}if(empty($_POST['content'])){
			$this->error('内容不能为空！');
		}
        if(!preg_match(C('EMAIL'),$_POST['email'])){
            $this->error('邮箱格式不正确！');
        }
        $message = M('Message')->where(array('ip'=>getIp()))->order('create_time desc')->find();
        if(!empty($message)){
            if($message['expire_time'] >= time()){
                $this->error('请您10分钟后再留言！');
            }
        }
        $data = array(
            'nickname'   => $_POST['nickname'],
            'email'      => $_POST['email'],
            'head'       => getGravatar($_POST['email']),
            'web_url'    => $_POST['web'],
            'content'    => $_POST['content'],
            'province'   => getCurrentIp()['province'],
            'city'       => getCurrentIp()['city'],
            'ip'         => getIp(),
            'create_time'=> time(),
            'expire_time'=> time() + 600
        );

        $result = M('Message')->data($data)->add();

        $result ? $this->success('留言成功！') : $this->error('留言失败！');
    }

}