<?php
/**
 * Created by: messhair
 * Date: 2016/2/19
 */
namespace Admin\Model;
use Think\Model;

class ExpandLinkModel extends Model{
	protected $_validate = array(
		array('webname','require','网站名称不能为空',1),
		array('webname','','网站名称不能重复',1,'unique',1),
		array('weburl','require','网站域名不能为空',1),
		array('weburl','/^(https?|ftp):\/\/[^\s]+$/i','网站域名不符合规则',1,'regex'),
		array('weburl','','网站域名不能重复',1,'unique',1),
	);

    public function getExpandLinkNum(){
        $linkNum=$this->field('id')->count();
        return $linkNum;
    }
    public function getLinkByClassId($navCateId){
        return $this->where(array('classid'=>$navCateId))->count();
    }
    public function setExpandLink($linkData){
        $b=$this->data($linkData)->add();
        return $b;
    }
    public function upExpandLink($linkData){
        $b=$this->data($linkData)->save();
        return $b;
    }
    public function getWebName($webName){
        $res=$this->where(array('webname'=>$webName))->find();
        return $res;
    }
    public function delLink($delSome){
        $where['id']=array('in',$delSome);
        $b=$this->where($where)->delete();
        return $b;
    }
    public function moveLinkClass($orig,$dest){
        $where['id']=array('in',$orig);
        $b=$this->where($where)->data(array('classid'=>$dest))->save();
        return $b;
    }
    public function linkLock($linkId,$doAct){
        $where['id']=array('in',$linkId);
        return $this->where($where)->data(array('islock'=>$doAct))->save();
    }
    public function getLink($linkId){
        $res=$this->where(array('id'=>$linkId))->find();
        return $res;
    }
    public function getClassLink($delId){
        return $this->where(array('classid'=>$delId))->getField('id',true);
    }
    public function delClassLink($delSome){
        $where['id']=array('in',$delSome);
        $b=$this->where($where)->data(array('classid'=>0))->save();
        return $b;
    }
    public function moveCate($comeCate,$goCate){
        return $this->where(array('classid'=>$comeCate))->data(array('classid'=>$goCate))->save();
    }
}