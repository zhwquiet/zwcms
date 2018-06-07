<?php if (!defined('THINK_PATH')) exit();?><ul class="source">
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li data-id="<?php echo ($v["id"]); ?>">
		<?php if(($v["fileext"]) == "pic"): ?><img width="100" height="100" src="<?php echo ($v["path"]); ?>"/>
		<?php else: ?>
			<img width="100" height="100" src="/Public/Admin/Images/ext/<?php echo ($v["fileext"]); ?>.gif"/><?php endif; ?>

		<p title="<?php echo ($v["name"]); ?>"><?php echo ($v["name"]); ?></p>


		<?php if(in_array(($v["id"]), is_array($attachstr)?$attachstr:explode(',',$attachstr))): ?><span class="info" style="display:block;"></span>
		<?php else: ?>
			<span class="del">
				<img width="100%" src="/Public/Admin/Images/del.png"/>
			</span><?php endif; ?>

		<span class="selected" data-url="<?php echo ($v["path"]); ?>">
			<img width="100%" src="/Public/Admin/Images/selected.png"/>
		</span>
	</li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
<?php echo ($page); ?>