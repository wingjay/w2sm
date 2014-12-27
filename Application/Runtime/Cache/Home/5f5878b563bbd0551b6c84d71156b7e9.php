<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" lang="zh-CN">
<head>
    
        <title>比较有个性的校内导航</title>
    
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
    
	<link rel="stylesheet" type="text/css" href="/Public/css/Index/nav.css"/>
	<script>
		$(function(){
			//推荐
			var $recommandTitle = $("#recommandTitle");
			var $recommandContent = $("#recommandContent");
			//发掘
			var $discoverTitle = $('#discoverTitle');
			var $discoverContent = $('#discoverContent');
			//公告
			var $noticeTitle = $('#noticeTitle');
			var $noticeContent = $('#noticeContent');
			//点击推荐按钮，切换显示
			$recommandTitle.click(function(){
				var ContentStatus = $recommandTitle.data('status');
				if(ContentStatus == 'hidden'){
					hideContent($discoverTitle,$discoverContent);
					hideContent($noticeTitle,$noticeContent);
					showContent($recommandTitle,$recommandContent);
				}
				if(ContentStatus == 'shown'){
					hideContent($recommandTitle, $recommandContent);
				}
			});
			$discoverTitle.click(function(){
				var ContentStatus = $discoverTitle.data('status');
				if(ContentStatus == 'hidden'){
					hideContent($recommandTitle,$recommandContent);
					hideContent($noticeTitle,$noticeContent);
					showContent($discoverTitle,$discoverContent);
				}
				if(ContentStatus == 'shown'){
					hideContent($discoverTitle, $discoverContent);
				}
			});
			$noticeTitle.click(function(){
				var ContentStatus = $noticeTitle.data('status');
				if(ContentStatus == 'hidden'){
					hideContent($discoverTitle,$discoverContent);
					hideContent($recommandTitle,$recommandContent);
					showContent($noticeTitle,$noticeContent);
				}
				if(ContentStatus == 'shown'){
					hideContent($noticeTitle, $noticeContent);
				}
			});

			//提交推荐结果，隐藏推荐框
			var $submitRecommand = $("#submitRecommand");
			$submitRecommand.click(function(){
				var ContentStatus = $recommandTitle.data('status');
				if(ContentStatus == 'shown'){
					$recommandContent.fadeOut(500);
					$recommandTitle.data('status','hidden');
				}
			});


			//给超链接设置颜色
			var $linkNames = $('.linkName');
			$linkNames.each(function(){
				var $linkName = $(this);
				var $linkNameColor = $linkName.data('key');
				if($linkNameColor){
					$linkName.css('color', $linkNameColor);
				}
			});

		});

		//切换Content的显示状态
		function hideContent($title,$content){
			var contentState = $title.data('status');
			if(contentState == 'shown'){
				$content.fadeOut(100);
				$title.data('status','hidden');
			}
		}
		function showContent($title, $content){
			var contentState = $title.data('status');
			if(contentState == 'hidden'){
				$content.fadeIn(500);
				$title.data('status','shown');
			}
		}
	</script>


</head>

<body>
	
	<header class="header">
		<div class="container">
			<div class="logo">
				<a herf="#" title="比较有个性的校内导航"></a>
			</div>
			<div class="brand">
				暖心的导航
			</div>
		</div>
	</header>

	<div class="pageheader">
		<div class="container">
			<h1>比较有个性的网址导航</h1>
			<div class="note">看起来竟然有点风骚！</div>
		</div>
	</div>

	<section class="container" id="navs">
		<nav>
			<ul class="affix-top">
				<?php if(is_array($linkType)): $i = 0; $__LIST__ = $linkType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
						<a href="#"><?php echo ($vo["name"]); ?></a>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</nav>

		<div class="items">
			<?php if(is_array($links)): $i = 0; $__LIST__ = $links;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="item">
					<h2><?php echo ($vo["type"]); ?></h2>
					<ul class="xoxo blogroll">
						<?php if(is_array($vo['content'])): $i = 0; $__LIST__ = $vo['content'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$link): $mod = ($i % 2 );++$i;?><li onclick="window.open('<?php echo ($link["link"]); ?>')">
								<a title=<?php echo ($link["name"]); ?> target="_blank" data-key=<?php echo ($link["color"]); ?> class="linkName">
									<?php echo ($link["name"]); ?>
								</a>
								<!--<br>-->
								<!--<?php echo ($link["description"]); ?>-->
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
		</div>

		<div class="function">
			<!--我要推荐-->
			<div id="recommand">
				<div id="recommandTitle" data-status="hidden" style="cursor: pointer"><p>我要推荐网站</p></div>
				<div id="recommandContent" style="display: none">
					<p>你可以向全校同学推荐你认为优质的网站哦！</p>
					<form action="/index/addRecommandedWeb" method="post">
						<p><input type="text" name="name" class="form-control" placeholder="网站名称"></p>
						<p><input type="text" name="link" class="form-control" placeholder="www.baidu.com"></p>
						<p><input type="text" name="description" class="form-control" placeholder="网站描述"></p>
						<p><input id="submitRecommand" type="submit" class="btn btn-default" value="推荐！"></p>
					</form>
				</div>
			</div>
			<!--发现-->
			<div id="discover">
				<div id="discoverTitle" data-status="hidden" style="cursor: pointer"><p>发掘一些美妙的网站</p></div>
				<div id="discoverContent" style="display: none"><p><a href="http://www.jobdeer.com/?fr=4sjtu">卖萌又卖人的互联网人才拍卖网站 JobDeer.com</a></p></div>
			</div>
			<!--通知公告-->
			<div id="notice">
				<div id="noticeTitle" data-status="hidden" style="cursor: pointer"><p>公告</p></div>
				<div id="noticeContent" style="display: none">
					<p>当链接点击量达到一定，链接文本会变回本色。</p>
					<p>我们坚信，导航能节约生命</p>
				</div>


			</div>

			</textarea>
		</div>
	</section>

	<footer class="footer">
		<div class="container">
			<p>© 2010-2015 <a href="http://www.4sjtu.com">交大导航</a> 让同学们上网更快</p>
		</div>
	</footer>

</body>

</html>