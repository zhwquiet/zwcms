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
		<a href="<?php if(!empty($v["url"])): echo ($server); ?>/admin.php/<?php echo ($v["url"]); ?>.html<?php else: ?>#<?php endif; ?>" <?php if(empty($v["url"])): ?>class="dropdown-toggle"<?php endif; ?>>
		<i class="menu-icon iconfont <?php echo ($v["icon"]); ?>"></i>
		<span class="menu-text"> <?php echo ($v["title"]); ?> </span>
		<?php if(!empty($v["child"])): ?><b class="arrow fa fa-angle-down"></b><?php endif; ?>
		</a>
		<b class="arrow"></b>

		<?php if(!empty($v["child"])): ?><ul class="submenu">
			<?php if(is_array($v["child"])): $i = 0; $__LIST__ = $v["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><li class="<?php if(($v['method'] == $method) and ($v1['method'] == $child_method)): ?>active<?php endif; ?>">
			<a href="<?php echo ($server); ?>/admin.php/<?php echo ($v1["url"]); ?>.html">
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
			<a href="/">首页</a>
		</li>
	</ul><!-- /.breadcrumb -->


	<!-- /section:basics/content.searchbox -->
</div>

<div class="page-content">
	<!-- /section:settings.box -->
	<div class="page-content-area">

		<div class="row">
			<div class="main_body">
				<div class="col_right">
					<div class="main_bg">
						<div class="subject">官方通知</div>
						<ul class="topnews" id="notice"><li><a href="http://news.sdcms.cn/notice-93.html" title="三网合一企业网站管理系统V1.5版本发布" target="_blank">三网合一企业网站管理系统V1.5版本发…</a></li><li><a href="http://news.sdcms.cn/notice-79.html" title="三网合一企业网站管理系统V1.4版本发布" target="_blank">三网合一企业网站管理系统V1.4版本发…</a></li><li><a href="http://news.sdcms.cn/notice-74.html" title="三网合一企业网站管理系统V1.3版本发布" target="_blank">三网合一企业网站管理系统V1.3版本发…</a></li><li><a href="http://news.sdcms.cn/notice-71.html" title="蓝色系列包装行业网站模板上市" target="_blank">蓝色系列包装行业网站模板上市</a></li></ul>
					</div>
					<div class="main_bg mt15">
						<div class="subject"><a href="<?php echo U('Index/logindex');?>">更多&gt;&gt;</a>登录日志</div>
						<div class="log">
							<?php if(is_array($loglist)): $i = 0; $__LIST__ = $loglist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><p><strong><span><?php echo (date("Y-m-d H:i:s",$v["createtime"])); ?></span><?php echo ($v["username"]); ?></strong><?php echo ($v["loginip"]); ?><span><?php echo ($v["content"]); ?></span></p><?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</div>
				</div>

				<div class="col_left">
					<div class="main_bg">
						<div class="subject">数据统计</div>
						<ul class="count">
							<li>内容<span><?php echo ($conCount); ?></span></li>
							<li>会员<span><?php echo ($meCount); ?></span></li>
							<li>订单<span>337</span></li>
							<li>留言<span><?php echo ($boCount); ?></span></li>
						</ul>
					</div>

					<div class="main_bg mt15">
						<div class="subject">服务器环境</div>
						<ul class="help">
							<li><span>操作系统：</span><?php echo php_uname('s');?></li>
							<li><span>运行环境：</span><?php echo ($_SERVER['SERVER_SOFTWARE']); ?></li>
							<li><span>Php版本：</span><?php echo (PHP_VERSION); ?></li>
							<li><span>服务器Ip：</span><?php echo ($_SERVER['SERVER_ADDR']); ?></li>
							<li><span>网站端口：</span><?php echo ($_SERVER['SERVER_PORT']); ?></li>
							<li><span>运行内存：</span><?php echo get_cfg_var("memory_limit");?></li>
							<li><span>上传限制：</span><?php echo get_cfg_var("upload_max_filesize");?></li>
							<li><span>提交限制：</span><?php echo get_cfg_var("post_max_size");?></li>
							<li><span>脚本超时：</span><?php echo get_cfg_var("max_execution_time");?>秒</li>
							<li><span>Gzip压缩：</span><?php echo ($_SERVER['HTTP_ACCEPT_ENCODING']); ?></li>
							<li><span>客户端Ip：</span><?php echo get_real_ip();?></li>
							<li><span>程序版本：</span>Zwcms 2.0</li>
						</ul>
					</div>
				</div>
			</div>
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




</body>
</html>