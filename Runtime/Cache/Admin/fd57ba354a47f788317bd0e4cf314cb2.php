<?php if (!defined('THINK_PATH')) exit();?><div id="master">
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="list-loop">
            <div class="info">
                <a href="javascript:;" defaultval="<?php echo ($v["title"]); ?>" class="remark" data-id="<?php echo ($v["id"]); ?>">
                    <span class="icon iconfont icon-edit1"></span> 重命名
                </a>
                <label><?php echo ($v["title"]); ?></label>
            </div>
            <?php if(is_array($v["newslist"])): $i = 0; $__LIST__ = $v["newslist"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vn): $mod = ($i % 2 );++$i; if(($key) == "0"): ?><div class="hover">
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
            <div class="admin">
                <ul>
                    <li>
                        <a href="<?php echo U('Weixin/materAdd',array('id'=>$v['id']));?>">
                            <span class="icon iconfont icon-edit"></span> 编辑
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="mater-del" data-id="<?php echo ($v["id"]); ?>">
                            <span class="icon iconfont icon-shanchu"></span> 删除
                        </a>
                    </li>
                </ul>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>

<?php echo ($page); ?>