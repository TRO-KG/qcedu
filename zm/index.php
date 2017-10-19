<?php
require_once "../include.php";
checkLogined();
?>
<!DOCTYPE html>
<html lang="zh" ng-app="adm">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>启辰管理系统</title>
	<link rel="shortcut icon" href="../favicon.ico" />
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/main.css"/>
	<script src="../js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="../js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="../js/angular.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="../js/angular-route.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/main.js" type="text/javascript" charset="utf-8"></script>
</head>
<body class="container-fluid w1200">
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
					<a class="adm" href="#"><span>欢迎您：</span><?php echo $_SESSION["admin"]["username"]; ?></a>
				</li>
				<li>
					<a href="#"><i class="fa fa-home"></i>&nbsp;首页</a>	
				</li>
				<li>
					<a href="#"><i class="fa fa-chevron-left"></i>&nbsp;后退</a>
				</li>
				<li>
					<a href="#">前进&nbsp;<i class="fa fa-chevron-right"></i></a>
				</li>
				<li>
					<a href="#"><i class="fa fa-refresh" aria-hidden="true"></i>&nbsp;刷新</a>
				</li>
				<li>
					<a href="doadminaction.php?act=logout">退出&nbsp;<i class="fa fa-sign-out"></i></a>	
				</li>
			</ul>
		</div>
	</header>
	<section class="row-fluid contitle clearfix">
		<div class="adm-left col-xs-2">
			<h3 class="admtitle">管理列表</h3>
			<ul class="admmenu">
				<li>
					管理员管理
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					文章管理
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					合作院校
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					首页图片
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					留言管理
					<i class="fa fa-angle-right"></i>
				</li>
			</ul>
			<ul class="admlist pull-right">
				<li>
					<a ui-sref="accountlist" ui-sref-active="current">账号列表</a>
				</li>
				<li>
					<a ui-sref="addadm" ui-sref-active="current">添加管理员</a>
				</li>
			</ul>
		</div>
		<div class="adm-right col-xs-10">
			<h3 class="admtitle">管理页面</h3>
			<ul class="breadcrumb">
				<li>
					<span>
						管理员管理
					</span>
				</li>
				<li class="active">
					账号列表
				</li>
			</ul>
			<div class="content clearfix" ui-view>
			</div>
		</div>
	</section>
<footer>
	<hr>
	<p>
		© 2017
		<a href="#" target="_blank">
			QCEDU
		</a>
		<a href="#">启辰教育</a>
	</p>
<!--
			<script src="http://s95.cnzz.com/z_stat.php?id=1258984548&amp;web_id=1258984548" language="JavaScript"></script>
			<script src="http://c.cnzz.com/core.php?web_id=1258984548&amp;t=z" charset="utf-8" type="text/javascript"></script>-->
</footer>
</body>
</html>