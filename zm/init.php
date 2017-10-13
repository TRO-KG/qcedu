<?php
	header("Content-type: text/html; charset=utf-8");
	include "db_config.php";
	
$con = mysqli_connect($dbhost, $dbuser, $dbpass);
if($con){
	echo "链接成功";
}else{
	echo "链接失败";
}

//$sql2 = "CREATE TABLE coopschool( ".
//      "school_id INT NOT NULL AUTO_INCREMENT, ".
//      "school_name VARCHAR(100) NOT NULL, ".
//      "school_picpath VARCHAR(40) NOT NULL, ".
//      "submission_date DATE, ".
//      "PRIMARY KEY ( school_id ))ENGINE=InnoDB DEFAULT CHARSET=utf8;";
//mysqli_select_db( $con, 'qcedu' );
//$retva = mysqli_query( $con, $sql2 );
//if(! $retva )
//{
//  die('数据表创建失败: ' . mysqli_error($con));
//}
//echo "数据表创建成功\n";
mysqli_query($con , "set names utf8");
// 
//$school_name = '北京交通大学';
//$school_picpath = 'school/2017711841069218.jpg';
//$submission_date = 'timestamp';
// 
//$sql = "INSERT INTO coopschool ".
//      "(school_name,school_picpath, submission_date) ".
//      "VALUES ".
//      "('$school_name','$school_picpath','$submission_date')";
//// 
//// 
//$sql = "CREATE TABLE notices( ".
//      "article_id INT NOT NULL AUTO_INCREMENT, ".
//      "article_title VARCHAR(100) NOT NULL, ".
//      "PRIMARY KEY ( article_id ))ENGINE=InnoDB DEFAULT CHARSET=utf8;";
   $sql = "INSERT INTO notices ".
        "(article_title) ".
        "VALUES ".
        "('2017年春季厦门大学考试')";
mysqli_select_db( $con, 'qcedu' );
$retval = mysqli_query( $con, $sql );
if(! $retval )
{
    die('数据表创建失败: ' . mysqli_error($con));
}
echo "数据表创建成功\n";
mysqli_close($con);
?>