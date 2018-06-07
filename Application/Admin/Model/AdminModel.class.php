<?php
namespace Admin\Model;
use Think\Model;

class AdminModel extends Model{
	protected $_validate = array(
			array('adminname','require','用户名不能为空',1),
			array('adminname','1,20','用户名长度超长',1,'length'),
			array('adminname','','用户名不能重复',1,'unique'),
			array('groupid','require','所属角色不能为空',1),
	);
    public function getAdminInfo($adminName){
        return $this->where(array('adminname'=>$adminName))->find();
    }
    public function setLoginInfo($username,$data){
        return $this->where(array('adminname'=>$username))->data($data)->save();
    }
}

