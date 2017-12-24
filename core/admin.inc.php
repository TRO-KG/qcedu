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
//添加管理员
function addadm($table, $array){
	return insert($table,$array);
}
// 修改管理员
function updateAdm($table, $array){
	$id = $array["id"];
	$arr = [
	    "username" => $array["username"],
	    "account" => $array["account"],
	    "email" => $array["email"],
	    "tel" => $array["tel"],
	];
	if("null" == $arr["email"]) $arr["email"] = "";
	update($table,$arr,"id=".$id);
	$sql = 'select * FROM `qc_admin` WHERE id = '. $id;
	return fetchOne($sql);
}
// 删除管理员
function deleteAdm($table, $array){
	$where = "id =" . $array["id"];
	return delete($table,$where);
}
function getTeacherList(){
	$sql = 'SELECT * FROM `qc_teachers` WHERE position = ';
	$res = '{"top":'.json_encode(fetchAll($sql.'1')).', "right":'.json_encode(fetchAll($sql.'2')).', "bottom":'.json_encode(fetchAll($sql.'3')).'}';
	return $res;
}
function editTeaFnc($table, $array){
	$id = $array["id"];
	$arr = [
	    "username" => $array["username"],
	    "account" => $array["account"],
	    "email" => $array["email"],
	    "tel" => $array["tel"],
	    "qq" => $array["qq"]
	];
	if("null" == $arr["email"]) $arr["email"] = "";
	update($table,$arr,"id=".$id);
}
