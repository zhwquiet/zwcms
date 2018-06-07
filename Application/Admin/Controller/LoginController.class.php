<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Verify;
use Admin\Model\AdminModel;
class LoginController extends Controller{
	public function Index(){
		$this->display();
	}
	public function Verify() {
		$config = array (
			'fontSize' => 33,
			'length' => 4,
			'useCurve' => false,
			'codeSet'=>'0123456789'
		);
		ob_clean();
		$verify = new Verify( $config );
		$verify->entry();
	}
	public function Validate(){
		$username = I('username');
		$adminPass = I('password');
		$verify_code = I('verify');
        $redata['success'] = false;
        $logdata = array(
            'username'=>$username,
            'type'=>1,
            'status'=>2,
            'content'=>'登录失败'
        );
        $admin=new AdminModel();
        $res=$admin->getAdminInfo($username);
        if(empty($res)){
            $redata['msg']='登录用户名或密码错误';
            $logdata['content'] ="用户不存在";
            write_log($logdata);
            $this->ajaxReturn($redata);
        }
        $logdata['userid'] = $res['id'];

        $verify = new Verify();
        $isVerify = $verify->check($verify_code);
        if(!$isVerify){
            $logdata['content'] = $info['msg'] = "验证码错误";
            write_log($logdata);
            $this->ajaxReturn($info);
        }

        if($res['islock'] != 1){
            $logdata['content'] = $redata['msg']='该用户已被禁止登陆';
            write_log($logdata);
        	$this->ajaxReturn($redata);
        }
        if($res['password'] != md5($adminPass)){
            $redata['msg']='登录用户名或密码错误';
            $logdata['content'] = "密码错误";
            write_log($logdata);
        	$this->ajaxReturn($redata);
        }
        $groupinfo = M('adminGroup')->where(array('id'=>$res['groupid']))->field('pagelever')->find();
        if(empty($groupinfo)){
            $logdata['content'] = $redata['msg']='用户未赋予角色，禁止登录';
            write_log($logdata);
        	$this->ajaxReturn($redata);
        }
        if(empty($groupinfo['pagelever'])){
            $logdata['content'] = $redata['msg']='用户角色无权限，禁止登录';
            write_log($logdata);
        	$this->ajaxReturn($redata);
        }
        $data['lastloginip']=get_real_ip();
        $data['lastlogintime']=time();
        $data['logincount']=$res['logincount']+1;
        $b=$admin->setLoginInfo($username,$data);
        if($b === false){
            $logdata['content'] ='登录成功，写入数据失败';
            write_log($logdata);
        }
        session('uid',$res['id']);
        session('username',$res['adminname']);
        session ('group_id', $res['groupid']);
        session ('lastloginip', $data['lastloginip']);
        session ('lastlogintime', $data['lastlogintime']);
        session ('logincount', $data['logincount']);
        $redata['success']=true;
        $logdata['content'] = $redata['msg']='登录成功';
        $logdata['status'] = 1;
        write_log($logdata);
        $this->ajaxReturn($redata);
	}     
}