<?php
/**
 * Created by: messhair
 * Date: 2016/2/26
 */

namespace Admin\Model;
use Think\Model;

class AttachmentModel extends Model{
    public function setAtt($attData){
        return $this->data($attData)->add();
    }
}
