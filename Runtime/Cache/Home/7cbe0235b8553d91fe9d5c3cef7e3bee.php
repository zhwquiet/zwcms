<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title><?php if(!empty($seotitle)): echo ($seotitle); ?>_<?php endif; if(!empty($classname)): echo ($classname); ?>_<?php endif; if(($page) > "1"): ?>第<?php echo ($page); ?>页_<?php endif; echo (WEBNAME); ?></title>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
<meta name="Description" content="<?php echo ($seodesc); ?>" />
<meta name="keywords" content="<?php echo ($seokey); ?>">
<!-- 可以替换其他版本 -->
<script src="/Public/Common/Js/jquery-2.0.3.min.js"></script>
<!-- 不能删除 start  -->
<!-- 验证 -->
<script type="text/javascript" src="/Public/Vendor/nice-validator-1.1.3/jquery.validator.js?local=zh-CN"></script>
<!--  layer弹窗  -->
<script src="/Public/Vendor/layui/layui.js"></script>
<!--  公共基础js  -->
<script src="/Public/Common/Js/base.js"></script>

<!-- 不能删除 end   -->

<link href="../Style/css/main.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- 头部  -->
<div id="header">
	<div class="base">
		<a href="javascript:;" onclick="this.style.behavior='url(#default#homepage)';this.setHomePage('<?php echo (WEBURL); ?>');">设为首页</a>
		<!--<?php echo W('Member/index');?>-->
		<?php echo W('Search/index');?>
	</div>
	<div class="logo">山东营赢信息技术有限公司</div>
</div>

<!-- 导航  -->
<?php echo W('Nav/index',array('name'=>'headernav'));?>

<!-- 轮播banner -->
<?php echo W('Slide/index',array('name'=>'homeHeader'));?>


<div id="footer" class="p15">
	<div>
		<a href="index.php">网站首页</a>　|　
		<?php $m=M();$ret=$m->table("zx_category")->join("")->field("id,catename")->where("pid=0 and modelid=-1")->order("ordnum,id")->limit("10")->select();if ($ret): $i=0;foreach($ret as $key=>$v):++$i;$mod = ($i % 2 );?><a href="/list/<?php echo ($v["id"]); ?>.html"><?php echo ($v["catename"]); ?></a>　|　
		<?php endforeach; else: endif;?>
		<a href="/book.html">在线留言</a>　|　
		<a href="/sitemap.html">网站地图</a>
	</div>
	版权所有：<?php echo (WEBNAME); ?>
	<br />
	Powered by <a href="http://www.wfwzzz.com" target="_blank">wfwzzz.com</a>　
</div>



<!--顶部动画js文件-->
<script>
	E.config({baseUrl:'<?php echo (WEBURL); ?>/Public/Home/Js/'});
	E.use('switchable',function(){
		var Switchable=E.ui.Switchable,sc;
		var sc=new Switchable('#switchable3',{effects:'slideX',nav:true});
	});
</script>
</body>
</html>