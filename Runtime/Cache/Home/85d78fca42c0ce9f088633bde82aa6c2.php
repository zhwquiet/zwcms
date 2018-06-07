<?php if (!defined('THINK_PATH')) exit();?><div id="nav">
      <ul>
        <li <?php if(empty($classid)): ?>class="hover"<?php endif; ?>><a href="/">网站首页</a></li>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><img src="/Public/Home/Images/nav_mid.gif" /></li>
        	<li <?php if($v['item_id'] == $pid or $v['item_id'] == $classid): ?>class="hover"<?php endif; ?>>
        		<a href="<?php echo ($v["url"]); ?>" <?php if(($v["mode"]) == "2"): ?>target="_blank"<?php endif; ?>><?php echo ($v["title"]); ?></a>
        		<?php if(!empty($v["child"])): ?><dl>
	        		<?php if(is_array($v["child"])): $i = 0; $__LIST__ = $v["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cv): $mod = ($i % 2 );++$i;?><dt><a href="<?php echo ($cv["url"]); ?>" <?php if(($cv["mode"]) == "2"): ?>target="_blank"<?php endif; ?>><?php echo ($cv["title"]); ?></a></dt><?php endforeach; endif; else: echo "" ;endif; ?>
        		</dl><?php endif; ?>
        	</li><?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
</div>
<script>
$(function(){
	//导航样式
	var cname="";
	$("#nav li").hover(function(){
		cname=$(this).attr("class");
		if(!cname){$(this).addClass("hover");}
		$(this).find("dl").show();
	},function(){
		$(this).find("dl").hide();
		if(!cname){$(this).removeClass("hover");}
	});
})
</script>