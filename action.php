<?php
include "zm/db_config.php";
$con = mysqli_connect($dbhost, $dbuser, $dbpass);
$act=$_REQUEST['act'];
//	var_dump($_REQUEST);
//	echo "<br />";
//	var_dump($_POST);
//	echo "<br />";
//	var_dump($_GET);
/*   HOME PAGE DATE   首页数据   */
if($act){
	switch($act){
		case 'netschool';
		$sql = "select * from coopschool LIMIT 25";	
		break;
		case 'enrollment';
		$sql = 'select * from enrollment LIMIT 5';
		break;
		case "guide";
		$sql = 'select * from guide LIMIT 5';
		break;
		case "edunews";
		$sql = 'select * from edunews LIMIT 5';	
		break;
		case "notice";
		$sql = 'select * from notices LIMIT 5';	
		break;
	}
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
	res();
}
//if()
?>