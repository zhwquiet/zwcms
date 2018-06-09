<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
class NavController extends AdminController{
    public function _initialize(){
        parent::_initialize();
        $this->assign('method','category');
        $this->assign('child_method','nav');
    }
    public function classindex(){
        $list = D('NavClass')->getlist();
        $this->assign('list',$list);
        $this->display();
    }
    public function classadd(){
        if(IS_POST){
            $data = I('post.');
            $redata['success'] = false;
            $redata['msg'] = '操作失败';
            if($data['id']){
                $re = D('NavClass')->save($data);
            }else{
                unset($data['id']);
                $re = D('NavClass')->add($data);
            }
            if($re !== false){
                $redata['success'] = true;
                $redata['msg'] = '操作成功';
            }
            $this->ajaxReturn($redata);
        }else{
            $id = I('id');
            if(!empty($id)){
                $info = D('NavClass')->getinfo($id);
                $this->assign('info',$info);
            }
            $this->display();
        }
    }
    public function classdel(){
        $id = I('id');
        $redata['success'] = false;
        $redata['msg'] = '删除失败';
        $count = D('Nav')->where(array('class_id'=>$id))->count();
        if($count){
            $redata['msg'] = '分类下存在导航，请先删除导航';
            $this->ajaxReturn($redata);
        }
        $re = D('NavClass')->delete($id);
        if($re !== false){
            $redata['success'] = true;
            $redata['msg'] = '删除成功';
        }
        $this->ajaxReturn($redata);
    }
    /**
     * 获得模板数据
     */
    public function getThemeData() {
        $dirPath = '/Application/Home/View/'.DEFAULT_LANGUAGE.'/web/Nav';
        $this->assign('list', loopFun($dirPath));
        $this->display();
    }
    public function index(){
        $classid = I('classid');
        $info = D('NavClass')->getinfo($classid);
        $this->assign('classtitle',$info['title']);
        $list_arr = D('Nav')->where(array('class_id'=>$classid))->order('id')->select();
        $list = tree($list_arr);
        $this->assign('list', $list);
        $this->assign('classid',$classid);
        $this->display();
    }
    public function add(){
        if(IS_POST){
            $data = I('post.');
            switch ($data['type']){
                case 1:
                    $data['item_id'] = $data['category_id'];break;
                case 2:
                    $data['item_id'] = $data['content_id'];break;
            }
            unset($data['category_id']);
            unset($data['content_id']);
            if($data['id']){
                unset($data['class_id']);
               $re = M('Nav')->save($data);
            }else{
                unset($data['id']);
                $re = M('Nav')->add($data);
            }
            if($re !== false){
                $redata['success'] = true;
                $redata['msg'] = '操作成功';
            }else{
                $redata['success'] = false;
                $redata['msg'] = '操作失败';
            }

            $this->ajaxReturn($redata);
        }else{
            $classid = I('classid');
            $pid = I('pid');
            $id = I('id');
            if(!empty($id)){
                $info = D('Nav')->where(array('id'=>$id))->find();
                $pid = $info['pid'];
                $classid = $info['class_id'];
                $this->assign('info',$info);
            }
            $classifno = D('NavClass')->getinfo($classid);
            $this->assign('classtitle',$classifno['title']);
            $this->assign('pid',$pid);
            $this->assign('classid',$classid);
            $plist = D('Nav')->where(array('pid'=>0))->select();
            $this->assign('plist',$plist);

            $category_list_arr = M('ViewCategory')->order('ordnum')->select();
            $category_list = tree($category_list_arr);
            $this->assign('category_list', $category_list);

            $content_list = M('content')->where('islock != -1 and isurl = 0')->field('id,title')->select();
            $this->assign('content_list', $content_list);
            $this->display();
        }
    }
    public function del(){
        $id = I('id');
        $redata['success'] = false;
        $redata['msg'] = '操作失败';
        $count = D('Nav')->where(array('pid'=>$id))->count();
        if($count){
            $redata['msg'] = '存在二级栏目，暂无法删除';
            $this->ajaxReturn($redata);
        }
        $re = D('Nav')->where(array('id'=>$id))->delete();
        if($re !== false){
            $redata['success'] = true;
            $redata['msg'] = '操作成功';
        }
        $this->ajaxReturn($redata);

    }
    public function reSort(){
        $orderNum = I('orderNum');
        $redata['success'] = false;
        $redata['msg'] = '保存失败';

        $sql = "UPDATE ".C('DB_PREFIX')."nav SET ordnum = CASE id ";
        foreach ($orderNum as $val) {
            $sql .= sprintf("WHEN %d THEN %d ", $val['id'], $val['orderNum']);
        }
        $sql .= "END WHERE id IN (".implode(",",array_column($orderNum,'id')).");";
        $flags=M()->execute($sql);

        if ($flags) {
            $redata['success'] = true;
            $redata['msg'] = '保存成功';
        }
        $this->ajaxReturn($redata);
    }
}