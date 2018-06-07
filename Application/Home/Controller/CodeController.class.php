<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;
class CodeController extends Controller{
	public function verify(){
		$config = array(
				'fontSize' => 33,
				'length' => 4,
				'useCurve' => false,
				'codeSet'=>'0123456789'
		);
		ob_clean();
		$verify = new Verify( $config );
		$verify->entry();
	}
}