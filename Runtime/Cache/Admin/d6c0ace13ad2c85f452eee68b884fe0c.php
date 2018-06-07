<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    
    <title>我的建站系统</title>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<meta name="description" content="This is page-header (.page-header &gt; h1)" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />


<link rel="stylesheet" href="../Public/assets/css/bootstrap.min.css" />
<link rel="stylesheet" href="../Public/assets/css/font-awesome.min.css" />
<link rel="stylesheet" href="../Public/assets/css/ace.min.css" id="main-ace-style" />
<!--[if lte IE 9]>
<link rel="stylesheet" href="../Public/assets/css/ace-part2.min.css" />
<![endif]-->
<link rel="stylesheet" href="../Public/assets/css/ace-skins.min.css" />
<link rel="stylesheet" href="../Public/assets/css/ace-rtl.min.css" />
<!--[if lte IE 9]>
<link rel="stylesheet" href="../Public/assets/css/ace-ie.min.css" />
<![endif]-->
<!--[if lte IE 8]>
<script src="../Public/assets/js/html5shiv.min.js"></script>
<script src="../Public/assets/js/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="../Public/Common/Css/resest.css">
<link rel="stylesheet" href="../Public/Common/css/main.css?version=<?php echo (VERSION); ?>" />
<link rel="stylesheet" href="../Public/Admin/fonts/iconfont.css?version=<?php echo (VERSION); ?>" />
<link rel="stylesheet" href="../Public/Admin/css/main.css?version=<?php echo (VERSION); ?>" />
















    
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
					<img src="../Public/assets/avatars/logo.png" alt="" />
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
										<img src="../Public/assets/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
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
										<img src="../Public/assets/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
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
										<img src="../Public/assets/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
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
										<img src="../Public/assets/avatars/avatar2.png" class="msg-photo" alt="Kate's Avatar" />
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
										<img src="../Public/assets/avatars/avatar5.png" class="msg-photo" alt="Fred's Avatar" />
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
						<img class="nav-user-photo" src="../Public/assets/avatars/user.jpg" alt="Jason's Photo" />
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
            <?php if(($referer["c"]) == "Category"): ?><li>
                    <a href="<?php echo U('Category/index');?>">栏目管理</a>
                </li>
                <?php else: ?>
                <li>
                    <a href="<?php echo U('Content/index');?>">内容列表</a>
                </li><?php endif; ?>

            <li><a href="<?php echo ($referer["url"]); ?>&isprevpage=1">内容管理</a></li>

            <li><span>发布内容</span></li>
        </ul><!-- /.breadcrumb -->

        <!-- /section:basics/content.searchbox -->
    </div>

    <div class="page-content">
        <!-- /section:settings.box -->
        <div class="page-content-area">

            <div class="row">
                <div class="col-xs-12">
                    <div class="table_form">
                        <form class="formname" method="post">
                            <input type="hidden" name="id" value="<?php echo ($contentinfo["id"]); ?>"/>
                            <input type="hidden" name="categoryid" value="<?php echo ($contentinfo["categoryid"]); ?>"/>
                            <div class="form_group">
                                <div class="form_txt">标题：</div>
                                <div class="form_input">
                                    <input type="text" name="title" size="50" maxlength="255" id="t0" class="ip" data-rule="标题:required;" value="<?php echo ($contentinfo["title"]); ?>"/>
                                    <label class="checklabel">
                                        <input type="checkbox" id="s0" class="ace" <?php if(!empty($stylearr["font-weight"])): ?>checked<?php endif; ?>>
                                        <span class="lbl"> 粗体</span>
                                    </label>
                                    <label class="checklabel">
                                        <input type="checkbox" id="s1" class="ace" <?php if(!empty($stylearr["font-style"])): ?>checked<?php endif; ?>>
                                        <span class="lbl"> 斜体</span>
                                    </label>
                                    <input type="hidden" name="c0" id="c0" <?php if(!empty($stylearr["font-weight"])): ?>value="font-weight:bold;"<?php endif; ?>/>
                                    <input type="hidden" name="c1" id="c1" <?php if(!empty($stylearr["font-style"])): ?>value="font-style:italic;"<?php endif; ?>/>
                                    <input type="hidden" name="s2" id="s2" <?php if(!empty($stylearr["font-color"])): ?>value="font-color:<?php echo ($stylearr["font-color"]); ?>"<?php endif; ?>/>
                                    <img src="../Public/Admin/Images/colorpicker.gif" title="标题颜色" align="absmiddle" id="color" <?php if(!empty($stylearr["font-color"])): ?>style="background:<?php echo ($stylearr["font-color"]); ?>;"<?php endif; ?>/>
                                    <span for="t0" class="msg-box"></span>
                                </div>
                            </div>
                            <div class="form_group">
                                <div class="form_txt">作者：</div>
                                <div class="form_input">
                                    <input type="text" name="author" size="25" maxlength="50" value="<?php echo ($contentinfo["author"]); ?>" class="ip" />
                                </div>
                            </div>
                            <div class="form_group">
                                <div class="form_txt">来源：</div>
                                <div class="form_input" style="width:200px">
                                    <select name="comefrom" class="ip beautify_input">
                                        <option value="">选择</option>
                                        <option value="未知" <?php if(($contentinfo["comefrom"]) == "未知"): ?>selected<?php endif; ?>>未知</option>
                                        <option value="原创" <?php if(($contentinfo["comefrom"]) == "原创"): ?>selected<?php endif; ?>>原创</option>
                                        <option value="转载" <?php if(($contentinfo["comefrom"]) == "转载"): ?>selected<?php endif; ?>>转载</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form_group">
                                <div class="form_txt">缩略图：</div>
                                <div class="form_input">
                                    <input type="text" size="50" maxlength="255" class="ip" value="<?php echo (getattachurl($contentinfo["picid"])); ?>" disabled/>
                                    <input type="hidden" name="picid" value="<?php echo ($contentinfo["picid"]); ?>"/>
                                    <input type="button" value="上传" id="upbtn" data-type="1" class="bnt bnt_save" />　<span>可以为空</span>
                                </div>
                                <div class="form_input img-div" style="display:none;">
                                    <img src="<?php echo (getattachurl($contentinfo["picid"])); ?>">
                                    <i class="iconfont icon-close img-del"></i>
                                </div>
                            </div>
                            <?php if(is_array($modelList)): foreach($modelList as $key=>$item): ?><div class="form_group">
                                    <div class="form_txt"><?php echo ($item["falias"]); ?>：</div>
                                    <div class="form_input">
                                        <?php echo (echooptions($item,$data['my_'.$item["fname"]])); ?>
                                    </div>
                                </div><?php endforeach; endif; ?>
                            <div class="form_group">
                                <div class="form_txt">简介：</div>
                                <div class="form_input">
                                    <!-- 加载编辑器的容器 -->
                                    <textarea name="intro" cols="39" rows="10" maxlength="255" style="width:98%;"><?php echo ($contentinfo["intro"]); ?></textarea>
                                </div>
                            </div>
                            <div class="form_group">
                                <div class="form_txt">内容：</div>
                                <div class="form_input">
                                    <!-- 加载编辑器的容器 -->
                                    <textarea name="content" id="container" cols="39" rows="6" style="width:98%;"><?php echo ($data["content"]); ?></textarea>
                                </div>
                            </div>
                            <div class="form_group">
                                <div class="form_txt">META关键字：</div>
                                <div class="form_input"><input type="text" name="keyword" value="<?php echo ($contentinfo["keyword"]); ?>" size="50" maxlength="255" class="ip" /></div>
                            </div>
                            <div class="form_group">
                                <div class="form_txt">META描述：</div>
                                <div class="form_input"><input type="text" name="description" value="<?php echo ($contentinfo["description"]); ?>" size="50" maxlength="255" class="ip" /></div>
                            </div>
                            <div class="form_group">
                                <div class="form_txt">排序：</div>
                                <div class="form_input">
                                    <input type="text" name="ordnum" size="25" maxlength="50" value="<?php echo ($contentinfo["ordnum"]); ?>" class="ip" onkeyup="checkInt(this)"/>
                                </div>
                            </div>
                            <div class="form_group">
                                <div class="form_txt">状态：</div>
                                <div class="form_input">
                                    <label class="checklabel">
                                        <input type="checkbox" name="islock" class="ace" value="1" <?php if(($contentinfo["islock"]) != "0"): ?>checked<?php endif; ?>>
                                        <span class="lbl"> 发布</span>
                                    </label>
                                    <label class="checklabel">
                                        <input type="checkbox" name="isnice" class="ace" value="1" <?php if(($contentinfo["isnice"]) == "1"): ?>checked<?php endif; ?>>
                                        <span class="lbl"> 推荐</span>
                                    </label>
                                    <label class="checklabel">
                                        <input type="checkbox" name="ontop" class="ace" value="1" <?php if(($contentinfo["ontop"]) == "1"): ?>checked<?php endif; ?>>
                                        <span class="lbl"> 置顶</span>
                                    </label>
                                    <label class="checklabel">
                                        <input type="checkbox" name="iscomment" class="ace" value="1" <?php if(($contentinfo["iscomment"]) == "1"): ?>checked<?php endif; ?>>
                                        <span class="lbl"> 允许评论</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form_group">
                                <div class="form_bnt">
                                    <button class="btn btn-white btn-info btn-round" type="submit">
                                        <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> 保存
                                    </button>
                                    <a href="<?php echo ($referer["url"]); ?>&isprevpage=1" class="btn btn-white btn-warning btn-round">
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
    window.jQuery || document.write("<script src='../Public/assets/js/jquery.min.js'>"+"<"+"/script>");
</script>
<!-- <![endif]-->
<!--[if IE]>
<script type="text/javascript">
    window.jQuery || document.write("<script src='../Public/assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='../Public/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="../Public/Common/Js/jquery.cookie.js"></script>
<script src="../Public/Common/js/jquery.form.js"></script>

<script src="../Public/assets/js/bootstrap.min.js"></script>
<!--[if lte IE 8]>
<script src="../Public/assets/js/excanvas.min.js"></script>
<![endif]-->
<script src="../Public/assets/js/jquery-ui.custom.min.js"></script>
<script src="../Public/assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="../Public/assets/js/ace-elements.min.js"></script>
<script src="../Public/assets/js/ace.min.js"></script>

<!-- 验证 -->
<script type="text/javascript" src="../Public/Vendor/nice-validator-1.1.3/jquery.validator.js?local=zh-CN"></script>

<!--  select  样式优化 -->
<link href="../Public/Vendor/cssSelect/css/base.css" rel="stylesheet" type="text/css" />
<script src="../Public/Vendor/cssSelect/js/jquery.cssforms.js"></script>

<script src="../Public/Vendor/layui/layui.js"></script>

<!--ztree-->
<link rel="stylesheet" href="../Public/Vendor/ztree/zTreeStyle/zTreeStyle.css" type="text/css">
<script type="text/javascript" src="../Public/Vendor/ztree/jquery.ztree.all.js"></script>
<!-- 模板 js-->
<script type="text/javascript" src="../Public/Common/js/jquery.tmpl.js"></script>

<!-- 编辑器源码文件 -->
<script type="text/javascript" src="../Public/Vendor/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../Public/Vendor/ueditor/ueditor.all.js"></script>

<link href="../Public/Vendor/colorpicker/jquery.colorpicker.css" rel="stylesheet" type="text/css" />
<script src="../Public/Vendor/colorpicker/jquery.colorpicker.js"></script>

<script src="../Public/Vendor/uploadify/jquery.uploadify.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="../Public/Vendor/uploadify/uploadify.css">

<script src="../Public/Common/js/base.js"></script>
<script src="../Public/Common/js/main.js"></script>
<script src="../Public/Admin/js/main.js"></script>




    <script>
        if(ue){
            ue.destroy();
        }
        var ue = UE.getEditor('container');

        var infoId = "<?php echo ($contentinfo["id"]); ?>";
        if(infoId){
            var loadurl = "<?php echo ($referer["url"]); ?>&isprevpage=1";
        }else{
            var loadurl = "<?php echo ($referer["url"]); ?>";
        }
        $(".formname").MotorsSubmit({
            theme:'yellow_right_effect',
            ajaxurl:"<?php echo U('Content/savemodelcontent');?>",
            loadurl:loadurl
        });
    </script>

</body>
</html>