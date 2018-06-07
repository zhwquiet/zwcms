<?php
function db_copy($db,$db_name,$sqlPath,$type=true){
	//创建数据库
	if($type){
		mysql_query("CREATE DATABASE ".$db_name." DEFAULT CHARACTER SET utf8",$db);
	}
	//选择应用数据库
	mysql_select_db($db_name, $db);
	mysql_query("set names utf8");
	//读取SQL文件
	$sql = file_get_contents($sqlPath);
	$sql = str_replace("\r", "\n", $sql);
	$sql = explode(";\n", $sql);
	//开始执行sql语句

	foreach ($sql as $value) {
		$value = trim($value);
		if(empty($value)) continue;
		if(substr($value, 0, 12) == 'CREATE TABLE') {
			$name = preg_replace("/^CREATE TABLE `(\w+)` .*/s", "\\1", $value);
			if(mysql_query($value)==false){
				session('error', true);
			}
		} else {
			mysql_query($value);
		}
	}
}