<?php
/*
 * 连接数据库
 * */
function connect(){
	$conn = mysql_connect(DB_HOST,DB_USER.DB_PWD) or die("数据库连接失败 Error:".mysql_errno().":".mysql_error());
	mysql_set_charset(DB_CHARSET);
	mysql_select_db(DB_DBNAME) or die("指定数据库打开失败");
	return $conn;
}
/*
 * 插入数据
 * */
 function insert($table,$arry){
 	$keys = join(",", array_keys($array));
	$vals = "'".join("','", array_values($array))."'";
	$sql = "insert {$table}($keys) values({$vals})";
	mysql_query($sql);
	return mysql_insert_id();
 }
/*
 * 更新数据
 * */
 function update($table,$array,$where=null){
 	
 }
