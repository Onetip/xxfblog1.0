<?php
namespace Home\Controller;
use \Think\Controller;
/**
 * Created by PhpStorm.
 * User: xuexiaofeng
 * Date: 2016-3-6 0006
 * Time: 0:28
 */
class LoginController extends Controller{

    public function login(){
        if(empty($_GET['type'])){
            $this->error('登陆类型错误');
        }
        $obj=ThinkOauth($_GET['type']);
        $obj->login();
    }

    public function callback($code=null){
        if(empty($code))$this->error('参数错误');
        if(empty($_GET['type']))$this->error('登录类型错误');
        $obj = ThinkOauth($_GET['type']);
        $result = $obj->callback($code);
        if($result['flag'] == 'first'){
            $data = $result['data'];
            cookie('nickname',$data['nickname'],array('expire'=>1209600));
            cookie('head',$data['head'],array('expire'=>1209600));
            $data['create_time'] = time();
            $res = M('Bind')->data($data)->add();
            if($res){
                redirect(U('Message/index'));
            }else{
                $this->error('登录失败');
            }
        }else{
            $info=M('Bind')->where(array('openid'=>$result['openid']))->find();
            if(!empty($info)){
                cookie('nickname',$info['nickname'],array('expire'=>1209600));
                cookie('head',$info['head'],array('expire'=>1209600));
                /***回跳***/
                redirect(U('Message/index'));
            }else{
                $this->error('登录失败');
            }
        }
    }

    public function loginOut(){
        cookie('nickname',null);
        cookie('head',null);
        redirect(U('Message/index'));
    }

}
