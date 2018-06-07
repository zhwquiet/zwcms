<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
class SettingController extends AdminController {
    public function _initialize(){
        parent::_initialize();
        $this->assign('method','set');
    }
    public function index(){

        if (IS_POST) {
            $setInfo = I('post.');
            $redata = $this->saveconfig($setInfo,'site');
            $this->ajaxReturn($redata);

        } else {
            $setInfo = $this->config['site'];
            $this->assign('setInfo', $setInfo);
            $this->assign('child_method','index');
            $this->display();
        }
    }

    public function seoSetting() {

        if (IS_POST) {

            $setInfo = I('post.');
            $redata = $this->saveconfig($setInfo,'seo');

            $this->ajaxReturn($redata);
        } else {

            $setInfo = $this->config['seo'];
            $this->assign('seoInfo', $setInfo);
            $this->assign('child_method','seo');
            $this->display();
        }
    }

    public function uploadSetting() {

        if (IS_POST) {

            $setInfo = I('post.');
            $redata = $this->saveconfig($setInfo,'upload');

            $this->ajaxReturn($redata);
        } else {
            $uploadInfo = $this->config['upload'];
            $this->assign('uploadInfo', $uploadInfo);
            $this->assign('child_method','upload');
            $this->display();
        }
    }
    public function weixin(){
        if (IS_POST) {

            $setInfo = I('post.');
            $setInfo['token'] = create_wexintoken();
            $redata = $this->saveconfig($setInfo,'weixin');
            $redata['token'] = $setInfo['token'];
            $this->ajaxReturn($redata);
        } else {
            $weixinInfo = $this->config['weixin'];
            $weixinInfo['url'] = 'http://'.$_SERVER['HTTP_HOST']."/weixin.php";
            $this->assign('weixinInfo', $weixinInfo);
            $this->assign('child_method','weixin');
            $this->display();
        }
    }

    public function htmlSetting() {

        if (IS_POST) {

            $setInfo = I('post.');
            if(empty($setInfo['htmlhome'])){
            	$setInfo['htmlhome'] = 0;
            }
            if(empty($setInfo['htmlclass'])){
            	$setInfo['htmlclass'] = 0;
            }
            if(empty($setInfo['htmlcontent'])){
            	$setInfo['htmlcontent'] = 0;
            }
            $redata = $this->saveconfig($setInfo,'html');

            $this->ajaxReturn($redata);
        } else {

            $htmlInfo = $this->config['html'];
            $this->assign('htmlInfo', $htmlInfo);
            $this->assign('child_method','html');
            $this->display();
        }
    }
    public function saveconfig($setInfo,$setname){
        $sql = "UPDATE ".C('DB_PREFIX')."config SET setvalue = CASE setkey ";
        $arr = array();
        foreach ($setInfo as $key => $value) {
            $sql .= sprintf("WHEN '%s' THEN '%s' ", $key, $value);
            $arr[] = "'".$key."'";
        }
        $sql .= "END WHERE setkey IN (".implode(",",$arr).");";
        $result = M()->execute($sql);
        if($result){
            $this->config[$setname] = $setInfo;
            S('config',$this->config);
            $redata['success'] = true;
            $redata['msg'] = '修改成功';
        }else{
            $redata['success'] = false;
            $redata['msg'] = '修改失败';
        }

        return $redata;
    }
}