<?php
namespace Home\Widget;
use Think\Controller;
class SlideWidget extends Controller{
    public function index($name){
        $class = M('Slide')->where(array('name'=>$name))->find();

        $list = M('SlideList')->where(array('slide_id'=>$class['id'],'isshow'=>1))->order('ordnum,id')->select();

        foreach ($list as $key=>$v){
            switch ($list[$key]['type']){
                case 0:
                    $list[$key]['url'] = "#";break;
                case 1:
                    $list[$key]['url'] = "/list/".$v['item_id'].'.html';break;
                case 2:
                    $list[$key]['url'] = '/info/'.$v['item_id'].'.html';break;
            }
        }

        $this->assign('list',$list);
        $play = $class['theme']?'Slide/'.$class['theme']:'Slide/index';
        if(!is_file('./Application/Home/View/'.C('DEFAULT_THEME').'/'.$play)){
            $play = 'Slide/index';
        }

        $this->theme(C('DEFAULT_THEME'))->display($play);
    }
}