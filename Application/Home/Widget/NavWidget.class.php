<?php
namespace Home\Widget;
use Think\Controller;
Vendor('tree.Tree');
class NavWidget extends Controller{
	public function index($name){
	    $class = M('NavClass')->where(array('name'=>$name))->find();

        $list = M('Nav')->where(array('class_id'=>$class['id'],'isshow'=>1))->order('ordnum,id')->select();

        foreach ($list as $key=>$v){
            switch ($list[$key]['type']){
                case 1:
                    $list[$key]['url'] = "/list/".$v['item_id'].'.html';break;
                case 2:
                    $list[$key]['url'] = '/info/'.$v['item_id'].'.html';break;
            }
        }
		$tree = new \Tree($list);
        $list = $tree->leaf(0);
		$this->assign('list',$list);
		$play = $class['theme']?$class['theme']:'Nav/index.html';
		if(!is_file($_SERVER['DOCUMENT_ROOT'].'/Application/Home/View/'.C('DEFAULT_THEME').'/'.$play)){
            $play = 'Nav/index';
        }
        $play = str_replace('.html','',$play);
		$this->theme(C('DEFAULT_THEME'))->display($play);
	}
}