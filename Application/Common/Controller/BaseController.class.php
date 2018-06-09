<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/26
 * Time: 上午11:46
 */
namespace Common\Controller;
use Think\Controller;
class BaseController extends Controller{
    public function _initialize(){
        $server = str_replace(array("/admin.php","/index.php","/mobile.php","/weixin.php",".html"), "", $_SERVER['PHP_SELF']);
        if($_SERVER['PATH_INFO']){
            $server = str_replace('/'.$_SERVER['PATH_INFO'],"",$server);
        }
        define('SERVER',$server);
        $this->assign('server',$server);
        $server = str_replace('/',"",$server);
        if($server){
            C('DB_NAME',C('DB_NAME')."_".$server);
            define('DEFAULT_LANGUAGE','english');//默认语言
        }else{
            define('DEFAULT_LANGUAGE','chinese');//默认语言
        }
    }
}