<?php if (!defined('THINK_PATH')) exit();?><table class="table table-striped table-bordered table-hover">
    <thead>
    <tr>
        <th width="20"><input type="checkbox" id="chkall" title="全选/取消" /></th>
        <th width="80">昵称</th>
        <th>评论内容</th>
        <th width="140">发表日期</th>
        <th width="100">IP</th>
        <th width="100">状态</th>
        <th width="100">管理</th>
    </tr>
    </thead>
    <?php if(empty($comments)): ?><tr><td colspan="7">没有资料</td></tr><?php endif; ?>
    <tbody>
    <?php if(is_array($comments)): $i = 0; $__LIST__ = $comments;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vocomment): $mod = ($i % 2 );++$i;?><tr id="tr_<?php echo ($vocomment["id"]); ?>">
            <td><input name="id" type="checkbox" value="<?php echo ($vocomment["id"]); ?>" /></td>
            <td><?php echo ($vocomment["username"]); ?></td>
            <td class="txt_left"><a href="index.php?s=/Home/List/info/id/<?php echo ($vocomment["contentid]"]); ?>" target="_blank"><?php echo ($vocomment["content"]); ?></a></td>
            <td><?php echo (date("Y-m-d H:i:s",$vocomment["createtime"])); ?></td>
            <td><?php echo ($vocomment["postip"]); ?></td>
            <td><?php if(empty($vocomment["reply"])): ?>未回复<?php else: ?>已回复<?php endif; ?>/<?php if($vocomment["islock"] == 0): ?>未审<?php else: ?>已审<?php endif; ?></td>
            <td><a href="<?php echo U('Comment/commentEdit',array('comId'=>$vocomment['id']));?>">查看/回复</a>　<a href="javascript:;" class="delete" rel="<?php echo U('Comment/delCom',array('delId'=>$vocomment['id']));?>">删除</a></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
</table>
<?php echo ($page); ?>