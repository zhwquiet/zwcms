<?php if (!defined('THINK_PATH')) exit();?><form>
    <table id="treeTable1" class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th width="20"><input type="checkbox" name="chkall" onClick="checkall(this.form)" title="全选/取消" /></th>
            <th width="100">ID</th>
            <th width="100">用户名</th>
            <th width="100">IP</th>
            <th>消息</th>
            <th width="200">日期</th>
            <th width="80">状态</th>
            <th width="80">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(empty($list)): ?><tr>
                <td colspan="8">没有日志</td>
            </tr>
        <?php else: ?>
            <?php if(is_array($list)): foreach($list as $key=>$item): ?><tr class="item" id="tr_<?php echo ($item["id"]); ?>" data-id="<?php echo ($item["id"]); ?>">
                    <td><input name="id" type="checkbox" value="<?php echo ($item["id"]); ?>" /></td>
                    <td><a><?php echo ($item["id"]); ?></a></td>
                    <td><a><?php echo ($item["username"]); ?></a></td>
                    <td><?php echo ($item["loginip"]); ?></td>
                    <td><?php echo ($item["content"]); ?></td>
                    <td><?php echo (date("Y-m-d H:i:s",$item["createtime"])); ?></td>
                    <td>
                        <?php if(($item["status"]) == "1"): ?>成功
                        <?php else: ?>
                            失败<?php endif; ?>
                    </td>
                    <td>
                        <a href="javascript:;" class="delete" rel="<?php echo U('Index/logdel',array('ids'=>$item['id']));?>">删除</a>
                    </td>
                </tr><?php endforeach; endif; endif; ?>
        </tbody>
    </table>
</form>
<?php echo ($page); ?>