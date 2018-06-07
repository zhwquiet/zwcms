<?php
/**
 * Created by: messhair
 * Date: 2016/2/19
 */
namespace Admin\Model;
use Think\Model;

class ExpandClassModel extends Model{
	protected $_validate = array(
			array('classname','require','类别名称不能为空',1),
			array('classname','','类别名称不能重复',1,'unique'),
			array('classname','1,30','类别名称长度超长',1,'length'),
	);
    public function getExpandClassInfo($limit){
        $linkClass=$this->field(array('classid','classname','pid','ordnum'))->limit($limit)->select();
        return $linkClass;
    }
    public function getExpandClassNum(){
        return $this->count('classid');
    }
    public function getClassName($classId){
        $where['classid']=$classId;
        $res=$this->where($where)->field(array('classid','classname','pid','ordnum'))->find();
        return $res;
    }
    public function delClass($delId){
        $b=$this->where(array('classid'=>$delId))->delete();
        return $b;
    }
    public function classAdd($classData,$flag=null){
        if(is_null($flag)){
            return $this->data($classData)->add();
        }else{
            return $this->where(array('classname'=>$flag))->data($classData)->save();
        }
    }
    public function setClassOrder($where,$map){
        return $this->where($where)->data($map)->save();
    }
    public function getExistName($className){
        $where['classname']=$className;
        return $this->where($where)->field('classname')->find();
    }
    public function getOneCate($cateId){
        return $this->where(array('classid'=>$cateId))->find();
    }
}