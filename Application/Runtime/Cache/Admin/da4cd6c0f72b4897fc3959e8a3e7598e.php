<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" lang="zh-CN">
<head>
	
		<title>后台--比较有个性的校内导航</title>
	
	<meta name="apple-mobile-web-app-title" content="导航">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="stylesheet" type="text/css" href="/Public/css/bootstrap.css"/>
	<link rel="stylesheet" type="text/css" href="/Public/css/base.css" media="all"/>
	<link rel="stylesheet" id="da-fontawesome-css" href="http://apps.bdimg.com/libs/fontawesome/4.2.0/css/font-awesome.min.css?ver=7.0.4" type="text/css" media="all">
	<link rel="shortcut icon" href="/public/images/icon/favicon.ico">
	<script type="text/javascript" src="/Public/js/jquery-1.11.1.js"></script>
	<script type="text/javascript" src="/Public/js/bootstrap.js"></script>
	<script type="text/javascript" src="/Public/js/base.js?ver=7.0.4"></script>
	<script type="text/javascript" src="/Public/js/signpop.js"></script>
	<script type="text/javascript" src="/Public/js/util.js"></script>
	<!--头部可以引入一些css和js-->
	
		<style type="text/css">
			div{
				margin-bottom: 20px;
			}
		</style>


	

</head>

<body style="margin:100px 100px 0 100px;">
	<form action="admin.php/index/addLink" method="post">
		<div>
			网站名称：<input type="text" name="name"/>
		</div>
		<div>
			网站链接：<input type="text" name="link"/>
		</div>
		<div>
			网站描述：<input type="text" name="description"/>
		</div>
		<div>
			网站分类：
			<select name="category" class="form-control" style="width: 100px">
				<?php if(is_array($linkType)): $i = 0; $__LIST__ = $linkType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value=<?php echo ($vo["id"]); ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
		</div>
		<input type="submit" class="btn btn-default"/>
	</form>
</body>

</html>