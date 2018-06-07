<?php if (!defined('THINK_PATH')) exit();?><ul class="templist">
    <li class="tips"><span>提示：</span>模板选择请谨慎操作</li>
    <?php if(is_array($list)): foreach($list as $key=>$item): ?><li class="list_item" attr_item="<?php echo ($item["value"]); ?>">
            <span></span>
            <a href="javaScript:void(0)"><?php echo ($item["value"]); ?></a>
        </li><?php endforeach; endif; ?>
</ul>