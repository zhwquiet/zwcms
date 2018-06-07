<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
class BlockController extends AdminController{
    public function _initialize(){
        parent::_initialize();
        $this->assign('method','content');
        $this->assign('child_method','block');
    }
	public function index(){
		$this->display();
	}
	public function ajaxpage(){
		$model = D('Block');
		$count = $model->count();
        $p = new \Org\Util\AjaxPage($count, C('PageList'),"ajaxContent");
		$list = $model->limit($p->firstRow,$p->listRows)->select();
        $page=$p->show();
        $this->assign('page', $page);
        $this->assign('list',$list);
		$this->display();
	}
	public function add(){
		if(IS_POST){
			$redata['success'] = false;
			$redata['msg'] = "操作失败";
			$model = D('Block');
			$data = $model->create();
			if(!$data){
				$redata['msg'] = $model->getError();
				$this->ajaxReturn($redata);
			}
			$time = time();
			if(empty($data['id'])){
				//添加
				$data['createtime'] = $time;
				$data['updatetime'] = $time;
				$re = $model->add($data);
			}else{
				//编辑
				$data['updatetime'] = $time;
				$re = $model->save($data);
			}
			if($re !== false){
				$redata['success'] = true;
				$redata['msg'] = "操作成功";
			}
			$this->ajaxReturn($redata);
		}else{
			$id = I('id');
			if(!empty($id)){
				$model = D('Block');
				$info = $model->getinfo($id);
				$this->assign('info',$info);
			}
			$this->display();
		}
	}
	public function delete(){
		$redata['success'] = false;
		$redata['msg'] = "删除失败";
		$id = I('id');
		if(!empty($id)){
			$model = D('Block');
			$re = $model->where(array('id'=>$id))->delete();
			if($re){
				$redata['success'] = true;
				$redata['msg'] = "删除成功";
			}
		}else{
			$redata['msg'] = "id不能为空";
		}
		$this->ajaxReturn($redata);
	}
	public function call(){
		$id = I('id');
		$model = D('Block');
		$info = $model->getinfo($id,'name');
		$this->assign('info',$info);
		$this->display();
	}
}