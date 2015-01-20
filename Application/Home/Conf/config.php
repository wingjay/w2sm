<?php
return array(
	//'配置项'=>'配置值'
	//大类别对应ID
	'sjtu' => 1,
	'coder' => 2,
	'zhai' => 3,
	'fun' => 4,
	'wenyi' => 5,
	'shopping' => 6,
	'job' => 7,
	//类别常量
	'government' => '校方',
	'graduate' => '研究生',
	'underGraduate' => '本科生',
	'college' => '学院网站',
	'resource' => '校内资源',
	'geeker' => '交大创业者们',
	'wonderful' => '优质网站',
	'service' => '校园服务',
	'recommend' => '被推荐',

	//'配置项'=>'配置值'
	//模块分组
	'APP_GROUP_LIST' => 'Admin,Home',
	'DEFAULT_GROUP' => 'Home',

	// mysql数据库配置
	'DB_TYPE'   => 'mysql', // 数据库类型
	'DB_host'  =>'114.215.142.109', // 阿里云服务器地址
	'DB_PWD'    => 'InnoXYZYJ123', // 阿里云密码
	//'DB_host'  =>'127.0.0.1', // 本地服务器地址
	//'DB_PWD'    => 'innoxyzyj', // 本地密码
	'DB_NAME'   => '4sjtu', // 数据库名
	'DB_USER'   => 'root', // 用户名
	'DB_PORT'   => 3306, // 端口
	'DB_PREFIX' => 'w2sm_', // 数据库表前缀

	//配置默认的过滤方式
	'DEFAULT_FILTER' =>'htmlspecialchars',

	//URL区分大小写
	'URL_CASE_INSENSITIVE'  => true,

	//开启静态缓存
	//'HTML_CACHE_ON' => true,

	//跳转到自定义界面
	'TMPL_ACTION_ERROR' => __ROOT__ .'Template/error',
	'TMPL_ACTION_SUCCESS' => __ROOT__ .'Template/success',

);