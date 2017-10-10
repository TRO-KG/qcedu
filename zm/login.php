<!DOCTYPE html>
<html lang="zh">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>系统登录</title>
		<link rel="stylesheet" type="text/css" href="css/login.css"/>
		<script type="text/javascript" src="../js/jquery-1.11.3.min.js"></script>
	</head>

	<body>

		<div class="login-box">
			<h1>启辰管理系统</h1>
			<form action="dologin.php" method="post">
				<div class="name">
					<label>管理员账号：</label>
					<input type="text" name="username">
				</div>
				<div class="password">
					<label>密  码：</label>
					<input type="password" name="password">
				</div>
				<div class="code">
					<label>验证码：</label>
					<input type="text" name="verify" maxlength="4" id="code">
					<div class="codeImg">
						<img src="getverify.php" onclick="this.src='getverify.php?i='+Math.random()">
					</div>
				</div>
				<div class="remember">
					<input type="checkbox" name="remember" id="remember" tabindex="4">
					<label>记住密码</label>
				</div>
				<div class="login">
					<button id="btn" class="btn">登录</button>
				</div>
			</form>
				
		</div>

		<div class="bottom">©2017 QiChenEdu
			<a href="../in.html" target="_blank">启辰教育</a>
		</div>

		<div class="screenbg">
			<ul>
				<li style="opacity: 1; visibility: visible;">
					<a href="javascript:;"><img src="images/0.jpg"></a>
				</li>
				<li style="opacity: 0; visibility: visible;">
					<a href="javascript:;"><img src="images/1.jpg"></a>
				</li>
				<li style="opacity: 0; visibility: visible;">
					<a href="javascript:;"><img src="images/2.jpg"></a>
				</li>
			</ul>
		</div>

	</body>
	<script type="text/javascript">
		$(function() {
			$(".screenbg ul li").each(function() {
				$(this).css("opacity", "0");
			});
			$(".screenbg ul li:first").css("opacity", "1");
			var index = 0;
			var t;
			var li = $(".screenbg ul li");
			var number = li.size();

			function change(index) {
				li.css("visibility", "visible");
				li.eq(index).siblings().animate({
					opacity: 0
				}, 3000);
				li.eq(index).animate({
					opacity: 1
				}, 3000);
			}

			function show() {
				index = index + 1;
				if(index <= number - 1) {
					change(index);
				} else {
					index = 0;
					change(index);
				}
			}
			t = setInterval(show, 8000);

			var width = $(window).width();
			$(".screenbg ul img").css("width", width + "px");
		});
	</script>
</html>