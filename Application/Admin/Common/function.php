<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/5/10
 * Time: 上午9:03
 */
function tree($data,$pid=0,$level = 1){
    $treeList = array();
    foreach($data as $v){
        if($v['pid']==$pid){
            $v['level']=$level;
            $treeList = array_merge($treeList,array($v));
            $treeList = array_merge($treeList,tree($data,$v['id'],$level+1));
        }
    }
    return $treeList ;
}
function write_log($arr){
    $arr['loginip'] = get_client_ip();
    $arr['createtime'] = time();
    M('AdminLog')->add($arr);
}
// 生成微信唯一token
function create_wexintoken() {
//可以指定前缀
    $str = md5(uniqid(mt_rand(), true));
    $uuid = substr($str, 0, 4) . time();
    return $uuid;
}
/**
 *关键词获取字符串
 * Method: get_keyword
 * User: menyu
 * @return string
 *
 */
function get_keyword() {
    $str = "TEXT_" . date("ymd") . "_" . createRandomCode(6);
    return $str;

}
/**
 * 获取按钮事件类型
 * author liuqi
 * @param $type
 */
function getbttype($type){
    if($type != 3){
        return 'click';
    }else{
        return 'view';
    }
}

///**
// * 拼装菜单json
// * author liuqi
// */
//function getbtjson($arr,$pid=0){
//    $lists=array();
//    foreach ($arr as $v) {
//        if ($v['pid'] == $pid) {
//            $list = array();
//            $list['type'] = getbttype($v['type']);
//            $list['name'] = $v['title'];
//            if (getbttype($v['type']) == 'click') {
//                $list['key'] = $v['keyword'];
//            } else {
//                $list['url'] = $v['url'];
//            }
//            foreach ($arr as $v2){
//                if($v2['pid']==$v['id']){
//                    $list2 = array();
//                    $list2['type'] = getbttype($v2['type']);
//                    $list2['name'] = $v2['title'];
//                    if (getbttype($v2['type']) == 'click') {
//                        $list2['key'] = $v2['keyword'];
//                    } else {
//                        $list2['url'] = $v2['url'];
//                    }
//                    $list['sub_button']=$list2;
//                    $lists['button'][] = $list;
//                }
//            }
//        }
//    }
//    return json_encode($lists,JSON_UNESCAPED_UNICODE);
//}