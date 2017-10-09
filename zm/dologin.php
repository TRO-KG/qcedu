<?php
require_once "../include.php";
session_start();
$username = $_POST['user'];
$password = md5($_POST['pwd']);
$verify   = $_POST['code'];                           
$verify1   = $_SESSION["verify"];
if($verify == $verify1){
	$sql = "select from qc_admin where username = '{$username}' and password = '{$password}'";
	$res = checkAdmin($sql);
	var_dump($res);
}else{
	echo "<script>alert('验证码错误');</script>";
	echo "<script>window.location = 'login.html';</script>";
}
//var_dump($_POST);
