<?php
namespace Home\Controller;
use Home\Controller\HomeController;

class LoginController extends HomeController{
	public function index(){
		$this->assign('seotitle','会员登录');
		$this->display();
	}
	//验证登录
	public function validate(){
		$userName=I('post.username');
		$passWord=I('post.password');
		$verify=I('post.verify');
		$info['success']=false;
		if(empty($userName)){
			$info['msg']='用户名不能为空';
			$this->ajaxReturn($info);
		}
		if(empty($passWord)){
			$info['msg']='密码不能为空';
			$this->ajaxReturn($info);
		}
		$verifyC=new \Think\Verify();
		if(!$verifyC->check($verify)){
			$info['msg']='验证码不正确';
			$this->ajaxReturn($info);
		}
		$where = array('username'=>$userName);
		if(preg_match('/^(13[0-9]|15[012356789]|18[0236789]|14[57])[0-9]{8}$/',$userName)){
			$where = array('telephone'=>$userName);
		}
		if(preg_match('/^[\w\+-]+(\.[\w\+-]+)*@[a-z\d-]+(\.[a-z\d-]+)*\.([a-z]{2,4})$/',$userName)){
			$where = array('email'=>$userName);
		}
		$model = M('member');
		$memberinfo = $model->where($where)->find();
		if(empty($memberinfo)){
			$info['msg']='账户不存在';
			$this->ajaxReturn($info);
		}
		if($memberinfo['userpass'] != md5($passWord)){
			$info['msg']='密码不正确';
			$this->ajaxReturn($info);
		}
		if($memberinfo['islock'] != 1){
			$info['msg']='账户被锁定，请联系管理员';
			$this->ajaxReturn($info);
		}
		$model->where(array('id'=>$memberinfo['id']))->save(array(
				'lastloginip'=>get_real_ip(),
				'lastlogintime'=>time(),
				'logincount'=>$memberinfo['logincount']+1
		));
		session('memberId',$memberinfo['id']);
		session('memberName',$userName);
		$info['success']=true;
		$info['msg']='登录成功';
		$this->ajaxReturn($info);
	}
	//退出
	public function quit(){
		session('[destroy]');
		$this->redirect('Index/index');
	}
}