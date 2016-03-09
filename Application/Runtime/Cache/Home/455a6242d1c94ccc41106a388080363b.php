<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?php echo ((isset($title) && ($title !== ""))?($title):$web['title']); ?></title>
    <meta name="description" content="<?php echo ($web['description']); ?>" />
    <meta name="keywords" content="<?php echo ($web['keywords']); ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta property="qc:admins" content="03473466076055011765676375" />
    <link rel="shortcut icon" href="/myblog/Public/Home/img/favicon.jpg">
    <link rel="stylesheet" href="/myblog/Public/Common/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/myblog/Public/Common/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/myblog/Public/Home/css/base.css" />
    
    
    <script>window.onload=function(){window.loaded=!0};</script>
</head>
<body>
    <header class="main-header" style="background-image: url(/myblog/Uploads<?php echo ($bg['img']); ?>)"></header>
    <nav class="main-navigation">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="navbar-header">
                        <span class="nav-toggle-button collapsed" data-toggle="collapse" data-target="#main-menu">
                            <span class="sr-only">Toggle navigation</span>
                            <i class="fa fa-bars"></i>
                        </span>
                    </div>
                    <div class="collapse navbar-collapse" id="main-menu">
                        <ul class="menu">
                            <?php if(is_array($nav_list)): $i = 0; $__LIST__ = $nav_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><li <?php if($active == $row['active']): ?>class="nav-current"<?php endif; ?> role="presentation">
                                    <a href="<?php echo ($row['url']); ?>" <?php if($row['target'] == 1): ?>target="_blank"<?php endif; ?>><?php echo ($row['name']); ?></a>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    
    <section class="content-wrap">
        <div class="container">
            <div class="row">
                <main class="col-lg-10 col-lg-push-1 message">
                    <div class="message-text clearfix">
                        <div class="textarea-box">
                            <div id="textarea" class="form-control" contenteditable="true" tabindex="4"></div>
                            <div id="smilies" class="dropdown">
                                <span class="smilies-icon"></span>
                                <div class="smilies-box">
                                    <div class="dropdown-arrow1"></div>
                                    <div class="dropdown-arrow2"></div>
                                    <div id="smilies-box" class="submenu">
                                        <ul class="inline-ul">
                                            <?php echo ($smilies); ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if(COOKIE('nickname') == ''): ?><img src="/myblog/Public/Home/img/Connect_logo_1.png" class="qq">
                            <a href="<?php echo U('Login/login',array('type'=>'qq'));?>">QQ登陆</a>
                        <?php else: ?>
                            <div class="other-login">
                                <img src="<?php echo ($head); ?>" class="img-circle">
                                <a><?php echo ($nickname); ?></a>&nbsp;
                                <a href="<?php echo U('Login/loginOut');?>">退出</a>
                            </div><?php endif; ?>
                        <div class="form-inline">
                            <?php if(COOKIE('nickname') == ''): ?><div class="form-group">
                                    <input type="text" class="form-control" id="nickname" placeholder="昵称(必填)">
                                </div><?php endif; ?>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" placeholder="邮箱(必填)">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="web" value="http://">
                            </div>
                            <button type="submit" class="btn btn-default">发布</button>
                        </div>
                    </div>
                    <?php if(COOKIE('nickname') != ''): ?><div class="git_url">
                        源码地址：<a href="https://github.com/xxfpurple/xxfblog1.0" target="_blank">https://github.com/xxfpurple/xxfblog1.0</a>
                    </div><?php endif; ?>
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><article class="post twitter-post">
                            <div class="message-content clearfix">
                                <div class="message-head">
                                    <?php if($row['uid'] == 1): ?><img src="/myblog/Uploads/<?php echo ($web['logo']); ?>" class="img-circle">
                                        <?php else: ?>
                                        <img src="<?php echo ($row['head']); ?>" class="img-circle"><?php endif; ?>
                                </div>
                                <div class="post-footer clearfix">
                                    <div class="pull-left">
                                    <span class="message-icon">
                                        <i class="fa fa-user"></i>
                                        <?php if($row['web_url'] != ''): ?><a href="<?php echo ($row['web_url']); ?>" target="_blank"><?php echo ($row['nickname']); ?></a>
                                            <?php else: ?>
                                            <?php echo ($row['nickname']); endif; ?>
                                    </span>&nbsp;
                                        <time class="message-icon" title="<?php echo ($row['create_time']); ?>">
                                            <i class="fa fa-clock-o"></i>
                                            <?php echo ($row['create_time']); ?>
                                        </time>&nbsp;
                                    <span class="message-icon">
                                        <i class="fa fa-map-marker"></i>
                                        <?php echo ($row['province']); ?> · <?php echo ($row['city']); ?>
                                    </span>
                                    </div>
                                </div>
                                <div class="post-content ">
                                    <p><?php echo ($row['content']); ?></p>
                                </div>
                            </div>
                            <?php if(!empty($row['reply'])): ?><div class="hr">
                                    <hr>
                                    <div class="message-reply">
                                        <div class="message-head">
                                            <img src="/myblog/Uploads/<?php echo ($web['logo']); ?>" class="img-circle">
                                        </div>
                                        <div class="post-footer clearfix">
                                            <div class="pull-left">
                                                <span class="message-icon">
                                                    <i class="fa fa-user"></i>
                                                    <?php echo ($row['reply']['nickname']); ?>
                                                </span>&nbsp;
                                                <time class="message-icon" title="<?php echo ($row['create_time']); ?>">
                                                    <i class="fa fa-clock-o"></i>
                                                    <?php echo ($row['reply']['create_time']); ?>
                                                </time>&nbsp;
                                                <span class="">
                                                    回复 @<?php echo ($row['reply']['p_name']); ?>
                                                </span>&nbsp;
                                            </div>
                                        </div>
                                        <div class="post-content ">
                                            <p><?php echo ($row['reply']['content']); ?></p>
                                        </div>
                                    </div>
                                </div><?php endif; ?>
                        </article><?php endforeach; endif; else: echo "" ;endif; ?>
                </main>
            </div>
            <nav class="pagination" role="navigation">
                <?php echo ($page); ?>
            </nav>
        </div>
    </section>

    <footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="widget">
                        <h4 class="title">最新文章</h4>
                        <div class="content recent-post">
                        <?php if(is_array($new_list)): $i = 0; $__LIST__ = $new_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="recent-single-post">
                                <a href="<?php echo U('Index/single',array('id'=>$vo['id']));?>" class="post-title"><?php echo ($vo['title']); ?></a>
                                <div class="date">发布时间：<?php echo ($vo['create_time']); ?></div>
                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="widget">
                        <h4 class="title">标签云</h4>
                        <div class="content tag-cloud">
                        <?php if(is_array($tags)): $i = 0; $__LIST__ = $tags;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Index/index',array('tag'=>$tag['tag_name']));?>"><?php echo ($tag['tag_name']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="widget">
                        <h4 class="title">友情链接</h4>
                        <div class="content tag-cloud friend-links">
                            <?php if(is_array($friendly_link)): $i = 0; $__LIST__ = $friendly_link;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fl): $mod = ($i % 2 );++$i;?><a href="<?php echo ($fl['link']); ?>" title="<?php echo ($fl['title']); ?>" target="_blank"><?php echo ($fl['title']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <span>Copyright &copy; <a href="http://www.xuexiaofeng.com/">xuexiaofeng.com</a></span> |
                    <span><a href="http://www.miibeian.gov.cn/" target="_blank"><?php echo ($web['icp']); ?></a></span>
                </div>
            </div>
        </div>
    </div>
    <div id="loadProgress" class="progress progress-top"></div>
    <div class="rotate" id="rotate">
        <div class="rotate-icon"></div>
    </div>
    <a href="#" id="back_to_top"><i class="fa fa-angle-up"></i></a>
    <div class="hidden"><?php echo ($web['tj']); ?></div>
    <script src="/myblog/Public/Common/js/jquery.min.js"></script>
    <script src="/myblog/Public/Common/js/bootstrap.min.js"></script>
    <script src="/myblog/Public/Home/js/base.js"></script>
    
    <script>
        $('.smilie-close').click(function(){
            $('#smilies').removeClass('selected');
        });
        $('.smilies-icon').click(function(){
            $('#smilies').addClass('selected');
        });

        $('.smilie-click').click(function(){
            var _this = $(this);
            $('#textarea').append(_this.html());
            $('#smilies').removeClass('selected');
        });

        $('.btn').click(function(){
            var nickname = $('#nickname').val(),
                    email = $('#email').val(),
                    web = $('#web').val(),
                    content = $('#textarea').html();
            if(content == ''){
                alert('内容不能为空!');
            }else if(nickname == ''){
                alert('昵称不能为空!');
            }else if(email == ''){
                alert('邮箱不能为空!');
            }else{
                $.ajax({
                    url:'<?php echo U("Message/post");?>',
                    type:'POST',
                    data:{nickname:nickname,email:email,web:web,content:content},
                    success:function(data){
                        if(data.status){
                            alert('留言成功！');
                        }else{
                            alert(data.info);
                        }
                    }
                });
            }
        });
    </script>

</body>
</html>