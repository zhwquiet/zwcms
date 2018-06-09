<?php
//获取真实的IP地址
function get_real_ip(){
    $ip=false;
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ips=explode (', ', $_SERVER['HTTP_X_FORWARDED_FOR']);
        if($ip){ array_unshift($ips, $ip); $ip=FALSE; }
        for ($i=0; $i < count($ips); $i++){
            if(!eregi ('^(10│172.16│192.168).', $ips[$i])){
                $ip=$ips[$i];
                break;
            }
        }
    }
    return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}
function deldir($dir) {
	if(!is_dir($dir)){
		return true;
	}
	//先删除目录下的文件：
	$dh=opendir($dir);
	while ($file=readdir($dh)) {
		if($file!="." && $file!="..") {
			$fullpath=$dir."/".$file;
			if(!is_dir($fullpath)) {
				unlink($fullpath);
			} else {
				deldir($fullpath);
			}
		}
	}

	closedir($dh);
	//删除当前文件夹：
	if(rmdir($dir)) {
		return true;
	} else {
		return false;
	}
}
//获取文件路径
function getattachurl($id,$default = ''){
	$arr = S('mentlist');
	$path = $arr[$id];
	if(empty($path) || !$arr){
		$arr = array();
		$model = M('attachment');
		$list = $model->field('id,path')->select();
		foreach ($list as $v){
			$arr[$v['id']] = $v['path'];
		}
		S('mentlist',$arr);
		$path = $arr[$id];
	}
	if(empty($path)){
		return $default;
	}
	return __ROOT__.$path;
}

/**
   * PHP获取字符串中英文混合长度
   * @param $str length 字符串
   * @param $str string 字符串
   * @param $$charset string 编码
   * @return 返回长度，1中文=2位，1英文=1位
   */
function strLength($str, $length, $charset='utf-8'){  
	if($charset=='utf-8'){
		$str = iconv('utf-8','gb2312',$str);
	}
	$num = strlen($str);
	return $length - $num;
}
function getPinYin($str){
	import("Org.Util.Pinyin");
	$py = new PinYin();
	return $py->getAllPY($str);
}
function loopFun($dir) {
    $r = __ROOT__?__ROOT__:'.';
    //取出文件或者文件夹
    $list = scandir($r.$dir);
    $result = array();
    foreach($list as $key=>$value){
        if (!in_array($value,array(".",".."))){
            array_push($result,array('value'=>$value));
        }
     }
     return $result;
 }
 
 //自定义字段循环输出
 function echooptions($item,$selectid){
 	if($item['fclass'] == 1){
 		if($item['fmode'] == 4){
 			echo '<input type="text" size="50" maxlength="255" class="ip" value="'.getattachurl($selectid).'" disabled/>';
            echo '<input type="hidden" name="my_'.$item['fname'].'" value="'.$selectid.'" ';
            if($item['fismust'] ==1){
            	echo 'data-rule="'.$item['falias'].':required;"';
            }
            echo '/>';
            echo '<input type="button" value="上传" id="upbtn" data-type="';
            switch ($item['fupload']){
            	case 1:echo '1';break;
            	case 2:echo '3';break;
            	case 4:echo '4';break;
            	case 3:
            	case 5:echo '2';break;
            	default:echo '4';break;
            }
            echo '" class="bnt bnt_save" />';
            if($item['fupload'] == '1'){
            	echo '<br/><img style="width:100px;height:100px;" src="'.getattachurl($selectid).'"/>';
            }
 		}else{
 			echo '<input type="text" name="my_'.$item['fname'].'" class="ip" maxlength="'.$item['flength'].'" value="'.$selectid.'" ';
 			if($item['fismust'] ==1){
 				switch ($item['frules']){
 					case 1:echo 'data-rule="'.$item['falias'].':required;"';break;
 					case 2:echo 'data-rule="'.$item['falias'].':digits;"';break;
 					case 3:echo 'data-rule="'.$item['falias'].':dot;"';break;
 					case 4:echo 'data-rule="'.$item['falias'].':tel;"';break;
 					case 5:echo 'data-rule="'.$item['falias'].':mobile;"';break;
 					case 6:echo 'data-rule="'.$item['falias'].':email;"';break;
 					case 8:echo 'data-rule="'.$item['falias'].':postcode;"';break;
 					case 9:echo 'data-rule="'.$item['falias'].':qq;"';break;
 					case 10:echo 'data-rule="'.$item['falias'].':url;"';break;
 				}
 			}
 			echo '/>';
 		}
 	}
 	if($item['fclass'] == 2){
 		echo '<textarea name="my_'.$item['fname'].'" id="my_55" class="tt n-invalid" cols="51" rows="4" maxlength="'.$item['flength'].'" ';
 		if($item['fismust'] ==1){
 			echo 'data-rule="'.$item['falias'].':required;"';
 		}
 		echo '>'.$selectid.'</textarea>';
 	}
 	
 	$options = explode(" ", $item['foptions']);
 	if($item['fclass'] == 3){
 		echo '<select name="my_'.$item['fname'].'" class="ip" ';
 		if($item['fismust'] ==1){
 			echo 'data-rule="'.$item['falias'].':required;"';
 		}
 		echo '>';
 		foreach ($options as $v){
 			$v = explode("|", $v);
 			echo '<option value="'.$v[1].'"';
 			if($v[1] == $selectid){
 				echo ' selected';
 			}
 			echo '>'.$v[0].'</option>';
 		}
 		echo '</select>';
 	}
 	if($item['fclass'] == 4){
 		foreach ($options as $v){
 			$v = explode("|", $v);
 			echo '<input type="radio" name="my_'.$item['fname'].'" value="'.$v[1].'"';
 			if($v[1] == $selectid){
 				echo ' checked';
 			}
 			echo '/>'.$v[0];
 		} 		
 	}
 	if($item['fclass'] == 5){
 		foreach ($options as $v){
 			$v = explode("|", $v);
 			echo '<input type="checkbox" name="my_'.$item['fname'].'[]" value="'.$v[1].'"';;
 			if(in_array($v[1],explode(",",$selectid))){
 				echo ' checked';
 			}
 			echo '/>'.$v[0];
 		}
 	}
 	if($item['fclass'] == 6){
 		echo '<textarea name="my_'.$item['fname'].'" id="my_'.$item['fname'].'" cols="39" rows="6" style="width:98%;">'.$selectid.'</textarea>';
 		echo '<script>';
 		echo 'if(my_'.$item['fname'].'){my_'.$item['fname'].'.destroy()} var my_'.$item['fname'].' = UE.getEditor("my_'.$item['fname'].'");';
 		echo '</script>';
 	}
 	echo '<span>'.$item['intro'].'</span>';
 }
 /**
  * 参数：
  * 字符串截取
  * $str    需要截断的字符串
  * $length   允许字符串显示的最大长度
  */
function substr_cut($str,$length){
	$num = mb_strlen($str,'utf-8');
	if($num > $length){
		$str = mb_substr($str,0,$length,'utf-8')."...";
	}
	return $str;
}
/**
 *
 * Method: https_request
 * User: menyu
 * @param $url
 * @param string $data
 * @return mixed
 */
function https_request($url,$data=''){
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,true);
    curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
    if(!empty($data)){
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);
    return $result;
}
/**
 * @return array
 * 获取access_token
 */
function get_access_token() {
    // 考虑过期问题 ,缓存access_token
    if (S('access_token')) {
        // 存在有效的access_token
        return array(
            'error'=>false,
            'access_token'=>S('access_token')
        );
    }
    $config = S('config');
    $weixinInfo = $config['weixin'];
    if(empty($weixinInfo['appsecret'])){
        $redata['error'] = true;
        $redata['msg'] = '请先填写应用密钥';
        return $redata;
    }
    // 目标URL：
    $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$weixinInfo['appid']}&secret={$weixinInfo['appsecret']}";
    //向该URL，发送GET请求
    $result = https_request($url);
    if (!$result) {
        $redata['error'] = true;
        $redata['msg'] = '获取token失败';
        return $redata;
    }
    // 存在返回响应结果
    $result_obj = json_decode($result);
    // 写入
    S('access_token', $result_obj->access_token,3600);
    return array(
        'error'=>false,
        'access_token'=>$result_obj->access_token
    );
}
/**
 * [createRandomCode description]
 * @method   createRandomCode
 * @Author   menyu
 * @DateTime 2016-11-28T15:51:49+0800
 * @param    [type]                   $length [description]
 * @return   [type]                           [description]
 */
function createRandomCode($length) {
    $randomCode = "";
    $randomChars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    for ($i = 0; $i < $length; $i++) {
        $randomCode .= $randomChars{mt_rand(0, 35)};
    }
    return $randomCode;
}