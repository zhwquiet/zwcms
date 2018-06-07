<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
class CreateController extends AdminController{
    public function _initialize(){
        parent::_initialize();
        $this->assign('method','create');

    }
	public function index(){
        $this->assign('child_method','index');
		$this->display();
	}
	public function category(){
		$this->display();
	}
	public function content(){
		$this->display();
	}
	public function all(){
        $this->assign('child_method','all');
		$this->display();
	}
}