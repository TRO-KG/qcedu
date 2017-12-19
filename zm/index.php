<?php
require_once "../include.php";
//checkLogined();
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
	<script src="../js/angular.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="../js/angular-route.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="../../js/ng-file-upload.min.js"></script>
    <script src="../../js/ng-file-upload-shim.min.js"></script>
	<script src="js/main.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/controller.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/filter.js" type="text/javascript" charset="utf-8"></script>
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
					<a class="adm" href="#"><span>欢迎您：</span>
						<?php 
							if(isset($_SESSION["adminName"])){
								echo $_SESSION["adminName"]; 
							}elseif(isset($_COOKIE["adminName"])){
								echo $_COOKIE["adminName"]; 
							}	
						?>		
					</a>
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
					<a ui-sref="homepage">首页管理</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a ui-sref="accountlist">管理员管理</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a ui-sref="articles">文章管理</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					<a ui-sref="cooperate">合作院校</a>
					<i class="fa fa-angle-right"></i>
				</li>
				<li>
					留言管理
					<i class="fa fa-angle-right"></i>
				</li>
			</ul>
			<div class="admlist pull-right" ui-view="menu"></div>
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
			<div class="content clearfix" ui-view="content">
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
</footer>
</body>
</html>