<?php
	header("Content-type: text/html; charset=utf-8");
	include "zm/db_config.php";
	$con = mysqli_connect($dbhost, $dbuser, $dbpass);
	mysqli_query($con , "set names utf8");
	
	$act=$_REQUEST['act'];
	
	if("target_user" == $act){
		$dream = $_REQUEST['dream'];
		$username = $_REQUEST['username'];
		$usertel = $_REQUEST['usertel'];
		$userqq = $_REQUEST['userqq'];
		$useremail = $_REQUEST['useremail'];
		$useraddress = $_REQUEST['useraddress'];
		
		$sql = "INSERT INTO target_user ".
        "(dream,username,usertel,userqq,useremail,useraddress) ".
        "VALUES ".
        "('$dream','$username','$usertel','$userqq','$useremail','$useraddress')";
		mysqli_select_db( $con, 'qcedu' );
		$retval = mysqli_query( $con, $sql );
		if(! $retval )
		{
		    die('数据插入失败: ' . mysqli_error($con));
		}
	}else{
		var_dump($_REQUEST);
	}
	
	mysqli_close($con);
?>