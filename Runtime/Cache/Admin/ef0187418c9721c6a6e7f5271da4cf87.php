<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    
    <title>我的建站系统</title>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<meta name="description" content="This is page-header (.page-header &gt; h1)" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />


<link rel="stylesheet" href="/Public/assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="/Public/assets/css/font-awesome.min.css" />
<link rel="stylesheet" href="/Public/assets/css/ace.min.css" id="main-ace-style" />
<!--[if lte IE 9]>
<link rel="stylesheet" href="/Public/assets/css/ace-part2.min.css" />
<![endif]-->
<link rel="stylesheet" href="/Public/assets/css/ace-skins.min.css" />
<link rel="stylesheet" href="/Public/assets/css/ace-rtl.min.css" />
<!--[if lte IE 9]>
<link rel="stylesheet" href="/Public/assets/css/ace-ie.min.css" />
<![endif]-->
<!--[if lte IE 8]>
<script src="/Public/assets/js/html5shiv.min.js"></script>
<script src="/Public/assets/js/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/Public/Common/css/resest.css">
<link rel="stylesheet" href="/Public/Common/css/main.css?version=<?php echo (VERSION); ?>" />
<link rel="stylesheet" href="/Public/Admin/fonts/iconfont.css?version=<?php echo (VERSION); ?>" />
<link rel="stylesheet" href="/Public/Admin/css/main.css?version=<?php echo (VERSION); ?>" />
















    
</head>

<body class="no-skin">
<div id="navbar" class="navbar navbar-default">
	<div class="navbar-container" id="navbar-container">

		<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler">
			<span class="sr-only">Toggle sidebar</span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>
		</button>

		<!-- /section:basics/sidebar.mobile.toggle -->
		<div class="navbar-header pull-left">
			<!-- #section:basics/navbar.layout.brand -->
			<a href="index.html" class="navbar-brand">
				<small>
					<img src="/Public/assets/avatars/logo.png" alt="" />
				</small>
			</a>
		</div>

		<div class="navbar-buttons navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">

				<li class="green">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
						<span class="badge badge-success">5</span>
					</a>

					<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
						<li class="dropdown-header">
							<i class="ace-icon fa fa-envelope-o"></i>
							13条未读信息
						</li>

						<li class="dropdown-content">
							<ul class="dropdown-menu dropdown-navbar">
								<li>
									<a href="#">
										<img src="/Public/assets/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
										<span class="msg-body">
													<span class="msg-title">
														<span class="blue">B2C:</span>
														系统产生20个错误，12个警告...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>2014-12-15 18:00:00</span>
													</span>
												</span>
									</a>
								</li>

								<li>
									<a href="#">
										<img src="/Public/assets/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
										<span class="msg-body">
													<span class="msg-title">
														<span class="blue">积分商城:</span>
														系统产生20个错误，12个警告...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>2014-12-15 18:00:00</span>
													</span>
												</span>
									</a>
								</li>

								<li>
									<a href="#">
										<img src="/Public/assets/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
										<span class="msg-body">
													<span class="msg-title">
														<span class="blue">政府机票采购:</span>
														系统产生20个错误，12个警告...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>2014-12-15 18:00:00</span>
													</span>
												</span>
									</a>
								</li>

								<li>
									<a href="#">
										<img src="/Public/assets/avatars/avatar2.png" class="msg-photo" alt="Kate's Avatar" />
										<span class="msg-body">
													<span class="msg-title">
														<span class="blue">B2B:</span>
														系统产生20个错误，12个警告...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>2014-12-15 18:00:00</span>
													</span>
												</span>
									</a>
								</li>

								<li>
									<a href="#">
										<img src="/Public/assets/avatars/avatar5.png" class="msg-photo" alt="Fred's Avatar" />
										<span class="msg-body">
													<span class="msg-title">
														<span class="blue">货运系统:</span>
														系统产生20个错误，12个警告...
													</span>

													<span class="msg-time">
														<i class="ace-icon fa fa-clock-o"></i>
														<span>2014-12-15 18:00:00</span>
													</span>
												</span>
									</a>
								</li>
							</ul>
						</li>

						<li class="dropdown-footer">
							<a href="inbox.html">
								查看全部消息
								<i class="ace-icon fa fa-arrow-right"></i>
							</a>
						</li>
					</ul>
				</li>

				<!-- #section:basics/navbar.user_menu -->
				<li class="light-blue">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
						<img class="nav-user-photo" src="/Public/assets/avatars/user.jpg" alt="Jason's Photo" />
						<span class="user-info">
									欢迎您<br />
									<?php echo (session('username')); ?>
								</span>

						<i class="ace-icon fa fa-caret-down"></i>
					</a>

					<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						<li>
							<a href="<?php echo U('System/department');?>">
								<i class="ace-icon fa fa-cog"></i>
								系统设置
							</a>
						</li>

						<li>
							<a href="<?php echo U('System/upPassWord');?>">
								<i class="ace-icon fa fa-user"></i>
								修改密码
							</a>
						</li>

						<li class="divider"></li>

						<li>
							<a href="javascript:quit();">
								<i class="ace-icon fa fa-power-off"></i>
								退出
							</a>
						</li>
					</ul>
				</li>

				<!-- /section:basics/navbar.user_menu -->
			</ul>
		</div>

		<!-- /section:basics/navbar.dropdown -->
	</div><!-- /.navbar-container -->
</div>
<script>
    //退出
    function quit(){
        layer.confirm('确定要退出登录？', {
            btn: ['确定','取消'], //按钮
            title:'退出登录'
        }, function(){
            window.location.href="<?php echo U('Index/quit');?>";
        }, function(){

        });
    }
</script>
<!-- /section:basics/navbar.layout -->
<div class="main-container" id="main-container">

    <!-- #section:basics/sidebar -->
    <div id="sidebar" class="sidebar responsive menu">

	<ul class="nav nav-list">

		<li class="<?php if($method == 'index'): ?>active<?php endif; ?>">
			<a href="<?php echo ($server); ?>/admin.php">
				<i class="menu-icon iconfont icon-home"></i>
				<span class="menu-text"> 首页 </span>
			</a>
			<b class="arrow"></b>
		</li>

		<?php if(is_array($menulist)): $i = 0; $__LIST__ = $menulist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li class="<?php if($v['method'] == $method): ?>active<?php endif; ?>">
		<a href="<?php if(!empty($v["url"])): echo ($server); ?>/admin.php?s=/<?php echo ($v["url"]); ?>.html<?php else: ?>#<?php endif; ?>" <?php if(empty($v["url"])): ?>class="dropdown-toggle"<?php endif; ?>>
		<i class="menu-icon iconfont <?php echo ($v["icon"]); ?>"></i>
		<span class="menu-text"> <?php echo ($v["title"]); ?> </span>
		<?php if(!empty($v["child"])): ?><b class="arrow fa fa-angle-down"></b><?php endif; ?>
		</a>
		<b class="arrow"></b>

		<?php if(!empty($v["child"])): ?><ul class="submenu">
			<?php if(is_array($v["child"])): $i = 0; $__LIST__ = $v["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><li class="<?php if(($v['method'] == $method) and ($v1['method'] == $child_method)): ?>active<?php endif; ?>">
			<a href="<?php echo ($server); ?>/admin.php?s=/<?php echo ($v1["url"]); ?>.html">
				<i class="menu-icon fa fa-caret-right"></i>
				<?php echo ($v1["title"]); ?>
			</a>
			<b class="arrow"></b>
			</li><?php endforeach; endif; else: echo "" ;endif; ?>
		</ul><?php endif; ?>
		</li><?php endforeach; endif; else: echo "" ;endif; ?>

	</ul><!-- /.nav-list -->
	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>

</div>

    <!-- /section:basics/sidebar -->
    <div class="main-content">
        
    <!-- #section:basics/content.breadcrumbs -->
    <div class="breadcrumbs" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="admin.php">首页</a>
            </li>
            <li><a href="<?php echo U('System/groupList');?>">角色管理</a></li>
            <li>
                页面权限
            </li>
        </ul><!-- /.breadcrumb -->

        <!-- /section:basics/content.searchbox -->
    </div>

    <div class="page-content">
        <!-- /section:settings.box -->
        <div class="page-content-area">

            <div class="row">
                <div class="col-xs-12">
                    <div class="table_form">
                        <form class="form-horizontal formname" method="post">
                            <div class="form_group" style="line-height: 30px;">
                                <div class="form_txt">全部选择：</div>
                                <div class="form_input">
                                    <label>
                                        <input name="chkall" type="checkbox" class="ace">
                                        <span class="lbl">全选/取消</span>
                                    </label>
                                </div>
                                <input type="hidden" value="<?php echo ($id); ?>" name="id">
                            </div>
                            <?php if(is_array($menutree)): foreach($menutree as $key=>$vo): ?><div class="form_group" style="line-height: 30px;">
                                    <div class="form_txt">
                                        <label>
                                            <input name="parentId" type="checkbox" class="ace" value="<?php echo ($vo["id"]); ?>" <?php if(in_array($vo['id'],$levelArr)): ?>checked<?php endif; ?>>
                                            <span class="lbl"><?php echo ($vo["title"]); ?></span>
                                        </label>
                                    </div>
                                    <div class="form_input">
                                        <?php if(is_array($vo['child'])): foreach($vo['child'] as $key=>$value): ?><label class="checklabel">
                                                <input name="childId" type="checkbox" class="ace" value="<?php echo ($value["id"]); ?>" <?php if(in_array($value['id'],$levelArr)): ?>checked<?php endif; ?>>
                                                <span class="lbl"><?php echo ($value["title"]); ?></span>
                                            </label><?php endforeach; endif; ?>
                                    </div>
                                </div><?php endforeach; endif; ?>
                            <div class="form_group">
                                <div class="form_bnt">
                                    <button class="btn btn-white btn-info btn-round" type="submit">
                                        <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> 保存
                                    </button>
                                    <a href="<?php echo U('System/groupList');?>" class="btn btn-white btn-warning btn-round">
                                        <i class="ace-icon fa fa-undo bigger-120 orange"></i>
                                        返回
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content-area -->
    </div><!-- /.page-content -->

    </div><!-- /.main-content -->

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

<!--[if !IE]> -->
<script type="text/javascript">
    window.jQuery || document.write("<script src='/Public/assets/js/jquery.min.js'>"+"<"+"/script>");
</script>
<!-- <![endif]-->
<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='/Public/assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='/Public/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="/Public/Common/Js/jquery.cookie.js"></script>
<script src="/Public/Common/js/jquery.form.js"></script>

<script src="/Public/assets/js/bootstrap.min.js"></script>
<!--[if lte IE 8]>
<script src="/Public/assets/js/excanvas.min.js"></script>
<![endif]-->
<script src="/Public/assets/js/jquery-ui.custom.min.js"></script>
<script src="/Public/assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="/Public/assets/js/ace-elements.min.js"></script>
<script src="/Public/assets/js/ace.min.js"></script>

<!-- 验证 -->
<script type="text/javascript" src="/Public/Vendor/nice-validator-1.1.3/jquery.validator.js?local=zh-CN"></script>

<!--  select  样式优化 -->
<link href="/Public/Vendor/cssSelect/css/base.css" rel="stylesheet" type="text/css" />
<script src="/Public/Vendor/cssSelect/js/jquery.cssforms.js"></script>

<script src="/Public/Vendor/layui/layui.js"></script>

<!--ztree-->
<link rel="stylesheet" href="/Public/Vendor/ztree/zTreeStyle/zTreeStyle.css" type="text/css">
<script type="text/javascript" src="/Public/Vendor/ztree/jquery.ztree.all.js"></script>
<!-- 模板 js-->
<script type="text/javascript" src="/Public/Common/js/jquery.tmpl.js"></script>

<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/Public/Vendor/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/Public/Vendor/ueditor/ueditor.all.js"></script>

<link href="/Public/Vendor/colorpicker/jquery.colorpicker.css" rel="stylesheet" type="text/css" />
<script src="/Public/Vendor/colorpicker/jquery.colorpicker.js"></script>

<script src="/Public/Vendor/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="/Public/Vendor/uploadify/uploadify.css">

<script src="/Public/Common/js/base.js"></script>
<script src="/Public/Common/js/main.js"></script>
<script src="/Public/Admin/js/main.js"></script>




    <script>
        $(function() {
            $('input[name="childId"]').click(function() {
                if($(this).parent().siblings().find("input:checked").length > 0 || $(this).prop('checked')){
                    var checked = true;
                }else{
                    var checked = false;
                }
                $(this).parents(".form_input").prev().find('input[name="parentId"]').prop('checked', checked);
            });
            $('input[name="parentId"]').click(function() {
                var checked = $(this).prop('checked');

                $(this).parents('.form_txt').next().find('input[name="childId"]').each(function() {
                    $(this).prop('checked', checked);
                });
            });

            $('input[name="chkall"]').click(function() {
                var checked = $(this).prop('checked');
                $('.form_group.clear input[type="checkbox"]').each(function() {
                    $(this).prop('checked', checked);
                })
            })
        });

        $(".formname").validator({
            stopOnError:true,
            theme:'yellow_top',
            ignore:':hidden',
            beforeSubmit:function(){$("input[type='submit']").attr("disabled",true);},
            valid:function(form){
                var ids = '';
                var id = $('input[name="id"]').val();
                $('input[name="parentId"]').each(function() {
                    if ($(this).prop('checked')) {
                        ids += $(this).val() + ',';
                    }
                });
                $('input[name="childId"]').each(function() {
                    if ($(this).prop('checked')) {
                        ids += $(this).val() + ',';
                    }
                });
                $.ajax({
                    url:"<?php echo U('System/pageConfig');?>",
                    type:"post",
                    data:{'id':id, 'ids':ids},
                    dataType:"json",
                    success:function(data){
                        var icon=1;
                        if(!data.success){
                            icon=2;
                            $("input[type='submit']").attr("disabled",false);
                        }
                        layer.msg(data.msg, { icon: icon });

                    }
                });
            },
            invalid:function(){$("input[type='submit']").attr("disabled",false);}
        });
    </script>

</body>
</html>