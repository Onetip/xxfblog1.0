<?php
/**
 * 社会化登陆配置
 */
return array(
    //腾讯QQ登录配置
    'THINK_SDK_QQ' => array(
        'APP_KEY'    => '', //应用注册成功后分配的 APP ID
        'APP_SECRET' => '', //应用注册成功后分配的KEY
        'CALLBACK'   => 'http://xuexiaofeng.com/index.php?m=Home&c=Login&a=callback&type=qq',
    ),

	//新浪微博配置
	'THINK_SDK_SINA' => array(
        'APP_KEY'    => '', //应用注册成功后分配的 APP ID
        'APP_SECRET' => '', //应用注册成功后分配的KEY
        'CALLBACK'   => 'http://xuexiaofeng.com/index.php?m=Home&c=Login&a=callback&type=sina',
    ),

);
