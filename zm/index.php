<?php 
	require_once "../include.php";
	checkLogined();
?>
<!DOCTYPE html>
<html lang="zh" ng-app="admin">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>启辰管理系统</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/main.css"/>
	<script src="../js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="../js/angular.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="../js/angular-route.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/main.js" type="text/javascript" charset="utf-8"></script>
</head>
<body class="container-fluid">
	<header>
		<div class="logobox clearfix">
			<div class="logo pull-left">
				<img src="../images/logo.png"/>
			</div>
			<div class="title pull-right">
				<h1>启辰教育&nbsp;&bull;&nbsp;管理系统</h1>
			</div>
		</div>
		<div class="headtool clearfix">
			<ul class="tool pull-right">
				<li>
					<div class="wec">
						<h3>欢迎您<a class="adm" href="#"><?php echo $_SESSION["admin"]["username"]; ?></a></h3>
					</div>
				</li>
				<li><h3><i class="icon-arrow-left"></i>&nbsp;首页</h3></li>
				<li><h3>后退</h3></li>
				<li><h3>前进</h3></li>
				<li><h3>刷新</h3></li>
				<li><h3><a href="doadminaction.php?act=logout">退出</a></h3></li>
			</ul>
		</div>
	</header>
	<section class="row contitle">
		<div class="admtitle col-xs-3">
			管理列表
		</div>
		<div class="admcont col-xs-9">
			管理页面
		</div>
	</section>
	<section class="row contbox clearfix">
		<nav class="admlist col-xs-pull-3">
			<ul>
				<li>管理员管理</li>
				<li>文章管理</li>
				<li>合作院校</li>
				<li>首页图片</li>
				<li>留言管理</li>
			</ul>
		</nav>
		<div class="admpage col-xs-pull-9" ui-view>
		</div>
	</section>
</body>
</html>