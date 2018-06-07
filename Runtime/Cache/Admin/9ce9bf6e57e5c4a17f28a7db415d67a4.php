<?php if (!defined('THINK_PATH')) exit();?><table class="table table-striped table-bordered table-hover">
<thead>
    <tr>
        <th width="60">ID</th>
        <th width="80">排序</th>
        <th>类别名称</th>
        <th width="80">管理</th>
    </tr>
</thead>
<tbody>
<?php if(empty($cate)): ?><tr>
            <td colspan="6">没有资料</td>
        </tr><?php endif; ?>
    <?php if(is_array($cate)): $i = 0; $__LIST__ = $cate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vocate): $mod = ($i % 2 );++$i;?><tr id="cate_<?php echo ($vocate["classid"]); ?>" class="item" data-id="<?php echo ($vocate["classid"]); ?>">
        <td><?php echo ($vocate["classid"]); ?></td>
        <td>
            <input type="text" value="<?php echo ($vocate["ordnum"]); ?>" size="4" maxlength="4" class="ord_input" onkeyup="checkInt(this)" data-rule="排序:required;digit" >
        </td>
        <td class="txt_left"><?php echo ($vocate["classname"]); ?></td>
        <td>
            <a href="<?php echo U('Expand/classAdd',array('cateId'=>$vocate['classid']));?>">编辑</a>
            <a href="javascript:;" class="delete" rel="<?php echo U('Expand/cateDel',array('delId'=>$vocate['classid']));?>">删除</a>
        </td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    <?php if(!empty($cate)): ?><tr class="table_bottom">
        <td colspan="6">
            <a class="save_btn_sort" data-url="<?php echo U('Expand/classOrder');?>">保存排序</a>
        </td>
    </tr><?php endif; ?>
</tbody>
</table>
<?php echo ($page); ?>