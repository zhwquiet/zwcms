<?php
/*区块*/
namespace Home\Widget;
use Think\Controller;
class BlockWidget extends Controller{
	public function index($name){
		$model = M('block');
		return $model->where(array('name'=>$name))->getField('content');
	}
}