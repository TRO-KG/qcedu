<?php
function checkLogined(){
	if($_SESSION["admin"]["id"]==""){
		header("location:login.php");
	}
}
function logout(){
	$_SESSION=array();
	if(isset($_COOKIE)){
		setcookie(session_name(),"",time()-1);
	}
	session_destroy();
	header("location:login.php");
}
