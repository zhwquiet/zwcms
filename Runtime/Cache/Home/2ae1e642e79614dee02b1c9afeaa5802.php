<?php if (!defined('THINK_PATH')) exit();?><form action="/search.html" method="post" onsubmit="return checksearch(this)">
	<input type="text" name="keyword" value="请输入关键字" onfocus="if(this.value==defaultValue)this.value=''" onblur="if(this.value=='')this.value=defaultValue" />
	<input type="submit" value="搜索" />
</form>
<script>
function checksearch(the){  
	if ($.trim(the.key.value)==''){
		alert('请输入关键字');
		the.key.focus();
		the.key.value='';
		return false
	}
	if ($.trim(the.key.value)=='请输入关键字'){
		alert('请输入关键字');
		the.key.focus();
		the.key.value='';
		return false
	}
}
</script>