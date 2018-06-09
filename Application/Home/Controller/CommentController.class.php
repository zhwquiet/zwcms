<?php
/**
 * 评论
 * @author Administrator
 *
 */
namespace Home\Controller;
use Home\Controller\HomeController;
class CommentController extends HomeController{
	//评论页面
	public function index(){
		$id = I('id');
		$model = M();
 		$contentinfo = $model->cache(C('ISCACHE'))->table('zx_content a')->join('left join zx_view_category b on a.categoryid = b.id')->field('a.title,a.intro,b.tablename,b.id,b.pid')->where(array('a.id'=>$id))->find();
		//$info = $model->table($contentinfo['tablename'])->where(array('cid'=>$id))->find();
		$this->assign('seotitle','评论信息_'.$contentinfo['title']);
		$this->assign('id',$id);
		//$pid = $contentinfo['pid']?$contentinfo['pid']:$contentinfo['id'];
		$this->assign('classid',$contentinfo['id']);
		$this->assign('pid',$contentinfo['pid']);
		$this->assign('infourl','index.php?s=/List/info/id/'.$id);
		$this->assign('infotitle',$contentinfo['title']);
		$this->assign('infointro',$contentinfo['intro']);
		$this->assign('seotitle',$this->config['seotitle']);
		$this->assign('seokey',$this->config['seokey']);
		$this->assign('seodesc',$this->config['seodesc']);
		$this->display();
	}
	//评论表单
	public function form(){
		$this->display();
	}
	//载入评论内容
	public function load(){
		$id = I('id');
		$pageid = I('pageNum')?I('pageNum'):1;
		$ispage = I('ispage')=='false'?false:true;//是否分页
		$pageCount = I('pageCount')?I('pageCount'):10;//每页显示的条数
		$limit=($pageid-1)*$pageCount.','.$pageCount;
		$model = M('expandComment');
		$list = $model->where(array('contentid'=>$id,'isseen'=>1,'islock'=>1))->limit($limit)->order('id desc')->select();
		$count = $model->where(array('contentid'=>$id,'isseen'=>1,'islock'=>1))->count();
		$p = new \Org\Util\AjaxPage($count, $pageCount,"CommentpageAjax");
		if($count>$pageCount && $ispage){
			$pages=$p->show();
			$this->assign('pages',$pages);
		}
		$this->assign('list',$list);
		$this->assign('id',$id);
		$this->display();
	}
	//添加评论
	public function add(){
		$id = I('get.id');
		$data = I('post.');
		$redata['status'] = false;
		$redata['info'] = '发表评论失败';
		if(empty($data['content'])){
			$redata['info'] = '评论内容不能为空';
			$this->ajaxReturn($redata);
		}
		if(strlen($data['content']) < 5){
			$redata['info'] ='至少输入5个字符';
			$this->ajaxReturn($redata);
		}
		if(empty($data['username'])){
			$redata['info'] = '用户名不能为空';
			$this->ajaxReturn($redata);
		}
		$model = M();
		$model->startTrans();
		$addre = $model->table('zx_expand_comment')->add(array(
			'contentid'=>$id,
			'username'=>$data['username'],
			'content'=>$data['content'],
			'createtime'=>time(),
			'islock'=>$this->config['commentcheck']?'0':'1',
			'postip'=>get_client_ip()
		));
		$updatere = $model->execute('update zx_content set comments=comments+1 where id = '.$id);
		if($addre !==false && $updatere!==false){
			$model->commit();
			$redata['status'] = true;
			$redata['info'] = '提交成功';
		}else{
			$model->rollback();	
		}
		$this->ajaxReturn($redata);
	}
}