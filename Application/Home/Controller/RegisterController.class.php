<?php
namespace Home\Controller;
use Home\Controller\HomeController;
use Home\Model\MemberModel;

class RegisterController extends HomeController{
	public function index(){
		$this->assign('seotitle','会员注册');
		$this->display();
	}
	//注册用户
	public function add(){
		$regData=I('post.');
		$info['success']=false;
		$info['msg']='注册失败';
		if(empty($regData['regName'])||empty($regData['regPwd'])||empty($regData['reRegPwd'])){
			$info['msg']='用户名、密码不能为空';
			$this->ajaxReturn($info);
		}
		if($regData['regPwd']!==$regData['reRegPwd']){			
			$info['msg']='两次密码不一致';
			$this->ajaxReturn($info);
		}
// 		if(preg_match('/^(13[0-9]|15[012356789]|18[0236789]|14[57])[0-9]{8}$/',$regData['regName'])){
// 			$info['msg']='请在指定位置填写手机号';
// 			$this->ajaxReturn($info);
// 		}
		$veri=new \Think\Verify();
		if(!$veri->check($regData['verify'])){
			$info['msg']='验证码不正确';
			$this->ajaxReturn($info);
		}
		$regM=new MemberModel();
		$c=$regM->checkUserName($regData['regName']);
		if($c!=null){
			$info['msg']='用户名已被注册';
			$this->ajaxReturn($info);
		}
		if(!empty($regData['regTel'])){
			if(!preg_match('/^(13[0-9]|15[012356789]|18[0236789]|14[57])[0-9]{8}$/',$regData['regTel'])){
				$info['msg']='手机号码不正确';
				$this->ajaxReturn($info);
			}
			$phoneRe=$regM->checkPhone($regData['regTel']);
			if(!empty($phoneRe)){
				$info['msg']='手机号已被注册';
				$this->ajaxReturn($info);
			}
		}
		if(!empty($regData['regMail'])){
			if(!preg_match('/^[\w\+-]+(\.[\w\+-]+)*@[a-z\d-]+(\.[a-z\d-]+)*\.([a-z]{2,4})$/',$regData['regMail'])){
				$info['msg']='邮箱格式不正确';
				$this->ajaxReturn($info);
			}
			$mailRe=$regM->checkEmail($regData['regMail']);
			if(!empty($mailRe)){
				$info['msg']='该邮箱已被注册';
				$this->ajaxReturn($info);
			}
		}
		if($regData['regYear']!='' && $regData['regMon']!='' && $regData['regDay']!=''){
			$birthday=$regData['regYear'].'-'.$regData['regMon'].'-'.$regData['regDay'];
			$birthday=strtotime($birthday);
		}else{
			$birthday=null;
		}

		$addData=array(
			'username'=>$regData['regName'],
			'userpass'=>md5($regData['regPwd']),
			'penname'=>$regData['regPenName'],
			'birthday'=>$birthday,
			'email'=>$regData['regMail'],
			'telephone'=>$regData['regTel'],
			'sex'=>$regData['regSex'],
			'prov'=>$regData['prov'],
			'city'=>$regData['city'],
			'dist'=>$regData['dist'],
			'regtime'=>time(),
			'regip'=>get_client_ip()
		);
		$addRe=$regM->addUser($addData);
		if($addRe !== false){
			session('memberId',$addRe);
			session('memberName',$regData['regName']);
			$info['success']=true;
			$info['msg']='用户注册成功,正在跳转...';
		}
		$this->ajaxReturn($info);
	}
}