<?php
namespace Home\Controller;
use Home\Controller\HomeController;
class IndexController extends HomeController{
	public function index($mode=false){
		$fileName=C('HTML_PATH').'Index_index'.C('HTML_FILE_SUFFIX');
		if(C('WEBMODE') && is_file($fileName)){
			$this->display($fileName);
		}else{
			if($mode){
				$this->buildHtml('Index_index', C('HTML_PATH'), 'Index/index', 'utf8');
			}else{
				$this->assign('seotitle',$this->config['seotitle']);
				$this->assign('seokey',$this->config['seokey']);
				$this->assign('seodesc',$this->config['seodesc']);
				$this->display();
			}
		}
	}
}
