<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/25
 * Time: 上午8:46
 */
namespace Admin\Controller;
use Admin\Controller\AdminController;
class SlideController extends AdminController
{
    public function _initialize()
    {
        parent::_initialize();
        $this->assign('method','expand');
        $this->assign('child_method','slide');
    }

    public function index()
    {
        $list = D('Slide')->getlist();
        $this->assign('list', $list);
        $this->display();
    }

    public function add()
    {
        if (IS_POST) {
            $data = I('post.');
            $redata['success'] = false;
            $redata['msg'] = '操作失败';
            if ($data['id']) {
                $re = D('Slide')->save($data);
            } else {
                unset($data['id']);
                $re = D('Slide')->add($data);
            }
            if ($re !== false) {
                $redata['success'] = true;
                $redata['msg'] = '操作成功';
            }
            $this->ajaxReturn($redata);
        } else {
            $id = I('id');
            if (!empty($id)) {
                $info = D('Slide')->getinfo($id);
                $this->assign('info', $info);
            }
            $this->display();
        }
    }

    public function del()
    {
        $id = I('id');
        $redata['success'] = false;
        $redata['msg'] = '删除失败';
        $count = D('SlideList')->where(array('slide_id' => $id))->count();
        if ($count) {
            $redata['msg'] = '分类下存在幻灯片列表，请先从列表中删除';
            $this->ajaxReturn($redata);
        }
        $re = D('Slide')->delete($id);
        if ($re !== false) {
            $redata['success'] = true;
            $redata['msg'] = '删除成功';
        }
        $this->ajaxReturn($redata);
    }

    public function listpage(){
        $classid = I('classid');
        $info = D('Slide')->getinfo($classid);
        $this->assign('classtitle',$info['title']);
        $list = D('SlideList')->where(array('slide_id'=>$classid))->order('id')->select();
        $this->assign('list', $list);
        $this->assign('classid',$classid);
        $this->display('list');
    }
    public function listadd(){
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
                $re = M('SlideList')->save($data);
            }else{
                unset($data['id']);
                $re = M('SlideList')->add($data);
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
                $info = D('SlideList')->where(array('id'=>$id))->find();
                $pid = $info['pid'];
                $classid = $info['slide_id'];
                $this->assign('info',$info);
            }
            $classifno = D('Slide')->getinfo($classid);
            $this->assign('classtitle',$classifno['title']);
            $this->assign('pid',$pid);
            $this->assign('classid',$classid);

            $category_list_arr = M('ViewCategory')->order('ordnum')->select();
            $category_list = tree($category_list_arr);
            $this->assign('category_list', $category_list);

            $content_list = M('content')->where('islock != -1 and isurl = 0')->field('id,title')->select();
            $this->assign('content_list', $content_list);
            $this->display();
        }
    }
    public function listdel(){
        $id = I('id');
        $redata['success'] = false;
        $redata['msg'] = '操作失败';
        $re = D('SlideList')->where(array('id'=>$id))->delete();
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

        $sql = "UPDATE ".C('DB_PREFIX')."slide_list SET ordnum = CASE id ";
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