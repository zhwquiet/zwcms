<?php if (!defined('THINK_PATH')) exit();?><div class="nav_menu">
    <form id="searchForm" onsubmit="return false;">
        <input type="hidden" name="mater_id" value="<?php echo ($_GET['mater_id']); ?>"/>
        <input type="text" name="keyword" class="ip" value="" placeholder="请输入关键字"/>
        <input type="button" class="btn btn-warning btn-round" onclick="javascript:ajaxContent(1);" value="查询">
        <span class="g-right am-text-danger">提示：点选标题后按确定即可</span>
    </form>
</div>
<div id="tablelist" class="news-choose-table"></div>

<script>
    var durl = "<?php echo U('Weixin/newsList');?>";
    ajaxContent();
</script>