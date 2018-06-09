<?php
/**
 * Created by: messhair
 * Date: 2016/2/27
 */

namespace Admin\Controller;
use Admin\Controller\AdminController;
use Admin\Model\ExpandBookModel;


class BookController extends AdminController{
    public function _initialize(){
        parent::_initialize();
        $this->assign('method','expand');
        $this->assign('child_method','book');
    }
    public function Index(){
        $this->display('Expand/Book');
    }
    public function bookPage(){
        $nature=I('nature');
        $bookM=new ExpandBookModel();
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
        $count=$bookM->where($where)->count('id');

        $p=new \Org\Util\AjaxPage($count,C('PageList'),"ajaxContent");

        $bookList = $bookM->where($where)->limit($p->firstRow,$p->listRows)->select();

        $page=$p->show();

        $this->assign('page',$page);
        $this->assign('bookList',$bookList);
        $this->display('Expand/Module/BookList');
    }
    public function linkDel(){
        $delId=I('delId');
        if(!empty($delId)){
            $delM=new ExpandBookModel();
            $b=$delM->delBook($delId);
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
        if($delSome){
            $delSM=new ExpandBookModel();
            $b=$delSM->delSome($delSome);
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
    public function bookLock(){
        $bookId=I('bookId');
        $act=I('act');
        if($bookId!==''&&$act!=''){
            $bookM=new ExpandBookModel();
            if($act=='nolock'){
                $map['islock']=1;
            }elseif($act=='islock'){
                $map['islock']=0;
            }
            $where['id']=array('in',$bookId);
            $b=$bookM->bookLock($map,$where);
            if($b!==false){
                $redata['msg']='操作成功';
                $redata['success']=true;
            }else{
                $redata['msg']='操作失败';
                $redata['success']=false;
            }
        }
        $this->ajaxReturn($redata);
    }
    public function bookConfig(){
        if(IS_POST){
        	$data = I('post.');
            $bookM=M('config');
        	$bookM->startTrans();
        	$b=$bookM->where(array('setname'=>'expand','setkey'=>'bookopen'))->save(array('setvalue'=>$data['bookOpen']));
        	$d=$bookM->where(array('setname'=>'expand','setkey'=>'bookcheck'))->save(array('setvalue'=>$data['bookLock']));
        	if($b !== false && $d !== false){
        		$bookM->commit();
                $this->config['expand']['bookopen'] = $data['bookOpen'];
                $this->config['expand']['bookcheck'] = $data['bookLock'];
                S(SERVER.'config',$this->config);
                $redata['msg']='留言管理配置成功';
                $redata['success']=true;
        	}else{
        		$bookM->rollback();
                $redata['msg']='留言管理失败';
                $redata['success']=false;
        	}
        	$this->ajaxReturn($redata);
        }else{
            $bookConfig = $this->config['expand'];
        	$this->assign('bookConfig',$bookConfig);
        	$this->display('Expand/Module/BookConfig');
        }
        
    }
    public function bookEdit(){
        if(IS_GET){
            $bookId=I('bookId');
            $bookM=new ExpandBookModel();
            $bookOne=$bookM->getOneBook($bookId);
            $this->assign('bookOne',$bookOne);
            $this->display('Expand/Module/BookEdit');
        }elseif(IS_POST){
            $bookId=I('bookId');
            $reply=I('reply');
            $isLock=I('lock');
            $data=array(
                'reply'=>$reply,
                'islock'=>$isLock,
                'replytime'=>time()
            );
            $bookM=new ExpandBookModel();
            $b=$bookM->setBookInfo($bookId,$data);
            if($b!==false){
                $redata['msg']='留言回复成功';
                $redata['success']=true;
            }else{
                $redata['msg']='留言回复失败';
                $redata['success']=false;
            }
            $this->ajaxReturn($redata);
        }
    }

}