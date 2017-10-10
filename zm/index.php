<?php 
	require_once "../include.php";
	checkLogined();
?>
<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>启辰管理系统</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/main.css"/>
	<script src="../js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
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
					<div>
						<a class="adm" href="#"><span>欢迎您：</span><?php echo $_SESSION["admin"]["username"]; ?></a>
					</div>
				</li>
				<li>
					<div>
						<a href="#"><i class="icon-arrow-left"></i>&nbsp;首页</a>
					</div>
				</li>
				<li>
					<div>
						<a href="#">后退</a>
					</div>
				</li>
				<li>
					<div>
						<a href="#">前进</a>
					</div>	
				</li>
				<li>
					<div>
						<a href="#">刷新</a>
					</div>
				</li>
				<li>
					<div>
						<a href="doadminaction.php?act=logout">退出</a>	
					</div>
				</li>
			</ul>
		</div>
	</header>
	<section class="row contitle">
		<div class="admtitle col-xs-2">
			管理列表
		</div>
		<div class="admcont col-xs-10">
			管理页面
		</div>
	</section>
	<section class="row contbox clearfix">
		<nav class="admlist col-xs-2">
			<ul>
				<li>管理员管理</li>
				<li>文章管理</li>
				<li>合作院校</li>
				<li>首页图片</li>
				<li>留言管理</li>
			</ul>
		</nav>
		<div class="admpage col-xs-10">
			<?php include_once 'modules/sys.html'; ?>
		</div>
	</section>
</body>
</html>