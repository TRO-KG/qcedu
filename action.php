<?php
	include "init.php";
	$con = mysqli_connect($dbhost, $dbuser, $dbpass);
	$act=$_REQUEST['act'];
	
	if('netschool' == $act){
		$sql = "select * from coopschool";	
	}
	elseif('enrollment' == $act){
		$sql = 'select * from enrollment LIMIT 5';
	}
	elseif("guide" == $act){
		$sql = 'select * from guide LIMIT 5';
	}
	elseif("edunews" == $act){
		$sql = 'select * from edunews LIMIT 5';	
	}
	elseif("notice" == $act){
		$sql = 'select * from notices LIMIT 5';	
	}
	res();
	function res(){
		global $sql,$con;
		mysqli_select_db( $con, 'qcedu' );
		mysqli_query($con , "set names utf8");
		$retval = mysqli_query( $con, $sql );
		
		if(! $retval )
		{
		    die('无法读取数据: ' . mysqli_error($con));
		}
		$resArr = array();
		while($rows = mysqli_fetch_assoc($retval))
		{
	     	$count=count($rows);  
		    for($i=0;$i<$count;$i++){  
		        unset($rows[$i]);  
		    }
		    array_push($resArr ,$rows);
		}
		echo $str=json_encode($resArr);
	}
?>