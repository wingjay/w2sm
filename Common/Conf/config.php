<?php
return array(
	//'配置项'=>'配置值'

	// mysql数据库配置
	'DB_TYPE'   => 'mysql', // 数据库类型
//	'DB_HOST'   => 'www.siyuanlib.com', 
	//'DB_host'  =>'114.215.142.109', // 服务器地址
	'DB_host'  =>'127.0.0.1', // 服务器地址
	'DB_NAME'   => '4sjtu', // 数据库名
	'DB_USER'   => 'root', // 用户名
	'DB_PWD'    => 'innoxyzyj', // 密码
	//'DB_PWD'    => 'InnoXYZYJ123', // 密码
	'DB_PORT'   => 3306, // 端口
	'DB_PREFIX' => '4sjtu_', // 数据库表前缀

	//配置默认的过滤方式
	'DEFAULT_FILTER' =>'htmlspecialchars',

	//大小写敏感问题
	'URL_CASE_INSENSITIVE'  => true,
);