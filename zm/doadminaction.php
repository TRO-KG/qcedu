<?php
require_once "../include.php";
$act = $_REQUEST["act"];
if("logout" == $act){
	logout();
}
elseif("login" == $act){
	session_start();
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$verify   = $_POST['verify'];                           
	$verify1  = $_SESSION["verify"];
	$autoflag = $_POST["remember"];
	
	if($verify == $verify1){
		$sql = "SELECT * FROM `qc_admin` WHERE `username` LIKE '{$username}' AND `password` LIKE '{$password}'";
		$row = checkAdmin($sql);
		if($row){
			if($autoflag){
				setcookie("adminName",$row["username"],time()+7*24*3600);
				setcookie("adminId",$row["id"],time()+7*24*3600);
			}
			$_SESSION["adminName"] = $row["username"];
			$_SESSION["adminId"] = $row["id"];
			alertMsg("登陆成功","index.php");
		}else{
			alertMsg("登陆失败，请检查用户名和密码","login.php");
		}
	}else{
		alertMsg('验证码错误',"login.php");
	}
}
