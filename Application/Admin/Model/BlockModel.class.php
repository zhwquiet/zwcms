<?php
namespace Admin\Model;
use Think\Model;
class BlockModel extends Model{
	public function getinfo($id,$field){
		return $this->field($field)->where(array('id'=>$id))->find();
	}
}