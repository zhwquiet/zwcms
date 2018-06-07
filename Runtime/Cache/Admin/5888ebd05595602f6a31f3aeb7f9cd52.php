<?php if (!defined('THINK_PATH')) exit();?><form id="searchForm" onsubmit="return false;">
    <input type="hidden" name="theme" value="materList"/>
</form>
<div id="tablelist" class="mater-choose-table"></div>

<script>
    var durl = "<?php echo U('Weixin/materAjax');?>";
    ajaxContent();
</script>