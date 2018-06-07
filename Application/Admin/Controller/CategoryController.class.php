<?php
namespace Admin\Controller;

class CategoryController extends AdminController {
    public function _initialize(){
        parent::_initialize();
        $this->assign('method','category');
    }
    public function index() {
        $model = M('ViewCategory');
        $list_arr = $model->order('ordnum')->select();
        $list = tree($list_arr);

        $this->assign('list', $list);
        $this->assign('child_method','index');
        $this->display();
    }

    /**
     * 排序
     */
    public function reSort() {
        $orderNum = I('orderNum');
        $redata['success'] = false;
        $redata['msg'] = '保存失败';

        $sql = "UPDATE ".C('DB_PREFIX')."category SET ordnum = CASE id ";
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


    /**
     * 添加、编辑栏目,子栏目
     */
    public function addItem() {
        if(IS_POST){
            $data = I('post.');
            $model = D('Category');
            $msg['success'] = false;
            $model->startTrans();
            if(!empty($data['id'])){
                $redata = $model->pidmove($data['id'],$data['pid']);
                $result = $model->save($data);
                if ($result !== false && $redata['success'] !== false) {
                    $model->commit();
                    $msg['success'] = true;
                    $msg['msg'] = '修改成功';
                }else{
                    $model->rollback();
                    $msg['msg'] = '修改失败';
                }
            }else{
                $result = $model->data($data)->add();
                //查询子节点
                if ($data['pid'] != 0) {
                    $nresult = $model->where(array('id' => $data['pid']))->field('sonid')->find();
                    $newSonId = empty($nresult['sonid']) ? $result : ($nresult['sonid'] . ',' . $result);
                    $sonupRe = $model->where(array('id' => $data['pid']))->save(array('sonid' => $newSonId));
                }else{
                    $sonupRe = true;
                }

                if ($result !== false || $sonupRe !== false) {
                    $model->commit();
                    $msg['success'] = true;
                    $msg['msg'] = '添加成功';
                }else{
                    $model->rollback();
                    $msg['msg'] = '添加失败';
                }
            }
            $this->ajaxReturn($msg);
        }else{
            $id = I('id');
            $pid = I('pid');
            $flag = I('flag');
            if(!empty($pid)){
                $level = M('ViewCategory')->where(array('id' => $pid))->field('id,catename,modelid')->find();
                $this->assign('level', $level);
                $this->assign('pid',$pid);
                $flag = ($level['modelid']!= '-1' && $level['modelid']!='-2')?'1':$level['modelid'];
            }
            if(!empty($id)){
                $data = M('ViewCategory')->where(array('id' => $id))->find();
                if($data['pid']){
                    $level = M('ViewCategory')->where(array('id' => $data['pid']))->field('id,catename,modelid')->find();
                    $this->assign('level', $level);
                }
                $this->assign('data', $data);
                $flag = ($data['modelid']!= '-1' && $data['modelid']!='-2')?'1':$data['modelid'];
            }
            $list = M('model')->field('id,modelname,config')->select();
            $this->assign('menuTree', $this->getmemutree());
            $this->assign('list', $list);
            $this->assign('flag', $flag);
            $this->assign('child_method','index');
            $this->display();
        }

    }
    /**
     * 获得拼音
     */
    public function getPinYin() {
        $value = I('value');
        $pinyin = getPinYin($value);
        if(strlen($pinyin)>=50){
        	$pinyin = substr($pinyin,0,50);
        }
        $this->ajaxReturn($pinyin);
    }


    /**
     * 获得模板数据
     */
    public function getListData() {
        $config = I('config');
        $dirPath = __ROOT__.'/Application/Home/View/'.DEFAULT_LANGUAGE.'/web/List/' . $config;
        $this->assign('list', loopFun($dirPath));
        $this->display();
    }

    /**
     * 获得模板数据
     */
    public function getShowData() {
        $config = I('config');
        $dirPath = __ROOT__.'/Application/Home/View/'.DEFAULT_LANGUAGE.'/web/List/' . $config;
        $this->assign('list', loopFun($dirPath));
        $this->display();
    }

    /**
     * 移动分组
     */
    public function moveItem() {
    	$type = I('type');
    	$catedid = I('cateid');
    	$info = M('category')->where(array('id'=>$catedid))->field('catename,modelid')->find();
        if($type == 1){
        	$where['modelid'] = array('eq',$info['modelid']);
        	$where['id'] = array('neq',$catedid);
        }else{
        	$where = '';
        }
    	$this->assign('list', $this->getmemutree($type,$where));
        $this->assign('catename',$info['catename']);
        $this->display();
    }

    /**
     * 移动分组
     */
    public function moveFun() {
        $id = I('id');
        $pid = I('pid');
        if($id == $pid){
            $redata['success'] = false;
            $redata['msg'] = '不能选择自节点';
        	$this->ajaxReturn($redata);
        }
        $model = D('category');
        $model->startTrans();
        $redata = $model->pidmove($id,$pid);
        if ($redata['success']){
        	$model->commit();
        }else{
        	$model->rollback();
        }
        $this->ajaxReturn($redata);
    }

    /**
     * 删除数据
     */
    public function deleteItem() {
        $id = I('id');
        $model = M();
        $model->startTrans();
        $sonResult = M('Category')->where(array('pid' => $id))->save(array('pid'=>0));
        $categoryinfo = M('ViewCategory')->where(array('id' => $id))->field('pid,modelid,tablename')->find();
        $selfResult = M('Category')->where(array('id' => $id))->delete();
        if($categoryinfo['pid']){
        	$sonlist = M('ViewCategory')->where(array('pid' => $categoryinfo['pid']))->field('id')->select();
            $sonstr = implode(",",$sonlist);
        	$oldupRe = M('Category')->where(array('id' => $categoryinfo['pid']))->save(array('sonid' => $sonstr));
        }else{
        	$oldupRe = true;
        }
        if($categoryinfo['modelid'] > 0){
        	//模型
        	$cid = M('Content')->where(array('categoryid'=>$id))->getField('id');
        	$modelResult = $model->table($categoryinfo['tablename'])->where(array('cid'=>$cid))->delete();
        	$contentResult = M('Content')->where(array('categoryid'=>$id))->delete();
        }else if($categoryinfo['modelid'] == -1){
        	//单页
        	$modelResult = M('ModelPage')->where(array('cid'=>$id))->delete();
        	$contentResult = true;
        }
        if ($selfResult && $sonResult !== false && $modelResult !== false && $contentResult !== false && $oldupRe) {
            $redata['success'] = true;
            $redata['msg'] = '删除成功';
            $model->commit();
        } else {
            $redata['success'] = false;
            $redata['msg'] = '删除失败';
            $model->rollback();
        }
        $this->ajaxReturn($redata);
    }
    //内容管理
    public function content(){
        $cateid = I('cateid');
        $modelid = M('ViewCategory')->where(array('id' => $cateid))->getField('modelid');
        $this->assign('child_method','index');
        if($modelid == -1){
            $page = M('modelPage')->where(array('cid'=>$cateid))->find();
            if(empty($page)){
                $page['cid'] = $cateid;
            }
            $this->assign('page',$page);
            $this->display('module/model_page/edit');
        }else{
            $this->assign('cateid',$cateid);
            $this->display('Content/index');
        }
    }
}