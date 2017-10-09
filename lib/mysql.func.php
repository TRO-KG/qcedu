<?php
/*
 * 连接数据库
 * */
function connect(){
	$conn = mysql_connect(DB_HOST,DB_USER,DB_PWD) or die("数据库连接失败 Error:".mysql_errno().":".mysql_error());
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
 	foreach($array as $key=>$val){
 		if($str==null){
 			$sep = "";
 		}else{
 			$sep = ",";
 		}
		$str.=$sep.$key."='".$val."'";
 	}
	$sql = "update {$table} set {$str}".($where == null?null:" where ".$where);
	mysql_query($sql);
	return mysql_affected_rows();
}
/*
 * 删除数据
 * */
function delete($table,$where=null){
	$where = $where == null?null : " where ". $where;
	$sql = "delete from {$table} {$where}";
	mysql_query($sql);
	return mysql_affected_rows();
}
/*
 * 查找数据
 * (查找指定数据)
 * */

function fetchOne($sql, $result_type = MYSQL_ASSOC){
 	$result = mysql_query($sql);
	$row = mysql_fetch_array($result,$result_type);
	return $row;
}

/*
 * 查找数据
 * （查找所有数据）
 * */
function fetchAll($sql, $result_type = MYSQL_ASSOC){
	$result = mysql_query($sql);
	while (@$row = mysql_fetch_array($result,$result_type)) {
		$rows[] = $row;
	}
	return $rows;
}

/*
 *查找数据条数 
 * */
function getResultNum($sql){
	$result = mysql_query($sql);
	return mysql_num_rows($result);
}