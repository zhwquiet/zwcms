<?php if (!defined('THINK_PATH')) exit();?><table class="table table-striped table-bordered table-hover">
    <thead>
    <tr>
        <th width="20"><input type="checkbox" name="chkall" id="chkall" title="全选/取消" /></th>
        <th width="80">昵称</th>
        <th>留言内容</th>
        <th width="60">性别</th>
        <th width="100">联系电话</th>
        <th width="140">发表日期</th>
        <th width="100">IP</th>
        <th width="100">状态</th>
        <th width="100">管理</th>
    </tr>
    </thead>
    <tbody>
    <?php if(empty($bookList)): ?><tr>
            <td colspan="9">没有资料</td>
        </tr><?php endif; ?>
    <?php if(is_array($bookList)): $i = 0; $__LIST__ = $bookList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vobook): $mod = ($i % 2 );++$i;?><tr id="tr_<?php echo ($vobook["id"]); ?>">
        <td><input name="id" type="checkbox" value="<?php echo ($vobook["id"]); ?>" /></td>
        <td><?php echo ($vobook["username"]); ?></td>
        <td class="txt_left"><?php echo ($vobook["content"]); ?></td>
        <td><?php if($vobook["sex"] == 1): ?>男<?php elseif($vobook["sex"] == 2): ?>女<?php else: ?>保密<?php endif; ?></td>
        <td><?php echo ($vobook["tel"]); ?></td>
        <td><?php echo (date("Y-m-d H:i:s",$vobook["createtime"])); ?></td>
        <td><?php echo ($vobook["postip"]); ?></td>
        <td><?php if(empty($vobook["reply"])): ?>未回复<?php else: ?>已回复<?php endif; ?>/<?php if($vobook["islock"] == 1): ?>已审<?php else: ?>未审<?php endif; ?></td>
        <td><a href="<?php echo U('Book/bookEdit',array('bookId'=>$vobook['id']));?>">查看/回复</a>&nbsp;&nbsp;&nbsp;<a href="javascript:;" class="delete" rel="<?php echo U('Book/linkDel',array('delId'=>$vobook['id']));?>">删除</a></td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
</table>
<?php echo ($page); ?>