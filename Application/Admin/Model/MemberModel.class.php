<?php

/*Created on : 2016-2-18
 *Author     : messhair
 */
namespace Admin\Model;
use Think\Model;

class MemberModel extends Model{
    public function getMemberInfo($limit){
        $list=$this->field(array('username','penname','sex','regtime','email','telephone','prov','city','dist','lastlogintime','lastloginip'))->order('id')->limit($limit)->select();
        return $list;
    }
    public function getMemberCount(){
        $count=$this->count();
        return $count;
    }

}

