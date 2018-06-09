<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/6/9
 * Time: 上午9:13
 */
namespace Weixin\Controller;
use Common\Controller\BaseController;

class NewsController extends BaseController{
    public function index(){
        $id = I('id');
        var_dump($id);
    }
}