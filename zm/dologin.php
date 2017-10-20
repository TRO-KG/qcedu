<?php
require_once "../include.php";
session_start();
$username = $_POST['username'];
$password = md5($_POST['password']);
$verify   = $_POST['verify'];                           
$verify1   = $_SESSION["verify"];
if($verify == $verify1){
	$sql = "SELECT * FROM `qc_admin` WHERE `username` LIKE '{$username}' AND `password` LIKE '{$password}'";
	$row = checkAdmin($sql);
	if($row){
		$_SESSION["admin"] = $row;
		header("location:index.php");
	
	}else{
		alertMsg("登陆失败，请检查用户名和密码");
	}
}else{
	alertMsg('验证码错误',"login.php");
}