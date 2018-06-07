<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
class AttachmentController extends AdminController{
    public function _initialize(){
        parent::_initialize();
        $this->assign('method','content');
        $this->assign('child_method','attachment');
    }
	public function index(){
		$attachstr = $this->attachisuse();
		S('attachstr',$attachstr);
		$this->display();
	}
	public function ajaxpage(){
		$pageRows=I('pageRows')?I('pageRows'):32;
		$model = M('attachment');
		$count = $model->count();
        $p = new \Org\Util\AjaxPage($count, $pageRows,"ajaxContent");
		$list = $model->field('id,name,path,fileext')->limit($p->firstRow,$p->listRows)->select();
		foreach ($list as $key=>$v){
			$list[$key]['fileext'] = $this->returnext($v['fileext']);
		}

		$page=$p->show();
		$this->assign('page', $page);
		$this->assign('list', $list);
		$this->assign('attachstr',S('attachstr'));
		$this->display();
	}
	//计算文件是否使用
	public function attachisuse(){
		$attachlist = array();
		$model = M();
		$list = M('Category')->field('catepicid pic')->select();
		if($list){
			$attachlist = array_merge($attachlist,$list);
		}		
		$list = M('Content')->field('picid pic')->where(array('ispic'=>1))->select();
		if($list){
			$attachlist = array_merge($attachlist,$list);
		}
		$list = M('ExpandLink')->field('weblogoid pic')->where(array('islogo'=>1))->select();
		if($list){
			$attachlist = array_merge($attachlist,$list);
		}		
		$list = M('ModelPro')->field('piclist pic')->select();
		if($list){
			$attachlist = array_merge($attachlist,$list);
		}		
		$list= M('ModelVideo')->field('videoid pic')->select();
		if($list){
			$attachlist = array_merge($attachlist,$list);
		}	
		$modellist = M('ModelField')->alias('a')->join('left join '.C('DB_PREFIX').'model b on a.modelid=b.id')->field('a.fname,b.tablename')->where(array('a.fmode'=>4))->select();

		foreach ($modellist as $v){
			$list = $model->table($v['tablename'])->field('my_'.$v['fname'].' pic')->select();
			if($list){
			$attachlist = array_merge($attachlist,$list);
			}
		}
        $attachlist = array_column($attachlist,'pic');
        $attachlist = array_unique($attachlist);
        $attachlist = array_diff($attachlist, array('0'));
        $attachstr = implode(",",$attachlist);
		return $attachstr;
	}
	public function del(){
		$id = I('id');
		$model = M('attachment');
		$path = $model->where(array('id'=>$id))->getField('path');
		$delRe = M('attachment')->where(array('id'=>$id))->delete();
		unlink('.'.$path);
		if($delRe !== false){
			$data['success'] = true;
			$data['msg'] = '删除成功';
		}else{
			$data['success'] = false;
			$data['msg'] = '删除失败';
		}
		$this->ajaxReturn($data);
	}
	//一键清理
	public function fastdel(){
		$attachstr = S('attachstr');
		$map['id'] = array('not in',$attachstr);
		$model = M('attachment');
		$patharr = $model->where($map)->field('path')->select();
		$delRe = $model->where($map)->delete();
		foreach ($patharr as $v){
			unlink('.'.$v['path']);
		}
		if($delRe !== false){
			$data['success'] = true;
			$data['msg'] = '删除成功';
		}else{
			$data['success'] = false;
			$data['msg'] = '删除失败';
		}
		$this->ajaxReturn($data);
	}
}