<?php
namespace Home\Widget;
use Think\Controller;
class MemberWidget extends Controller{
	public function index(){
		$this->theme(C('DEFAULT_THEME'))->display('Member/index');
	}
}