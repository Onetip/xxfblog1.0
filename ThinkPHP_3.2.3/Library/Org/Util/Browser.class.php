<?php
namespace Org\Util;
//PHP获取客户端浏览器版本和操作系统类
class Browser
{
//获取客户端浏览器版本方法
function getUserBrowser(){
$user_OSagent = $_SERVER['HTTP_USER_AGENT'];
if(strpos($user_OSagent,"Maxthon") && strpos($user_OSagent,"MSIE")) {
$visitor_browser ="Maxthon(Microsoft IE)";
}elseif(strpos($user_OSagent,"Maxthon 2.0")) {
$visitor_browser ="Maxthon 2.0";
}elseif(strpos($user_OSagent,"Maxthon")) {
$visitor_browser ="Maxthon";
}elseif(strpos($user_OSagent,"MSIE 9.0")) {
$visitor_browser ="MSIE 9.0";
}elseif(strpos($user_OSagent,"MSIE 8.0")) {
$visitor_browser ="MSIE 8.0";
}elseif(strpos($user_OSagent,"MSIE 7.0")) {
$visitor_browser ="MSIE 7.0";
}elseif(strpos($user_OSagent,"MSIE 6.0")) {
$visitor_browser ="MSIE 6.0";
} elseif(strpos($user_OSagent,"MSIE 5.5")) {
$visitor_browser ="MSIE 5.5";
} elseif(strpos($user_OSagent,"MSIE 5.0")) {
$visitor_browser ="MSIE 5.0";
} elseif(strpos($user_OSagent,"MSIE 4.01")) {
$visitor_browser ="MSIE 4.01";
}elseif(strpos($user_OSagent,"MSIE")) {
$visitor_browser ="MSIE 较高版本";
}elseif(strpos($user_OSagent,"NetCaptor")) {
$visitor_browser ="NetCaptor";
} elseif(strpos($user_OSagent,"Netscape")) {
$visitor_browser ="Netscape";
}elseif(strpos($user_OSagent,"Chrome")) {
$visitor_browser ="Chrome";
} elseif(strpos($user_OSagent,"Lynx")) {
$visitor_browser ="Lynx";
} elseif(strpos($user_OSagent,"Opera")) {
$visitor_browser ="Opera";
} elseif(strpos($user_OSagent,"Konqueror")) {
$visitor_browser ="Konqueror";
} elseif(strpos($user_OSagent,"Mozilla/5.0")) {
$visitor_browser ="Mozilla";
} elseif(strpos($user_OSagent,"Firefox")) {
$visitor_browser ="Firefox";
}elseif(strpos($user_OSagent,"U")) {
$visitor_browser ="Firefox";
} else {
$visitor_browser ="其它";
}
return $visitor_browser;
}

//获取客户端操作系统方法
function getUserOS(){
$user_OSagent = $_SERVER['HTTP_USER_AGENT'];
if(strpos($user_OSagent,"NT 6.1")){
$visitor_os ="Windows 7";
} elseif(strpos($user_OSagent,"NT 5.1")) {
$visitor_os ="Windows XP (SP2)";
} elseif(strpos($user_OSagent,"NT 5.2") && strpos($user_OSagent,"WOW64")){
$visitor_os ="Windows XP 64-bit Edition";
} elseif(strpos($user_OSagent,"NT 5.2")) {
$visitor_os ="Windows 2003";
} elseif(strpos($user_OSagent,"NT 6.0")) {
$visitor_os ="Windows Vista";
} elseif(strpos($user_OSagent,"NT 5.0")) {
$visitor_os ="Windows 2000";
} elseif(strpos($user_OSagent,"4.9")) {
$visitor_os ="Windows ME";
} elseif(strpos($user_OSagent,"NT 4")) {
$visitor_os ="Windows NT 4.0";
} elseif(strpos($user_OSagent,"98")) {
$visitor_os ="Windows 98";
} elseif(strpos($user_OSagent,"95")) {
$visitor_os ="Windows 95";
}elseif(strpos($user_OSagent,"NT 10")) {
$visitor_os ="Windows 10";
}elseif(strpos($user_OSagent,"NT 8")) {
    $visitor_os ="Windows 8";
}elseif(strpos($user_OSagent,"NT 7")) {
    $visitor_os ="Windows 7";
}elseif(strpos($user_OSagent,"NT xp")) {
    $visitor_os ="Windows xp";
}elseif(strpos($user_OSagent,"Mac")) {
$visitor_os ="Mac";
} elseif(strpos($user_OSagent,"Linux")) {
$visitor_os ="Linux";
} elseif(strpos($user_OSagent,"Unix")) {
$visitor_os ="Unix";
} elseif(strpos($user_OSagent,"FreeBSD")) {
$visitor_os ="FreeBSD";
} elseif(strpos($user_OSagent,"SunOS")) {
$visitor_os ="SunOS";
} elseif(strpos($user_OSagent,"BeOS")) {
$visitor_os ="BeOS";
} elseif(strpos($user_OSagent,"OS/2")) {
$visitor_os ="OS/2";
} elseif(strpos($user_OSagent,"PC")) {
$visitor_os ="Macintosh";
} elseif(strpos($user_OSagent,"AIX")) {
$visitor_os ="AIX";
} elseif(strpos($user_OSagent,"IBM OS/2")) {
$visitor_os ="IBM OS/2";
} elseif(strpos($user_OSagent,"BSD")) {
$visitor_os ="BSD";
} elseif(strpos($user_OSagent,"NetBSD")) {
$visitor_os ="NetBSD";
} else {
$visitor_os ="其它操作系统";
}
return $visitor_os;
}
}
