<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/17
 * Time: 上午10:25
 */
namespace Admin\Model;
use Think\Model;
class NavClassModel extends Model{
    public function getlist(){
        return $this->select();
    }
    public function getinfo($id){
        return $this->find($id);
    }
}