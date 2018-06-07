<?php if (!defined('THINK_PATH')) exit();?><table class="table table-striped table-bordered table-hover">
<thead>
<tr>
    <th width="20">
        <input type="checkbox" id="chkall" title="全选/取消" />
    </th>
    <th>网站名称</th>
    <th width="130">所属类别</th>
    <th width="80">链接类型</th>
    <th width="80">是否审核</th>
    <th width="80">管理</th>
</tr>
</thead>
<tbody>
<?php if(empty($link)): ?><tr>
        <td colspan="6">没有资料</td>
    </tr><?php endif; ?>
<?php if(is_array($link)): $i = 0; $__LIST__ = $link;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$volink): $mod = ($i % 2 );++$i;?><tr id="tr_<?php echo ($volink["id"]); ?>">
    <td><input name="id" type="checkbox" value="<?php echo ($volink["id"]); ?>" /></td>
    <td class="txt_left"><a href="<?php echo ($volink["weburl"]); ?>" target="_blank"><?php echo ($volink["webname"]); ?></a></td>
    <td>
        <?php if($volink["classid"] > 0): ?><a href="#"><?php echo ($linkclass[$volink['classid']]); ?>(<?php echo ($volink["classid"]); ?>)</a><?php endif; ?>
    </td>
    <td><?php if($volink["islogo"] == 0): ?><span>文字链接</span><?php else: ?><span>图片链接</span><?php endif; ?></td>
    <td><?php if($volink["islock"] == 0): ?><span>未审</span><?php else: ?><span>已审</span><?php endif; ?></td>
    <td><a href="<?php echo U('Expand/linkAdd',array('linkId'=>$volink['id']));?>">编辑</a>&nbsp;&nbsp;&nbsp;<a href="javascript:;" class="delete" rel="<?php echo U('Expand/linkDel',array('delId'=>$volink['id']));?>">删除</a></td>
</tr><?php endforeach; endif; else: echo "" ;endif; ?>
</tbody>
</table>
<?php echo ($page); ?>