<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
class IndexController extends AdminController {

    public function _initialize(){
        parent::_initialize();
        $this->assign('method','index');
    }
    public function index(){
        //查看登录日志
        $where = array(
            'type'=>1
        );
        if(session('group_id') != 1){
            $where['userid'] = session('uid');
        }
        $loglist = M('AdminLog')->where($where)->limit('0,20')->select();
        $this->assign('loglist',$loglist);
        //统计

        //内容数量
        $conCount = M("Content")->count();
        //会员数量
        $meCount = M('Member')->count();
        //留言数量
        $boCount = M('ExpandBook')->count();
        //订单数量

        $this->assign('conCount',$conCount);
        $this->assign('meCount',$meCount);
        $this->assign('boCount',$boCount);
        $this->assign('child_method','index');
        $this->display();
    }
    public function manage(){
        $username=session('username');
        $logincount=session('logincount');
        $lastlogintime=session('lastlogintime');
        $lastloginip=session('lastloginip');
        $this->assign('uname',$username);
        $this->assign('logincount',$logincount);
        $this->assign('logintime',date('Y-m-d H:i:s',$lastlogintime));
        $this->assign('loginip',$lastloginip);
        $this->display();
    }
    public function quit(){
    	S(SERVER.'menulist'.session('uid'),null);
    	session('[destroy]');
    	$this->redirect('Login/index');
    }
    public function delCache(){
    	$re1 = deldir(RUNTIME_PATH.'Cache/Home');
    	$re2 = deldir(RUNTIME_PATH.'Temp');
    	if($re1 && $re2){
    		$this->ajaxReturn(true);
    	}else{
    		$this->ajaxReturn(false);
    	}
    }
    public function logindex(){
        $this->display();
    }
    public function logajax(){
        $status = I('status');
        $where['type'] = 1;
        if($status){
            $where['status'] = $status;
        }
        $count = M('AdminLog')->where($where)->count();
        $p = new \Org\Util\AjaxPage($count, C('PageList'),"ajaxContent");
        $list = M('AdminLog')->where($where)->limit($p->firstRow,$p->listRows)->select();
        $page=$p->show();
        $this->assign('page', $page);
        $this->assign('list', $list);
        $this->display();
    }
    public function logdel(){
        $ids = I('ids');
        $where['id'] = array('in',$ids);
        $re = M('AdminLog')->where($where)->delete();
        if($re){
           $redata['success'] = true;
           $redata['msg'] = '删除成功';
        }else{
            $redata['success'] = false;
            $redata['msg'] = '删除失败';
        }
        $this->ajaxReturn($redata);
    }
}