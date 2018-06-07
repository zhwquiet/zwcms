<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
use Admin\Model\AttachmentModel;
use Admin\Model\ExpandLinkModel;
use Admin\Model\ExpandClassModel;

class ExpandController extends AdminController{
    public function _initialize(){
        parent::_initialize();
        $this->assign('method','expand');
        $this->assign('child_method','link');
    }
    public function Link(){
        $linkClassModel=new ExpandClassModel();
        $linkClass=$linkClassModel->getExpandClassInfo();

        $this->assign('linkclass',$linkClass);
        $this->display();
    }
    public function linkAdd(){
    	if(IS_POST){
            $redata['success']=false;
            $redata['msg']='操作失败';
    		$linkAddM=new ExpandLinkModel();
    		$data = $linkAddM->create();
    		if(!$data){
                $redata['msg'] = $linkAddM->getError();
    			$this->ajaxReturn($redata);
    		}
    		$data['islogo'] = $data['weblogoid']?1:0;
    		$data['islock'] = $data['islock']?1:0;
    		if(!empty($data['id'])){
    			//修改
    			$re = $linkAddM->upExpandLink($data);
    		}else{
    			//添加
    			$re = $linkAddM->setExpandLink($data);
    		}
    		if($re !== false){
                $redata['msg']='操作成功';
                $redata['success']=true;
    		}
    		$this->ajaxReturn($redata);
    	}else{
    		$linkId=I('linkId');
    		if(!empty($linkId)){
    			$linkM=new ExpandLinkModel();
    			$resLink=$linkM->getLink($linkId);
    			$linkClassId=$resLink['classid'];
    			$linkClassM=new ExpandClassModel();
    			$linkClassName=$linkClassM->getClassName($linkClassId);
    			$this->assign('link',$resLink);
    			$this->assign('linkclassname',$linkClassName);
    		}
    		$linkClassModel=new ExpandClassModel();
    		$linkClass=$linkClassModel->getExpandClassInfo();
    		$this->assign('linkclass',$linkClass);
    		$this->display('Expand:Module/LinkAdd');
    	}
    }
    public function pageAjax(){
        $navCateId=I('navCate');
        $nature=I('nature');
        $linkModel=M('ExpandLink');
        $where = array();
        if($navCateId !== ''){
            $where['classid'] = $navCateId;
        }
        switch ($nature){
            case 1:
                $where['islock'] = 0;break;
            case 2:
                $where['islock'] = 1;break;
            case 3:
                $where['islogo'] = 0;break;
            case 4:
                $where['islogo'] = 1;break;
        }
        $count = $linkModel->where($where)->count();
        $p = new \Org\Util\AjaxPage($count,C('PageList'),"ajaxContent");
        $link = $linkModel->where($where)->limit($p->firstRow,$p->listRows)->select();

        $page=$p->show();
        $this->assign('link',$link);
        $this->assign('page',$page);

        $classM=new ExpandClassModel();
        $linkClass=$classM->getExpandClassInfo();
        $linkClass = array_column($linkClass,'classname','classid');
        $this->assign('linkclass',$linkClass);
        $this->display('Expand:Module/linkList');
    }
    public function linkDel(){
        $delId=I('delId');
        if($delId){
            $delM=new ExpandLinkModel();
            $b=$delM->delLink($delId);
            if($b!==false){
                $redata['msg']='删除成功';
                $redata['success']=true;
            }else{
                $redata['msg']='删除失败';
                $redata['success']=false;
            }
        }
        $this->ajaxReturn($redata);
    }
    public function delSome(){
        $delSome=I('ids');
        $delSome=explode(',',$delSome);
        $delM=new ExpandLinkModel();
            if($delSome){
                $b=$delM->delLink($delSome);
                if($b!==false){
                    $redata['msg']='删除成功';
                    $redata['success']=true;
                }else{
                    $redata['msg']='删除失败';
                    $redata['success']=false;
                }
            }else{
                $redata['msg']='未选中要删除的链接';
                $redata['success']=false;
            }
        $this->ajaxReturn($redata);
    }
    public function linkMove(){
        $selClass=I('selClass');
        $selId=I('selId');
        $selId=explode(',',$selId);
        if($selClass&&$selId){
            $moveM=new ExpandLinkModel();
                $b=$moveM->moveLinkClass($selId,$selClass);
                if($b!==false){
                    $redata['msg']='移动成功';
                    $redata['success']=true;
                }else{
                    $redata['msg']='移动失败';
                    $redata['success']=false;
                }
        }else{
            $redata['msg']='未正确选择类别';
            $redata['success']=false;
        }
        $this->ajaxReturn($redata);
    }
    public function linkLock(){
        $act=I('act');
        $linkId=I('linkId');
        if($act&&$linkId){
            $linkId=explode(',',$linkId);
            $linkLockM=new ExpandLinkModel();
            if($act=='islock'){
                $doAct=0;
                $b=$linkLockM->linkLock($linkId,$doAct);
                    if($b!==false){
                        $redata['success']=true;
                        $redata['msg']='审核已取消';
                    }else{
                        $redata['success']=false;
                        $redata['msg']='审核取消失败';
                    }
            }elseif($act=='nolock'){
                $doAct=1;
                $b=$linkLockM->linkLock($linkId,$doAct);
                if($b!==false){
                    $redata['success']=true;
                    $redata['msg']='通过审核';
                }else{
                    $redata['success']=false;
                    $redata['msg']='未通过审核';
                }
            }
        }else{
            $redata['success']=false;
            $redata['msg']='操作有误';
        }
        $this->ajaxReturn($redata);
    }
    public function linkClass(){
        $this->display('Expand/Module/LinkClass');
    }
    public function catePage(){
        $cateM=new ExpandClassModel();
        $count=$cateM->getExpandClassNum();
        $p=new \Org\Util\AjaxPage($count,C('PageList'),"ajaxContent");
        $cate=$cateM->getExpandClassInfo($p->firstRow.','.$p->listRows);
        $page=$p->show();
        $this->assign('cate',$cate);
        $this->assign('page',$page);
        $this->display('Expand/Module/ClassList');
    }
    public function cateDel(){
        $delId=I('delId');
        if($delId){
            $delClassM=new ExpandClassModel();
            //删除类别
            $b=$delClassM->delClass($delId);
            //获取类别下的链接
            $delLinkM=new ExpandLinkModel();
            $delSome=$delLinkM->getClassLink($delId);
            if($delSome!=null){
                $d=$delLinkM->delClassLink($delSome);
                if($b!==false&&$d!==false){
                    $redata['msg']='删除成功';
                    $redata['success']=true;
                }else{
                    $redata['msg']='删除失败';
                    $redata['success']=false;
                }
            }else{
                if($b!==false){
                    $redata['msg']='删除成功';
                    $redata['success']=true;
                }else{
                    $redata['msg']='删除失败';
                    $redata['success']=false;
                }
            }
        }
        $this->ajaxReturn($redata);
    }
    public function classAdd(){
        $cateId=I('cateId');
        if(!empty($cateId)){
            $cateM=new ExpandClassModel();
            $oneCate=$cateM->getOneCate($cateId);
            $this->assign('oneCate',$oneCate);
        }
        $this->display('Expand/Module/ClassAdd');
    }
    public function classAddAjax(){
    	$data = I('post.');
    	$model = D('ExpandClass');
        $redata['success']=false;
        $redata['msg']='操作失败';
    	if(!$model->create($data)){
            $redata['msg']=$model->getError();
    		$this->ajaxReturn($redata);
    	}
    	$data['ordnum'] = $data['ordnum']?$data['ordnum']:0;
    	if(!empty($data['classid'])){
    		$re = $model->save($data);
    	}else{
    		$re = $model->add($data);
    	}
    	if($re !== false){
            $redata['success']=true;
            $redata['msg']='操作成功';
    	}
    	$this->ajaxReturn($redata);
    }
    public function classOrder(){

        $orderNum = I('orderNum');
        $redata['success'] = false;
        $redata['msg'] = '保存失败';
        $sql = "UPDATE ".C('DB_PREFIX')."expand_class SET ordnum = CASE classid ";
        foreach ($orderNum as $val) {
            $sql .= sprintf("WHEN %d THEN %d ", $val['id'], $val['orderNum']);
        }
        $sql .= "END WHERE classid IN (".implode(",",array_column($orderNum,'id')).");";
        $flags=M()->execute($sql);

        if ($flags) {
            $redata['success'] = true;
            $redata['msg'] = '保存成功';

        }
        $this->ajaxReturn($redata);

    }
    public function cateMove(){
        $comeCate=I('comecate');
        $goCate=I('gocate');
        if($comeCate==$goCate){
            $redata['msg']='请正确选择类别';
            $redata['success']=false;
            $this->ajaxReturn($redata);
        }
        $cateM=new ExpandLinkModel();
        $b=$cateM->moveCate($comeCate,$goCate);
        if($b!==false){
            $redata['msg']='移动成功';
            $redata['success']=true;
        }else{
            $redata['msg']='移动失败';
            $redata['success']=false;
        }
        $this->ajaxReturn($redata);
    }

}