<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
class WeixinController extends AdminController {
    //    const
    public function _initialize() {
        parent::_initialize();
        $this->assign('method','weixin');
        $this->_appid = $this->config['weixin']['appid'];
        $this->_appsecret = $this->config['weixin']['appsecret'];
        $this->_token = $this->config['weixin']['token'];
        $this->map = array('is_del'=>0);
    }
    public function mater(){
        $this->assign('child_method','mater');
        $this->display();
    }
    public function materAjax(){
        $count = M("WeixinMater")->where($this->map)->count();
        $p = new \Org\Util\AjaxPage($count, C('PageList'),"ajaxContent");
        $materlist = M("WeixinMater")->where($this->map)->order('create_time desc')->limit($p->firstRow,$p->listRows)->select();
        $new_ids = array_column($materlist,'news_ids');
        $new_ids = implode(",",$new_ids);
        $where['id'] = array('in',$new_ids);
        $newslist = M("WeixinNews")->where($where)->select();
        $newslist = array_column($newslist,null,'id');
        foreach ($materlist as $key=>$v) {
            $new_arr = explode(",",$v['news_ids']);
            foreach ($new_arr as $nv){
                $materlist[$key]['newslist'][] = $newslist[$nv];
            }
        }
        $page=$p->show();
        $this->assign('page', $page);
        $this->assign('list', $materlist);
        if(I('theme')){
            $this->display(I('theme'));
        }else{
            $this->display();
        }

    }
    public function materRename(){
        $redata = array(
            'success' => false,
            'msg' => '设置失败'
        );
        if(IS_POST) {
            $data = I('post.');
            $re = M("WeixinMater")->where(array('id'=>$data['id']))->save(array('title'=>$data['title']));
            if($re !== false){
                $redata = array(
                    'success'=>true,
                    'msg'=>'设置成功'
                );
            }
        }
        $this->ajaxReturn($redata);
    }
    public function materAdd(){
        $id = I('id');
        if($id){
            $news_ids = M('WeixinMater')->where(array('id'=>$id))->getField('news_ids');
            $where['id'] = array('in',$news_ids);
            $list = M("WeixinNews")->where($where)->field('id,pic_id,title')->order('field(id,'.$news_ids.')')->select();
            $this->assign('newlist',$list);
        }
        $this->assign('child_method','mater');
        $this->display();
    }
    public function materDel(){
        $id = I('id');
        $redata = array(
            'success'=>false,
            'msg'=>'删除失败'
        );
        if($id){
            $re = M("WeixinMater")->where(array('id'=>$id))->save(array('is_del'=>1));
            if($re !== false){
                $redata = array(
                    'success'=>true,
                    'msg'=>'删除成功'
                );
            }

        }
        $this->ajaxReturn($redata);
    }
    public function materNewsMove(){
        $id = I('id');
        $mater_id = I('mater_id');
        $type = I('type');
        $redata = array(
            'success'=>false,
            'msg'=>'移动失败'
        );
        if($id && $mater_id){
            $news_ids = M("WeixinMater")->where(array('id'=>$mater_id))->getField('news_ids');
            $news_arr = explode(",",$news_ids);
            $key = array_search($id,$news_arr);
            if($type == 'up'){
                if(!$key){
                    $this->ajaxReturn($redata);
                }
                $temp = $news_arr[$key-1];
                $news_arr[$key-1] = $news_arr[$key];
                $news_arr[$key] = $temp;
            }else if($type == 'down'){
                if($key >= count($news_arr)-1){
                    $this->ajaxReturn($redata);
                }
                $temp = $news_arr[$key+1];
                $news_arr[$key+1] = $news_arr[$key];
                $news_arr[$key] = $temp;
            }
            $news_ids = implode(",",$news_arr);
            $re = M("WeixinMater")->where(array('id'=>$mater_id))->save(array('news_ids'=>$news_ids));
            if($re !== false){
                $redata = array(
                    'success'=>true,
                    'msg'=>'移动成功'
                );
            }

        }
        $this->ajaxReturn($redata);
    }
    public function materNewsDel(){
        $id = I('id');
        $mater_id = I('mater_id');
        $redata = array(
            'success'=>false,
            'msg'=>'删除失败'
        );
        if($id && $mater_id){
            $news_ids = M("WeixinMater")->where(array('id'=>$mater_id))->getField('news_ids');
            $news_arr = explode(",",$news_ids);
            $key = array_search($id,$news_arr);
            if(isset($key)){
                array_splice($news_arr, $key, 1);
            }
            $news_ids = implode(",",$news_arr);
            $re = M("WeixinMater")->where(array('id'=>$mater_id))->save(array('news_ids'=>$news_ids));
            if($re !== false){
                $redata = array(
                    'success'=>true,
                    'msg'=>'删除成功'
                );
            }

        }
        $this->ajaxReturn($redata);
    }

    public function newsAdd(){
        if(IS_POST){
            $redata = array(
                'success'=>false,
                'msg'=>'操作失败'
            );
            $data = I('post.');
            $mater_id = $data['mater_id'];
            unset($data['mater_id']);
            M()->startTrans();
            if(!empty($data['id'])){
                $re = M("WeixinNews")->save($data);
            }else{
                $data['create_time'] = time();
                $re = M("WeixinNews")->add($data);
                $materRe = D('WeixinMater')->upNewsId($mater_id,$re);
                if(empty($mater_id)){
                    $this->replyAdd(array(
                            'type'=>'2',
                            'mater_id'=>$materRe
                        ));
                    $redata['id'] = $materRe;
                }
            }
            if($re !== false){
                M()->commit();
                $redata['success'] = true;
                $redata['msg'] = '操作成功';
            }else{
                M()->rollback();
            }

            $this->ajaxReturn($redata);

        }else{
            $id = I('id');
            $mater_id = I('mater_id');
            if($id){
               $info = M("WeixinNews")->where(array('id'=>$id))->find();
               $mater_id = $info['mater_id'];
               $this->assign('info',$info);
            }
            if($mater_id && empty($id)){
                //查询数量
                $redata = D("WeixinMater")->judgeCount($mater_id);
                if($redata['error']){
                    $this->ajaxReturn($redata);
                }
            }
            $this->assign('mater_id',$mater_id);
            $this->display();
        }
    }
    public function newslayer(){
        if(IS_POST){
            $data = I('post.');
            $redata = array(
                'success'=>false,
                'msg'=>'操作失败'
            );
            $re = D('WeixinMater')->upNewsId($data['mater_id'],$data['news_id']);
            if($re !== false){
                if(empty($data['mater_id'])){
                    $redata['id'] = $re;
                }
                $redata['success'] = true;
                $redata['msg'] = '操作成功';
            }
            $this->ajaxReturn($redata);
        }else{
            $mater_id = I('mater_id');
            if($mater_id){
                //查询数量
                $redata = D("WeixinMater")->judgeCount($mater_id);
                if($redata['error']){
                    $this->ajaxReturn($redata);
                }
            }
            $this->display();
        }
    }
    public function newsList(){
        $where = $this->map;
        $mater_id = I('mater_id');
        if(!empty($mater_id)) {
            //查询数量
            $news_ids = M("WeixinMater")->where(array('id' => $mater_id))->getField('news_ids');
            $where['id'] = array('not in',$news_ids);
        }
        $keyword = I('keyword');
        if(!empty($keyword)){
            $where['title'] = array('like','%'.$keyword.'%');
        }
        $count = M("WeixinNews")->where($where)->count();
        $p = new \Org\Util\AjaxPage($count, C('PageList'),"ajaxContent");
        $list = M("WeixinNews")->where($where)->order('create_time desc')->limit($p->firstRow,$p->listRows)->select();
        $page=$p->show();
        $this->assign('page', $page);
        $this->assign('list', $list);
        $this->display();
    }

    /**
     * [weixinConcern 微信关注回复]
     * @method   concern
     * @Author   zhengwei
     * @DateTime 2018-6-06T09:35:33+0800
     * @return   [type]                   [description]
     */
    public function concern(){
        $model = M('WeixinReply');
        if(IS_POST){
            $data = I('post.');
            $data['msgtype']=2;
            $redata = $this->savedata($data);
            $this->ajaxReturn($redata);
        }else{
            $info = $model->where(array("msgtype"=>2))->find();
            $this->assign('info',$info);
            if($info['type'] == 2){
                $materInfo = D('WeixinMater')->getInfo($info['mater_id']);
                $this->assign('materInfo',$materInfo);
            }
            $this->assign('child_method','concern');
            $this->display();
        }
    }

    /**
     * [weixinAutoreply 自动回复]
     * @method   weixinAutoreply
     * @Author   zhengwei
     * @DateTime 2016-6-07T15:57:29+0800
     * @return   [type]                   [description]
     */
    public function autoreply()
    {
        $model = M('weixinReply');
        if(IS_POST){
            $data = I('post.');
            $data['msgtype']=3;
            $redata = $this->savedata($data);
            $this->ajaxReturn($redata);
        }else{
            $info = $model->where(array("msgtype"=>3))->find();
            $this->assign('info',$info);
            if($info['type'] == 2){
                $materInfo = D('WeixinMater')->getInfo($info['mater_id']);
                $this->assign('materInfo',$materInfo);
            }
            $this->assign('child_method','autoreply');
            $this->display();
        }

    }

    /**
     * [keywords 微信关键词列表页面]
     * @method   weixinKeywords
     * @Author   zhengwei
     * @DateTime 2016-11-06T09:33:33+0800
     * @return   [type]                   [description]
     */
    public function keywords(){
        $this->assign('child_method','keywords');
        $this->display();

    }
    /**
     * [keywordsAjax 微信关键词列表数据]
     * @method   weixinKeywords
     * @Author   wangcongcong
     * @DateTime 2016-11-06T09:33:33+0800
     * @return   [type]                   [description]
     */
    public function keywordsAjax(){
        $model=M('weixinReply');
        $con['msgtype']=1;
        $count = $model->where($con)->count(1);
        $PageList = isset($_GET['rows'])? $_GET['rows']:C('PageList'); //  设置每页记录数
        $Page = new \Org\Util\AjaxPage($count, $PageList,"ajaxContent"); // 实例化分页类
        $show = $Page->show(); // 分页显示输出
        $list = $model->where($con)->limit($Page->firstRow, $Page->listRows)->order('id desc')->select();
        $this->assign('list',$list);
        $this->assign('page',$show);
        $this->display();

    }
    /**
     *
     * Method: keywordsAdd
     * User: zhengwei
     */
    public function keywordsAdd(){
        $weixinReply = M('weixinReply');
        if(IS_POST){
            $redata['success'] = false;
            $data = I('post.');
            $data['keyword']=trim(I('keyword'));

            if($data['id']){
                $kcon['id']=array('neq',$data['id']);
            }
            $kcon['keyword']=array('like','%'.$data['keyword'].'%');
            // //判断关键字是否存在
            $count=$weixinReply->where($kcon)->count();
            if($count>0){
                $redata['info'] = "关键字已经存在!";
                $this->ajaxReturn($redata);
            }
            $data['msgtype']=1;
            $redata = $this->savedata($data);
            $this->ajaxReturn($redata);
        }else{
            $id = I('id');
            if($id){
                $info = $weixinReply->where(array('id'=>$id))->find();
                $this->assign('info', $info);
                if($info['type'] == 2){
                    $materInfo = D('WeixinMater')->getInfo($info['mater_id']);
                    $this->assign('materInfo',$materInfo);
                }
            }
            $this->assign('child_method','keywords');
            $this->display();
        }
    }

    /**
     * 删除关键字
     * @Author:liuqi
     * @DateTime     2016-12-26T23:37:07+0800
     * @return       [type]                   [description]
     */
    public function keywordsDel(){
        $weixinReply = M('weixinReply');
        $id = I('id');
        $flag = $weixinReply->where(array('id'=>$id))->delete();
        if($flag){
            $redata['success'] = true;
            $redata['info'] = "删除成功";
        }else{
            $redata['success'] = false;
            $redata['info'] = "删除失败";
        }
        $this->ajaxReturn($redata);
    }
    /**
     *微信菜单
     * Method: wxMenu
     * User: zhengwei
     */
    public function menu(){
        $model = D('WeixinMenu');
        $list_arr = $model->order('sort')->select();
        $list_tree = new \Tree($list_arr);
        $list = $list_tree->leaf(0);
        $this->assign('list',$list);
        $this->assign('child_method','menu');
        $this->display();
    }
    /**
     *自定菜单添加
     * Method: wxMenuAdd
     * User: menyu
     */
    public function menuAdd(){
        if(IS_POST){
            $redata['success'] = false;
            $redata['msg'] = "保存失败";
            $model = M('weixinMenu');
            $data = I('post.');
            if(empty($data['title'])){
                $redata['msg']="菜单名称不能为空";
                $this->ajaxReturn($redata);
            }
            if(empty($data['type'])){
                $redata['msg']="回复类型不能为空";
                $this->ajaxReturn($redata);
            }
            switch ($data['type']){
                case 1:
                    if(empty($data['content'])){
                        $redata['msg']="发送消息不能为空";
                        $this->ajaxReturn($redata);
                    }
                    break;
                case 2:
                    if(empty($data['mater_id'])){
                        $redata['msg']="图文素材不能为空";
                        $this->ajaxReturn($redata);
                    }
                    break;
                case 3:
                    if(empty($data['url'])){
                        $redata['msg']="链接网址不能为空";
                        $this->ajaxReturn($redata);
                    }
                    break;
            }
            if($data['pid']==0){
                $count=$model->where(array('pid'=>0,'is_show'=>1))->count();
                if($count>=3){
                    $result['msg']="最多包含三个一级菜单";
                    $this->ajaxReturn($result);
                }
                if(mb_strlen($data['title'],'utf-8')>4){
                    $result['info']="一级菜单最多四个汉字";
                    $this->ajaxReturn($result);
                }
            }else{
                $count=$model->where(array('pid'=>$data['pid'],'is_show'=>1))->count();
                if($count>=5){
                    $result['msg']="每个一级菜单最多包含五个二级菜单";
                    $this->ajaxReturn($result);
                }
                if(mb_strlen($data['title'],'utf-8')>7){
                    $result['msg']="二级菜单最多七个汉字";
                    $this->ajaxReturn($result);
                }
            }
            $content = $data['content'];
            $mater_id = $data['mater_id'];
            unset($data['content']);
            unset($data['mater_id']);
            if(empty($data['id'])){
                //添加
                switch ($data['type']){
                    case 1:
                        $data['reply_id'] = $this->replyAdd(array(
                            'type'=>'1',
                            'content'=>$content
                        ));
                        $data['url'] = null;
                        break;
                    case 2:
                        $data['reply_id'] = M('WeixinReply')->where(array('mater_id'=>$mater_id,'msgtype'=>4))->getField('id');
                        $data['url'] = null;
                        break;
                    case 3:
                        $data['reply_id'] = null;
                        break;
                }
                $re = $model->add($data);
            }else{
                $result_id=$model->where(array('id'=>$data['id'],'type'=>1))->getField('reply_id');
                switch ($data['type']){
                    case 1:
                        if($result_id){
                             M('weixinReply')->where(array('id'=>$result_id))->save(array('content'=>$content));
                        }else{
                            $data['reply_id'] = $this->replyAdd(array(
                                'type'=>'1',
                                'content'=>$content
                            ));
                        }
                        $data['url'] = null;
                        break;
                    case 2:
                        if($result_id){
                            M('weixinReply')->where(array('id'=>$result_id))->delete();
                        }
                        $data['reply_id'] = M('WeixinReply')->where(array('mater_id'=>$mater_id,'msgtype'=>4))->getField('id');
                        $data['url'] = null;
                        break;
                    case 3:
                        if($result_id){
                            M('weixinReply')->where(array('id'=>$result_id))->delete();
                        }
                        $data['reply_id'] = null;
                        break;
                }
                $re = $model->save($data);
            }

            if($re !== false ){
                $redata['success'] = true;
                $redata['msg'] = "保存成功";
            }
            $this->ajaxReturn($redata);
        }else{
            $pid = I('pid');
            if(!empty($pid)){
                $categoryInfo=M('weixinMenu')->where(array('id'=>$pid))->find();
                $this->assign('categoryInfo',$categoryInfo);
            }else{
                $con['is_show']=1;
                $con['pid']=0;
                $category=M('weixinMenu')->where($con)->select();
                $this->assign('category',$category);
            }
            $id=I('id');
            if($id){
                $info=M('weixinMenu')->where(array('id'=>$id))->find();
                $this->assign('info',$info);
                if($info['type'] != 3){
                    $replyInfo = M('WeixinReply')->where(array('id'=>$info['reply_id']))->field('type,content,mater_id')->find();
                    if($replyInfo['type'] == 1){
                        $materInfo['content'] = $replyInfo['content'];
                    }else{
                        $materInfo = D('WeixinMater')->getInfo($replyInfo['mater_id']);
                    }
                    $this->assign('materInfo',$materInfo);
                }
            }
            $this->assign('child_method','menu');
            $this->display();
        }

    }

    /**
     *自定义菜单删除
     * Method: wxMenuDel
     * User: zhengwei
     */
    public function menuDel(){
        $redata['success'] = false;
        $redata['msg'] = "删除失败";
        $id = I('id');
        $count = M('weixinMenu')->where(array('pid'=>$id))->count();
        if($count){
            $redata['msg'] = "请先删除二级菜单";
            $this->ajaxReturn($redata);
        }
        $flag = M('weixinMenu')->where(array('id'=>$id))->delete();
        if($flag){
            $redata['success'] = true;
            $redata['msg'] = "删除成功";
        }
        $this->ajaxReturn($redata);
    }
    /**
     * 发布菜单
     */
    public function menuAct(){
        $redata['success']=false;
        $con['is_show']=1;
        //拼接菜单数据
        $data=D('weixinMenu')->alias('a')->join('left join zx_weixin_reply b on a.reply_id = b.id')->where($con)->field('a.id,a.pid,a.title,a.type,a.reply_id,a.url,b.keyword')->order('a.pid asc,a.sort asc')->select();
        var_dump($data);die;
        //获取access_token
        $access_token=get_access_token();
        if($access_token['error']){
            $redata['msg']=$access_token['msg'].",发布菜单失败";
            $this->ajaxReturn($redata);
        }
        $url="https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token['access_token'];
        $result=https_request($url,getbtjson($data));
        if($result['errcode'] == 0){
            $redata['success']=true;
            $redata['msg']="发布菜单成功";
        }else{
            $redata['msg']=$result['errmsg'];
        }
        $this->ajaxReturn($redata);
    }

    public function materLayer(){
        $this->display();
    }

    public function getMaterInfo(){
        $mater_id=I('mater_id');
        $materInfo = array();
        if($mater_id){
            $materInfo = D('WeixinMater')->getInfo($mater_id);
        }
        $this->assign('materInfo',$materInfo);
        $this->display('materInfo');
    }

    /**
     * 保存数据
     * Method: savedata
     * User: zhengwei
     * @param $data
     * @return mixed
     */
    public function savedata($data){
        $redata['success'] = false;
        $weixinReply = M('weixinReply');
        $type=$data['type'];
        if($type === null || $type == ''){
            $redata['msg']="回复类型不能为空";
            return $redata;
        }
        switch ($type) {
            case 0:
                $data['content']=null;
                $data['mater_id']=null;
                break;
            case 1:
                //文本
                if(empty($data['content'])){
                    $redata['msg']="请填写回复内容";
                    return $redata;
                }
                $data['content']= $data['content'];
                $data['mater_id']=null;
                break;
            case 2:
                //素材
                if(empty($data['mater_id'])){
                    $redata['msg']="请选择回复素材";
                    return $redata;
                }
                $data['content']= null;
                $data['mater_id']=$data['mater_id'];
                break;
            default:
                # code...
                break;
        }
        if(!empty($data['id'])){
            //修改
            $flag = $weixinReply->save($data);
        }else{
            //新增
            $data['create_time'] = time();
            $flag = $weixinReply->add($data);
        }
        if($flag!==false){
            $redata['success'] = true;
            $redata['msg'] = "保存成功";
        }else{
            $redata['msg'] = "保存失败";
        }
        return $redata;
    }
    //用于素材、菜单关键词添加
    public function replyAdd($data){
        $data['msgtype'] = 4;
        $data['method_type'] = 1;
        $data['keyword'] = get_keyword();
        $data['create_time'] = time();
        $re = M('weixinReply')->add($data);
        return $re;
    }
}