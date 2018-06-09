<?php
/**
 * Created by: messhair
 * Date: 2016/2/28
 */

namespace Admin\Controller;
use Admin\Controller\AdminController;
use Admin\Model\ExpandCommentModel;

class CommentController extends AdminController{
    public function _initialize(){
        parent::_initialize();
        $this->assign('method','expand');
        $this->assign('child_method','comment');
    }
    public function Index(){
        $this->display('Expand/Comment');
    }
    public function commentPage(){
        $nature=I('nature');

        $where['isdel'] = 0;
        switch ($nature){
            case 1:
                $where['islock'] = 0;break;
            case 2:
                $where['islock'] = 1;break;
            case 3:
                $where['replytime'] = array('exp',' is null ');break;
            case 4:
                $where['replytime'] = array('exp',' is not null ');break;
        }
        $comM=new ExpandCommentModel();

        $count=$comM->where($where)->count('id');

        $p=new \Org\Util\AjaxPage($count,C('PageList'),"ajaxContent");

        $bookList = $comM->where($where)->limit($p->firstRow,$p->listRows)->select();

        $page=$p->show();
        $this->assign('comments',$bookList);
        $this->assign('page',$page);
        $this->display('Expand/Module/CommentList');
    }
    public function delCom(){
        $delId=I('delId');
        if(!empty($delId)){
            $comM=new ExpandCommentModel();
            $b=$comM->delCom($delId);
            if($b!==false){
                $redata['success']=true;
                $redata['msg']='删除成功';
            }else{
                $redata['success']=false;
                $redata['msg']='删除失败';
            }
            $this->ajaxReturn($redata);
        }
    }
    public function delSome(){
        $delSome=I('ids');
        if($delSome!=''){
            $comM=new ExpandCommentModel();
            $b=$comM->delSome($delSome);
            if($b!==false){
                $redata['success']=true;
                $redata['msg']='批量删除成功';
            }else{
                $redata['success']=false;
                $redata['msg']='批量删除失败';
            }
            $this->ajaxReturn($redata);
        }
    }
    public function comLock(){
        $lockId=I('idArr');
        $act=I('act');
        if($lockId!=''&&$act!=''){
            $comM=new ExpandCommentModel();
            if($act=='nolock'){
                $data=array('islock'=>1);
            }elseif($act=='islock'){
                $data=array('islock'=>0);
            }
            $b=$comM->bookLock($lockId,$data);
            if($b!==false){
                $redata['success']=true;
                $redata['msg']='操作成功';
            }else{
                $redata['success']=false;
                $redata['msg']='操作失败';
            }
            $this->ajaxReturn($redata);
        }
    }
    public function comConfig(){
    	if(IS_POST){
    		$data = I('post.');
            $comM=M('config');
    		$comM->startTrans();
    		$b=$comM->where(array('setname'=>'expand','setkey'=>'commentopen'))->save(array('setvalue'=>$data['comOpen']));
    		$d=$comM->where(array('setname'=>'expand','setkey'=>'commentcheck'))->save(array('setvalue'=>$data['comCheck']));
    		if($b !== false && $d !== false){
    			$comM->commit();
                $this->config['expand']['commentopen'] = $data['comOpen'];
                $this->config['expand']['commentcheck'] = $data['comCheck'];
                S(SERVER.'config',$this->config);
                $redata['success']=true;
                $redata['msg']='评论配置成功';
    		}else{
    			$comM->rollback();
                $redata['success']=false;
                $redata['msg']='评论配置失败';
    		}
    		$this->ajaxReturn($redata);
    	}else{
            $comConfig = $this->config['expand'];
    		$this->assign('comConfig',$comConfig);
    		$this->display('Expand/Module/CommentConfig');
    	}
    }
    public function commentEdit(){
        if(IS_GET){
            $comId=I('comId');
            if(!empty($comId)){
                $comM=new ExpandCommentModel();
                $oneCom=$comM->getOneComment($comId);
                $this->assign('oneCom',$oneCom);
                $this->display('Expand/Module/CommentEdit');
            }
        }elseif(IS_POST){
            $comId=I('comId');
            $reply=I('reply')?I('reply'):'';
            $islock=I('islock')?I('islock'):0;
            if(!empty($comId)){
                $data=array(
                    'reply'=>$reply,
                    'islock'=>$islock,
                    'replytime'=>time()
                );
                $comM=new ExpandCommentModel();
                $b=$comM->setOneCom($comId,$data);
                if($b!==false){
                    $redata['success']=true;
                    $redata['msg']='评论回复成功';
                }else{
                    $redata['success']=false;
                    $redata['msg']='评论回复失败';
                }
                $this->ajaxReturn($redata);
            }
        }
    }
}