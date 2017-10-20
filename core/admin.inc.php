<?php
//检查是否有管理员
function checkAdmin($sql){
	return fetchOne($sql);
}
//检查是否登陆
function checkLogined(){
	if($_SESSION["adminId"]==""&&$_COOKIE["adminId"]==""){
		alertMsg("请先登录","login.php");
	}
}
//  注销操作
function logout(){
	$_SESSION=array();
	if(isset($_COOKIE)){
		setcookie(session_name(),"",time()-1);
	}
	if(isset($_COOKIE["adminName"])){
		setcookie("adminName","",time()-1);
	}
	if(isset($_COOKIE["adminId"])){
		setcookie("adminId","",time()-1);
	}
	session_destroy();
	header("location:login.php");
}
