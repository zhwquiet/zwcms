<?php if (!defined('THINK_PATH')) exit();?><form>
    <table id="treeTable1" class="table table-striped table-bordered table-hover">
      <thead>
      <tr>
            <?php if($islock == -1 or !empty($cateid)): ?><th width="20"><input type="checkbox" name="chkall" onClick="checkall(this.form)" title="全选/取消" /></th><?php endif; ?>
            <?php if(($islock) != "-1"): ?><th width="60">排序</th><?php endif; ?>
            <th>标题</th>
            <th width="100">栏目</th>
            <th width="50">人气</th>
            <th width="50">缩图</th>
            <th width="50">发布</th>
            <th width="50">推荐</th>
            <th width="50">置顶</th>
            <th width="50">评论</th>
            <th width="50">外链</th>
            <th width="80">管理</th>
        </tr>
        </thead>
        <tbody>
        <?php if(empty($list)): ?><tr>
                <td colspan="13">没有资料</td>
            </tr>
         <?php else: ?>
         <?php if(is_array($list)): foreach($list as $key=>$item): ?><tr class="item" data-id="<?php echo ($item["id"]); ?>" modelid="<?php echo ($item["modelid"]); ?>">
            <?php if($islock == -1 or !empty($cateid)): ?><td><input name="id" type="checkbox" value="<?php echo ($item["id"]); ?>" /></td><?php endif; ?>
            <?php if(($islock) != "-1"): ?><td><input class="ord_input" type="text" value="<?php echo ($item["ordnum"]); ?>" maxlength="9" onkeyup="checkInt(this)"></td><?php endif; ?>
            <td><a><?php echo ($item["title"]); ?></a></td>
            <td><a><?php echo ($item["catename"]); ?></a></td>
            <td><?php echo ($item["hits"]); ?></td>
            <td><?php if(($item['ispic']) == "0"): ?><span>否</span><?php else: ?>是<?php endif; ?></td>
            <td><?php if(($item['islock']) == "0"): ?><span>否</span><?php else: ?>是<?php endif; ?></td>
            <td><?php if(($item['isnice']) == "0"): ?><span>否</span><?php else: ?>是<?php endif; ?></td>
            <td><?php if(($item['ontop']) == "0"): ?><span>否</span><?php else: ?>是<?php endif; ?></td>
            <td><?php if(($item['iscomment']) == "0"): ?><span>禁止</span><?php else: ?>是<?php endif; ?></td>
            <td><?php if(($item['isurl']) == "0"): ?><span>否</span><?php else: ?>是<?php endif; ?></td>
            <td>
            <?php if(($islock) == "-1"): ?><a href="javaScript:void(0)" class="contentrecover">恢复</a>
            <a href="javaScript:void(0)" class="contentdelete">删除</a>
            <?php else: ?>
            <a href="<?php echo U('Content/edit',array('id'=>$item['id']));?>">编辑</a>
            <a href="javaScript:void(0)" class="delete" rel="<?php echo U('Content/delete',array('ids'=>$item['id']));?>">删除</a><?php endif; ?>
            </td>
            </tr><?php endforeach; endif; ?>
            <?php if(($islock) != "-1"): ?><tr class="table_bottom">
                <td colspan="13"><a class="save_btn_sort" data-url="<?php echo U('Content/reSort');?>">保存排序</a></td>
            </tr><?php endif; endif; ?>
        </tbody>
    </table>
</form>
<?php echo ($page); ?>