<?php
namespace Home\Widget;
use Think\Controller;
class SearchWidget extends Controller{
	//关键词搜索
	public function index(){
		$this->theme(C('DEFAULT_THEME'))->display('Search/index');
	}
	//分类搜索
	public function cate($id){
		$catelist = M('category')->where(array('pid'=>$id))->field('id,catename')->select();
		$this->assign('catelist',$catelist);
		$this->theme(C('DEFAULT_THEME'))->display('Search/cate');
	}
}