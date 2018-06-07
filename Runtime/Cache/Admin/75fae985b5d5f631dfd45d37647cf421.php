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
            <li><a href="<?php echo U('Category/index');?>">栏目管理</a></li>
            <li>添加栏目</li>
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
                        <input type="hidden" name="id" value="<?php echo ($data["id"]); ?>"/>
                        <div class="form_group">
                            <div class="form_txt">栏目名称：</div>
                            <div class="form_input">
                                <input type="text" name="catename" id="t0" size="40" maxlength="50" class="ip" value="<?php echo ($data["catename"]); ?>" data-rule="栏目名称:required;"></div>
                        </div>
                        <?php if($flag != -2): ?><div class="form_group">
                            <div class="form_txt">英文目录：</div>
                            <div class="form_input">
                                <input type="text" name="catedir" id="t1" size="40" maxlength="50" class="ip" value="<?php echo ($data["catedir"]); ?>">
                                <input type="button" value="拼音" class="bnt_pinyin bnt_save" config="t0:t1"><span>可以为空，示例："news"或"about/honor"</span>
                            </div>
                        </div><?php endif; ?>
                        <div class="form_group">
                            <div class="form_txt">栏目选择：</div>
                            <div class="form_input">
                                <input type="hidden" name="pid" id="t2" value="<?php echo ((isset($level["id"]) && ($level["id"] !== ""))?($level["id"]):0); ?>">
                                <input type="text" class="ip" id="t2_1" size="40" maxlength="50" value="<?php echo ((isset($level["catename"]) && ($level["catename"] !== ""))?($level["catename"]):作为一级栏目); ?>" readonly="readonly">
                                <?php if(empty($pid)): ?><div class="dropdowns">
                                        <input type="button" value="选择" class="bnt_save tt11">
                                        <ul id="treeDemo" class="ztree"></ul>
                                    </div>
                                    <input type="button" value="清空" class="bnt_normal bnt_cate"><?php endif; ?>
                            </div>
                        </div>
                        <?php if($flag == 1): ?><div class="form_group">
                                <div class="form_txt">属性设置：</div>
                                <div class="form_input" style="width:200px;">
                                    <?php if(!empty($data["modelid"])): ?><select name="modelid" id="t3" class="ip beautify_input" data-rule="模型:required;" config="">
                                            <?php if(is_array($list)): foreach($list as $key=>$item): if($data['modelid'] == $item['id']): ?><option value="<?php echo ($item["id"]); ?>" config="<?php echo ($item["config"]); ?>" selected><?php echo ($item["modelname"]); ?></option><?php endif; endforeach; endif; ?>
                                        </select>
                                    <?php else: ?>
                                        <select name="modelid" id="t3" class="ip beautify_input" data-rule="模型:required;" config="">
                                            <option value="">请选择模型</option>
                                            <?php if(is_array($list)): foreach($list as $key=>$item): ?><option value="<?php echo ($item["id"]); ?>" config="<?php echo ($item["config"]); ?>" <?php if($item['id'] == $level['modelid']): ?>selected<?php endif; ?>><?php echo ($item["modelname"]); ?></option><?php endforeach; endif; ?>
                                        </select><?php endif; ?>
                                    <span>添加之后不能修改</span>
                                </div>
                            </div>
                        <?php else: ?>
                            <input type="hidden" name="modelid" value="<?php echo ($flag); ?>"/>
                            <input type="hidden" id="t3" config="page"/><?php endif; ?>
                        <div class="form_group">
                            <div class="form_txt">栏目图片：</div>
                            <div class="form_input">
                                <input type="text" size="50" maxlength="255" class="ip" value="<?php echo (getattachurl($data["catepicid"])); ?>" disabled/>
                                <input type="hidden" name="catepicid" value="<?php echo ($data["catepicid"]); ?>"/>
                                <input type="button" value="上传" id="upbtn" data-type="1" class="bnt bnt_save" />
                                <span>可以为空</span>
                            </div>
                            <div class="form_input img-div" <?php if(empty($data["catepicid"])): ?>style="display:none;"<?php endif; ?>>
                                <img src="<?php echo (getattachurl($data["catepicid"])); ?>"/>
                                <i class="iconfont icon-close img-del"></i>
                            </div>
                        </div>
                        <?php if($flag == -2): ?><div class="form_group">
                                <div class="form_txt">链接地址：</div>
                                <div class="form_input">
                                    <input type="text" name="cateurl" value="<?php echo ($data["cateurl"]); ?>" style="width: 322px" size="5" maxlength="255" title="链接" class="ip">
                                    <span>示例："Book/index"</span>
                                </div>
                            </div><?php endif; ?>
                        <?php if($flag == 1): ?><div class="form_group">
                                <div class="form_txt">分页/排序：</div>
                                <div class="form_input">
                                    <input type="text" name="pagenum" size="5" maxlength="9" value="<?php echo ((isset($data["pagenum"]) && ($data["pagenum"] !== ""))?($data["pagenum"]):20); ?>" title="分页" class="ip" onkeyup="checkRate(this)" data-rule="分页:required;">/
                                    <input type="text" name="ordnum" size="5" maxlength="9" value="<?php echo ($data["ordnum"]); ?>" title="排序" class="ip" onkeyup="checkInt(this)">
                                    <span>排序可以为空，数字越小越靠前</span>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="form_group">
                                <div class="form_txt">栏目排序：</div>
                                <div class="form_input">
                                    <input type="text" name="ordnum" size="5" maxlength="9" value="<?php echo ($data["ordnum"]); ?>" title="排序" class="ip" onkeyup="checkInt(this)">
                                    <span>排序可以为空，数字越小越靠前</span>
                                </div>
                            </div><?php endif; ?>
                        <?php if($flag == 1): ?><div class="form_group">
                                <div class="form_txt">列表模板：</div>
                                <div class="form_input">
                                    <input type="text" name="cate_list" id="t8" size="40" maxlength="100" class="ip" value="<?php echo ($data["cate_list"]); ?>" readonly>
                                    <span id="list"><input type="button" value="选择" class="bnt_temp bnt_save" config="news:t8"></span>
                                    <span><input type="button" value="清空" class="bnt_clear bnt_normal" config="t8">　可以为空</span>
                                </div>
                            </div><?php endif; ?>
                        <?php if($flag != -2): ?><div class="form_group">
                            <div class="form_txt">内容模板：</div>
                            <div class="form_input">
                                <input type="text" name="cate_show" id="t9" size="40" maxlength="100" class="ip" value="<?php echo ($data["cate_show"]); ?>" readonly>
                                <span id="show"><input type="button" value="选择" class="bnt_temp bnt_save" config="news:t9"></span>
                                <span><input type="button" value="清空" class="bnt_clear bnt_normal" config="t9">　可以为空</span>
                            </div>
                        </div>

                        <div class="form_group">
                            <div class="form_txt">优化标题：</div>
                            <div class="form_input"><input type="text" name="seotitle" value="<?php echo ($data["seotitle"]); ?>" size="60" maxlength="255" class="ip"><span>可以为空，为空时显示栏目名称</span>
                            </div>
                        </div>
                        <?php if($flag == 1): ?><div class="form_group">
                                <div class="form_txt">内容页规则：</div>
                                <div class="form_input" style="width:200px;">
                                    <select name="urlrule" class="ip beautify_input">
                                        <option value="id" <?php if(($data["urlrule"]) == "id"): ?>selected<?php endif; ?>>自动编号</option>
                                        <option value="dateid" <?php if(($data["urlrule"]) == "dateid"): ?>selected<?php endif; ?>>日期+编号</option>
                                    </select>
                                    <span>静态模式下使用</span>
                                </div>
                            </div><?php endif; ?>
                        <div class="form_group">
                            <div class="form_txt">关键字：</div>
                            <div class="form_input">
                                <input type="text" name="catekey" value="<?php echo ($data["catekey"]); ?>" size="60" maxlength="255" class="ip" onkeyup="strlen_verify(this,'key_len',255)">
                                还可输入<span id="key_len">255</span>个字符<br>
                                <span>META标签的keywords内容. 关键字之间使用 "," 分隔</span>
                            </div>
                        </div>
                        <div class="form_group">
                            <div class="form_txt">描述信息：</div>
                            <div class="form_input">
                                <input type="text" name="catedesc" value="<?php echo ($data["catedesc"]); ?>" size="60" maxlength="255" class="ip" onkeyup="strlen_verify(this,'key_desc',255)">
                                还可输入<span id="key_desc">255</span>个字符<br>
                                <span>META标签的description内容</span>
                            </div>
                        </div><?php endif; ?>
                        <div class="form_group">
                            <div class="form_bnt">
                                <button class="btn btn-white btn-info btn-round" type="submit">
                                    <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> 保存
                                </button>
                                <a href="<?php echo U('Category/index');?>" class="btn btn-white btn-warning btn-round">
                                    <i class="ace-icon fa fa-undo bigger-120 orange"></i>
                                    返回
                                </a>
                            </div>
                        </div>
                    </form>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.page-content-area -->
        </div><!-- /.page-content -->
    </div>

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
        $(function () {
            $(document).ready(function () {
                $("#t3").attr('config',$("#t3").find("option:selected").attr('config'));

                setCheck(<?php echo ((isset($menuTree) && ($menuTree !== ""))?($menuTree): ''); ?>,function(event, treeId, treeNode, clickFlag) {
                    $('#t2_1').val(treeNode.name);
                    $('#t2').val(treeNode.id);
                    $('#treeDemo').hide();
                });

            });
            $(".formname").MotorsSubmit({
                ajaxurl:"<?php echo U('Category/addItem');?>",
                loadurl:"<?php echo U('Category/index');?>"
            });
        });
    </script>

</body>
</html>