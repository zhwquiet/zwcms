<?php if (!defined('THINK_PATH')) exit(); if(!empty($_SESSION['memberId'])): ?><a>您好：<span><?php echo (session('memberName')); ?></span></a>	|	<a href="/login_quit.html">退出</a>
<?php else: ?>
<a href="/login.html">登录</a>	|	<a href="/register.html">注册</a><?php endif; ?>