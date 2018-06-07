<?php
namespace Home\Controller;
use Home\Controller\HomeController;
Vendor('tree.Tree');
class SitemapController extends HomeController{
	public function index(){
		$model = M('category');
		$menulist = $model->field('id,pid,catename,modelid,cateurl')->where(array('ismenu'=>1))->order('ordnum,id')->select();
		$menutree = new \Tree($menulist);
		$menulist = $menutree->leaf(0);
		$this->assign('menulist',$menulist);
		$this->assign('seotitle',$this->config['seotitle']);
		$this->assign('seokey',$this->config['seokey']);
		$this->assign('seodesc',$this->config['seodesc']);
		$this->display();
	}
}