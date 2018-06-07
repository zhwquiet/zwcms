<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
class ContentController extends AdminController{
    public function _initialize(){
        parent::_initialize();
        $this->assign('method','content');
    }
	public function index(){
        $this->assign('child_method','index');
		$this->assign('cateid',I('cateid'));
		$this->display();
	}

	public function pageajax(){
		$cateid = I('cateid');
		if(!empty($cateid)){
			$this->assign('cateid',$cateid);
			$where['a.categoryid'] = $cateid;
		}
		if(I('islock') !== ''){
			$where['a.islock'] = I('islock');
		}else{
			$where['a.islock'] = array('neq','-1');
		}
		$keyword = I('keyword');
		if(!empty($keyword)){
			$where['a.title'] = array('like','%'.$keyword.'%');
		}
		$nature = I('nature');
        switch ($nature){
            case 1:
                $where['a.ispic'] = 1;break;
            case 2:
                $where['a.ispic'] = 0;break;
            case 3:
                $where['a.isnice'] = 1;break;
            case 4:
                $where['a.isnice'] = 0;break;
            case 5:
                $where['a.ontop'] = 1;break;
            case 6:
                $where['a.ontop'] = 0;break;
            case 7:
                $where['a.iscomment'] = 1;break;
            case 8:
                $where['a.iscomment'] = 0;break;
            case 9:
                $where['a.isurl'] = 1;break;
        }
        $order = I('order');
        switch ($order){
            case 1:
                $order = 'hits asc';break;
            case 2:
                $order = 'hits desc';break;
            case 3:
                $order = 'createtime asc';break;
            case 4:
                $order = 'createtime desc';break;
            case 5:
                $order = 'comments asc';break;
            case 6:
                $order = 'comments desc';break;
            default:
                $order = 'id desc';break;
        }
		$count = M('Content')->alias('a')->join('left join '.C('DB_PREFIX').'category b on a.categoryid = b.id')->where($where)->count();
        $p = new \Org\Util\AjaxPage($count, C('PageList'),"ajaxContent");
		$list = M('Content')->alias('a')->join('left join '.C('DB_PREFIX').'category b on a.categoryid = b.id')->field('a.*,b.catename,b.modelid')->where($where)->order($order)->limit($p->firstRow,$p->listRows)->select();
		$page=$p->show();
		$this->assign('page', $page);
		$this->assign('list', $list);
		$this->assign('islock',I('islock'));
		$this->display();
	}
	//保存排序
	public function reSort(){
		$orderNum = I('orderNum');
        $redata['success'] = false;
		$redata['msg'] = '保存失败';

        $sql = "UPDATE ".C('DB_PREFIX')."content SET ordnum = CASE id ";
        foreach ($orderNum as $val) {
            $sql .= sprintf("WHEN %d THEN %d ", $val['id'], $val['orderNum']);
        }
        $sql .= "END WHERE id IN (".implode(",",array_column($orderNum,'id')).");";
        $flags=M()->execute($sql);

		if ($flags) {
            $redata['success'] = true;
            $redata['msg'] = '保存成功';
		}
		$this->ajaxReturn($redata);
	}
	//回收站
	public function recycle(){
        $this->assign('child_method','recycle');
		$this->display();
	}
	//恢复
	public function recover(){
		$ids = I('ids');
		$model = M('content');
		$where['islock'] = -1;
        $redata['success'] = false;
		if(!empty($ids)){
			$where['id'] = array('in',$ids);
		}else{
            $redata['msg'] = '至少选择一个';
			$this->ajaxReturn($redata);
		}
		$re = $model->where($where)->save(array('islock'=>1));
		if($re !== false){
            $redata['success'] = true;
            $redata['msg'] = '恢复成功';
		}else{
            $redata['msg'] = '恢复失败';
		}
		$this->ajaxReturn($redata);
	}
	//彻底删除
	public function suredel(){
		$ids = I('ids');
        $redata['success'] = false;
		$where['a.islock'] = -1;
		if(!empty($ids)){
			$where['a.id'] = array('in',$ids);
		}else{
            $redata['msg'] = '至少选择一个';
			$this->ajaxReturn($redata);
		}
		$list = M('Content')->alias('a')->join('left join '.C('DB_PREFIX').'view_category b on a.categoryid = b.id')->field('a.id,b.tablename')->where($where)->select();
        $model = M();
		$model->startTrans();
		$modelRe = true;
		foreach ($list as $v){
			try {
				$model->table($v['tablename'])->where(array('cid'=>$v['id']))->delete();
			} catch (Exception $e) {
				$modelRe = false;
				break;
			}
		}
		$map['islock'] = -1;
		$map['id'] = array('in',$ids);
		$contentRe = M('Content')->where($map)->delete();
		if($modelRe && $contentRe){
			$model->commit();
            $redata['success'] = true;
            $redata['msg'] = '彻底删除成功';
		}else{
			$model->rollback();
            $redata['msg'] = '彻底删除失败';
		}
		$this->ajaxReturn($redata);
	}
	/**
	 * 内容管理--添加
	 */
	public function add(){
		$cateid = I('cateid');
		$temp = M('Category')->alias('a')->join(C('DB_PREFIX').'model b on a.modelid = b.id')->where(array('a.id'=>$cateid))->field('a.catename,a.modelid,b.admin_edit_temp')->find();
		//模型实例
		$modelList = M('ModelField')->where(array('modelid'=>$temp['modelid']))->order('ordnum')->select();
		$contentinfo['categoryid'] = $cateid;
		$this->assign('contentinfo',$contentinfo);
		$this->assign('catename',$temp['catename']);
		$this->assign('modelList',$modelList);
		$referer = $this->lasturl();
		$this->assign('referer',$referer);
        $this->assign('method',strtolower($referer['c']));
        $this->assign('child_method','index');
		$this->display(explode('.',$temp['admin_edit_temp'])[0]);
	}
	/**
	 * 内容管理--编辑
	 */
	public function edit(){
		$id = I('id');
		$contentinfo = M('Content')->alias('a')->join('left join '.C('DB_PREFIX').'category b on a.categoryid=b.id')->where(array('a.id'=>$id))->field('a.*,b.catename,b.modelid')->find();
		$this->assign('catename',$contentinfo['catename']);
		$this->assign('contentinfo',$contentinfo);
        $referer = $this->lasturl();
        $this->assign('referer',$referer);
        $this->assign('method',strtolower($referer['c']));
        $this->assign('child_method','index');
		if($contentinfo['isurl']){
			$this->display('publishurl');
			exit;
		}
		$style = explode(";",$contentinfo['style']);
		array_pop($style);
		$stylearr = array();
		foreach ($style as $v){
			$v = explode(":", $v);
			$stylearr[$v[0]] = $v[1];
		}
		$this->assign('stylearr',$stylearr);

		//模型详情
		$moedelinfo = M('Model')->where(array('id'=>$contentinfo['modelid']))->find();
		$pcontent = M()->table($moedelinfo['tablename'])->where(array('cid' => $id))->find();
		//模型实例
		$modelList = M('ModelField')->where(array('modelid'=>$contentinfo['modelid']))->order('ordnum')->select();
		if($contentinfo['modelid'] == 2 && !empty($pcontent['piclist'])){
			$this->assign('piclist',explode(",",$pcontent['piclist']));
		}
		$this->assign('data',$pcontent);
		$this->assign('modelList',$modelList);
		$this->display(explode('.',$moedelinfo['admin_edit_temp'])[0]);
	}
	/**
	 * 内容管理--删除到回收站
	 */
	public function delete(){
		$ids = I('ids');
        $redata['success'] = false;
		if(!empty($ids)){
			$where['id'] = array('in',$ids);
		}else{
            $redata['msg'] = '至少选择一个';
			$this->ajaxReturn($redata);
		}
		$contentRe = M('content')->where($where)->save(array('islock'=>-1));
		if($contentRe){
            $redata['success'] = true;
            $redata['msg'] = '删除成功';
		}else{
            $redata['msg'] = '删除失败';
		}
		$this->ajaxReturn($redata);
	}

	//保存、修改单页
	public function savemodelpage(){
		$data = I('post.');
		$model = M('modelPage');
		if(!empty($data['id'])){
			$re = $model->save($data);
		}else{
			$re = $model->add($data);
		}
		if($re !== false){
			$redata['success'] = true;
			$redata['msg'] = '保存成功';
		}else{
			$redata['success'] = false;
			$redata['msg'] = '保存失败';
		}
		$this->ajaxReturn($redata);
	}
	//栏目内容保存
	public function savemodelcontent(){
		$data = I('post.');
		$data['style'] = $data['c0'].$data['c1'];
		if(!empty($data['s2'])){
			$data['style'] .= 'font-color:'.$data['s2'].';';
		}
		unset($data['c0']);
		unset($data['c1']);
		unset($data['s2']);
		if($data['picid']){
			$data['ispic'] = 1;
		}else{
			$data['picid'] = 0;
			$data['ispic'] = 0;
		}
		$data['islock'] = !empty($data['islock'])?$data['islock']:0;
		$data['isnice'] = !empty($data['isnice'])?$data['isnice']:0;
		$data['ontop'] = !empty($data['ontop'])?$data['ontop']:0;
		$data['iscomment'] = !empty($data['iscomment'])?$data['iscomment']:0;
		$modeldata = array(
			'content'=>$data['content']
		);
		unset($data['content']);
		$cateinfo = M('Category')->alias('a')->join('left join '.C('DB_PREFIX').'model b on a.modelid=b.id')->where(array('a.id'=>$data['categoryid']))->field('a.modelid,b.tablename')->find();
		
		$fieldlist = M('ModelField')->where(array('modelid'=>$cateinfo['modelid']))->select();
		foreach ($fieldlist as $v){
			$temp = $data['my_'.$v['fname']];
			if(is_array($temp)){
				$temp = implode(",",$temp);
			}
			if($v['fistrim']){
				$temp = trim($temp);
			}
			if(empty($temp) && $v['fdefault']){
				$temp = $v['fdefault'];
			}
			if(!empty($temp)){
				$modeldata['my_'.$v['fname']] = $temp;
			}
			unset($data['my_'.$v['fname']]);
		}
		if($cateinfo['modelid'] == 2){
			//产品模型
			$piclist = '';
			if(!empty($data['picarr'])){
                $piclist = implode(",",$data['picarr']);
			}
			$modeldata['prono'] = $data['prono'];
			$modeldata['promode'] = $data['promode'];
            $modeldata['proprice'] = $data['proprice'];
			$modeldata['piclist'] = $piclist;
			$modeldata['introduction'] = $data['intro'];
			unset($data['prono']);
			unset($data['promode']);
			unset($data['picarr']);
            unset($data['proprice']);
		}
		if($cateinfo['modelid'] == 3){
			//招聘模型
			$modeldata['neednum'] = $data['neednum'];
			$modeldata['workspace'] = $data['workspace'];
			$modeldata['workduty'] = $data['workduty'];
			unset($data['neednum']);
			unset($data['workspace']);
			unset($data['workduty']);
		}
		if($cateinfo['modelid'] == 4){
			//视频模型
			$modeldata['videoid'] = $data['videoid'];
			unset($data['videoid']);
		}
        $model = M();
		$model->startTrans();
		if(!empty($data['id'])){
			//修改
			$data['lastuptime'] = time();
			$contentRe = M('Content')->save($data);
			$modeltableRe  = $model->table($cateinfo['tablename'])->where(array('cid'=>$data['id']))->save($modeldata);
		}else{
			//添加
			unset($data['id']);
			$data['createtime'] = time();
			$data['comments'] = 0;
			$contentRe = M('Content')->add($data);
			$modeldata['cid'] = $contentRe;
			$modeltableRe = $model->table($cateinfo['tablename'])->add($modeldata);
		}
		if($contentRe !== false && $modeltableRe !== false){
			$model->commit();
			$redata['success'] = true;
			$redata['msg'] = '保存成功';
		}else{
			$model->rollback();
			$redata['success'] = false;
			$redata['msg'] = '保存失败';
		}
		$this->ajaxReturn($redata);
	}
    /**
     * 内容管理--发布外链
     */
    public function publishurl(){
        $cateid = I('cateid');
        $referer = $this->lasturl();
        $this->assign('referer',$referer);
        $this->assign('method',strtolower($referer['c']));
        $this->assign('child_method','index');
        $contentinfo['categoryid'] = $cateid;
        $this->assign('contentinfo',$contentinfo);
        $this->assign('cateid',$cateid);
        $this->display();
    }
	public function savemodelurl(){
		$data = I('post.');
		$data['isurl'] = 1;
		$data['style'] = $data['c0'].$data['c1'];
		if(!empty($data['s2'])){
			$data['style'] .= 'font-color:'.$data['s2'].';';
		}
		unset($data['c0']);
		unset($data['c1']);
		unset($data['s2']);
		$data['islock'] = !empty($data['islock'])?$data['islock']:0;
		$data['isnice'] = !empty($data['isnice'])?$data['isnice']:0;
		$data['ontop'] = !empty($data['ontop'])?$data['ontop']:0;
		$data['iscomment'] = !empty($data['iscomment'])?$data['iscomment']:0;
		if(!empty($data['picid'])){
			$data['ispic'] = 1;
		}
		if(!empty($data['id'])){
			$data['lastuptime'] = time();
			$contentRe = M('content')->save($data);
		}else{
			$data['createtime'] = time();
			$contentRe = M('content')->add($data);
		}
		if($contentRe !== false){
			$redata['success'] = true;
			$redata['msg'] = '保存成功';
		}else{
			$redata['success'] = false;
			$redata['msg'] = '保存失败';
		}
		$this->ajaxReturn($redata);
	}
	/**
	 * 批量操作
	 */
	public function batchset(){
		$data = I('post.');
		$redata['success'] = false;
		if(empty($data['ids'])){
            $redata['msg'] = '至少选择一个';
			$this->ajaxReturn($redata);
		}
		$where['id'] = array('in',$data['ids']);
		unset($data['ids']);
		$contentRe = M('content')->where($where)->save($data);
		if($contentRe !== false){
			$redata['success'] = true;
			$redata['msg'] = '操作成功';
		}else{
			$redata['success'] = false;
			$redata['msg'] = '操作失败';
		}
		$this->ajaxReturn($redata);
	}
	/**
	 * 批量转移
	 */
	public function move(){
		$ids = I('get.ids');
		$pid = I('post.pid');
		$where['id']=array('in',$ids);
		$re = M('content')->where($where)->save(array('categoryid'=>$pid));
		if($re){
			$data['success'] = true;
		}else{
			$data['success'] = false;
		}
		$this->ajaxReturn($data);
	}
}