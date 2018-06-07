<?php
/**
 * 生成静态页面文件
 * @author Administrator
 *
 */
namespace Home\Controller;
use Home\Controller\HomeController;
class CreateController extends HomeController{
	//生成首页
	public function index(){
		R('Index/index',array('mode'=>true));
	}
	//生成栏目
	public function category($classlist){
		$htmltotal = $this->config['htmltotal'];
		$classlist = I('classlist')?I('classlist'):$classlist;
		$arr = explode(",", $classlist);
		foreach($arr as $v){
			for($i=1;$i<=$htmltotal;$i++){
				R('List/index',array('classid'=>$v,'p'=>$i,'mode'=>true));
			}	
		}	
	}
	//生成内容
	public function content(){
		$model = M();
		$classid = I('classid');
		$isall = I('isall');//是否包含子分类
		if($isall){
			$sonid = $model->table('zx_category')->where(array('id'=>$classid))->getField('sonid');
			$classid .= ','.$sonid;
		}
		$where['categoryid'] = array('in',$classid);
		$contentlist = $model->table('zx_content')->where($where)->field('id')->select();
		foreach ($contentlist as $v){
			R('List/info',array('id'=>$v['id'],'mode'=>true));
		}
	}
	//一键生成整站
	public function all(){
		//生成首页
		$this->index();
		//生成栏目页
		$classlist = '';
		$model = M();
		$catelist = $model->table('zx_category')->field('id')->select();
		foreach ($catelist as $v){
			$classlist .= $v['id'].',';
		}
		$classlist = substr($classlist, 0,-1);
		$this->category($classlist);
		//生成内容页
		$contentlist = $model->table('zx_content')->field('id')->select();
		foreach ($contentlist as $v){
			R('List/info',array('id'=>$v['id'],'mode'=>true));
		}
	}
}