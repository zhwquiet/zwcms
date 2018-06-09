<?php
return array(
	//'配置项'=>'配置值'
    'APP_SUB_DOMAIN_DEPLOY'   =>    1, // 开启子域名配置
    'APP_SUB_DOMAIN_RULES'    =>    array(
        'm'   =>    array('Home','theme=mobile'),  // m域名指向手机模式
    ),
    'MODULE_ALLOW_LIST'  => array('Admin','Home','Common'),
	'TAGLIB_PRE_LOAD'=>'zxcms',
    'PageList' => 10,
	'DATA_CACHE_TIME'=>3600,
	/* 数据缓存设置 */
	'DATA_CACHE_PREFIX'    => 'zxcms_', // 缓存前缀

	/* 数据库配置 */
	'DB_TYPE'   => 'mysqli', // 数据库类型

//	'DB_HOST' => '115.28.184.170',
//	'DB_USER' => 'work',
//	'DB_PWD' => 'newwork.8856',
//	'DB_PORT' => '33099',

	'DB_HOST'   => '127.0.0.1', // 服务器地址
	'DB_USER'   => 'root', // 用户名
	'DB_PWD'    => '123456',// 密码
	'DB_PORT'   => '3306', // 端口

	'DB_NAME'   => 'zxcms', // 数据库名

	'DB_PREFIX' => 'zx_', // 数据库表前缀
	/* URL配置 */
	'URL_CASE_INSENSITIVE' => false, //默认false 表示URL区分大小写 true则表示不区分大小写
	'VAR_URL_PARAMS'       => '', // PATHINFO URL参数变量
	'URL_PATHINFO_DEPR'    => '/', //PATHINFO URL分割符

    /* 模板相关配置 */
    'TMPL_PARSE_STRING_COM' => array(
        '__CIMG__'    => '/Public/Common/images',
        '__CCSS__'    => '/Public/Common/css',
        '__CJS__'     => '/Public/Common/js',
        '__CFONT__'   => '/Public/Common/font',
        '__VENDOR__'  => '/Public/Vendor',
        '__ASSETS__'  => '/Public/assets',
    ),


	'VERIFY_CODE'=>'ef5fadbb-df92-e551-471d-e126b0150038',
);