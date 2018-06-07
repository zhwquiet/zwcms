<?php
namespace Admin\Controller;
use Think\Exception;

class ModelController extends AdminController {
    public function _initialize(){
        parent::_initialize();
        $this->assign('method','category');
        $this->assign('child_method','model');
    }
    public function index() {
        $model = M('model');
        $list = $model->select();
        $this->assign('list', $list);
        $this->display();
    }

    /**
     * 添加子栏目
     */
    public function addItem() {
        $this->display();
    }

    /**
     * 编辑子栏目
     */
    public function updateItem() {
        $id = I('id');
        $model = M('model');
        $data = $model->where(array('id' => $id))->find();
        $data['tablename'] = substr($data['tablename'], 9);
        $this->assign('data', $data);
        $this->display();
    }


    /**
     * 删除数据--删除模型
     */
    public function deleteItem() {
        $id = I('id');
        $model = M();
        $tablename = M('Model')->where(array('id'=>$id))->getField('tablename');
        $model->startTrans();
        $modeldelRe = M('Model')->where(array('id' => $id))->delete();
        $fielddelRe = M('ModelField')->where(array('modelid'=>$id))->delete();
        $dropRe = $model->execute('drop table '.$tablename);
        $redata['success'] = false;
        $redata['msg'] = '删除失败';
        if($modeldelRe && $fielddelRe !== false && $dropRe !== false){
            $redata['success'] = true;
            $redata['msg'] = '删除成功';
        	$model->commit();
        }else{
        	$model->rollback();
        }
        $this->ajaxReturn($redata);
    }

    /**
     * 保存所有数据--添加模型
     */
    public function saveAll() {
    	$model = D('Model');
    	$redata['success'] = false;
    	$data = $model->create();
        $redata['msg'] = '添加失败！';
    	if(!$data){
            $redata['msg'] = $model->getError();
    		$this->ajaxReturn($redata);
    	}
		$data['tablename'] = C('DB_PREFIX').'model_'.$data['config'];
        $result = $model->add($data);
        //创建表
        $sql = "CREATE TABLE `".$data['tablename']."` (
				   `id`  int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id主键' ,
				   `cid` int(11) DEFAULT NULL COMMENT 'content表id',
				   `content` text COMMENT '详情',
				    PRIMARY KEY (`id`)
				) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;";
       	M()->execute($sql);
       	if($result){
            $redata['success'] = true;
            $redata['msg'] = '添加成功！';
       	}
        $this->ajaxReturn($redata);
    }


    /**
     * 更新所有数据--修改模型
     */
    public function updateAll() {
    	$model = D('Model');
    	$redata['success'] = false;
        $redata['msg'] = '修改失败！';
    	$data = $model->create();	
    	if(!$data){
            $redata['msg'] = $model->getError();
    		$this->ajaxReturn($redata);
    	}
        $result = $model->save($data);
        if($result !== false){
            $redata['success'] = true;
            $redata['msg'] = '修改成功！';
        }
        $this->ajaxReturn($redata);
    }


    /*-------------------------------------模型字段---------------------------------------*/

    public function field() {
        $model = M('modelField');
        $list = $model->where(array('modelid' => I('id')))->order('ordnum')->select();
        $this->assign('list', $list);
        $this->assign('id', I('id'));
        $this->display();
    }


    /**
     * 添加
     */
    public function addField() {
        $this->assign('id', I('id'));
        $this->display();
    }


    /**
     * 保存所有数据
     */
    public function saveFieldAll() {
        $data = I('post.');  
        $data['fmode'] = empty($data['fmode'])?0:$data['fmode'];
        $data['fdatatype'] = empty($data['fdatatype'])?0:$data['fdatatype'];
        $data['fismust'] = empty($data['fismust'])?0:$data['fismust'];
        $data['frules'] = empty($data['frules'])?0:$data['frules'];
        $data['fistrim'] = empty($data['fistrim'])?0:$data['fistrim'];
        $data['fupload'] = empty($data['fupload'])?0:$data['fupload'];  
        if(!empty($data['foptions'])){
        	$arr = preg_split('/\r\n/',$data['foptions']);
        	$data['foptions'] = implode(",",$arr);
        }
        $model = M();
        $model->startTrans();
        $modeltable = M('Model')->where(array('id'=>$data['modelid']))->getField('tablename');
        switch ($data['fclass']){
        	case 1:
        		switch ($data['fmode']){
        			case 1://普通文本
        				$mold = 'varchar('.$data['flength'].')';
        				break;
        			case 2://整数 
        			case 4://上传
        				$mold = 'int(11)';
        				break;
        			case 5://小数
        				$mold = 'float(10,2)';
        				break;
        		}
        		break;
        	case 2:
        	case 6:
        		$mold = 'text';
        		break;
        	case 3:
        	case 4:
        	case 5:
        		$mold = 'varchar(255)';
        		break;
        }
        if(!empty($data['fdefault']) && $mold != 'text' && $data['fmode'] != 4){
        	$mold .= ' default \''.$data['fdefault'].'\'';
        }
        if($data['fismust']){
        	$mold .= ' not null';
        }
        $redata['success'] = false;
        $redata['msg'] = '操作失败';
        try{
        	if(!empty($data['id'])){
        		//修改
        		$sql='alter table `'.$modeltable.'` modify column my_'.$data['fname'].' '.$mold;
        		$fieldresult = M('ModelField')->save($data);
        	}else{
        		//添加字段
        		$oldData = M('ModelField')->where(array('modelid'=>$data['modelid'],'fname'=>$data['fname']))->find();
        		if(!empty($oldData)){
        			$model->rollback();
                    $redata['msg'] = '字段名称重复';
        			$this->ajaxReturn($redata);
        		}
        		$sql='alter table `'.$modeltable.'` add my_'.$data['fname'].' '.$mold;
        		$fieldresult = M('ModelField')->data($data)->add();
        	}
        	$alertRe = $model->execute($sql);
        }catch (Exception $e){
        	$fieldresult = false;
            $redata['msg'] = $e->getMessage();
        }
        if ($fieldresult !== false && $alertRe !== false) {
        	$model->commit();
            $redata['success'] = true;
            $redata['msg'] = '操作成功';
        }else{
        	$model->rollback();
        }
        $this->ajaxReturn($redata);
    }


    /**
     * 编辑子栏目
     */
    public function editField() {
        $id = I('id');
        $model = M('modelField');   
        $data = $model->where(array('id' => $id))->find();
        $this->assign('data', $data);
        $this->display();
    }


    /**
     * 更新所有数据
     */
    public function delField() {
        $id = I('id');
        $model = M();
        $model->startTrans();
        $field = M('ModelField')->alias('a')->join('left join '.C('DB_PREFIX').'model b on a.modelid=b.id')->where(array('a.id'=>$id))->field('a.fname,b.tablename')->find();
        $result = M('ModelField')->where(array('id' => $id))->delete();
        $sql='alter table `'.$field['tablename'].'` drop column my_'.$field['fname'];
        $alertRe = $model->execute($sql);
        $redata['success'] = true;
        $redata['msg'] = '删除成功';
        if (!$result || $alertRe === false) {
        	$model->rollback();
            $redata['success'] = false;
            $redata['msg'] = '删除失败';
        }else{
        	$model->commit();
        }
        $this->ajaxReturn($redata);
    }

    public function reSort() {
        $orderNum = I('orderNum');
        $redata['success'] = true;

        $sql = "UPDATE ".C('DB_PREFIX')."model_field SET ordnum = CASE id ";
        foreach ($orderNum as $val) {
            $sql .= sprintf("WHEN %d THEN %d ", $val['id'], $val['orderNum']);
        }
        $sql .= "END WHERE id IN (".implode(",",array_column($orderNum,'id')).");";
        $flags=M()->execute($sql);

        if (!$flags) {
            $redata['success'] = false;
        }
        $this->ajaxReturn($redata);
    }
}