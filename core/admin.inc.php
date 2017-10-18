<?php
function checkLogined(){
	if($_SESSION["admin"]["id"]==""&&$_COOKIE["adminId"]==""){
		header("location:login.php");
	}
}
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
