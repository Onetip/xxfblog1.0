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
                <main class="col-lg-10 col-lg-push-1 main-content">
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><article class="post twitter-post">
                        <div class="post-content">
                            <p><?php echo ($row['content']); ?></p>
                        </div>
                        <footer class="post-footer clearfix">
                            <div class="pull-left">
                                <time class="post-date" title="<?php echo ($row['create_time']); ?>">
                                    <i class="fa fa-clock-o"></i>
                                    <?php echo (date('Y-m-d H:i',$row['create_time'])); ?>
                                </time>
                            </div>
                        </footer>
                    </article><?php endforeach; endif; else: echo "" ;endif; ?>
                </main>
            </div>
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
    
</body>
</html>