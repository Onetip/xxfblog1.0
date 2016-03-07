<?php
/**
 * Created by PhpStorm.
 * User: xuexiaofeng
 * Date: 2015-11-13 0013
 * Time: 13:14
 */

/**
 * @param $status
 * @return bool|string
 * 是否回复
 */
function message_status($status) {
    switch ($status) {
        case 0  : return    '未回复';     break;
        case 1  : return    '已回复';     break;
        default : return    false;     break;
    }
}