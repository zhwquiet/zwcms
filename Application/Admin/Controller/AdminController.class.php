<?php
namespace Admin\Controller;
use Common\Controller\BaseController;
Vendor('tree.Tree');
class AdminController extends BaseController{
	public $config;
	public function _initialize(){
	    parent::_initialize();
		$uid = session('uid');
		if(empty($uid)){
			$this->redirect('Login/index');
		}
        $this->config = S(SERVER.'config');
		if(empty($this->config)){
			$data = M('config')->select();
            foreach ($data as $v) {
                $this->config[$v['setname']][$v['setkey']] = $v['setvalue'];
			}
			S(SERVER.'config',$this->config);
		}
        $menulist = S(SERVER.'menulist'.$uid);
        if(empty($menulist)){
			$groupid = M('Admin')->where(array('id'=>$uid))->getField('groupid');
			$pagelever = M('AdminGroup')->where(array('id'=>$groupid))->getField('pagelever');
			if(!empty($pagelever)){
			    $map['id'] = array('in',$pagelever);
                $menuarr = M('AdminMenu')->where($map)->order('ordnum')->select();
                $menutree = new \Tree($menuarr);
                $menulist = $menutree->leaf(0);
			}else{
                $menulist = null;
			}
			S(SERVER.'menulist'.$uid,$menulist);
		}

		$this->assign('menulist',$menulist);
	}
	public function returnext($ext){
		switch ($ext){
			case "jpg":
			case "gif":
			case "jpeg":
			case "png":$t1="pic";break;
			case "docx":$t1="doc";break;
			case "xlsx":$t1="xls";break;
			case "pptx":$t1="ppt";break;
			case "rar":
			case "zip":
			case "7z":$t1="rar";break;
			case "ppt":
			case "xls":
			case "doc":
			case "pdf":
			case "txt":
			case "flv":
			case "swf":$t1=$ext;break;
			default :$t1="blank";break;
		}
		return $t1;
	}
	public function getmemutree($type=1,$where=''){
		if($type == 1){
			$data = array();
		}else{
			$data = array(
					array('id'=>'0',
							'pId'=>'0',
							'name'=>'作为一级栏目',
							'open'=>true
					)
			);
		}
		$menuList = M('ViewCategory')->field('id,pid,catename,sonid')->where($where)->select();
		foreach ($menuList as $key => $value) {
			$item = array('id' => $value['id'], 'pId' => $value['pid'], 'name' => $value['catename'], 'open' => true);
			if (empty($value['sonid'])) {
				unset($item['open']);
			}
			array_push($data, $item);
		}
		return json_encode($data);
	}
	public function lasturl(){

        $url = str_replace($_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'], "", $_SERVER['HTTP_REFERER']);
        $url = str_replace("&isprevpage=1","",$url);
        $arr = explode("/",$url);

        return array(
            'url'=>$url,
            'c'=>$arr[2]
        );
    }
}