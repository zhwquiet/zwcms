<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
use Admin\Model\MemberModel;

class MemberController extends AdminController{
    public function _initialize(){
        parent::_initialize();
        $this->assign('method','member');
    }
	public function Index(){
        $this->assign('child_method','index');
		$this->display();
	}
	public function pageAjax(){
		$model=new MemberModel();
		$count=$model->getMemberCount();
		$p = new \Org\Util\AjaxPage($count, C('PageList'),"ajaxContent");
        $data=$model->getMemberInfo($p->firstRow.','.$p->listRows);
		$page=$p->show();
		$this->assign('page', $page);
		$this->assign('member',$data);
		$this->display('Member/memberList');
	}
	public function Add(){
		echo 'add';
	}
	public function Edit(){
		echo 'edit';
	}
	public function Delete(){
		echo 'delete';
	}
}