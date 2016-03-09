<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>后台管理</title>
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/myblog/Public/Common/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/myblog/Public/Common/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/myblog/Public/MyAdmin/css/base.css" />
    
    
</head>
<body>
    <header>
        <div class="row">
            <nav class="navbar" role="navigation">
                <div class="navbar-header">
                    <div class="navbar-brand">
                        <a href=""><span class="logo">后台管理</span></a>
                    </div>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav user-menu navbar-right">
                        <li>
                            <span href="" class="settings">
                                <span class="fa fa-home"></span>
                                <span class="txt">：<a href="/" target="_blank">网站首页</a></span>
                            </span>
                        </li>
                        <li>
                            <span href="" class="settings">
                                <span class="fa fa-user"></span>
                                <span class="txt">：<?php echo ($admin); ?></span>
                            </span>
                        </li>

                        <li class="last">
                            <a href="<?php echo U('Login/logOut');?>" class="settings" title="退出">
                                <span class="fa fa-ban"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <div id="sidebar" class="sidebar">
        <div class="sidebar-inner">
            <ul class="nav nav-list" id="left-menu">
                <?php if(is_array($menus)): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li>
                        <?php if($menu['group']['url'] == 'javascript:void(0);'): ?><a href="javascript:void(0);" class="nav-top-item no-submenu">
                                <i class="fa <?php echo ($menu['group']['icon']); ?>"></i>
                                <span class="hidden-minibar"><?php echo ($menu['group']['title']); ?></span>
                            </a>
                        <?php else: ?>
                            <a href="<?php echo (U($menu['group']['url'])); ?>" class="<?php if(!empty($_child)): ?>nav-top-item no-submenu<?php endif; echo ($menu['group']['class']); ?>">
                                <i class="fa <?php echo ($menu['group']['icon']); ?>"></i>
                                <span class="hidden-minibar"><?php echo ($menu['group']['title']); ?></span>
                            </a><?php endif; ?>
                        <?php if(!empty($menu['_child'])): ?><ul <?php if(($menu['group']['class']) == "active"): ?>style="display: block"<?php endif; ?>>
                            <?php if(is_array($menu['_child'])): $i = 0; $__LIST__ = $menu['_child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($i % 2 );++$i;?><li class="<?php echo ($child['class']); ?>"><a href="<?php echo (U($child['url'])); ?>"><?php echo ($child['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul><?php endif; ?>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <div id="main-content" class="content">
        
    <div class="page-header clearfix">
        <h3>文章管理</h3>
        <ul class="nav nav-tabs">    
            <li>
                <a href="<?php echo U('ArticleCategory/index');?>">分类列表</a>
            </li>
            <li class="active">
                <a href="<?php echo U('ArticleCategory/update');?>">编辑分类</a>
            </li>
        </ul>
    </div>

    <div class="content-box-content">
        <form action="<?php echo U('ArticleCategory/update');?>" method="post" class="form-horizontal" enctype="multipart/form-data">
            <input type="hidden" name="model" value="ArticleCategory">
            <input type="hidden" name="id" value="<?php echo ($row['id']); ?>">
            <div class="form-group">
                <label for="name" class="col-sm-3 control-label">分类名称：</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo ($row['name']); ?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">父级分类：</label>
                <div class="col-sm-9">
                    <?php echo ($cate_sel); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">是否显示：</label>
                <div class="col-sm-9">
                    <div class="checkbox">
                        <input type="radio" name="status" value="1" <?php if($row['status'] == 1): ?>checked<?php endif; ?>/>&nbsp;&nbsp;是　
                        <input type="radio" name="status" value="0" <?php if($row['status'] == 0): ?>checked<?php endif; ?>/>&nbsp;&nbsp;否
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="cate_url" class="col-sm-3 control-label">链接地址：</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="cate_url" name="cate_url" value="<?php echo ($row['cate_url']); ?>">
                    <div class="prompt-div">可选（自定义链接。）</div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                  <button type="submit" class="btn btn-default btn-primary">确认编辑</button>
                </div>
            </div>
        </form>
    </div>
</div>

    </div>
    <script src="/myblog/Public/Common/js/jquery.min.js"></script>
    <script src="/myblog/Public/Common/js/bootstrap.min.js"></script>
    <script src="/myblog/Public/MyAdmin/js/base.js"></script>
    <script>
        //计算边栏高度
        var sidebarH = $('#main-content').outerHeight();
        if(sidebarH >=768){
            $('#sidebar').css('height',sidebarH);
        }
    </script>
    
    <script charset="utf-8" src="__STATIC__/kindeditor/kindeditor-min.js"></script>
    <script charset="utf-8" src="__STATIC__/kindeditor/lang/zh_CN.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            KindEditor.ready(function(K){
                window.editor = K.create('#content',{
                    items:[
                        'source', '|', 'undo', 'redo', '|','indent','outdent', 'cut', 'copy','|', 'justifyleft', 'justifycenter', 'justifyright',
                        'justifyfull', 'clearhtml', 'selectall', '|', 'formatblock', 'fontname', 'fontsize', '|', 'forecolor',
                        'hilitecolor', 'bold', 'italic', 'underline', 'strikethrough','image','link'
                    ],
                    afterBlur:function(){this.sync();}
                });
            });
        });
    </script>

</body>
</html>