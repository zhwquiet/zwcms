<?php if (!defined('THINK_PATH')) exit();?><table class="table table-striped table-bordered table-hover">
<thead>
    <tr>
        <th>区块名称</th>
        <th>区块说明</th>
        <th>更新日期</th>
        <th>管理</th>
    </tr>
</thead>
<tbody>
<?php if(!empty($list)): if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
        <td class="txt_left"><a href="aaaa"><?php echo ($v["name"]); ?></a></td>
        <td class="txt_left"><?php echo ($v["desc"]); ?></td>
        <td class="txt_left"><?php echo (date("Y-m-d H:i:s",$v["updatetime"])); ?></td>
        <td>
        	<a href="<?php echo U('Block/call',array('id'=>$v['id']));?>">调用</a>
            <a href="<?php echo U('Block/add',array('id'=>$v['id']));?>">编辑</a>
            <a href="<?php echo U('Block/delete',array('id'=>$v['id']));?>">删除</a>
        </td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
<?php else: ?>
<tr>
        <td colspan="4">没有资料</td>
    </tr><?php endif; ?>
</tbody>
</table>
<?php echo ($page); ?>