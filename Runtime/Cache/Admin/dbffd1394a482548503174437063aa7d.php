<?php if (!defined('THINK_PATH')) exit();?><table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th width="">编号</th>
            <th>标题</th>
        </tr>
    </thead>
    <tbody>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr data-id="<?php echo ($v["id"]); ?>">
                <td><?php echo ($v["id"]); ?></td>
                <td><?php echo ($v["title"]); ?></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
   </tbody>
</table>
<?php echo ($page); ?>