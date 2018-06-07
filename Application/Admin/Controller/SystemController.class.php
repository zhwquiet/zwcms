<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/9
 * Time: 下午5:05
 */
namespace Admin\Controller;
use Admin\Controller\AdminController;
class SystemController extends AdminController{
    public function _initialize(){
        parent::_initialize();
        $this->assign('method','system');
    }

    public function adminList() {
        $groupid = I('groupid');
        $where = '';
        if(!empty($groupid)){
            $where = array('a.groupid'=>$groupid);
            $this->assign('groupid',$groupid);
        }
        $adminList = M('Admin')->alias('a')->join('left join '.C('DB_PREFIX').'admin_group b on a.groupid = b.id')->field('a.*,b.groupname')->where($where)->select();
        $this->assign('adminList', $adminList);
        $this->assign('child_method','admin');
        $this->display();
    }

    public function addAdmin() {

        if (IS_POST) {
            $adminInfo = I('post.');
            $model = D('Admin');
            $redata['success'] = false;
            $redata['msg'] = '操作失败';
            if(empty($adminInfo['id'])){
                unset($adminInfo['oldPassword']);
                $adminInfo['password'] = md5($adminInfo['password']);
                $adminInfo['logincount'] = 0;
                $adminInfo['lastlogintime'] = time();
                $adminInfo['lastloginip'] = get_real_ip();

                if(!$model->create($adminInfo)){
                    $redata['msg'] = $model->getError();
                    $this->ajaxReturn($redata);
                }
                $res = $model->add($adminInfo);

            }else{
                if ($adminInfo['password']) {
                    $adminInfo['password'] = md5($adminInfo['password']);
                } else {
                    $adminInfo['password'] = $adminInfo['oldPassword'];
                }
                unset($adminInfo['oldPassword']);
                $res = $model->where(array('id' => $adminInfo['id']))->save($adminInfo);
            }
            if ($res) {
                $redata['success'] = true;
                $redata['msg'] = '操作成功';
            }
            $this->ajaxReturn($redata);
        } else {
            $groupInfo = M('AdminGroup')->field('id, groupname')->select();
            $this->assign('groupInfo', $groupInfo);
            $this->assign('child_method','admin');
            $id = I('id');
            if(!empty($id)){
                $adminInfo = M('Admin')->field('id, adminname, password, penname, islock, groupid')->where(array('id' => $id))->find();
                $this->assign('adminInfo', $adminInfo);
            }
            $this->display();
        }
    }

    public function delAdmin() {

        $id = I('id');

        $res = M('Admin')->where(array('id' => $id))->delete();

        if ($res) {
            $redata['success'] = true;
            $redata['msg'] = '删除成功';
        } else {
            $redata['success'] = false;
            $redata['msg'] = '删除失败';
        }

        $this->ajaxReturn($redata);
    }

    public function groupList() {

        $groupInfo = M('AdminGroup')->select();

        $this->assign('groupInfo', $groupInfo);
        $this->assign('child_method','group');
        $this->display();
    }

    public function pageConfig() {
        if (IS_POST) {
            $levelInfo = I('post.');
            $res = M('AdminGroup')->where(array('id' => $levelInfo['id']))->save(array('pagelever' => trim($levelInfo['ids'], ',')));
            if ($res !== false) {
                S('menutree'.session('uid'),null);
                $redata['success'] = true;
                $redata['msg'] = '修改成功';
            } else {
                $redata['success'] = false;
                $redata['msg'] = '修改失败';
            }
            $this->ajaxReturn($redata);
        } else {
            $menulist = M('adminMenu')->where(array('islock'=>1))->select();
            $menutree = new \Tree($menulist);
            $id = I('id');
            $groupInfo = M('AdminGroup')->where(array('id' => $id))->find();
            $levelArr = explode(',', $groupInfo['pagelever']);
            $this->assign('id', $id);
            $this->assign('levelArr', $levelArr);
            $this->assign('menutree', $menutree->leaf(0));
            $this->assign('child_method','group');
            $this->display();
        }
    }

    public function addGroup() {
        $model = D('AdminGroup');
        if (IS_POST) {
            $redata['success'] = false;
            $redata['msg'] = '操作失败';
            $data = I('post.');
            if(!$model->create($data)){
                $redata['msg'] = $model->getError();
                $this->ajaxReturn($redata);
            }
            if(!empty($data['id'])){
                $res = $model->save($data);
            }else{
                $data['createdate'] = time();
                $res = $model->add($data);
            }
            if ($res !== false) {
                $redata['success'] = true;
                $redata['msg'] = '操作成功';
            }
            $this->ajaxReturn($redata);
        } else {
            $id = I('id');
            if ($id) {
                $groupInfo = $model->where(array('id' => $id))->find();
                $this->assign('groupInfo', $groupInfo);
            }
            $this->assign('child_method','group');
            $this->display();
        }
    }

    public function delGroup() {

        $id = I('id');

        $res = M('AdminGroup')->where(array('id' => $id))->delete();

        if ($res) {
            $redata['success'] = true;
            $redata['msg'] = '删除成功';
        } else {
            $redata['success'] = false;
            $redata['msg'] = '删除失败';
        }

        $this->ajaxReturn($redata);
    }
    public function uppwd(){
        if(IS_POST){
            $username=session('username');
            $oldPass=I('oldpass');
            $newPass=I('newpass');
            $renewPass=I('renewpass');
            $redata['success']=false;
            if($renewPass != $newPass){
                $redata['msg']='两次输入的新密码不一致';
                $this->ajaxReturn($redata);
            }
            $admin=D('Admin');
            $res=$admin->getAdminInfo($username);
            if(md5($oldPass) != $res['password']){
                $redata['msg']='旧密码不正确';
                $this->ajaxReturn($redata);
            }
            if(md5($newPass) == $res['password']){
                $redata['msg']='新密码与旧密码一致';
                $this->ajaxReturn($redata);
            }
            $data['password']=md5($newPass);
            $b=$admin->setLoginInfo($username,$data);
            if($b !== false){
                $redata['success']=true;
                $redata['msg']='修改成功';
            }else{
                $redata['msg']='修改失败';
            }
            $this->ajaxReturn($redata);
        }else{
            $this->assign('child_method','uppwd');
            $this->display();
        }
    }
}