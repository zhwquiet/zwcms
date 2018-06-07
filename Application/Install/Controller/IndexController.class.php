<?php
namespace Install\Controller;
use Common\Controller\CommonController;
class IndexController extends CommonController {
    public function index(){
    	$conn = mysql_connect(C('DB_HOST').':'.C('DB_PORT'),C('DB_USER'),C('DB_PWD'));
    	if(!$conn){
    		echo '数据库配置错误，请先修改配置文件';die;
    	}
    	$re = mysql_select_db(C('DB_NAME'),$conn);
    	if(!$re){
    		$path = './data/';
    		$list = scandir($path);
    		$phsqlFile = $path.$list[2];
    		if(is_file($phsqlFile)){
    			db_copy($conn, C('DB_NAME'), $phsqlFile);
    		}else{
    			echo '数据库sql文件不存在';
    		}
    	}else{
    		echo '数据库配置错误，请先修改配置文件';
    	}
    	mysql_close($conn);
    }
}