<?php
namespace Think\Template\TagLib;
use Think\Template\TagLib;

class Zxcms extends TagLib{
	// 标签定义
	protected $tags = array(
			'rs'=>array('attr'=>'table,join,where,map,field,order,limit,sql,result,page,id,key,mod,debug','level'=>2),
			'eof'=>array('attr'=>'','close'=>0),
	);
    public function _rs($tag,$content){ 
         $table     =!empty($tag['table'])?C('DB_PREFIX').$tag['table']:'';
         $join     =!empty($tag['join'])?$tag['join']:'';
         $order     =!empty($tag['order'])?$tag['order']:'';
         $limit     =!empty($tag['limit'])?$tag['limit']:'';
         $id        =!empty($tag['id'])?$tag['id']:'v';
         $where     =!empty($tag['where'])?$tag['where']:' 1 ';
         $map        =!empty($tag['map'])?'.'.$tag['map']:'';
         $result     =!empty($tag['result'])?$tag['result']:'ret';
         $key        =!empty($tag['key'])?$tag['key']:'i';
         $mod        =!empty($tag['mod'])?$tag['mod']:'2';
         $page      =!empty($tag['page'])?$tag['page']:false;
         $sql         =!empty($tag['sql'])?$tag['sql']:'';
         $field     =!empty($tag['field'])?$tag['field']:'';
         $debug     =!empty($tag['debug'])?$tag['debug']:false;
         $this->comparison['noteq']= '<>';
         $this->comparison['sqleq']= '=';
         $where     =$this->parseCondition($where);
         $sql         =$this->parseCondition($sql);
         $parsestr ='<?php $m=M();';
         if($sql){
            if($page){
                $limit=$limit?$limit:10;//如果有page，没有输入limit则默认为10
                $parsestr.='$count=count($m->query("'.$sql.'"));';
                $parsestr.='$p = new \Think\Page ( $count, '.$limit.' );';
                $parsestr.='$sql.="'.$sql.'";';
                $parsestr.='$sql.=" limit ".$p->firstRow.",".$p->listRows."";';
                $parsestr.='$'.$result.'=$m->query($sql);';
                $parsestr.='$pages=$p->show();';
            }else{
                $sql.=$limit?(' limit '.$limit):'';
                $parsestr.='$'.$result.'=$m->query("'.$sql.'");'; 
            }
         }else{
             if($page){
                 $limit=$limit?$limit:10;//如果有page，没有输入limit则默认为10
                 $parsestr.='$count=$m->table("'.$table.'")->join("'.$join.'")->where("'.$where.'"'.$map.')->count();';
                 $parsestr.='$p = new \Think\Page ( $count, '.$limit.' );';
                 $parsestr.='$'.$result.'=$m->table("'.$table.'")->join("'.$join.'")->field("'.$field.'")->where("'.$where.'"'.$map.')->limit($p->firstRow.",".$p->listRows)->order("'.$order.'")->select();';
                 $parsestr.='$pages=$p->show();';
             }else{
                 $parsestr.='$'.$result.'=$m->table("'.$table.'")->join("'.$join.'")->field("'.$field.'")->where("'.$where.'"'.$map.')->order("'.$order.'")->limit("'.$limit.'")->select();'; 
             }            
         }      
         if($debug!=false){
            $parsestr.='dump('.$result.');dump($m->getLastSql());';
         }
         
         
         $parsestr.= 'if ($'.$result.'): $'.$key.'=0;';
         $parsestr.= 'foreach($'.$result.' as $key=>$'.$id.'):';
         $parsestr.= '++$'.$key.';$mod = ($'.$key.' % '.$mod.' );?>';
         $parsestr.= $this->tpl->parse($content);      
         $parsestr.= '<?php endif;?>';       
         return $parsestr;
         
    }
    public function _eof($tag) {
    	$parseStr = '<?php endforeach; else: ?>';
    	return $parseStr;
    }
}