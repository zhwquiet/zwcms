<?php
return array(
	//'配置项'=>'配置值'
	'WEBNAME'=>'',
	//运行模式   false:伪静态     true:静态
	'WEBMODE'=>false,
	//页面压缩
	'OUTPUT_ENCODE'=>false,	
	//模板缓存
	'TMPL_CACHE_ON' => false,
	//生成目录
	'HTML_PATH'=>'html/',
	
	'HTML_FILE_SUFFIX' => '.html',// 默认静态文件后缀
	
	'URL_MODEL'            => 2, //URL模式

    /* 错误页面模板 */
    'OUTPUT_ENCODE' => true,
// 	'ERROR_PAGE' => 'Public/error/404.html',
// 	'TMPL_EXCEPTION_FILE'=> 'Public/error/404.html',
// 	'TMPL_ACTION_ERROR'     =>  'Public/error/404.html',
// 	'TMPL_ACTION_SUCCESS'   =>  'Public/error/404.html',

	'URL_ROUTER_ON'   => true,
	'URL_ROUTE_RULES'=>array(
		//公共路由
		
		//留言
		'book'=>'Book/index',
		'bookpage'=>'Book/page',
		'bookadd'=>'Book/add',

		//验证码
		'code_verify'=>'Code/verify',
		
		//评论
		'comment/:id'=>'Comment/index',
		'comment_form'=>'Comment/form',
		'comment_load'=>'Comment/load',
		'comment_add/:id'=>'Comment/add',
		
		'list/:classid'=>'List/index',
		'info/:id'=>'List/info',
		
		//注册
		'register'=>'Register/index',
		//登录 
		'login'=>'Login/index',
		'login_validate'=>'Loin/validate',
		//退出
		'login_quit'=>'Login/quit',
		//搜索
		'search'=>'Search/index',
		'search_content'=>'Search/getcontent',		
		//网站地图
		'sitemap'=>'Sitemap/index',
		
			
		//自定义路由
		//例：公司新闻
		'news' => array('List/index', 'classid=1'),
		
	),
);