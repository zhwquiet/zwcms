<?php if (!defined('THINK_PATH')) exit();?><table class="table table-striped table-bordered table-hover">
<thead>
    <tr>
        <th>用户名</th>
        <th>性别</th>
        <th>注册日期</th>
        <th>注册邮箱</th>
        <th>注册手机号</th>
        <th>住址</th>
        <th>最后登录日期</th>
        <th>最后登录ip</th>
        <!--<th>管理</th>-->
    </tr>
</thead>
<tbody>
<?php if(empty($member)): ?><tr>
        <td colspan="8">没有资料</td>
    </tr><?php endif; ?>
<?php if(is_array($member)): $i = 0; $__LIST__ = $member;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
        <td class="txt_left"><?php echo ($vo["username"]); ?></td>
        <td class="txt_left"><?php if($vo["sex"] == 0): ?>男<?php elseif($vo["sex"] == 1): ?>女<?php else: ?>未知<?php endif; ?></td>
        <td class="txt_left"><?php echo (date("Y-m-d H:i:s",$vo["regtime"])); ?></td>
        <td class="txt_left"><?php echo ($vo["email"]); ?></td>
        <td class="txt_left"><?php echo ($vo["telephone"]); ?></td>
        <td class="txt_left"><?php if($vo["prov"] == $vo['city']): echo ($vo["city"]); echo ($vo["dist"]); else: echo ($vo["prov"]); echo ($vo["city"]); echo ($vo["dist"]); endif; ?></td>
        <td class="txt_left"><?php echo (date("Y-m-d H:i:s",$vo["lastlogintime"])); ?></td>
        <td class="txt_left"><?php echo ($vo["lastloginip"]); ?></td>
        <!--<td><a href="bbbb">cc</a>　-->
            <!--<a href="<?php echo U('Member/Edit');?>">编辑</a>　-->
            <!--<a href="javascript:;" class="del" rel="<?php echo U('Member/Delete');?>">删除</a>-->
        <!--</td>-->
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</tbody>
</table>
<?php echo ($page); ?>