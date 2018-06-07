<?php
namespace Home\Controller;
use Common\Controller\BaseController;
Vendor('GetMac.getmac');
class HomeController extends BaseController{
	public $config;
	public function _initialize(){
	    parent::_initialize();
		$model = M('config');
		$config = S('config');
		if(!$config){
			$data = $model->select();
			foreach ($data as $v){
				$config[$v['setkey']] = $v['setvalue'];
			}
			S('config',$config);
		}
		$this->config = $config;
// 		$is_allow = $this->allow(C('VERIFY_CODE'));
// 		if(!$is_allow){
// 			die('服务器未授权!');
// 		}

        //设置模板主题
        $theme = I('theme')?I('theme'):DEFAULT_THEME;
        C('DEFAULT_THEME',DEFAULT_LANGUAGE.'/'.$theme);

		//是否开启评论
		$this->assign('syscomment',$config['commentopen']);
		define('WEBNAME', $config['webname']);
		
		$weburl = 'http://'.$_SERVER['HTTP_HOST'];
		if($_SERVER['SERVER_PORT'] != '80'){
			$weburl .= ':'.$_SERVER['SERVER_PORT'];
		}
		define('WEBURL',$weburl.'/');
		
		//运行模式   0:伪静态    1:静态
		C('WEBMODE',$config['webmode']);
		//页面压缩
		C('OUTPUT_ENCODE',$config['isgzip']);
		//是否开启数据缓存
		C('ISCACHE',$config['iscache']?true.','.$config['cachedate']:false);
		//模板缓存
		C('TMPL_CACHE_ON',$config['tempcache']);
		//生成目录
		C('HTML_PATH',$config['htmldir']);
	}
	
	function allow($verify){
		if(strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'){
			$filepath = 'C:/Windows/Temp/common.inc.tmp';
			$sys = 'win';
		}else{
			$filepath = '/tmp/common.inc.tmp';
			$sys = 'linux';
		}
		$obj = new \GetmacAddr($sys);
		$mac = $obj->macAddr;
		if(file_exists($filepath)){
	    	$updatetime = filectime($filepath);
	    	$filedata = file_get_contents($filepath);
	    	$filedata = explode(" ",$filedata);
	    	if($filedata[0] != md5($mac)){
	    		return false;
	    	}
	    	if($filedata[1] != md5($updatetime)){
	    		return false;
	    	}
	    	if($filedata[2] != md5($verify)){
	    		return false;
	    	}
	    	return true;
		}else{
			$sever1 = '124.128.23.178:3307';
			$sever2 = '58.56.76.188:3307';
			$username = 'op';
			$password = '<>zxcms,.@#moon123';
			$con1 = mysql_connect($sever1,$username,$password);
			if($con1){
				$sever = $sever1;
				mysql_close($con1);
			}else{
				$con2 = mysql_connect($sever2,$username,$password);
				if($con2){
					$sever = $sever2;
					mysql_close($con2);
				}else{
					return false;
				}
			}
			$conn = 'mysqli://'.$username.':'.$password.'@'.$sever.'/verify';
			$model = M('verifyCode','zx_',$conn);
			$result = $model->where(array('code'=>$verify))->find();
			if(empty($result)){
				return false;
			}
			if($result['status'] == 1 && $result['mac'] != $mac){
				echo 'aaaa';
				return false;
			}
			$file = fopen($filepath,'w');
			$createtime = filectime($filepath);
			$model->where(array('code'=>$verify))->save(array('status'=>1,time=>$createtime,'mac'=>$mac));
			fwrite($file, md5($mac).' ');
			fwrite($file, md5($createtime).' ');
			fwrite($file, md5($verify));
			fclose($file);
			return true;
		}
	}
}