<?php if (!defined('THINK_PATH')) exit();?><div id="master">
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="list-loop" data-id="<?php echo ($v["id"]); ?>">
            <div class="info">
                <label><?php echo ($v["title"]); ?></label>
            </div>
            <?php if(is_array($v["newslist"])): $i = 0; $__LIST__ = $v["newslist"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vn): $mod = ($i % 2 );++$i; if(($key) == "0"): ?><div class="hover">
                        <img src="<?php echo (getattachurl($vn["pic_id"])); ?>">
                        <a href="javascript:;"><?php echo ($vn["title"]); ?></a>
                    </div>
                    <?php else: ?>
                    <div class="item">
                        <img src="<?php echo (getattachurl($vn["pic_id"])); ?>">
                        <a href="javascript:;"><?php echo ($vn["title"]); ?></a>
                    </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
            <div class="add"></div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>

<?php echo ($page); ?>