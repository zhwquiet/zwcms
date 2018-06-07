<?php
/**
 * Created by: messhair
 * Date: 2016/2/27
 */

namespace Admin\Model;
use Think\Model;

class ExpandBookModel extends Model{

    public function delBook($delId){
        $res=$this->where(array('id'=>$delId))->data(array('isdel'=>1))->save();
        return $res;
    }
    public function delSome($delSome){
        $where['id']=array('in',$delSome);
        $res=$this->where($where)->data(array('isdel'=>1))->save();
        return $res;
    }
    public function bookLock($map,$where){
        return $this->where($where)->data($map)->save();
    }
    public function getOneBook($bookId){
        return $this->field(array('id','username','sex','tel','content','reply','islock'))->where(array('isdel'=>0,'id'=>$bookId))->find();
    }
    public function setBookInfo($bookId,$data){
        return $this->where(array('id'=>$bookId))->data($data)->save();
    }
}