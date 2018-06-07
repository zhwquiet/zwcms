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
                <a href="admin.php">首页</a>
            </li>
            <li><span>友情链接</span></li>
        </ul><!-- /.breadcrumb -->

        <!-- /section:basics/content.searchbox -->
    </div>

    <div class="page-content">
        <!-- /section:settings.box -->
        <div class="page-content-area">

            <div class="row">
                <div class="col-xs-12">
                    <div class="nav_menu">
                        <div class="search clear" style="width:200px;">
                            <form id="searchForm">
                                <input type="hidden" name="nature" value=""/>
                                <select name="navCate" id="navCate" class="beautify_input">
                                    <option value="">按类别管理</option>
                                    <option value="0">未分类</option>
                                    <?php if(is_array($linkclass)): $i = 0; $__LIST__ = $linkclass;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$volinkclass): $mod = ($i % 2 );++$i;?><option value="<?php echo ($volinkclass["classid"]); ?>"> <?php echo ($volinkclass["classname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </form>
                        </div>
                        <ul>
                            <li><a href="<?php echo U('Expand/linkAdd');?>"><span class="icon iconfont icon-liebiaoshouqi"></span>添加链接</a></li>
                            <li class="dropdown">
                                <a href="javascript:;"><span class="icon iconfont icon-iconplsd"></span>批量操作↓</a>
                                <dl>
                                    <dt><a href="javascript:;" class="nolock">通过审核</a></dt>
                                    <dt><a href="javascript:;" class="islock">取消审核</a></dt>
                                    <dt><a href="javascript:;" class="delsome">批量删除</a></dt>
                                </dl>
                            </li>
                            <li class="dropdown">
                                <a href="javascript:;"><span class="icon iconfont icon-move"></span>移动链接↓</a>
                                <dl>
                                    <dt><a href="javascript:;" class="move">批量移动</a></dt>
                                    <dt><a href="javascript:;" class="movecate">按类别移动</a></dt>
                                </dl>
                            </li>
                            <li class="dropdown" data-name="nature">
                                <a>
                                    <span class="icon iconfont icon-iconplsd"></span>
                                    <label>按性质</label>↓
                                </a>
                                <dl>
                                    <dt><a class="dl_select" data="">全部</a></dt>
                                    <dt><a class="dl_select" data="1">未审</a></dt>
                                    <dt><a class="dl_select" data="2">已审</a></dt>
                                    <dt><a class="dl_select" data="3">文字链接</a></dt>
                                    <dt><a class="dl_select" data="4">图片链接</a></dt>
                                </dl>
                            </li>
                            <li><a href="<?php echo U('Expand/linkClass');?>"><span class="icon iconfont icon-leimupinleifenleileibie"></span>链接类别管理</a></li>
                        </ul>
                    </div>
                    <div id="tablelist"></div>
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
        $(function(){
            //批量删除
            $(".delsome").click(function(){
                var ids=isCheck();
                if(ids){
                    alertlayer({
                        ajaxurl:"<?php echo U('Expand/delSome');?>",
                        content:"确定要删除？不可恢复！",
                        ids:ids,
                        isremovetr:true
                    });
                }
            });
            //批量移动
            $(".move").click(function(){
                var idarr = isCheck();
                if(idarr){
                    var html="";
                    html+='<dl class="move">';
                    html+='  <dt><b>目标类别：</b><select name="go" id="go">';
                    html+='<option value="0">不设置类别</option>';
                    html+='<?php if(is_array($linkclass)): $i = 0; $__LIST__ = $linkclass;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$volinkclass): $mod = ($i % 2 );++$i;?><option value="<?php echo ($volinkclass["classid"]); ?>"><?php echo ($volinkclass["classname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>';
                    html+='</select></dt>';
                    html+='</dl>';
                    var index=layer.open({
                        title:'批量移动',
                        content:html,
                        btn:['确定','取消'],
                        yes:function(){
                            var selClass=$("#go")[0].value;
                            if(selClass==""){
                                layer.msg("不能移动到当前栏目", { icon: 2 });
                                return false;
                            }
                            $.ajax({
                                url:"<?php echo U('Expand/linkMove');?>",
                                type:'get',
                                data:{"selClass":selClass,"selId":idarr},
                                dataType:"json",
                                success:function(info){
                                    if(info.success){
                                        layer.msg(info.msg, { icon: 1 });
                                        ajaxContent(1);
                                    }else{
                                        layer.msg(info.msg, { icon: 2 });
                                    }
                                },
                                error:function(){}
                            });
                            layer.close(index);
                        },
                        cancel:function(){
                            layer.close(index);
                        }
                    });
                }
            });
            //按类别移动
            $(".movecate").click(function(){
                var html="";
                html+='<dl class="movecate">';
                html+='<dt><b>来源类别：</b><select name="comecate" id="comecate"><option value="0">不设置类别</option><?php if(is_array($linkclass)): $i = 0; $__LIST__ = $linkclass;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voclass): $mod = ($i % 2 );++$i;?><option value="<?php echo ($voclass["classid"]); ?>"><?php echo ($voclass["classname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select><div>两者不能一致</div></dt>';
                html+='<dt><b>目标类别：</b><select name="gocate" id="gocate"><option value="0">不设置类别</option><?php if(is_array($linkclass)): $i = 0; $__LIST__ = $linkclass;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vovoclass): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vovoclass["classid"]); ?>"><?php echo ($vovoclass["classname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?></select></dt>';
                html+='</dl>';
                var ind=layer.open({
                    title:'按类别移动',
                    btn:['确定','取消'],
                    content:html,
                    yes:function(){
                        $.ajax({
                            url:"<?php echo U('Expand/cateMove');?>",
                            type:'post',
                            data:{"comecate":$("#comecate").val(),"gocate":$("#gocate").val()},
                            dataType:"json",
                            success:function(info){
                                if(info.success){
                                    layer.msg(info.msg, { icon: 1 });
                                    ajaxContent(1);
                                }else{
                                    layer.msg(info.msg, { icon: 2 });
                                }
                            },
                            error:function(){}
                        });
                        layer.close(ind);
                    },
                    cancel:function(){
                        layer.close(ind);
                    }
                });
            });
            $(".islock").click(function(){doset("islock");});
            $(".nolock").click(function(){doset("nolock");});

            $('#navCate').change(function(){
                ajaxContent(1);
            });

        });
        function doset(act){
            var idarr = isCheck();
            if(idarr){
                $.ajax({
                    type:"get",
                    data:{"linkId":idarr,"act":act},
                    url:"<?php echo U('Expand/linkLock');?>",
                    dataType:"json",
                    success:function(info){
                        if(info.success){
                            layer.msg(info.msg, { icon: 1 });
                            ajaxContent(1);
                        }else{
                            layer.msg(info.msg, { icon: 2 });
                        }
                    }
                });
            }
        }

        var durl = "<?php echo U('Expand/pageAjax');?>";
        isprevpage="<?php echo ($_GET['isprevpage']); ?>";
        var pageMethod = 'link';
        $(window).load(function(){
            ajaxContent();
        });
    </script>

</body>
</html>