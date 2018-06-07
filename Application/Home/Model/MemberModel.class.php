<?php
/**
 * Created by: messhair
 * Date: 2016/3/3
 */

namespace Home\Model;


use Think\Model;

class MemberModel extends Model{
    public function checkMember($userName,$byPhone=null){
        if(is_null($byPhone)){
            return $this->field(array('id','userpass','penname','lastlogintime','logincount','islock','lastloginip'))->where(array('username'=>$userName))->find();
        }else{
            return $this->field(array('id','userpass','penname','lastlogintime','logincount','islock','lastloginip'))->where(array('telephone'=>$userName))->find();
        }
    }
    public function setLoginInfo($id,$data){
        return $this->where(array('id'=>$id))->data($data)->save();
    }
    public function addUser($addData){
        return $this->data($addData)->add();
    }
    public function checkUserName($userName){
        return $this->where(array('username'=>$userName))->find();
    }
    public function checkPhone($tel){
        return $this->where(array('telephone'=>$tel))->find();
    }
    public function checkEmail($email){
    	return $this->where(array('email'=>$email))->find();
    }
}