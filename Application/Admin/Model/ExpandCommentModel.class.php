<?php
/**
 * Created by: messhair
 * Date: 2016/2/28
 */

namespace Admin\Model;
use Think\Model;

class ExpandCommentModel extends Model{

    public function delCom($delId){
        return $this->where(array('id'=>$delId))->data(array('isdel'=>1))->save();
    }
    public function delSome($delSome){
        $where['id']=array('in',$delSome);
        return $this->where($where)->data(array('isdel'=>1))->save();
    }
    public function bookLock($lockId,$data){
        $where['id']=array('in',$lockId);
        return $this->where($where)->data($data)->save();
    }
    public function getOneComment($comId){
        return $this->field(array('id','username','content','reply','islock'))->where(array('id'=>$comId,'isdel'=>0))->find();
    }
    public function setOneCom($comId,$data){
        return $this->where(array('id'=>$comId))->data($data)->save();
    }
}