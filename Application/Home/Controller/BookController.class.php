<?php
/**
 * 留言
 * @author Administrator
 *
 */
namespace Home\Controller;
use Home\Controller\HomeController;
class BookController extends HomeController{
	public function index(){
		$classid = I('classid');
		$pid = I('pid');
		$this->assign('seotitle',$this->config['seotitle']);
		$this->assign('seokey',$this->config['seokey']);
		$this->assign('seodesc',$this->config['seodesc']);
		$this->assign('classid',$classid);
		$this->assign('pid',$pid);
		$this->display();
	}
	public function page(){
		$pageid = I('pageNum')?I('pageNum'):1;
		$pageCount = I('pageCount')?I('pageCount'):10;
		$limit=($pageid-1)*$pageCount.','.$pageCount;
		$model = M('expandBook');
		$booklist = $model->where(array('islock'=>1,'isseen'=>1))->order('id desc')->limit($limit)->select();
		$count = $model->where(array('islock'=>1,'isseen'=>1))->count();
		$p = new \Org\Util\AjaxPage($count, $pageCount,"BookpageAjax");
		if($count>$pageCount){
			$pages=$p->show();
			$this->assign('pages',$pages);
		}
		$this->assign('booklist',$booklist);
		$this->display();
	}
	//添加留言
	public function add(){
		$redata['status'] = false;
		$redata['info'] = '提交失败';
		$config = array('reset'=>false);
		$verify = new \Think\Verify($config);
		$isVerify = $verify->check(I('post.verify'));
		if(!$isVerify){
			$redata['info'] = "验证码输入错误";
			$this->ajaxReturn($redata);
		}
		$model = D('ExpandBook');
		$data = $model->create();
		if(!$data){
			$redata['info'] = $model->getError();
			$this->ajaxReturn($redata);
		}
		$data['islock'] = $this->config['bookcheck']?'0':'1';
		if($model->add($data)){
			$redata['status'] = true;
			$redata['info'] = '提交成功';
		}
		$this->ajaxReturn($redata);
	}
}