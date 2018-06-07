<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/11
 * Time: 上午8:10
 */
namespace Admin\Model;
use Think\Model;

class CategoryModel extends Model{

    public function pidmove($id,$pid){
        $redata['success'] = false;
        $redata['msg'] = '操作失败';
        $oldPid = $this->where(array('id' => $id))->getField('pid');
        if($oldPid == $pid){
            $redata['success'] = true;
            return $redata;
        }
        $result = $this->where(array('id' => $id))->save(array('pid' => $pid));
        if($pid != 0){
            $sonid = $this->where(array('id' => $pid))->getField('sonid');
            $newSonId = empty($sonid) ? $id : ($sonid . ',' . $id);
            $sonupRe = $this->where(array('id' => $pid))->save(array('sonid' => $newSonId));
        }else{
            $sonupRe = true;
        }
        if($oldPid != 0){
            $sonlist = $this->where(array('pid' => $oldPid))->field('id')->select();
            $sonstr = '';
            if(!empty($sonlist)){
                foreach ($sonlist as $v){
                    $sonstr .= $v['id'].',';
                }
                $sonstr = substr($sonstr,0,-1);
            }
            $oldupRe = $this->where(array('id' => $oldPid))->save(array('sonid' => $sonstr));
        }else{
            $oldupRe = true;
        }
        if ($result && $sonupRe && $oldupRe){
            $redata['success'] = true;
            $redata['msg'] = '操作成功';
        }
        return $redata;
    }
}