<?php
namespace Home\Model;
use Think\Model;
class ExpandBookModel extends Model{
	protected $_validate = array(
		array('username','require','昵称不能为空',1),
		array('username','1,20','昵称长度超长',1,'length'),
		array('content','require','留言内容不能为空',1),
		array('content','1,255','留言内容长度超长',1,'length'),
		array('tel','require','联系电话不能为空',1),
		array('tel','/^(0[0-9]{2,3}\-)?([2-9][0-9]{6,7})+(\-[0-9]{1,4})?$|(^1[3|4|5|8]\d{9}$)/','联系电话格式错误',1,'regex')
	);
	protected $_auto = array(
		array('createtime','time',1,'function'),
		array('postip','get_real_ip',1,'function')
	);
}