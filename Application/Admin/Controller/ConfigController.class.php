<?php
namespace Admin\Controller;
/**
 * Created by PhpStorm.
 * User: xuexiaofeng
 * Date: 2015-11-3 0003
 * Time: 21:00
 */
class ConfigController extends BaseController {

    public function getUpdateRelation(){
        $this->cookie();
    }

    protected function processData($data = array()){
        if(!empty($_FILES['logo']['name'])){
            $data['logo'] = $this->uploadPic('config');
        }
        return $data;
    }


}