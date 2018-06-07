<?php
namespace Admin\Model;
use Think\Model;
class AdminGroupModel extends Model{
	protected $_validate = array(
			array('groupname','require','角色名称不能为空',1),
			array('groupname','1,20','角色名称长度超长',1,'length'),
			array('groupname','','角色名称不能重复',1,'unique'),
			array('groupdesc','1,50','角色描述长度超长',2,'length'),
	);
}