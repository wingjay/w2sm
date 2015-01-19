<?php
return array(
	//'配置项'=>'配置值'
	//模块分组
	'APP_GROUP_LIST' => 'Admin,Home',
	'DEFAULT_GROUP' => 'Home',

	// mysql数据库配置
	'DB_TYPE'   => 'mysql', // 数据库类型
	//'DB_host'  =>'114.215.142.109', // 阿里云服务器地址
	//'DB_PWD'    => 'InnoXYZYJ123', // 阿里云密码
	'DB_host'  =>'127.0.0.1', // 本地服务器地址
	'DB_PWD'    => 'innoxyzyj', // 本地密码
	'DB_NAME'   => '4sjtu', // 数据库名
	'DB_USER'   => 'root', // 用户名
	'DB_PORT'   => 3306, // 端口
	'DB_PREFIX' => 'w2sm_', // 数据库表前缀

	//配置默认的过滤方式
	'DEFAULT_FILTER' =>'htmlspecialchars',

	//URL区分大小写
	'URL_CASE_INSENSITIVE'  => true,

);