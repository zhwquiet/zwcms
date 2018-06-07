<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/6/6
 * Time: 下午3:53
 */
namespace Admin\Model;
use Think\Model;
class WeixinMaterModel extends Model{
    /**
     * 更新素材下文章id
     * @param $mater_id
     * @param $newsId
     * @return bool|false|int|mixed
     */
    public function upNewsId($mater_id,$newsId){
        if(empty($mater_id)){
            $re = $this->add(array(
                'news_ids'=>$newsId,
                'title'=>date('Y-m-d'),
                'create_time'=>time(),
            ));
        }else{
            $news_ids = $this->where(array('id'=>$mater_id))->getField('news_ids');
            $re = $this->where(array('id'=>$mater_id))->save(array('news_ids'=>$news_ids.','.$newsId));
        }
        return $re;
    }

    /**
     * 判断素材下文章数量
     * @param $mater_id
     * @return array
     */
    public function judgeCount($mater_id){
        $news_ids = $this->where(array('id'=>$mater_id))->getField('news_ids');
        $count = count(explode(",",$news_ids));
        if($count >=5 ){
            $redata = array(
                'error'=>true,
                'msg'=>'最多添加5篇文章'
            );
        }else{
            $redata['error'] = false;
        }
        return $redata;
    }
    public function getInfo($id){
        $materInfo = $this->where(array('id'=>$id))->find();
        $where['id'] = array('in',$materInfo['news_ids']);
        $newslist = M("WeixinNews")->where($where)->field('id,pic_id,title')->order('field(id,'.$materInfo['news_ids'].')')->select();
        $materInfo['newslist'] = $newslist;
        return $materInfo;
    }
}