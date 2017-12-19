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
elseif("listaccount" == $act){
	$table    = "qc_admin";
	$pageSize = $_POST['pageSize'];
	$page     = $_POST['page'];
	$res      = pageFun($table,$pageSize,$page);
	echo $res;
}
elseif("addadm" == $act){
	$table = "qc_admin";
	$arr = $_POST;
	$arr["password"] = md5($_POST["password"]);
	$row = addadm($table, $arr);
	echo $row;
}
elseif("modifyadm" == $act){
	$id = $_POST["id"];
	$sql = "SELECT * FROM `qc_admin` WHERE id = {$id}";
	$row = json_encode(checkAdmin($sql));
	echo $row;
}
//elseif("addCooperate" == $act){
//	$table = "qc_cooperate";
//	$arr = $_POST;
//	$row = addadm($table, $arr);
//	echo $row;
//}
else{
	echo $_REQUEST;
	echo "<br />";
	var_dump($_REQUEST);
	echo "<br />";
	echo $_POST;
	echo "<br />";
	print_r($_POST);
	echo "<br />";
	var_dump($_POST);
	echo "<br />";
	print_r($_FILES);
}
