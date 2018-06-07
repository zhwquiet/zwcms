<?php if (!defined('THINK_PATH')) exit();?><div id="banner">
    <div id="switchable3" class="eui_switchable">
        <div class="sc_container">
            <ul>
                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li>
                        <a href="<?php echo ($v["url"]); ?>" <?php if(($v["mode"]) == "2"): ?>target="_blank"<?php endif; ?>>
                            <img src="<?php echo (getattachurl($v["picid"])); ?>" alt="<?php echo ($v["title"]); ?>" width="960" height="268" border="0" />
                        </a>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
</div>