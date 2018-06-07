<?php if (!defined('THINK_PATH')) exit();?><table class="table table-striped table-bordered table-hover">
    <thead>
    <tr>
        <th width="100">ID</th>
        <th width="100">排序</th>
        <th>关键字</th>
        <th width="130">类型</th>
        <th width="130">匹配方式</th>
        <th width="80">状态</th>
        <th width="80">操作</th>
    </tr>
    </thead>
    <tbody>
    <?php if(empty($list)): ?><tr>
            <td colspan="7">暂无资料</td>
        </tr><?php endif; ?>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr id="tr_<?php echo ($v["id"]); ?>">
            <td><?php echo ($v["id"]); ?></td>
            <td><?php echo ($v["sort"]); ?></td>
            <td class="t-left"><?php echo ($v["keyword"]); ?></td>
            <td>
                <?php if(($v["type"]) == "1"): ?>文本回复
                <?php else: ?>
                    图文素材<?php endif; ?>
            </td>
            <td>
                <?php if(($v["method_type"]) == "1"): ?>完全匹配
                    <?php else: ?>
                    模糊匹配<?php endif; ?>
            </td>
            <td>
                <?php if(($v["status"]) == "1"): ?>启用
                <?php else: ?>
                    锁定<?php endif; ?>
            </td>
            <td><a href="<?php echo U('Weixin/keywordsAdd',array('id'=>$v['id']));?>">编辑</a>&nbsp;&nbsp;&nbsp;<a href="javascript:;" class="delete" rel="<?php echo U('Weixin/keywordsDel',array('id'=>$v['id']));?>">删除</a></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
</table>
<?php echo ($page); ?>