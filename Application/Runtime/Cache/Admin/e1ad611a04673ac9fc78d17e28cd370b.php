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
    <link rel="stylesheet" href="/myblog/Public/Admin/css/base.css" />
    
    
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
        <h3>留言管理</h3>
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="<?php echo U('Message/index');?>">列表</a>
            </li>
        </ul>
    </div>
    <div class="search-content">

    </div>
    <!--提示 start-->
<div class="alert alert-success alert-dismissible notification success" role="alert" style="display:none">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <div></div>
</div>
<div class="alert alert-danger alert-dismissible notification error n-error" role="alert" style="display:none">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <div></div>
</div>
<!--提示 end-->
    <div class="content-box-content">
        <form action="<?php echo U('Message/remove');?>" method="post" class="batch-form">
            <input type="hidden" name="model" value="Message">
            <table class="table table-striped table-framed table-hover">
                <thead>
                <tr>
                    <th width="6%">
                        <input class="check-all" type="checkbox" />&nbsp;&nbsp;ID
                    </th>
                    <th>昵称</th>
                    <th>邮箱</th>
                    <th width="40%">内容</th>
                    <th>地址</th>
                    <th>IP地址</th>
                    <th>留言时间</th>
                    <th>审核</th>
                    <th>是否回复</th>
                    <th width="6%">操作</th>
                </tr>
                </thead>
                <tbody class="tbody">
                <?php if(empty($list)): ?><tr><td colspan="10"><span style="font-size:14px;">暂无数据</span></td></tr><?php endif; ?>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><tr>
                        <td>
                            <input type="checkbox" name="id[]" value="<?php echo ($row['id']); ?>"/>&nbsp;&nbsp;<?php echo ($row['id']); ?>
                        </td>
                        <td><?php echo ($row['nickname']); ?></td>
                        <td><?php echo ($row['email']); ?></td>
                        <td><?php echo ($row['content']); ?></td>
                        <td><?php echo ($row['province']); ?> · <?php echo ($row['city']); ?></td>
                        <td><?php echo ($row['ip']); ?></td>
                        <td><?php echo (date('Y-m-d H:i',$row['create_time'])); ?></td>
                        <td>
                            <span class="fa fa-eye on-off fa-black" <?php if($row['is_show'] == 0): ?>style="display:none;"<?php endif; ?>></span>
                            <input type="hidden" value="Message|is_show|<?php echo ($row['id']); ?>|1">
                            <span class="fa fa-eye-slash on-off fa-red" <?php if($row['is_show'] == 1): ?>style="display:none;"<?php endif; ?>></span>
                            <input type="hidden" value="Message|is_show|<?php echo ($row['id']); ?>|0">
                        </td>
                        <td class="reply-<?php echo ($row['status']); ?>"><?php echo (message_status($row['status'])); ?></td>
                        <td>
                            <a href="javascript:;" data-id="<?php echo ($row['id']); ?>" title="回复" class="reply" data-toggle="modal" data-target="#myModal">
                                <span class="fa fa-comment"></span>
                            </a>&nbsp;
                            <a href="#" title="删除" class="delete-delete">
                                <span class="fa fa-remove"></span>
                            </a><input type="hidden" value="<?php echo U('Message/remove',array('model'=>'Message','id'=>$row['id']));?>">
                        </td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="20">
                        <div class="bulk-actions fl">
                            <input type="button" class="btn delete-batch" value="批量删除">
                        </div>
                        <div class="fr pagination">
                            <?php echo ($page); ?>
                        </div>
                    </td>
                </tr>
                </tfoot>
            </table>
        </form>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" data-id="" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">回复内容</h4>
                </div>
               <div class="modal-body">
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
               </div>
                <div class="modal-footer">
                    <input type="hidden" value="" id="id">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">确认</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end-->

    </div>
    <script src="/myblog/Public/Common/js/jquery.min.js"></script>
    <script src="/myblog/Public/Common/js/bootstrap.min.js"></script>
    <script src="/myblog/Public/Admin/js/base.js"></script>
    <script>
        //计算边栏高度
        var sidebarH = $('#main-content').outerHeight();
        if(sidebarH >=768){
            $('#sidebar').css('height',sidebarH);
        }
    </script>
    
    <script>
        $('body').click(function(){
            if($('#smilies').hasClass('selected')){
                $('#smilies').removeClass('selected');
            }
        });
        $('.dropdown').mouseenter(function(){
            $('#smilies').addClass('selected');
        });
        $('.smilies-box').mouseleave(function(){
            $('#smilies').removeClass('selected');
        });

        $('.inline-li a').click(function(){
            var _this = $(this);
            $('#textarea').append(_this.html());
        });
        $('.reply').click(function(){
            $('#id').val($(this).data('id'));
        });
        $('.btn-primary').click(function(){
            var id = $('#id').val();
            var reply_desc = $('#textarea').html();
            if(reply_desc == ''){
                alert('请填写回复内容！'); return false;
            }
            $.ajax({
                url:'<?php echo U("Message/reply");?>',
                type:'post',
                data:{id:id,reply_desc:reply_desc},
                success:function(data){
                    if(data.status){
                        window.location.reload();
                    }else{
                        alert(data.info); return false;
                    }
                }
            });
        });
    </script>

</body>
</html>