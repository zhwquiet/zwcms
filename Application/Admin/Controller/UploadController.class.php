<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
use Admin\Model\AttachmentModel;
class UploadController extends AdminController{
	protected $uptype;
	protected $exts;
	public function _initialize(){
		if (isset($_POST['session'])){
			session_id($_POST['session']);
			session_start();//注意此函数要在session_id之后
		}
		parent::_initialize();
	}
	public function index(){
		$uploadLimit = I('uploadLimit')?I('uploadLimit'):1;
		$this->getexts();
		$exts=implode('; *.',$this->exts);
		$exts='*.'.$exts;
		$this->assign('uptype',$this->uptype);
		$this->assign('maxSize',$this->config['upload']['upmaxsize']);
		$this->assign('exts',$exts);
		$this->assign('uploadLimit',$uploadLimit);
		$this->display();
	}
	public function upload(){
		$this->getexts();
		$config=array(
				'maxSize'=>$this->config['upmaxsize']*1024,
				'exts'=>$this->exts,
				'rootPath'=>'Uploads/',
				'savePath'=>'',
				'saveName'=>date('YmdHis',time()).rand(10000,99999)
		);
		if(empty($_FILES)){
            $redata['success'] = false;
            $redata['msg'] = '超出php.ini配置中post_max_size的最大值';
			$this->ajaxReturn($redata);
		}
		$upload=new \Think\Upload($config);
        $info=$upload->upload();
        $redata['success'] = true;
		if($info){
			//转换成小写
			$info['Filedata']['ext'] = strtolower($info['Filedata']['ext']);
			$attData=array(
					'name'=>$info['Filedata']['name'],
					'path'=>'/'.$config['rootPath'].$info['Filedata']['savepath'].$info['Filedata']['savename'],
					'fileext'=>$info['Filedata']['ext'],
					'time'=>time(),
					'type'=>$this->uptype,
					'md5'=>$info['Filedata']['md5'],
					'sha1'=>$info['Filedata']['sha1']
			);
			$attM=new AttachmentModel();
			$id=$attM->setAtt($attData);
            $redata['Filedata']['savepath'] = __ROOT__.$attData['path'];
            $redata['Filedata']['id'] = $id;
            $redata['Filedata']['ext'] = $this->returnext($attData['fileext']);
		}else{
            $redata['success'] = false;
            $redata['msg'] = $upload->getError();
		}
		$this->ajaxReturn($redata);
	}
	public function getexts(){
		$this->uptype = I('uptype');
		$up_config = $this->config['upload'];
		switch ($this->uptype){
			case 1:$exts = $up_config['uptype_pic'];break;
			case 2:$exts = $up_config['uptype_video'];break;
			case 3:$exts = $up_config['uptype_file'];break;
			case 4:$exts = $up_config['uptype_pic'].'|'.$up_config['uptype_video'].'|'.$up_config['uptype_file'];break;
			default:$this->uptype = 1;$exts = $up_config['uptype_pic'];break;
		}
		$this->exts=explode('|',$exts);
	}
}