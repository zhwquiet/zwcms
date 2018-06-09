<?php
//站内导航
function getpostion($classid,$mark= '>'){
	$model = M('category');
	$str = '';
	$cateinfo = $model->field('id,pid,catename')->where(array('id'=>$classid))->find();
	if($cateinfo['pid'] > 0){
		$str.= getpostion($cateinfo['pid'],$mark);
	}
	$str .= $mark.'<a href=\'index.php?s=/List/index/classid/'.$cateinfo['id'].'\'>'. $cateinfo['catename'].'</a>';
	return $str;
}
//获取内容详情链接
function getinfourl($data){
	if($data['isurl'] && !empty($data['url'])){
		return $data['url'];
	}else{
		return SERVER.'/info/'.$data['id'].'.html';
	}
}
function ismobile() {
	// 如果有HTTP_X_WAP_PROFILE则一定是移动设备
	if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
		return true;

	//此条摘自TPM智能切换模板引擎，适合TPM开发
	if(isset ($_SERVER['HTTP_CLIENT']) &&'PhoneClient'==$_SERVER['HTTP_CLIENT'])
		return true;
	//如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
	if (isset ($_SERVER['HTTP_VIA']))
		//找不到为flase,否则为true
		return stristr($_SERVER['HTTP_VIA'], 'wap') ? true : false;
	//判断手机发送的客户端标志,兼容性有待提高
	if (isset ($_SERVER['HTTP_USER_AGENT'])) {
		$clientkeywords = array(
				'nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap','mobile'
		);
		//从HTTP_USER_AGENT中查找手机浏览器的关键字
		if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
			return true;
		}
	}
	//协议法，因为有可能不准确，放到最后判断
	if (isset ($_SERVER['HTTP_ACCEPT'])) {
		// 如果只支持wml并且不支持html那一定是移动设备
		// 如果支持wml和html但是wml在html之前则是移动设备
		if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
			return true;
		}
	}
	return false;
}
/*
 * 找子孙树
* @param int  传入的id
*/
function getSubTree($id){
	$model = M('Category');
	$list = $model->where(array('pid'=>$id))->field('id,sonid')->select();
	$str .=$id.',';
	foreach($list as $v){
		$str .= $v['id'].',';
		if($v['sonid']){
			$str .= getSubTree($v['id']).',';
		}
	}
	return substr($str,0,-1);
}
