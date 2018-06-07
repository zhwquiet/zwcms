<?php
namespace Admin\Model;
use Think\Model;
class ModelModel extends Model{
	protected $_validate = array(
			array('modelname','require','模型名称不能为空',1),
			array('modelname','1,20','模型名称长度超长',1,'length'),
			array('modelname','','模型名称不能重复',1,'unique'),
			array('config','require','数据表名不能为空',1),
			array('config','','数据表名不能重复',1,'unique'),
			array('config','1,20','数据表名长度超长',1,'length'),
			array('modeldesc','1,20','模型描述长度超长',2,'length'),
			array('admin_edit_temp','0,255','后台添加修改模板长度超长',1,'length'),
			array('list_temp','1,255','前台列表模板长度超长',2,'length'),
			array('show_temp','1,255','前台内容模板长度超长',2,'length'),
	);
}