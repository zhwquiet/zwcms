<?php
/**
 * 模型跳转
 * @author Administrator
 *
 */
namespace Home\Controller;
use Home\Controller\HomeController;
class ListController extends HomeController{
    public function index($classid,$p=1,$mode = false){
		$classid = I('classid')?I('classid'):$classid;
		$p = I('p')?I('p'):$p;
		$fileName=C('HTML_PATH').'List_index_'.$classid.'_'.$p.C('HTML_FILE_SUFFIX');
		if(C('WEBMODE') && is_file($fileName)){
			$this->display($fileName);
		}else{
			$model = M('ViewCategory');
			$cateinfo = $model->cache(C('ISCACHE'))->field('pid,catename,catedir,catepicid,sonid,seotitle,catekey,catedesc,cateurl,modelid,pagenum,cate_list,cate_show,list_temp')->where(array('id'=>$classid))->find();
			switch ($cateinfo['modelid']){
				case '-1':
					$html = !empty($cateinfo['cate_show'])?$cateinfo['cate_show']:'page/index.html';
					break;
				case '-2':
					
					//header("Location:http://www.zxcms80.com".$cateinfo['cateurl'].'/classid/'.$classid.'/pid/'.$cateinfo['pid'].'.html');
					$this->redirect($cateinfo['cateurl'],array('classid'=>$classid,'pid'=>$cateinfo['pid']));
					exit();
				default:
					$html = !empty($cateinfo['cate_list'])?$cateinfo['cate_list']:$cateinfo['list_temp'];
					break;
			}
			$parentid = $cateinfo['pid']?$cateinfo['pid']:$classid;
            $parentinfo = $model->cache(C('ISCACHE'))->where(array('id'=>$parentid))->field('catename,catedir,catepicid')->find();
			$sonid = !empty($cateinfo['sonid'])?$classid.','.$cateinfo['sonid']:$classid;
			$this->assign('classid',$classid);
			$this->assign('sonid',$sonid);
			$this->assign('pid',$cateinfo['pid']);
			$this->assign('parentid',$parentid);
            $this->assign('parentinfo',$parentinfo);
			$this->assign('classname',$cateinfo['catename']);
			$this->assign('seotitle',!empty($cateinfo['seotitle'])?$cateinfo['seotitle']:$this->config['seotitle']);
			$this->assign('seokey',!empty($cateinfo['catekey'])?$cateinfo['catekey']:$this->config['seokey']);
			$this->assign('seodesc',!empty($cateinfo['catedesc'])?$cateinfo['catedesc']:$this->config['seodesc']);
			$this->assign('pagenum',$cateinfo['pagenum']);
			$this->assign('catedir',$cateinfo['catedir']);
			$this->assign('page',$p);

            if(!is_file('./Application/Home/View/'.C('DEFAULT_THEME').'/List/'.$html)){
                $html = 'List/'.$cateinfo['list_temp'];
            }

			$html = 'List/'.str_replace('.html','',$html);

			if($mode){
				$this->buildHtml('List_index_'.$classid.'_'.$p, C('HTML_PATH'),$html, 'utf8');				
			}else{
				$this->display($html);
			}
		}
    }
    public function info($id,$mode=false){
		$id = I('id')?I('id'):$id;
		$model = M();
		//增加浏览次数
		$model->execute('update zx_content set hits=hits+1 where id = '.$id);
		
		$fileName=C('HTML_PATH').'List_info_'.$id.C('HTML_FILE_SUFFIX');
		if(C('WEBMODE') && is_file($fileName)){
			$this->display($fileName);
		}else{
			$contentinfo = $model->cache(C('ISCACHE'))->table('zx_content a')->join('left join zx_view_category b on a.categoryid = b.id')->field('b.id,a.title,a.createtime,a.author,a.intro,a.hits,a.keyword,a.description,a.iscomment,a.comments,a.isurl,a.url,b.pid,b.catename,b.catedir,b.sonid,b.catekey,b.catedesc,b.tablename,b.cate_show,b.show_temp')->where(array('a.id'=>$id))->find();
			$info = $model->cache(C('ISCACHE'))->table($contentinfo['tablename'])->where(array('cid'=>$id))->find();
			//上一篇
			$pre = $model->cache(C('ISCACHE'))->table('zx_content')->field('id,isurl,url,title,style,categoryid')->where('islock=1 and categoryid='.$contentinfo['id'].' and id<'.$id.' and isurl=0')->order('id desc')->find();
			//下一篇
			$next = $model->cache(C('ISCACHE'))->table('zx_content')->field('id,isurl,url,title,style,categoryid')->where('islock=1 and categoryid='.$contentinfo['id'].' and id>'.$id.' and isurl=0')->find();
			$this->assign('pre',$pre);
			$this->assign('next',$next);
			
			$html = !empty($contentinfo['cate_show'])?$contentinfo['cate_show']:$contentinfo['show_temp'];
			if($contentinfo['isurl']){
				$contenturl = $contentinfo['url'];
			}else{
				$contenturl = WEBURL.'index.php?s=/List/info/id/'.$id;
			}
			$parentid = $contentinfo['pid']?$contentinfo['pid']:$contentinfo['id'];
			$this->assign('classid',$contentinfo['id']);
			$this->assign('pid',$contentinfo['pid']);
			$this->assign('parentid',$parentid);
			$this->assign('classname',$contentinfo['catename']);
			$this->assign('seotitle',!empty($contentinfo['title'])?$contentinfo['title']:$this->config['seotitle']);
			$this->assign('seokey',!empty($contentinfo['keyword'])?$contentinfo['keyword']:(!empty($contentinfo['catekey'])?$contentinfo['catekey']:$this->config['seokey']));
			$this->assign('seodesc',!empty($contentinfo['description'])?$contentinfo['description']:(!empty($contentinfo['catedesc'])?$contentinfo['catedesc']:$this->config['seodesc']));
			$this->assign('iscomment',$contentinfo['iscomment']);
			$this->assign('comments',$contentinfo['comments']);
			$this->assign('catedir',$contentinfo['catedir']);
			
			$this->assign('title',$contentinfo['title']);
			$this->assign('intro',$contentinfo['intro']);
			$this->assign('createtime',$contentinfo['createtime']);
			$this->assign('author',$contentinfo['author']);
			$this->assign('hits',$contentinfo['hits']);
			$this->assign('contenturl',$contenturl);
			$this->assign('id',$id);
			//详情内容
			$this->assign('info',$info);
			//产品模型图片列表用
			if(!empty($info['piclist'])){
				$picarr = explode(',',$info['piclist']);
				$this->assign('picarr',$picarr);
			}
            if(!is_file('./Application/Home/View/'.C('DEFAULT_THEME').'/List/'.$html)){
                $html = 'List/'.$contentinfo['show_temp'];
            }
			$html = 'List/'.str_replace('.html','',$html);

			if($mode){
				$this->buildHtml('List_info_'.$id, C('HTML_PATH'), $html, 'utf8');
			}else{
				$this->display($html);
			}			
		}
    }
}