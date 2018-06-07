<?php if (!defined('THINK_PATH')) exit();?><div class="list-loop">
    <div class="info">
        <label><?php echo ($materInfo["title"]); ?></label>
    </div>
    <?php if(is_array($materInfo["newslist"])): $i = 0; $__LIST__ = $materInfo["newslist"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vn): $mod = ($i % 2 );++$i; if(($key) == "0"): ?><div class="hover">
                <div class="img">
                    <img src="<?php echo (getattachurl($vn["pic_id"])); ?>">
                </div>
                <a href="javascript:;"><?php echo ($vn["title"]); ?></a>
            </div>
            <?php else: ?>
            <div class="item">
                <img src="<?php echo (getattachurl($vn["pic_id"])); ?>">
                <a href="javascript:;"><?php echo ($vn["title"]); ?></a>
            </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
</div>