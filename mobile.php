<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/7
 * Time: 下午5:16
 */
header("Content-Type: text/html; charset=utf-8");
// 应用入口文件
// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');
// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',true);
define('BIND_MODULE','Home');
define('DEFAULT_THEME','mobile');
define('VERSION','2.0');//版本号
// 定义应用目录
define('APP_PATH','./Application/');
define ( 'RUNTIME_PATH', './Runtime/' );

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单