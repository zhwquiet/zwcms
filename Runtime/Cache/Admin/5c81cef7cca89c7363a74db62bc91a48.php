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
<link rel="stylesheet" type="text/css" href="/Public/Common/Css/resest.css">
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
									<?php echo (session('real_name')); ?>
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
			<a href="/admin.php">
				<i class="menu-icon iconfont icon-home"></i>
				<span class="menu-text"> 首页 </span>
			</a>
			<b class="arrow"></b>
		</li>

		<?php if(is_array($menulist)): $i = 0; $__LIST__ = $menulist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li class="<?php if($v['method'] == $method): ?>active<?php endif; ?>">
		<a href="<?php if(!empty($v["url"])): ?>/admin.php?s=/<?php echo ($v["url"]); ?>.html<?php else: ?>#<?php endif; ?>" <?php if(empty($v["url"])): ?>class="dropdown-toggle"<?php endif; ?>>
		<i class="menu-icon iconfont <?php echo ($v["icon"]); ?>"></i>
		<span class="menu-text"> <?php echo ($v["title"]); ?> </span>
		<?php if(!empty($v["child"])): ?><b class="arrow fa fa-angle-down"></b><?php endif; ?>
		</a>
		<b class="arrow"></b>

		<?php if(!empty($v["child"])): ?><ul class="submenu">
			<?php if(is_array($v["child"])): $i = 0; $__LIST__ = $v["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?><li class="<?php if(($v['method'] == $method) and ($v1['method'] == $child_method)): ?>active<?php endif; ?>">
			<a href="/admin.php?s=/<?php echo ($v1["url"]); ?>.html">
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
            <li><a href="<?php echo U('Model/index');?>">模型管理</a></li>
            <li><a href="<?php echo U('Model/field',array('id'=>$id));?>">字段管理</a></li>
            <li>添加字段</li>
        </ul><!-- /.breadcrumb -->


        <!-- /section:basics/content.searchbox -->
    </div>

    <div class="page-content">
        <!-- /section:settings.box -->
        <div class="page-content-area">

            <div class="row">
                <div class="col-xs-12">
                    <div class="table_form">
                        <form class="formname" method="post" id="addModelField">
                            <input type="hidden" name="modelid" value="<?php echo ($id); ?>"/>
                            <div class="form_group">
                                <div class="form_txt">字段名称：</div>
                                <div class="form_input">
                                    my_<input type="text" name="fname" id="t0" size="26" maxlength="20" class="ip" data-rule="字段名称:required;fieldname" /><span>不可重复，不可更改</span><span for="t0" class="msg-box"></span>
                                </div>
                            </div>
                            <div class="form_group">
                                <div class="form_txt">字段别名：</div>
                                <div class="form_input"><input type="text" name="falias" size="30" maxlength="7" class="ip" data-rule="字段别名:required;" /></div>
                            </div>
                            <div class="form_group">
                                <div class="form_txt">字段类型：</div>
                                <div class="form_input" style="width:200px;">
                                    <select name="fclass" id="t2" class="ip beautify_input" data-rule="字段类型:required;">
                                        <option value="">请选择字段类型</option>
                                        <option value="1">单行文本框</option>
                                        <option value="2">多行文本框</option>
                                        <option value="3">下拉列表</option>
                                        <option value="4">单选按钮</option>
                                        <option value="5">复选框</option>
                                        <option value="6">HTML编辑器</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form_group dis" id="modetype">
                                <div class="form_txt">表现形式：</div>
                                <div class="form_input">
                                    <label class="checklabel">
                                        <input name="fmode" type="radio" id="t3_1" class="ace" value="1" checked>
                                        <span class="lbl"> 普通文本</span>
                                    </label>
                                    <label class="checklabel">
                                        <input name="fmode" type="radio" id="t3_2" class="ace" value="2">
                                        <span class="lbl"> 整数</span>
                                    </label>
                                    <label class="checklabel">
                                        <input name="fmode" type="radio" id="t3_5" class="ace" value="5">
                                        <span class="lbl"> 小数</span>
                                    </label>
                                    <label class="checklabel">
                                        <input name="fmode" type="radio" id="t3_4" class="ace" value="4">
                                        <span class="lbl"> 上传</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form_group dis" id="fupload">
                                <div class="form_txt">上传类型：</div>
                                <div class="form_input">
                                    <select name="fupload" id="t13" class="ip">
                                        <option value="">请选择上传类型</option>
                                        <option value="1">图片</option>
                                        <option value="2">附件</option>
                                        <option value="3">视频</option>
                                        <option value="5">Flash</option>
                                        <option value="4">全部类型</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form_group dis" id="datatype">
                                <div class="form_txt">数据类型：</div>
                                <div class="form_input" id="typevalue"></div>
                            </div>
                            <div class="form_group dis" id="lengths">
                                <div class="form_txt">字段长度：</div>
                                <div class="form_input"><input type="text" name="flength" id="t5" size="30" maxlength="3" class="ip" data-rule="字段长度:required;integer;range[1~255]" /><span>1-255</span><span for="t5" class="msg-box"></span></div>
                            </div>
                            <div class="form_group" id="fdefault">
                                <div class="form_txt">默认值：</div>
                                <div class="form_input"><input type="text" name="fdefault" size="30" maxlength="255" class="ip" /></div>
                            </div>
                            <div class="form_group dis" id="options">
                                <div class="form_txt">列表内容：</div>
                                <div class="form_input"><textarea name="foptions" id="t7" class="tt" cols="30" rows="6" data-rule="列表内容:required;"></textarea><span>示范：项目名称|项目值</span><span for="t7" class="msg-box"></span><br><span>一行一个项目</span></div>
                            </div>
                            <div class="form_group" id="intro">
                                <div class="form_txt">字段说明：</div>
                                <div class="form_input"><textarea name="intro" id="t7" class="tt" cols="30" rows="6"></textarea></div>
                            </div>
                            <div class="form_group">
                                <div class="form_txt">是否必填：</div>
                                <div class="form_input" id="mustvalue">
                                    <label class="checklabel">
                                        <input name="fismust" type="radio" id="t8_1" class="ace" value="1" checked>
                                        <span class="lbl"> 是</span>
                                    </label>
                                    <label class="checklabel">
                                        <input name="fismust" type="radio" id="t8_0" class="ace" value="0">
                                        <span class="lbl"> 否</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form_group dis" id="rules">
                                <div class="form_txt">验证规则：</div>
                                <div class="form_input" id="vrule">
                                </div>
                            </div>
                            <div class="form_group" id="fistrim">
                                <div class="form_txt">去掉两端空格：</div>
                                <div class="form_input">
                                    <label class="checklabel">
                                        <input name="fistrim" type="radio" id="t10_1" class="ace" value="1" checked>
                                        <span class="lbl"> 是</span>
                                    </label>
                                    <label class="checklabel">
                                        <input name="fistrim" type="radio" id="t10_0" class="ace" value="0">
                                        <span class="lbl"> 否</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form_group">
                                <div class="form_txt">字段排序：</div>
                                <div class="form_input">
                                    <input name="ordnum" id="t11" type="text" class="ip" value="0" size="30" maxlength="9" data-rule="字段排序:required;integer;" /><span>数字越小越靠前</span><span for="t11" class="msg-box"></span>
                                </div>
                            </div>
                            <div class="form_group">
                                <div class="form_txt">状态：</div>
                                <div class="form_input">
                                    <label class="checklabel">
                                        <input name="islock" type="radio" id="t12_1" class="ace" value="1" checked>
                                        <span class="lbl"> 正常</span>
                                    </label>
                                    <label class="checklabel">
                                        <input name="islock" type="radio" id="t12_0" class="ace" value="0">
                                        <span class="lbl"> 锁定</span>
                                    </label>
                                </div>
                            </div>

                            <div class="form_group">
                                <div class="form_bnt">
                                    <button class="btn btn-white btn-info btn-round" type="submit">
                                        <i class="ace-icon fa fa-floppy-o bigger-120 blue"></i> 保存
                                    </button>
                                    <a href="javascript:goback();" class="btn btn-white btn-warning btn-round">
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
            $("#t2").change(function(){
                var value=$(this).val();
                $("#t13").prop('selectedIndex',0);
                $("#fupload").css("display","none");
                $("#modetype").css("display","none");
                $("#lengths").css("display","none");
                $("#options").css("display","none");
                $("#fistrim").css("display","none");
                $("#fdefault").css("display","block");
                $("[name='fdefault']").attr('maxlength','255');
                switch (value){
                    case "1":
                        var id =$("[name='fmode']:checked").val();
                        if(id == undefined){
                            id =1;
                        }
                        $("#t3_"+id).click();
                        $("#modetype").css("display","block");
                        break;
                    case "2":
                        html='';
                        html+='<select name="fdatatype" class="ip">'
                        html+='<option value="5">备注</option>'
                        html+='</select>'
                        $("#typevalue").html(html);
                        html='';
                        html+='<select name="frules" class="ip" data-rule="验证规则:required;">'
                        html+='<option value="1">不为空</option>'
                        html+='</select>'
                        $("#vrule").html(html);
                        $("#fistrim").css("display","block");
                        break;
                    case "6":
                        html='';
                        html+='<select name="fdatatype" class="ip">'
                        html+='<option value="5">备注</option>'
                        html+='</select>'
                        $("#typevalue").html(html);
                        html='';
                        html+='<select name="frules" class="ip" data-rule="验证规则:required;">'
                        html+='<option value="1">不为空</option>'
                        html+='</select>'
                        $("#vrule").html(html);
                        break;
                    default:
                        html='';
                        html+='<select name="fdatatype" class="ip">'
                        html+='<option value="1">文本</option>'
                        html+='</select>'
                        $("#typevalue").html(html);
                        html='';
                        html+='<select name="frules" class="ip" data-rule="验证规则:required;">'
                        html+='<option value="1">不为空</option>'
                        html+='</select>'
                        $("#vrule").html(html);
                        $("#options").css("display","block");
                        break;
                }
                $("[name='fismust']:checked").click();
            })
            $("#t3_1").click(function(){
                var html='';
                html+='<select name="fdatatype" class="ip">'
                html+='<option value="1">文本</option>'
                html+='</select>'
                $("#typevalue").html(html);
                html='';
                html+='<select name="frules" class="ip">'
                html+='<option value="">请选择验证规则</option>'
                html+='<option value="1">不为空</option>'
                html+='<option value="4">电话</option>'
                html+='<option value="5">手机</option>'
                html+='<option value="6">邮箱</option>'
                html+='<option value="8">邮编</option>'
                html+='<option value="9">QQ</option>'
                html+='<option value="10">网址</option>'
                html+='</select>'
                $("#vrule").html(html);
                $("#fupload").css("display","none");
                $("#lengths").css("display","block");
                $("#fdefault").css("display","block");
                $("#fistrim").css("display","block");
                $("#t5").keyup();
            })
            $("#t3_2").click(function(){
                var html='';
                html+='<select name="fdatatype" class="ip">'
                html+='<option value="2">数字</option>'
                html+='</select>'
                $("#typevalue").html(html);
                html='';
                html+='<select name="frules" class="ip" data-rule="验证规则:required;">'
                html+='<option value="2">整数</option>'
                html+='</select>'
                $("#vrule").html(html);
                $("#fupload").css("display","none");
                $("#lengths").css("display","none");
                $("#fdefault").css("display","block");
                $("#fistrim").css("display","block");
                $("[name='fdefault']").attr('maxlength','255');
            })
            $("#t3_4").click(function(){
                var html='';
                html+='<select name="fdatatype" class="ip">'
                html+='<option value="1">文本</option>'
                html+='</select>'
                $("#typevalue").html(html);
                html='';
                html+='<select name="frules" class="ip" data-rule="验证规则:required;">'
                html+='<option value="1">不为空</option>'
                html+='</select>'
                $("#vrule").html(html);
                $("#lengths").css("display","none");
                $("#fupload").css("display","block");
                $("#fdefault").css("display","none");
                $("#fistrim").css("display","none");
                $("[name='fdefault']").attr('maxlength','255');
            })
            $("#t3_5").click(function(){
                var html='';
                html+='<select name="fdatatype" class="ip">'
                html+='<option value="3">货币</option>'
                html+='</select>'
                $("#typevalue").html(html);
                html='';
                html+='<select name="frules" class="ip" data-rule="验证规则:required;">'
                html+='<option value="3">小数</option>'
                html+='</select>'
                $("#vrule").html(html);
                $("#fupload").css("display","none");
                $("#lengths").css("display","none");
                $("#fdefault").css("display","block");
                $("#fistrim").css("display","block");
                $("[name='fdefault']").attr('maxlength','255');
            })

            $("#t8_1").on("click",function(){$("#rules").css("display","block");})
            $("#t8_0").on("click",function(){$("#rules").css("display","none");})
            $("#t5").on("keyup",function(){
                var length = $(this).val();
                var fdefault = $("[name='fdefault']");
                var str = fdefault.val();
                fdefault.attr('maxlength',length);
                if(str.length > length){
                    fdefault.val(str.substring(0,length));
                }
            });
        })
        $(".formname").MotorsSubmit({
            theme:"yellow_right_effect",
            ajaxurl:"<?php echo U('Model/saveFieldAll');?>",
            loadurl:"<?php echo U('Model/field',array('id'=>$id));?>"
        });
    </script>

</body>
</html>