<?php
/**
 * 搜索
 * @author Administrator
 *
 */
namespace Home\Controller;
use Home\Controller\HomeController;
class SearchController extends HomeController{
	public function index(){
		$p = I('p');
		if(!empty($p)){
			$keyword = session('keyword');
		}else{
			$keyword = I('keyword');
			session('keyword',$keyword);
		}
		$this->assign('keyword',$keyword);
		$this->assign('seotitle',$this->config['seotitle']);
		$this->assign('seokey',$this->config['seokey']);
		$this->assign('seodesc',$this->config['seodesc']);
		$this->display('Search/value');
	}
	public function getcontent(){
		$classid = I('classid');
		$list = M('content')->where(array('categoryid'=>$classid))->field('id,title')->select();
		$this->ajaxReturn($list);
	}
}